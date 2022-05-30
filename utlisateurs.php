<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>utlisateurs</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">paiement en ligne</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                </div>
            </form>
            <!-- Navbar-->
            <a href="logout.php" class="btn btn-danger">Logout</a>        
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <img src="assets\img\image.png" width="40px" alt="">
                        <div id="layoutSidenav">
                            <div id="layoutSidenav_nav">
                                
                                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                                    <div class="sb-sidenav-menu">
                                        <img src="assets\img\image.png" width="40px" alt="">
                                        <div class="nav">
                                            <div class="sb-sidenav-menu-heading"></div>
                                            <a class="nav-link" href="index.html">
                                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                                Dashboard
                                            </a>
                                            <a class="nav-link" href="utlisateurs.php">
                                                <div class="sb-nav-link-icon"><i class=""></i></div>
                                                Utlisateurs
                                            </a>
                                            <a class="nav-link" href="portefeuile.php">
                                                <div class="sb-nav-link-icon"><i class=""></i></div>
                                                portefeuille
                                            </a>
                                            <a class="nav-link" href="marche.php">
                                                <div class="sb-nav-link-icon"><i class=""></i></div>
                                                marche
                                            </a>
                                            <a class="nav-link" href="banques.php">
                                                <div class="sb-nav-link-icon"><i class=""></i></div>
                                                banques
                                            </a>
                                            <a class="nav-link" href="compteBancaire.php">
                                                <div class="sb-nav-link-icon"><i class=""></i></div>
                                                comptes bancaire
                                            </a>
                                           
                                         
                                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                                        Authentication
                                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                                    </a>
                                                    
                                                    
                                                </nav>
                                            </div>
                                            
                                    </div>
                                    
                                </nav>
                            </div>
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>

                        <?php

    $baseUrl = "https://data.mongodb-api.com/app/data-ljpnp/endpoint/data/beta";
    $apiKey = "e1GHeMpwtmRbct7QaYAl7IUmbXVcJQ55GCzWivtr3Nazqhu2dluzpbhVaGIDIZ7I";
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $baseUrl . '/action/find');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, '{"collection":"userModel","database":"online_payment","dataSource":"Cluster0"}');
    //curl_setopt($ch, CURLOPT_POSTFIELDS, '{"collection":"userModel","database":"online_payment","dataSource":"Cluster0", "filter":{"username": '.$un.', "password": '.$pw.'}}');
    
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

    
    
  
?> 
                      
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between">
                                <div>

                                    <i class="fas fa-table me-1"></i>
                                    Utilisateurs
                                </div>
                                <button class="btn btn-primary">Add</button>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Delete</th>
                                            <th>Edit</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                      foreach ($resultJson->{'documents'} as $item) {
                                        ?>
                                        <tr>
                                            <td><?php echo $item->{'name'} ?></td>
                                            <td><?php echo $item->{'lastname'} ?></td>
                                            <td><?php echo $item->{'email'} ?></td>
                                            <td><?php echo $item->{'password'} ?></td>
                                            <form action="supp.php" name="F" method="GET">
                                                <td>
                                                <a class="btn btn-danger" href="supp.php?id_f=<?php echo $item->{'_id'} ?>"   name="sup" id="sup" >Supprimer</a>
                                                </td>
                                            </form>
                                            <td>
                                            <a class="btn btn-primary" href="modif.php?idf_02=<?php echo $item->{'_id'} ?>" name="upd" id="upd">Editer</a>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        curl_close($ch);
                                        ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
