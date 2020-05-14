<?php
	session_start();
	if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} 
	require_once 'connect.php';
	$link = mysqli_connect($host, $user, $password, $database)
	or die("Ошибка " . mysqli_error($link));
				mysqli_query($link, "SET NAMES utf8");
				mysqli_query($link, "SET CHARACTER utf8");
				mysqli_query($link, "SET character_set_client = utf8");
				mysqli_query($link, "SET character_set_connection = utf8");
				mysqli_query($link, "SET character_set_results = utf8");
				if(isset($_POST['update_ps']))
				{
					$id_pers = $_SESSION['session_id_us'];
					$id_ps = htmlentities(mysqli_real_escape_string($link, $_POST['id_p']));
					$name = htmlentities(mysqli_real_escape_string($link, $_POST['name_ps']));
					$rout = htmlentities(mysqli_real_escape_string($link, $_POST['routine']));
					$urg = htmlentities(mysqli_real_escape_string($link, $_POST['urgent']));
					$prud_loc = htmlentities(mysqli_real_escape_string($link, $_POST['pl']));
					$in_in = htmlentities(mysqli_real_escape_string($link, $_POST['ii']));
					$in_ex = htmlentities(mysqli_real_escape_string($link, $_POST['ie']));
					$out = htmlentities(mysqli_real_escape_string($link, $_POST['outsource']));
					
					
					$query_PS ="UPDATE `PS` SET `name_PS` = '$name', `Routine_PS_per` = '$rout', `Urgent_PS_per` = '$urg', 
					`ProdLoc_PS_per` = '$prud_loc', `InsInt_PS_per` = '$in_in', `InsExt_PS_per` = '$in_ex', `Outsource_PS_per` = '$out' WHERE `PS`.`ID_PS` = $id_ps AND `PS`.`ID_user` = $id_pers";
					
					$result = mysqli_query($link, $query_PS) or die("Ошибка " . mysqli_error($link)); 
					if($result)
					{
						echo "<span style='color:blue;'>Данные добавлены</span>";
						header("location:main.php");
					}
					else
					{
						echo "<span style='color:red;'>Error with result</span>";
					}
					mysqli_close($link);	
				}	
				else if(isset($_POST['update_bcp']))
				{
					$id_pers=$_SESSION['session_id_us'];
					$id_cp = htmlentities(mysqli_real_escape_string($link, $_POST['id_bcp']));
					$lin = htmlentities(mysqli_real_escape_string($link, $_POST['BCP_lin']));
					$rpd = htmlentities(mysqli_real_escape_string($link, $_POST['req_per_day']));
					$md = htmlentities(mysqli_real_escape_string($link, $_POST['max_dur']));

					$query_BCP ="UPDATE `BCP` SET `Main_PS` = '$lin', `Req_per_day` = '$rpd', `Max_dur` = '$md' WHERE `BCP`.`ID_BCP` = '$id_cp' `BCP`.`ID_pers` = '$id_pers'";
					
					$result = mysqli_query($link, $query_BCP) or die("Ошибка " . mysqli_error($link)); 
					if($result)
					{
						echo "<span style='color:blue;'>Данные добавлены</span>";
						header("location:main.php");
					}
					else
					{
						echo "<span style='color:red;'>Error with result</span>";
					}
					mysqli_close($link);	
				}	
				else
				{
					echo "<span style='color:red;'>Error with IF post</span>";
				}
				//header("location:main.php");
?>