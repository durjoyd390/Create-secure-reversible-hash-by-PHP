<?php
include 'DataEncoder.php';

$original_data = 'hello test';

$DataEncoder = new DataEncoder();

$encrypted_data = $DataEncoder->encrypt($original_data);
echo $encrypted_data;

echo '<br>';

$decrypted_data = $DataEncoder->decrypt($encrypted_data);
echo $decrypted_data;
?>