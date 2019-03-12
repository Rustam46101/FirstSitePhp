<?php
$users = 'pages/user.txt';
function err_log($text, $is_error = true)
{
    $color = $is_error ? 'red' : 'green';
    echo "<h3><span style='color: $color'>$text</span></h3>";
    return $is_error ? false : '';

}

function register($name, $pass, $email)
{
    $name = trim(htmlspecialchars($name));
    $pass = trim(htmlspecialchars($pass));
    $email = trim(htmlspecialchars($email));

    if ($name == '' || $pass == '' || $email == '') {
        return err_log("Fill All Required fiels!!!");
    }

    global $users;
    $file = fopen($users, 'a+');
    while ($line = fgets($file)) {
        $readname = substr($line, 0, strpos($line, ':'));
        if ($readname == $name) {
            return err_log("Such login name is already used!!!");
        }
    }
    $pass = md5($pass);
    $line = "$name:$pass:$email:";
echo $line;
    fputs($file, $line);
    fclose($file);
    return true;

}

function logout()
{
    unset($_SESSION['registered_user']);
}

function login($name, $pass)
{
    $name = trim(htmlspecialchars($name));
    $pass = trim(htmlspecialchars($pass));

    if ($name == '' || $pass == '') {
        return err_log("Fill All Required fiels!!!");
    }
    global $users;

    $text = file_get_contents($users);
    trim($text);
    $names = explode(':', $text);


    foreach ($names as $n)
    {

        if ($n==$name) {
            $_SESSION['registered_user'] = $name;
            file_put_contents('testlog.txt', $_SESSION['registered_user']);
            return true;
        }
    }

    if($_SESSION['registered_user'] == NULL){
        return err_log("Wrong login!!!");
    }




}