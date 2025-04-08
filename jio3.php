<?php

// Target URL
$url = "https://s4.yuvraj.fun/hls/ipl4k/index.m3u8";

// Initialize cURL
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (only for testing)

// Execute cURL request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    // Print the page source
    echo htmlspecialchars($response); // Use htmlspecialchars if you want it HTML-safe
}

// Close cURL session
curl_close($ch);

?>
