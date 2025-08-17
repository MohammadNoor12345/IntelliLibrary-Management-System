// Cart Page Script
document.addEventListener('DOMContentLoaded', function() {
    // Example cart items (replace with dynamic data)
    const cartItems = [
        { id: 1, name: 'Book 1', price: 19.99 },
        { id: 2, name: 'Book 2', price: 29.99 },
        { id: 3, name: 'eBook 1', price: 9.99 },
    ];

    const cartContainer = document.getElementById('cart-items');

    function renderCartItems() {
        cartContainer.innerHTML = '';
        cartItems.forEach(item => {
            const cartItemElement = document.createElement('div');
            cartItemElement.classList.add('card', 'mb-3');
            cartItemElement.innerHTML = `
                <div class="card-body">
                    <h5 class="card-title">${item.name}</h5>
                    <p class="card-text">$${item.price.toFixed(2)}</p>
                </div>
            `;
            cartContainer.appendChild(cartItemElement);
        });

        updateCartBadge();
    }

    function updateCartBadge() {
        const cartBadge = document.getElementById('cart-badge');
        cartBadge.textContent = cartItems.length;
    }

    renderCartItems();
});

// Example additional JavaScript functionality
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling using jQuery
    $('a[href^="#"]').on('click', function(event) {
        const target = $(this.getAttribute('href'));
        if (target.length) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top
            }, 1000);
        }
    });
});
