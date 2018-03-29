<?php
require_once 'forms/login.php';

$msg = '';

$form = new LoginForm($_POST);

if ($_POST) {
    if ($form->validate()) {
        echo 'ok';
        // to be continued

    } else {
        $msg = 'Please fill in fields';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <!-- Start: injected by Adguard -->
    <script src="//local.adguard.com/adguard-ajax-api/injections/userscripts.js?ts=63657737884939&name=Adguard%20Assistant&name=Adguard%20Popup%20Blocker" nonce="77c0c8f68ea54ac495ce52cd14d81c7a" type="text/javascript"></script>
    <script src="//local.adguard.com/adguard-ajax-api/injections/content-script.js?ts=63657739690775&amp;domain=devionity.com&amp;mask=111" nonce="77c0c8f68ea54ac495ce52cd14d81c7a" type="text/javascript"></script>

    <!-- End: injected by Adguard -->
</head>
<body>
<h1>Login</h1>

<b><?=$msg; ?></b>
<br/>
<form method="post">
    Username: <input type="text" name="username" value="<?=$form->getUsername(); ?>"/> <br/><br/>
    Password: <input type="password" name="password"/> <br/><br/>
    <input type="submit"/>
</form>

</body>
</html>