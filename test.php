<?php
$client=new mongodb/Client(
    'mongodb+srv://https://data.mongodb-api.com/app/data-ljpnp/endpoint/data/beta:e1GHeMpwtmRbct7QaYAl7IUmbXVcJQ55GCzWivtr3Nazqhu2dluzpbhVaGIDIZ7I@Cluster0/test?retryWrites=true&w=majority'
);
$db=$client->online_payment;
?>