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
$data = http_request('https://api.kawalcorona.com/indonesia/provinsi/');

// Change to JSON format
$data = json_decode($data, TRUE);

// Count data
$total = count($data); 
$index = 1;

for ($i=0; $i < $total; $i++) :
	$result = $data[$i]['attributes'];
 ?>

 	<tr>
 		<td><?= $index++ ?></td>
 		<td><?= $result['Provinsi'] ?></td>
 		<td><?= $result['Kasus_Posi'] ?></td>
 		<td><?= $result['Kasus_Meni'] ?></td>
 		<td><?= $result['Kasus_Semb'] ?></td>
 	</tr>

 <?php 

endfor;

  ?>