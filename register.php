<?php

require_once('forms/registration.class.php');
require_once('db_class.php');
require_once('password.php');

$db_host = '127.0.0.1';
$db_user = 'root';
$db_password = '';
$db_name = 'users';

$msg = '';

$db = new DB($db_host, $db_user, $db_password, $db_name);
$form = new RegistrationForm($_POST);

if ($_POST) {
    if ($form->validate()) {
        $email = $db->escape($form->getEmail());
        $username = $db->escape($form->getUsername());
        $password = new Password( $db->escape($form->getPassword()) );

        $res = $db->query("SELECT * FROM users WHERE username = '{$username}'");
        if ($res) {
            $msg = 'Such user already exists!';
        } else {
            $db->query("INSERT INTO users (email, username, password) VALUES ('{$email}','{$username}','{$password}')");
            header('location: index.php?msg=You have been registered');
        }

    } else {
        $msg = $form->passwordsMatch() ? 'Please fill in fields' : 'Passwords don\'t match';
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <script src="//local.adguard.com/adguard-ajax-api/injections/userscripts.js?ts=63657737884939&name=Adguard%20Assistant&name=Adguard%20Popup%20Blocker" nonce="77c0c8f68ea54ac495ce52cd14d81c7a" type="text/javascript"></script>
    <script src="//local.adguard.com/adguard-ajax-api/injections/content-script.js?ts=63657739690775&amp;domain=devionity.com&amp;mask=111" nonce="77c0c8f68ea54ac495ce52cd14d81c7a" type="text/javascript"></script>

</head>
<body>
<h1>Register new user</h1>

<b><?=$msg; ?></b>

<br/>
<form method="post">
    Email: <input type="email" name="email" value="<?=$form->getEmail(); ?>"/> <br/><br/>
    Username: <input type="text" name="username" value="<?=$form->getUsername(); ?>"/> <br/><br/>
    Password: <input type="password" name="password"/> <br/><br/>
    Confirm password: <input type="password" name="passwordConfirm"/> <br/><br/>
    <input type="submit"/>
</form>

</body>
</html>