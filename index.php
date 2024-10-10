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
        "AT" => "EUR", // Austria
        "BE" => "EUR", // Belgium
        "CY" => "EUR", // Cyprus
        "EE" => "EUR", // Estonia
        "FI" => "EUR", // Finland
        "FR" => "EUR", // France
        "DE" => "EUR", // Germany
        "GR" => "EUR", // Greece
        "IE" => "EUR", // Ireland
        "IT" => "EUR", // Italy
        "LV" => "EUR", // Latvia
        "LT" => "EUR", // Lithuania
        "LU" => "EUR", // Luxembourg
        "MT" => "EUR", // Malta
        "NL" => "EUR", // Netherlands
        "PT" => "EUR", // Portugal
        "SK" => "EUR", // Slovakia
        "SI" => "EUR", // Slovenia
        "ES" => "EUR", // Spain
        // Add more countries and their currencies as needed
    ];
    $currency = isset($currencyMap[$country]) ? $currencyMap[$country] : "USD"; // Default to USD if country not found

    return ['country' => $country, 'currency' => $currency];
}

$result = getCountryAndCurrencyByIP();
$_SESSION['currency'] = $result['currency'];
