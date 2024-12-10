<?php
// fetch_conversion_rates.php

if (isset($_GET['currency'])) {
    $currency = $_GET['currency']; // Get the selected currency from the query string

    // Define the API URL and the access key (make sure to keep your access key secure)
    $api_url = 'http://apilayer.net/api/live';
    $access_key = 'd5c94f992bd7c87a956f9fde023832a7';
    $base_currency = 'USD'; // Source currency for conversion (USD in this case)
    
    // Make the API request
    $url = "{$api_url}?access_key={$access_key}&currencies={$currency}&source={$base_currency}&format=1";
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    // Check if the response contains the conversion rate
    if (isset($data['quotes']["USD{$currency}"])) {
        $rate = $data['quotes']["USD{$currency}"]; // Get the conversion rate
        echo json_encode(['rate' => $rate]); // Return the rate as a JSON response
    } else {
        echo json_encode(['error' => 'Unable to fetch conversion rate']);
    }
} else {
    echo json_encode(['error' => 'Currency not specified']);
}
?>
