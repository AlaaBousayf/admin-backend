<?php

$baseUrl = 'http://admin-backend.test/api';

// 1. Login
echo "1. Logging in...\n";
$loginData = json_encode([
    'username' => 'emilys',
    'password' => 'emilyspass'
]);

$ch = curl_init("$baseUrl/auth/login");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $loginData);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Accept: application/json']);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "Login Response Code: $httpCode\n";
$responseData = json_decode($response, true);

// Handle wrapped resource
$token = $responseData['token'] ?? null;

if ($httpCode !== 200 || !$token) {
    echo "Login Failed!\n";
    echo $response . "\n";
    exit(1);
}

echo "Login Success! Token: " . substr($token, 0, 10) . "...\n\n";

// 2. Add Product
echo "2. Adding Product...\n";
$productData = json_encode([
    'title' => 'Test Product',
    'description' => 'This is a test product',
    'price' => 99.99,
    'stock' => 10,
    'category' => 'electronics',
    'brand' => 'TestBrand'
]);

$ch = curl_init("$baseUrl/products/add");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $productData);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Accept: application/json',
    "Authorization: Bearer $token"
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "Add Product Response Code: $httpCode\n";
$productResponse = json_decode($response, true);

if ($httpCode !== 201 && $httpCode !== 200) {
    echo "Add Product Failed!\n";
    echo $response . "\n";
    exit(1);
}

$productId = $productResponse['id'] ?? $productResponse['data']['id'] ?? null;
if (!$productId) {
    // Try to find ID in the response structure
    echo "Could not find Product ID in response.\n";
    echo $response . "\n";
    // It might be directly in the root if Resource is not wrapped, or in 'data'
    $productId = $productResponse['id'];
}

echo "Product Added! ID: $productId\n\n";

// 3. Delete Product
echo "3. Deleting Product $productId...\n";

$ch = curl_init("$baseUrl/products/$productId");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Accept: application/json',
    "Authorization: Bearer $token"
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "Delete Product Response Code: $httpCode\n";
echo "Response: $response\n";

if ($httpCode !== 200) {
    echo "Delete Product Failed!\n";
    exit(1);
}

echo "\nALL TESTS PASSED!\n";
