<?php 

session_start();

if(isset($_SESSION["user_id"])){

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user   = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="/Shop/css/main1.css">
    <title>Home</title>
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><img src="/Shop/logos/logotype-main1.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNav">
      <ul class="navbar-nav ml-auto ">
        <li class="nav-item">
          <a class="nav-link" href="#">Men</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Women</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Sale</a>
        </li>
        
      </ul>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
      
      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item">
          <a class="nav-link" href="cart.html">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
              <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
            </svg>
          </a>
        </li>



        <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
        </svg>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <?php if(isset($user)): ?>
            <p class="dropdown-item">Hello <?= htmlspecialchars($user["name"]) ?></p>
            <a class="dropdown-item" href="/Shop/php/logout.php">Log out</a>
        <?php else: ?>
            <a class="dropdown-item" href="/Shop/php/login.php">Log in</a>
            <a class="dropdown-item" href="/Shop/Html/profile.html">Sign up</a>
        <?php endif; ?>
    </div>
</li>
        
      </ul>
    </div>
  </nav>

  
  <div class="container mt-md-5 pt-5">
    <h1 style="text-align: center; color: black;" class="presentation">Brands we present</h1>
  <div class="row">
    <div class="col-md-3 animator" >
      <div class="card">
        <a href="./nike.html"><img src="/Shop/logos/nike-logo.gif" class="card-img-top" alt="Nike Logo Black"></a>
       
      </div>
    </div>
    <div class="col-md-3 animator">
      <div class="card">
        <a href="/Shop/Html/adidas.html"><img src="/Shop/logos/adidas-web-logo.jpg" class="card-img-top" alt="Adidas Logo Gray"></a>
        
      </div>
    </div>
    <div class="col-md-3 animator">
      <div class="card">
        <a href="/Shop/Html/thenorthface.html"><img src="/Shop/logos/northface.jpg" class="card-img-top" alt="The North Face Logo Black"></a>
        
      </div>
    </div>
    <div class="col-md-3 animator">
      <div class="card">
        <img src="/Shop/logos/Under_Armour_1200x630.webp" class="card-img-top" alt="Under Armour Logo Black">
        
      </div>
    </div>
  </div>
  
  
  <div class="row pt-5 ">
    <div class="col-md-3 animator">
      <div class="card">
        <img src="/Shop/logos/Reebok-Logo.jpg" class="card-img-top" alt="Reebok Logo Black">
        
      </div>
    </div>
    <div class="col-md-3 animator">
      <div class="card">
        <img src="/Shop/logos/newbalance.jpg" class="card-img-top" alt="New Balance Logo Red">
       
      </div>
    </div>
    <div class="col-md-3 animator">
      <div class="card">
        <img src="/Shop/logos/vans.jpg" class="card-img-top" alt="Vans Logo Black">
        
      </div>
    </div>
    <div class="col-md-3 animator">
      <div class="card">
        <img  src="/Shop/logos/puma-logo-and-art-free-vector.jpg" class="card-img-top" alt="Puma Logo Black">
        
      </div>
    </div>
  </div>
  
</div>

<!--  -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="/Shop/js/main.js"></script>
  <script src="https://website-widgets.pages.dev/dist/sienna.min.js" defer></script>
</body>
</html>