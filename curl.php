<?php 

function http_request($url) {
	// Get CURL
	$ch = curl_init();

	// Set URL
	curl_setopt($ch, CURLOPT_URL, $url);

	// Activate transfer 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	// Setting for localhost
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

	// Set result to output variable
	$output = curl_exec($ch);

	// Close CURL
	curl_close($ch);

	// Return CURL result
	return $output;
}

// Call function
$global = http_request('https://api.kawalcorona.com/');
$province = http_request('https://api.kawalcorona.com/indonesia/provinsi/');

// Change to JSON format
$global = json_decode($global, TRUE);
$province = json_decode($province, TRUE);

// Count Data 
$indexGlobal = 1;
$totalGlobal = count($global);

$indexProvince = 1;
$totalProvince = count($province);