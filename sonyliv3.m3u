<?php
// Target URL
$url = "https://raw.githubusercontent.com/drmlive/sliv-live-events/refs/heads/main/sonyliv.m3u";

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url); // URL সেট করা
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // আউটপুট রিটার্ন করা হবে
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // SSL ভেরিফিকেশন বন্ধ (সতর্ক থাকুন)

// Execute cURL request
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo "cURL Error: " . curl_error($ch);
} else {
    // Print the page source
    echo htmlspecialchars($response); // htmlspecialchars ব্যবহার করলে HTML এ সেফলি প্রিন্ট হবে
}

// Close cURL session
curl_close($ch);
?>
