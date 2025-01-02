document.addEventListener('DOMContentLoaded', function () {
    const products = [
        { id: 1, name: 'Watch 1', description: 'Elegant watch.', price: 500, image: 'watch1.jpeg' },
        { id: 2, name: 'Watch 2', description: 'Sporty watch.', price: 600, image: 'watch2.jpeg' },
        { id: 3, name: 'Watch 3', description: 'Classic watch.', price: 2000, image: 'watch3.jpeg' },
        { id: 4, name: 'Watch 4', description: 'Luxury watch.', price: 4000, image: 'watch4.jpeg' },
        { id: 5, name: 'Watch 5', description: 'sport Luxury watch.', price: 3000, image: 'watch5.jpeg' },
        { id: 6, name: 'Watch 6', description: 'Classic watch.', price: 1500, image: 'watch6.jpg' },
        { id: 7, name: 'Watch 7', description: 'Elegant watch', price: 700, image: 'watch7.png' },
        { id: 8, name: 'Watch 8', description: 'Expensive watch', price: 19000, image: 'watch8.webp' },
        { id: 9, name: 'Watch 9', description: 'luxury watch', price: 7000, image: 'watch9.avif' },
        { id: 10, name: 'Watch 10', description: 'sporty watch', price: 1800, image: 'watch10.webp' },
        { id: 11, name: 'Watch 11', description: 'Luxury watch', price: 4300, image: 'watch11.avif' },

    ];

    const productList = document.getElementById('product-list');
    const productDetails = document.getElementById('product-details');
    const cartItems = document.getElementById('cart-items');
    const cart = JSON.parse(localStorage.getItem('cart')) || [];

    function displayProducts() {
        products.forEach(product => {
            const productDiv = document.createElement('div');
            productDiv.classList.add('product');
            productDiv.innerHTML = `
                <img src="${product.image}" alt="${product.name}">
                <h3>${product.name}</h3>
                <p>${product.description}</p>
                <p>$${product.price}</p>
                <button onclick="addToCart(${product.id})">Add to Cart</button>
                <button onclick="viewDetails(${product.id})">View Details</button>
            `;
            productList.appendChild(productDiv);
        });
    }

    function addToCart(productId) {
        const product = products.find(p => p.id === productId);
        cart.push(product);
        localStorage.setItem('cart', JSON.stringify(cart));
        alert('Product added to cart');
    }

    function viewDetails(productId) {
        const product = products.find(p => p.id === productId);
        localStorage.setItem('productDetails', JSON.stringify(product));
        window.location.href = 'product.html';
    }

    function displayProductDetails() {
        const product = JSON.parse(localStorage.getItem('productDetails'));
        if (productDetails) {
            productDetails.innerHTML = `
                <img src="${product.image}" alt="${product.name}">
                <h3>${product.name}</h3>
                <p>${product.description}</p>
                <p>$${product.price}</p>
                <button onclick="addToCart(${product.id})">Add to Cart</button>
            `;
        }
    }

    function displayCart() {
        cartItems.innerHTML = '';
        cart.forEach((item, index) => {
            const cartItemDiv = document.createElement('div');
            cartItemDiv.classList.add('cart-item');
            cartItemDiv.innerHTML = `
                <img src="${item.image}" alt="${item.name}">
                <h3>${item.name}</h3>
                <p>$${item.price}</p>
                <button onclick="removeFromCart(${index})">Remove</button>
            `;
            cartItems.appendChild(cartItemDiv);
        });
    }

    function removeFromCart(index) {
        cart.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(cart));
        displayCart();
    }

    function checkout() {
        alert('Checkout not implemented yet.');
    }

    if (productList) displayProducts();
    if (productDetails) displayProductDetails();
    if (cartItems) displayCart();

    window.addToCart = addToCart;
    window.viewDetails = viewDetails;
    window.removeFromCart = removeFromCart;
    window.checkout = checkout;
});
function buttonClicked() {
    alert('You must have an Account first!!');
}
