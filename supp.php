<?php

    $baseUrl = "https://data.mongodb-api.com/app/data-ljpnp/endpoint/data/beta";
    $apiKey = "e1GHeMpwtmRbct7QaYAl7IUmbXVcJQ55GCzWivtr3Nazqhu2dluzpbhVaGIDIZ7I";
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $baseUrl . '/action/find');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, '{"collection":"userModel","database":"online_payment","dataSource":"Cluster0"}');
    //curl_setopt($ch, CURLOPT_POSTFIELDS, '{"collection":"Admin","database":"online_payment","dataSource":"Cluster0", "filter":{"username": '.$un.', "password": '.$pw.'}}');
    
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Access-Control-Request-Headers: *';
    $headers[] = 'Api-Key: ' . $apiKey;
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    $resultJson = json_decode($result);
    $idf = $_GET['id_f'];
    $deleteResult = $resultJson->userModel->deleteOne(['_id' => '622dcc5c23010435491ccff2']);
    header('location:utlisateurs.php');

    
    curl_close($ch);















?>
        


