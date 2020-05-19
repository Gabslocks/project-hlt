<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} 

if($_SESSION["session_role"]==10)
	{require_once("connect.php"); 
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
      <link href="Log_style.css" media="screen" rel="stylesheet">
	  	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>			
</head> 

	<body class='prepp'>
	
	<?php
if(isset($_SESSION["session_username"])){
		/* Перенаправление браузера */
		if(!($_SESSION['session_num_bcp'] == -1) && !($_SESSION['session_num_ps'] == -1))
		{
		  header("Location: main.php");
		}
		else
		{
			if(isset($_POST["prep"])){
				if(!empty($_POST['num_PS']) && !empty($_POST['num_BCP'])) 
				{
					$num_ps=htmlspecialchars($_POST['num_PS']);
					$num_bcp=htmlspecialchars($_POST['num_BCP']);
					
					$_SESSION['session_num_ps']=$num_ps;
					$_SESSION['session_num_bcp']=$num_bcp;
					$id_pers=$_SESSION['session_id_us'];
					$n_ps = htmlentities(mysqli_real_escape_string($link, $_POST['num_PS']));
					$n_bcp = htmlentities(mysqli_real_escape_string($link, $_POST['num_BCP']));

					
					$query ="UPDATE `user` SET `num_PS` = '$n_ps', `num_BCP` = '$n_bcp' WHERE `user`.`id_pers` = $id_pers";
					$create_PS = "INSERT INTO `PS` (`ID_PS`, `ID_user`, `name_PS`, `Routine_PS_per`, `Urgent_PS_per`, `ProdLoc_PS_per`, `InsInt_PS_per`, `InsExt_PS_per`, `Outsource_PS_per`, `Location_PS`, `Work_DpY_PS`, `Work_HpW`, `Num_req_av_PS`, `Num_tes_av_PS`, `Num_primetubes_av_PS`, `Space_PS`, `Automation_PS`, `tt_num_tech_p_shift_max_PS`, `tt_tech_work_hour_per_week_PS`, `tt_num_val_bios_max_per_shift_PS`, `tt_val_bios_work_hour_per_week_PS`, `tech_valid_result_PS`, `sup_chemistry_PS`, `sup_spec_chemistry_PS`, `sup_immuno_PS`, `sup_spec_immuno_PS`, `sup_hema_PS`, `sup_coag_PS`, `sup_serology_PS`, `cpr_chemistry_PS`, `cpr_spec_chemistry_PS`, `cpr_immuno_PS`, `cpr_spec_immuno_PS`, `cpr_hema_PS`, `cpr_coag_PS`, `cpr_serology_PS`, `an_name_chemistry_PS`, `an_name_spec_chemistry_PS`, `an_name_immuno_PS`, `an_name_spec_immuno_PS`, `an_name_hema_PS`, `an_name_coag_PS`, `an_name_serology_PS`, `an_num_chemistry_PS`, `an_num_spec_chemistry_PS`, `an_num_immuno_PS`, `an_num_spec_immuno_PS`, `an_num_hema_PS`, `an_num_coag_PS`, `an_num_serology_PS`, `osd_name_microbiology_PS`, `osd_name_molecul_meth_PS`, `osd_name_hist_cit_PS`, `osd_name_other_PS`, `osd_num_microbiology_PS`, `osd_num_mol_meth_PS`, `osd_num_hist_cit_PS`, `osd_num_other_PS`, `ss_hospitals_PS`, `ss_private_clinics_PS`, `ss_spec_off_PS`, `ss_home_visits_PS`, `ss_pharm_PS`, `ss_ext_nur_PS`, `ss_other_PS`) 
					VALUES (NULL, '$id_pers', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')";
					$create_BCP = "INSERT INTO `BCP` (`ID_BCP`, `ID_pers`, `Main_PS`, `Req_per_day`, `Max_dur`, `peak_hour_phleb`, `peak_hour_nurse`, `peak_hour_tech`, `peak_hour_biol`, `peak_hour_sec`, `peak_hour_other`, `treat_reg`, `treat_la`, `treat_cent`, `treat_aliq`, `treat_exp`, `treat_other`, `valid_for_BCP`, `BCP_stagg_KPIs`, `Or_and_form`) 
					VALUES (NULL, '$id_pers', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')"; 
					$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
					
					for($i=0;$i<$num_ps;$i++)
					{
						$res_ps = mysqli_query($link, $create_PS) or die("Ошибка " . mysqli_error($link));
					}
					for($i=0;$i<$num_bcp;$i++)
					{
						$res_bcp = mysqli_query($link, $create_BCP) or die("Ошибка " . mysqli_error($link));
					}
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
					
					//header("Location: main.php");

				} else {
				$message = "All field must befilled in";
				}
			} else $message = "Error";
	?>
	

	<div class="container mlogin">
		<div id="Prep">
			<form action="" id="prepform" method="POST" name="prepform">
			<p><label for="num_PS">How many Producion Sites do you have?<br>
			<input class="input" id="num_PS" name="num_PS" size="20" type="text" required value="" pattern = "[0-9]" title = "You must fill in this field."></label></p>
			<p><label for="num_BCP">How many Blood collection point do you have?<br>
			<input class="input" id="num_BCP"  name="num_BCP" size="20" required type="text" pattern = "[0-9]" title = "You must fill in this field."  value=""></label></p> 
			<p class="submit"><input class="button" name="prep" type= "submit" value="Enter"></p>
			</form>
		</div>
	  </div>

</body>
</html>

	<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";}
		}
	
	} else header("location:login.php");
	
} else header("location:admin.php?level=0");		?>
