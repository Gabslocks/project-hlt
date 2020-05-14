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
				if(isset($_POST['update_bcp']))
				{
					$id_pers = $_SESSION['session_id_us'];
					$id_bcp = htmlentities(mysqli_real_escape_string($link, $_POST['id_bcp']));
					$ph = htmlentities(mysqli_real_escape_string($link, $_POST['Phleb']));
					$nu = htmlentities(mysqli_real_escape_string($link, $_POST['Nurse']));
					$te = htmlentities(mysqli_real_escape_string($link, $_POST['Tech']));
					$bi = htmlentities(mysqli_real_escape_string($link, $_POST['Bio']));
					$se = htmlentities(mysqli_real_escape_string($link, $_POST['Sec']));
					$oh = htmlentities(mysqli_real_escape_string($link, $_POST['Other_h']));
					$re = htmlentities(mysqli_real_escape_string($link, $_POST['Registarion']));
					$la = htmlentities(mysqli_real_escape_string($link, $_POST['Labeling']));
					$ce = htmlentities(mysqli_real_escape_string($link, $_POST['Contrifugation']));
					$al = htmlentities(mysqli_real_escape_string($link, $_POST['Aliquoting']));
					$et = htmlentities(mysqli_real_escape_string($link, $_POST['Ex_test']));
					$ot = htmlentities(mysqli_real_escape_string($link, $_POST['Other_t']));
					$mv = htmlentities(mysqli_real_escape_string($link, $_POST['med_val']));
					$BK = htmlentities(mysqli_real_escape_string($link, $_POST['BsK']));
					$OF = htmlentities(mysqli_real_escape_string($link, $_POST['Pres_o_and_f']));

					
					
					$query_bcp ="UPDATE `BCP` SET `peak_hour_phleb` = '$ph', `peak_hour_nurse` = '$nu', `peak_hour_tech` = '$te', `peak_hour_biol` = '$bi',
					`peak_hour_sec` = '$se', `peak_hour_other` = '$oh', `treat_reg` = '$re', `treat_la` = '$la', `treat_cent` = '$ce', 
					`treat_aliq` = '$al', `treat_exp` = '$et', `treat_other` = '$ot', `valid_for_BCP` = '$mv', `BCP_stagg_KPIs` = '$BK',
					`Or_and_form` = '$OF' WHERE `BCP`.`ID_BCP` = $id_bcp AND `BCP`.`ID_pers` = $id_pers";
					$result = mysqli_query($link, $query_bcp) or die("Ошибка " . mysqli_error($link)); 
					if($result)
					{
						echo "<span style='color:blue;'>Данные добавлены</span>";
						header("location:prod_BCP.php");
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
				//header("location:prod_BCP.php");
?>