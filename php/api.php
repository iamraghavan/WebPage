<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);

$data = [
    "codes" => "611003",
];

curl_setopt($ch, CURLOPT_URL, "https://app.zipcodebase.com/api/v1/search?" . http_build_query($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
    "apikey: 77263240-8518-11ed-af9f-5f1ff8feea0d",
)
);

$response = curl_exec($ch);
curl_close($ch);

$json = json_decode($response);

var_dump($json);
?>