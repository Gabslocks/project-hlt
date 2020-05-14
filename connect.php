<?php

	$host = 'localhost'; // адрес сервера 
	$database = 'health'; // имя базы данных людей
	$user = 'root'; // имя пользователя
	$password = ''; // пароль
	
	$link = mysqli_connect($host, $user, $password, $database)
	or die("Ошибка " . mysqli_error($link));

	
?>