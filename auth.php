<?php 
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

$pass = md5($pass."forhktkntuhpi"); 

$mysql = new mysqli('localhost', 'root', '', 'register-bd');


$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
$user = $result->fetch_assoc(); 

if($result) {
	echo "Такой пользователь не найден";
	setcookie('user', $user['name'], time() + 3600, "/");
    $mysql->close();
    header('Location: page.html');
} else {
	echo "Логин или пароль введены неверно";
	exit();
}
?>
