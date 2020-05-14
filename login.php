<?php
	session_start();
	?>
	<?php require_once("connect.php"); 
	mysqli_query($link, "SET NAMES utf8");
		mysqli_query($link, "SET CHARACTER utf8");
		mysqli_query($link, "SET character_set_client = utf8");
		mysqli_query($link, "SET character_set_connection = utf8");
		mysqli_query($link, "SET character_set_results = utf8");	?>
<!DOCTYPE html>
<html>
  <head>
	   <meta charset="utf-8">
       <title>before audit</title>
      <link href="style.css" media="screen" rel="stylesheet">
	  	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>			
</head> 

	<body>
	
	<?php
	if(isset($_SESSION["session_username"])){
	
		 /* Перенаправление браузера */
		 if($_SESSION['session_num_bcp'] == -1 || $_SESSION['session_num_ps'] == -1)
		 {
		   header("Location: prep.php");
		 }
		 else{header("Location: main.php");}
	
	}
	if(isset($_POST["login"])){
	if(!empty($_POST['username']) && !empty($_POST['password'])) {
	$username=htmlspecialchars($_POST['username']);
	$password=htmlspecialchars($_POST['password']);
	
	$query=mysqli_query($link, "SELECT * FROM user WHERE login='".$username."' AND password='".$password."'");
	$numrows=mysqli_num_rows($query);
	if($numrows!=0)
 {
	 //$row1=mysqli_fetch_assoc($query);
while($row=mysqli_fetch_assoc($query))
 {
	$dbid=$row['id_pers'];
	$dbusername=$row['login'];
	$dbpassword=$row['password'];
	$dbrole=$row['role'];
	$dbps=$row['num_PS'];
	$dbbcp=$row['num_BCP'];
	
 }
  if($username == $dbusername && $password == $dbpassword)
 {
	$_SESSION['session_id_us']=$dbid;
	$_SESSION['session_username']=$dbusername;
	$_SESSION['session_role']=$dbrole;
	$_SESSION['session_num_ps']=$dbps;
	$_SESSION['session_num_bcp']=$dbbcp;
	
 /* Перенаправление браузера */
 if($dbps == -1 || $dbbcp == -1)
 {
   header("Location: prep.php");
 }
 else{header("Location: main.php");}
	}
	} else {
		
	$message =   "Invalid username or password";
 }
	} else {
    $message = "All field must befilled in";
	}
	}
	?>

	<div class="container mlogin">
		<div id="Login">
		<h1>Login</h1>
		<form action="" id="loginform" method="POST" name="loginform">
		<p><label for="user_login">Username<br>
		<input class="input" id="username" name="username" size="20" type="text" required value="" pattern = "[A-Za-z0-9]{4,20}" title = "Логин не может быть короче 4 символов и больше 20. Должен содержать буквы A-z и числа"></label></p>
		<p><label for="user_pass">Password<br>
		 <input class="input" id="password" minlength="8" name="password" size="32" required type="password" pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]){8,32}" title = "Пароль не может быть короче 8 символов, больше 32 и должен содержать хотя бы одну цифру, одну маленькую и одну большую латинскую букву."  value=""></label></p> 
			<p class="submit"><input class="button" name="login"type= "submit" value="Sign in"></p>
			<p class="helptext">In case of an error, please contact us by email</p>
		   </form>
		 </div>
	  </div>
 
<footer><p>Contact: ?????</p>
            <p>Roflan developer, 2020</p> </footer>	
</body>
</html>

	<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
