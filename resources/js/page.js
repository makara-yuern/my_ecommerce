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
                const products = data.data;
                const container = document.querySelector('#featured-products .grid');
                const loadMoreContainer = document.getElementById('load-more-container');

                if (products.length > 0) {
                    products.forEach(product => {
                        const productDiv = document.createElement('div');
                        productDiv.classList.add('product', 'bg-white', 'rounded-lg', 'shadow-md', 'p-6');
                        productDiv.setAttribute('data-id', product.id);
                        productDiv.innerHTML = `
                            <a href="/product/${product.id}">
                                <img src="${product.image}" alt="${product.name}" class="w-full h-48 object-cover rounded">
                                <h3 class="mt-4 font-bold text-lg">${product.name}</h3>
                                <p class="mt-2 text-pink-600 font-semibold">${product.price}</p>
                            </a>
                            <button
                                class="add-to-cart-button mt-4 bg-pink-500 text-white w-full py-2 px-4 rounded-lg hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-opacity-50 transition-colors duration-200"
                                data-product-id="${product.id}"
                                data-quantity="1">
                                Add to Cart
                            </button>
                        `;
                        container.appendChild(productDiv);
                    });

                    attachAddToCartEventListeners();
                } else {
                    loadMoreContainer.innerHTML = '<p>No more products to load.</p>';
                }
            })
            .catch(error => console.error('Error loading more products:', error));
    }

    function attachAddToCartEventListeners() {
        document.querySelectorAll('.add-to-cart-button').forEach(button => {
            button.addEventListener('click', function() {
                const productId = button.dataset.productId;
                const quantity = button.dataset.quantity;

                fetch(`/cart/cart/add/${productId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ quantity })
                })
                .then(response => response.json())
                .then(data => {
                    const successMessage = document.getElementById('success-message');
                    if (successMessage) {
                        successMessage.textContent = data.message;
                        successMessage.classList.remove('hidden');
                        setTimeout(() => successMessage.classList.add('hidden'), 3000);
                    }
                })
                .catch(error => console.error('Error adding product to cart:', error));
            });
        });
    }

    attachAddToCartEventListeners();
});
