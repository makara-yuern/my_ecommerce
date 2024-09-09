import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {
    const menuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    menuButton.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
    });

    const userMenuButton = document.getElementById('user-menu-button');
    const userMenu = document.getElementById('user-menu');

    if (userMenuButton && userMenu) {
        userMenuButton.addEventListener('click', function() {
            userMenu.classList.toggle('hidden');
        });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const loadMoreButton = document.getElementById('load-more');
    let page = 1;

    loadMoreButton.addEventListener('click', function() {
        page++;
        fetchMoreProducts(page);
    });

    function fetchMoreProducts(page) {
        fetch(`/load-more?page=${page}`)
            .then(response => response.json())
            .then(data => {
                const products = data.data; // products array
                const container = document.querySelector('#featured-products .grid');
                const loadMoreContainer = document.getElementById('load-more-container');

                if (products.length > 0) {
                    products.forEach(product => {
                        const productDiv = document.createElement('div');
                        productDiv.classList.add('product', 'bg-white', 'rounded-lg', 'shadow-md', 'p-6');
                        productDiv.setAttribute('data-id', product.id);
                        productDiv.innerHTML = `
                            <img src="${product.image}" alt="${product.name}" class="w-full h-48 object-cover rounded">
                            <h3 class="mt-4 font-bold text-lg">${product.name}</h3>
                            <p class="mt-2 text-pink-600 font-semibold">${product.price}</p>
                            <a href="#" class="block mt-4 bg-pink-500 text-white py-2 rounded-lg">Add to Cart</a>
                        `;
                        container.appendChild(productDiv);
                    });
                } else {
                    loadMoreContainer.innerHTML = '<p>No more products to load.</p>';
                }
            })
            .catch(error => console.error('Error loading more products:', error));
    }
});

document.getElementById('search-input').addEventListener('input', function() {
    let query = this.value;

    // If the query is empty, hide the suggestions dropdown
    if (!query) {
        document.getElementById('suggestions').classList.add('hidden');
        return;
    }

    // Send AJAX request to fetch suggestions
    fetch(`/search/suggestions?query=${encodeURIComponent(query)}`)
        .then(response => response.json())
        .then(data => {
            let suggestionsBox = document.getElementById('suggestions');
            suggestionsBox.innerHTML = ''; // Clear existing suggestions

            if (data.length === 0) {
                suggestionsBox.classList.add('hidden');
            } else {
                suggestionsBox.classList.remove('hidden');

                // Create a list of suggestions with images
                data.forEach(product => {
                    let suggestionItem = document.createElement('a');
                    suggestionItem.href = `/product/${product.id}`;
                    suggestionItem.classList.add('block', 'px-4', 'py-2', 'hover:bg-gray-200', 'text-gray-700', 'flex', 'items-center');

                    // Create an image element for the product
                    let productImage = document.createElement('img');
                    productImage.src = `${product.image}`;
                    productImage.alt = product.name;
                    productImage.classList.add('w-10', 'h-10', 'mr-4', 'rounded-md');

                    // Create a span element for the product name
                    let productName = document.createElement('span');
                    productName.textContent = product.name;

                    // Append image and name to the suggestion item
                    suggestionItem.appendChild(productImage);
                    suggestionItem.appendChild(productName);

                    // Append the suggestion item to the suggestions box
                    suggestionsBox.appendChild(suggestionItem);
                });
            }
        });
});
