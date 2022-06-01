<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier</title>

    <link rel="stylesheet" href="css/login_style.css">

</head>

<body>

    <div class="container">

        <?php

        $baseUrl = "https://data.mongodb-api.com/app/data-ljpnp/endpoint/data/beta";
        $apiKey = "e1GHeMpwtmRbct7QaYAl7IUmbXVcJQ55GCzWivtr3Nazqhu2dluzpbhVaGIDIZ7I";
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $baseUrl . '/action/find');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"collection":"userModel","database":"online_payment","dataSource":"Cluster0"}');
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
        $idf = $_GET['user'];

        $user_name = "";
        $user_lastname = "";
        $user_email = "";
        $user_password = "";

        foreach ($resultJson->{'documents'} as $item) {
            $id = $item->{'_id'};
            if ($idf == $id) {
                $user_name = $item->{'name'};
                $user_password = $item->{'password'};
                $user_lastname = $item->{'lastname'};
                $user_email = $item->{'email'};
            }
        }

        curl_close($ch);

        ?>

        <img class="ronde1" src="images\image.png" alt="logo">
        <h2>Login</h2>

        <form method="post" action="modif.php">
            <label>user name</label>
            <input type="text" name="username" id="username" placeholder="Name" autocomplete="off" value="<?php echo $user_name ?>">

            <label>lastname</label>
            <input type="text" name="username" id="username" placeholder="Lastname" autocomplete="off" value="<?php echo $user_lastname ?>">

            <label>email</label>
            <input type="text" name="username" id="username" placeholder="Email" autocomplete="off" value="<?php echo $user_email; ?>">


            <label>password</label>
            <input type="password" name="password" id="pass" placeholder="password" autocomplete="off" value="<?php echo $user_password ?>">




            <div class="btns">
                <button type="submit" name="submit" id="sub">Login</button>
        </form>


    </div>
    </form>
    </div>
</body>

</html>