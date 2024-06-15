<?php
class DataEncoder {
    private $key = 'pass1234'; // as your wish (It's secret!!!) like a password

	function encrypt($data) {
	    $method = 'aes-256-cbc'; // Encryption method
	    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method)); // Generate an IV
	    $encrypted = openssl_encrypt($data, $method, $this->key, 0, $iv); // Encrypt the data
	    // Combine IV and encrypted data and encode it in base64
	    return base64_encode($iv . $encrypted);
	}

	function decrypt($data) {
	    $method = 'aes-256-cbc'; // Encryption method
	    $data = base64_decode($data); // Decode the base64-encoded data
	    $iv_length = openssl_cipher_iv_length($method); // Get the IV length
	    $iv = substr($data, 0, $iv_length); // Extract the IV
	    $encrypted = substr($data, $iv_length); // Extract the encrypted data
	    // Decrypt and return the original data
	    return openssl_decrypt($encrypted, $method, $this->key, 0, $iv);
	}	

}
?>