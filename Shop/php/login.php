<?php

$is_inavlid = false;

if($_SERVER["REQUEST_METHOD"] ==="POST"){
    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM user 
                    WHERE email = '%s'",
                    $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if($user){
        if(password_verify($_POST["password"], $user['password_hash'])){

            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["id"];

            header("Location: /Shop/php/index.php");
            exit;
        }
    }

    $is_inavlid = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
    <link rel="stylesheet" href="/Shop/css/profile.css">
    <title>Login</title>
</head>
<body>
<div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <?php if ($is_inavlid): ?>
        <em>Invalid Login</em>
        <?php endif; ?>

    <form method="post">
    <h1>Login</h1>
        <label for="email">Email</label>
        <input type="email" name="email" id="email"
                        value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <button>Log in</button>
        <div id="lower-side">
            <p id="message">
                Sign up successfully 
        You can now
            </p>
            <a href="/Shop/Html/profile.html"> Sign up </a>
        </div>
    </form>
</body>
</html>