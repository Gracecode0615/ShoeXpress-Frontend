<?php
session_start();

// Check if the cart session variable exists, if not, create it
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Get the product ID from the POST request
$productId = $_POST['id'];

// Check if the product is already in the cart, if so, increase the quantity
if (isset($_SESSION['cart'][$productId])) {
    $_SESSION['cart'][$productId]['quantity'] += 1;
} else {
    // Add new product to the cart
    // In a real application, you'd also retrieve product details from a database
    $_SESSION['cart'][$productId] = array(
        'id' => $productId,
        'name' => 'Product ' . $productId,
        'price' => 50, // Example price
        'quantity' => 1
    );
}

// Send a response back to the JavaScript
echo json_encode($_SESSION['cart']);
?>
