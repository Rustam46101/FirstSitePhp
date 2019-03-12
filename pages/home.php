<h1>Home Page</h1>
<?php if (isset($_POST['logbtn'])): ?>
    <?php
    if(login($_POST['login'], $_POST['password'])) {
        err_log("Welcome", false);
    }
    ?>
<?php endif;?>

<?php if (isset($_POST['logout'])): ?>
<?php
    logout();
?>
<?php endif;?>
