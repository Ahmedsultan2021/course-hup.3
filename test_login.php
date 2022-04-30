<pre>
<?php
require_once('classes/User.php');

$user_date =User::login("admin@coursehub.com" ,md5("123456"));
var_dump($user_date);