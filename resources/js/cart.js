document.addEventListener('DOMContentLoaded', function() {
    const addToCartButton = document.getElementById('add-to-cart-button');

    if (addToCartButton) {
        addToCartButton.addEventListener('click', function(e) {
            e.preventDefault();

            let productId = this.getAttribute('data-product-id');
            let quantity = document.getElementById('quantity').value;

            fetch(`/cart/cart/add/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    quantity: quantity
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    const dynamicAlert = document.getElementById('dynamic-alert');
                    const dynamicAlertMessage = document.getElementById('dynamic-alert-message');

                    dynamicAlertMessage.innerText = data.message;
                    dynamicAlert.classList.remove('hidden');
                    
                    setTimeout(() => {
                        dynamicAlert.classList.add('hidden');
                    }, 3000);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    }
});
