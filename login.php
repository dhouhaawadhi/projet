<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script>
        function myFunction() {
            var un = document.forms["myForm"]['username'].value;
            var pw = document.forms["myForm"]['password'].value;
            if (un == "admin" && pw == "password") {
                window.location.href = "Home.php";
            } else {}
        }
    </script>
    <link rel="stylesheet" href="css/login_style.css">

</head>

<body>

    <div class="container">

        <img class="ronde1" src="images\image.png" alt="logo">
        <h2>Login</h2>
        <form method="post">
            <label>user name</label>

            <input type="text" name="username" id="username" placeholder="username" autocomplete="off">
            <label>password</label>


            <input type="password" name="password" id="pass" placeholder="password" autocomplete="off">
            <div class="btns">
                <button type="submit" name="submit" id="sub">Login</button>
        </form>
    </div>

    </form>
    </div>
</body>

</html>
<?php
if (isset($_POST['submit'])) {

    $un = $_POST['username'];
    $pw = $_POST['password'];

    $baseUrl = "https://data.mongodb-api.com/app/data-ljpnp/endpoint/data/beta";
    $apiKey = "e1GHeMpwtmRbct7QaYAl7IUmbXVcJQ55GCzWivtr3Nazqhu2dluzpbhVaGIDIZ7I";
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $baseUrl . '/action/find');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, '{"collection":"Admin","database":"online_payment","dataSource":"Cluster0"}');
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

    foreach ($resultJson->{'documents'} as $item) {
    
        $username = $item->{'username'};
        $password = $item->{'password'};
    
    
        if ($un == $username && $pw == $password) {
            header('location:index.html');
            exit();
        }
    }
    echo '<script>alert("Compte introuvable")</script>';
    curl_close($ch);
}
?>