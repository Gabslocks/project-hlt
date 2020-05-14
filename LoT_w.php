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
				if(isset($_POST['ins']))
				{
					$id_pers=$_SESSION['session_id_us'];
					$name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
					$w_ps = htmlentities(mysqli_real_escape_string($link, $_POST['W_PS']));
					$cat_num = htmlentities(mysqli_real_escape_string($link, $_POST['Cat_num']));
					$vpm_av = htmlentities(mysqli_real_escape_string($link, $_POST['Vpm_av']));
					$an_er = htmlentities(mysqli_real_escape_string($link, $_POST['Analizer']));
					
					$query ="INSERT INTO `Tests` (`ID_test`, `ID_user`, `ID_PS`, `Name_of_assay`, `Cat_num`, `Vol_per_m`, `Analizer`) 
							VALUES (NULL, '$id_pers', '$w_ps','$name','$cat_num', '$vpm_av','$an_er')";
					$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
					if($result)
					{
						echo "<span style='color:blue;'>Данные добавлены</span>";
						header("location:loT.php");
					}
					else
					{
						echo "<span style='color:red;'>Error with result</span>";
					}
					mysqli_close($link);	
				}	
				else if(isset($_POST['update']))
				{
					$id_pers=$_SESSION['session_id_us'];
					$id_t = htmlentities(mysqli_real_escape_string($link, $_POST['id_t']));
					$name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
					$w_ps = htmlentities(mysqli_real_escape_string($link, $_POST['W_PS']));
					$cat_num = htmlentities(mysqli_real_escape_string($link, $_POST['Cat_num']));
					$vpm_av = htmlentities(mysqli_real_escape_string($link, $_POST['Vpm_av']));
					$an_er = htmlentities(mysqli_real_escape_string($link, $_POST['Analizer']));

					$query_BCP ="UPDATE `Tests` SET `ID_PS`='$w_ps',`Name_of_assay`='$name',`Cat_num`='$cat_num',`Vol_per_m`='$vpm_av',`Analizer`='$an_er' WHERE `Tests`.`ID_test` = '$id_t' AND `Tests`.`ID_user` = $id_pers";

					$result = mysqli_query($link, $query_BCP) or die("Ошибка " . mysqli_error($link)); 
					if($result)
					{
						echo "<span style='color:blue;'>Данные добавлены</span>";
						header("location:loT.php");
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
				//header("location:loT.php");
?>

