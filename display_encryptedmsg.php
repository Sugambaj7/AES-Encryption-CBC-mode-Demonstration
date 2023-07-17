<?php
include '../connection/connection.php';

 $query = "SELECT * FROM test";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)>0){
        $key = 'YourSecretKey';
        while($row = mysqli_fetch_array($result)){
            $encrypted = $row['encrypmessage'];
            $decryptedMsg = aesDecrypt($encrypted, $key);
        }
        echo $decryptedMsg;
    }
    else{
        echo "no data";
    }
    
?>