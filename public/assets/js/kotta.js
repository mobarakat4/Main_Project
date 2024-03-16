function addToCart(Id) {
    // Send a POST request to your Laravel route
    axios.post('/add-to-cart', {
        // Data you want to send with the request
        productId: Id
    })
    .then(function (response) {
        // Handle success response
        alert("product added to cart");
        // Optionally, you can redirect the user to the cart page or show a success message
        // window.location.href = '/cart';
    })
    .catch(function (error) {
        // Handle error
        console.log(error);
        // Optionally, you can show an error message to the user
    });
}