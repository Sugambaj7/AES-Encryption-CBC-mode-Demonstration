<?php

    include '../connection/connection.php';
    // Encrypt using AES
    function aesEncrypt($data, $key)
    {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encryptedData = openssl_encrypt($data, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
        $encryptedData = base64_encode($iv . $encryptedData);
        return $encryptedData;
    }

    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // $query = "INSERT INTO test ( encrypmessage)
    // VALUES ( '{$message}')";
    // $result = mysqli_query($conn, $query);
    // if($result){

        if(isset($message) && !empty($message)){
            $key = 'YourSecretKey';
            $data = $message;
            $encrypted = aesEncrypt($data, $key);
            $query = "INSERT INTO test ( encrypmessage)
             VALUES ( '{$encrypted}')";
            $result = mysqli_query($conn, $query);
            if($result){
                header("location: ./display_encryptedmsg.php");
            }
            else{
                echo "failed";
            }
        }



// $encrypted = aesEncrypt($data, $key);
// echo "Encrypted: " . $encrypted . "\n";

// $decrypted = aesDecrypt($encrypted, $key);
// echo "Decrypted: " . $decrypted . "\n";
// ?>
    <!-- }
    else{
        echo "failed";
    } -->