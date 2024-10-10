<?php
$ip = $_SERVER['REMOTE_ADDR'];
    $access_token = 'your_ipinfo_access_token';
    $url = "https://ipinfo.io/{$ip}?token={$access_token}";
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    $country = $data['country'];

    $currencyMap = [
        "AU" => "AUD",
        "US" => "USD",
        "GB" => "GBP",
        "CA" => "CAD",
        "JP" => "JPY",
        // Add more countries and their currencies as needed
    ];
    $currency = isset($currencyMap[$country]) ? $currencyMap[$country] : "USD"; // Default to USD if country not found

    return ['country' => $country, 'currency' => $currency];
}

$result = getCountryAndCurrencyByIP();
$_SESSION['currency'] = $result['currency'];
