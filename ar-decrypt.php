<?php
$dataFile = readline("Data file: ");
$data = file_get_contents($dataFile);
$iv = readline("IV: ");
$token = readline("Token: ");
// $iv="IIyOv7ocmBvRpd2pei3kOQ==";
// $token = "fCWdmAifQQHo1czLZL8gQv3EqBVKyqJ17RFawSKYsumvMEXZHp78EdjqFB2vxcpqKjqdARmAXZ-ELAcY_YOJeg";
$dec = openssl_decrypt(
     $data,
    'AES-256-CBC',
    hash('sha256', $token),
    OPENSSL_RAW_DATA,
    base64_decode($iv)
);
file_put_contents("data-dec.tgz",$dec);
echo 'written to data-dec.tgz';