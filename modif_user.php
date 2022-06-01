<?php 

$id = $_POST['user'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

$baseUrl = "https://data.mongodb-api.com/app/data-ljpnp/endpoint/data/beta";
$apiKey = "e1GHeMpwtmRbct7QaYAl7IUmbXVcJQ55GCzWivtr3Nazqhu2dluzpbhVaGIDIZ7I";
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $baseUrl . '/action/updateOne');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"collection":"userModel","database":"online_payment","dataSource":"Cluster0", "filter": { "_id": {"$oid":  "'.$id.'" } },"update": { "$set": { "email": "'.$email.'", "password": "'.$password.'", "name": "'.$name.'", "lastname": "'.$lastname.'" } } }');
$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Access-Control-Request-Headers: *';
$headers[] = 'Api-Key: ' . $apiKey;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
header("Location: utlisateurs.php");
exit();

?>