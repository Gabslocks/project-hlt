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
					$name = htmlentities(mysqli_real_escape_string($link, $_POST['Name']));
					$ty = htmlentities(mysqli_real_escape_string($link, $_POST['Type']));
					$vw = htmlentities(mysqli_real_escape_string($link, $_POST['Ven_web']));
					$sb = htmlentities(mysqli_real_escape_string($link, $_POST['Sup_by']));
					$is = htmlentities(mysqli_real_escape_string($link, $_POST['Inst_site']));
					$dep = htmlentities(mysqli_real_escape_string($link, $_POST['Dep']));
					$us = htmlentities(mysqli_real_escape_string($link, $_POST['Users']));
					$DoI = htmlentities(mysqli_real_escape_string($link, $_POST['D_o_ins']));
					$DoE = htmlentities(mysqli_real_escape_string($link, $_POST['D_o_end']));
					$ai = htmlentities(mysqli_real_escape_string($link, $_POST['Add_inf']));
					
					$query ="INSERT INTO `ListOfSys`(`ID_LoS`, `ID_pers`, `name_LoS`, `Type_LoS`, `Vend_web_LoS`, `Sub_by_LoS`, `Inst_s_LoS`, `Dep_LoS`, `Users_LoS`, `Date_of_inst_LoS`, `Date_of_end_cont_LoS`, `Add_LoS`) 
					VALUES (NULL, '$id_pers', '$name', '$ty', '$vw', '$sb', '$is', '$dep', '$us', '$DoI', '$DoE','$ai')";
					$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
					if($result)
					{
						echo "<span style='color:blue;'>Данные добавлены</span>";
						header("location:loS.php");
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
					$name = htmlentities(mysqli_real_escape_string($link, $_POST['Name']));
					$id_s = htmlentities(mysqli_real_escape_string($link, $_POST['id_s']));
					$ty = htmlentities(mysqli_real_escape_string($link, $_POST['Type']));
					$vw = htmlentities(mysqli_real_escape_string($link, $_POST['Ven_web']));
					$sb = htmlentities(mysqli_real_escape_string($link, $_POST['Sup_by']));
					$is = htmlentities(mysqli_real_escape_string($link, $_POST['Inst_site']));
					$dep = htmlentities(mysqli_real_escape_string($link, $_POST['Dep']));
					$us = htmlentities(mysqli_real_escape_string($link, $_POST['Users']));
					$DoI = htmlentities(mysqli_real_escape_string($link, $_POST['D_o_ins']));
					$DoE = htmlentities(mysqli_real_escape_string($link, $_POST['D_o_end']));
					$ai = htmlentities(mysqli_real_escape_string($link, $_POST['Add_inf']));
					
					$query_BCP =" UPDATE `ListOfSys` SET `name_LoS`='$name',`Type_LoS`='$ty',
					`Vend_web_LoS`='$vw',`Sub_by_LoS`='$sb',`Inst_s_LoS`='$is',
					`Dep_LoS`='$dep',`Users_LoS`='$us',`Date_of_inst_LoS`='$DoI',
					`Date_of_end_cont_LoS`='$DoE',`Add_LoS`='$ai' WHERE `ListOfSys`.`ID_LoS` = '$id_s' AND `ListOfSys`.`ID_pers` = $id_pers";

					$result = mysqli_query($link, $query_BCP) or die("Ошибка " . mysqli_error($link)); 
					if($result)
					{
						echo "<span style='color:blue;'>Данные добавлены</span>";
						header("location:loS.php");
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
				//header("location:loS.php");
?>

