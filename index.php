<?php session_start();?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Firstprogect</title>
</head>
<body>
<div class="container">
    <div class="row">
        <header class="colmd-12">
            <?php include_once 'pages/functions.php' ?>
            <?php
            if (!isset($_POST['logbtn'])): ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form action="index.php?page=1" method="post">
                            <div class="form-group">
                                <label for="login">Login</label>
                                <input type="text" name="login" id="login" class="form-inline">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-inline">
                            </div>
                            <input type="submit" value="Login" id="log" class="btn btn-success" name="logbtn">
                            <input type="submit" value="Logout" id="out" disabled; class="btn btn-success" name="logout">
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        </header>
    </div>
    <div class="row">
        <nav class="colmd-12">
            <?php include_once 'pages/menu.php' ?>

        </nav>
    </div>
    <div class="row">
        <section class="col-md-12">
            <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                if ($page == 1) {
                    include_once 'pages/home.php';
                } elseif ($page == 2) {
                    include_once 'pages/upload.php';
                } elseif ($page == 3) {
                    include_once 'pages/gallery.php';
                } elseif ($page == 4) {
                    include_once 'pages/registration.php';
                }
            }

            ?>
        </section>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>