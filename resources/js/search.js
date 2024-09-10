document.getElementById('search-input').addEventListener('input', function() {
    let query = this.value;

    if (!query) {
        document.getElementById('suggestions').classList.add('hidden');
        return;
    }

    fetch(`/search/suggestions?query=${encodeURIComponent(query)}`)
        .then(response => response.json())
        .then(data => {
            let suggestionsBox = document.getElementById('suggestions');
            suggestionsBox.innerHTML = '';

            if (data.length === 0) {
                suggestionsBox.classList.add('hidden');
            } else {
                suggestionsBox.classList.remove('hidden');

                data.forEach(product => {
                    let suggestionItem = document.createElement('a');
                    suggestionItem.href = `/product/${product.id}`;
                    suggestionItem.classList.add('block', 'px-4', 'py-2', 'hover:bg-gray-200', 'text-gray-700', 'flex', 'items-center');

                    let productImage = document.createElement('img');
                    productImage.src = `${product.image}`;
                    productImage.alt = product.name;
                    productImage.classList.add('w-10', 'h-10', 'mr-4', 'rounded-md');

                    let productName = document.createElement('span');
                    productName.textContent = product.name;

                    suggestionItem.appendChild(productImage);
                    suggestionItem.appendChild(productName);

                    suggestionsBox.appendChild(suggestionItem);
                });
            }
        });
});
