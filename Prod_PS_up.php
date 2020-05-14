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
					$id_PS = htmlentities(mysqli_real_escape_string($link, $_POST['id_ps']));	
					$Location_PS = htmlentities(mysqli_real_escape_string($link, $_POST['loc_PS']));						$an_name_coag_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Immuno_num']));		
					$Work_DpY_PS = htmlentities(mysqli_real_escape_string($link, $_POST['work_days_per_year']));						$an_name_serology_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Spec_immuno_name']));		
					$Work_HpW = htmlentities(mysqli_real_escape_string($link, $_POST['work_days_per_week']));							$an_num_chemistry_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Spec_immuno_num']));		
					$Num_req_av_PS = htmlentities(mysqli_real_escape_string($link, $_POST['req_PS']));					$an_num_spec_chemistry_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Hema_name']));		
					$Num_tes_av_PS = htmlentities(mysqli_real_escape_string($link, $_POST['tests_PS']));					$an_num_immuno_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Hema_num']));		
					$Num_primetubes_av_PS = htmlentities(mysqli_real_escape_string($link, $_POST['pr_t_PS']));				$an_num_spec_immuno_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Coag_name']));		
					$Space_PS = htmlentities(mysqli_real_escape_string($link, $_POST['sp_PS']));							$an_num_hema_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Coag_num']));		
					$Automation_PS = htmlentities(mysqli_real_escape_string($link, $_POST['auto_PS']));					$an_num_coag_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Serology_name']));		
					$tt_num_tech_p_shift_max_PS = htmlentities(mysqli_real_escape_string($link, $_POST['TT_num_of_tech']));		$an_num_serology_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Serology_num']));		
					$tt_tech_work_hour_per_week_PS = htmlentities(mysqli_real_escape_string($link, $_POST['TT_tech_work']));	$osd_name_microbiology_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Microbiology_name']));		
					$tt_num_val_bios_max_per_shift_PS = htmlentities(mysqli_real_escape_string($link, $_POST['TT_num_of_val_bio']));	$osd_name_molecul_meth_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Microbiology_num']));		
					$tt_val_bios_work_hour_per_week_PS = htmlentities(mysqli_real_escape_string($link, $_POST['TT_val_bio']));$osd_name_hist_cit_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Mol_meth_name']));		
					$tech_valid_result_PS = htmlentities(mysqli_real_escape_string($link, $_POST['tech_val']));				$osd_name_other_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Mol_meth_num']));		
					$sup_chemistry_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Chemistry_sup']));					$osd_num_microbiology_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Hist_cit_name']));		
					$sup_spec_chemistry_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Chemistry_CPR']));			$osd_num_mol_meth_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Hist_cit_num']));		
					$sup_immuno_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Spec_chemistry_sup']));					$osd_num_hist_cit_PS = htmlentities(mysqli_real_escape_string($link, $_POST['oth_opt_name']));		
					$sup_spec_immuno_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Spec_chemistry_CPR']));				$osd_num_other_PS = htmlentities(mysqli_real_escape_string($link, $_POST['oth_opt_num']));		
					$sup_hema_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Immuno_sup']));						$ss_hospitals_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Hos_sampl']));		
					$sup_coag_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Immuno_CPR']));						$ss_private_clinics_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Pr_cl_sampl']));		
					$sup_serology_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Spec_immuno_sup']));					$ss_spec_off_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Spec_of_sampl']));		
					$cpr_chemistry_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Spec_immuno_CPR']));					$ss_home_visits_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Home_vis_sampl']));		
					$cpr_spec_chemistry_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Hema_sup']));			$ss_pharm_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Pharm_sampl']));		
					$cpr_immuno_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Hema_CPR']));					$ss_ext_nur_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Ext_nur_sampl']));		
					$cpr_spec_immuno_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Coag_sup']));				$ss_other_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Oth_sampl']));		
					$cpr_hema_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Coag_CPR']));								
					$cpr_coag_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Serology_sup']));								
					$cpr_serology_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Serology_CPR']));							
					$an_name_chemistry_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Chemistry_name']));						
					$an_name_spec_chemistry_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Chemistry_num']));				
					$an_name_immuno_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Spec_chemistry_name']));						
					$an_name_spec_immuno_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Spec_chemistry_num']));				
					$an_name_hema_PS = htmlentities(mysqli_real_escape_string($link, $_POST['Immuno_name']));						

					
					
					$query_PS ="UPDATE `PS` SET `Location_PS` = '$Location_PS', `Work_DpY_PS` = '$Work_DpY_PS', `Work_HpW` = '$Work_HpW', `Num_req_av_PS` = '$Num_req_av_PS', `Num_tes_av_PS` = '$Num_tes_av_PS', 
					`Num_primetubes_av_PS` = '$Num_primetubes_av_PS', `Space_PS` = '$Space_PS', `Automation_PS` = '$Automation_PS', `tt_num_tech_p_shift_max_PS` = '$tt_num_tech_p_shift_max_PS', `tt_tech_work_hour_per_week_PS` = '$tt_tech_work_hour_per_week_PS', 
					`tt_num_val_bios_max_per_shift_PS` = '$tt_num_val_bios_max_per_shift_PS', `tt_val_bios_work_hour_per_week_PS` = '$tt_val_bios_work_hour_per_week_PS', `tech_valid_result_PS` = '$tech_valid_result_PS', `sup_chemistry_PS` = '$sup_chemistry_PS', 
					`sup_spec_chemistry_PS` = '$sup_spec_chemistry_PS', `sup_immuno_PS` = '$sup_immuno_PS', `sup_spec_immuno_PS` = '$sup_spec_immuno_PS', `sup_hema_PS` = '$sup_hema_PS', `sup_coag_PS` = '$sup_coag_PS', `sup_serology_PS` = '$sup_serology_PS', 
					`cpr_chemistry_PS` = '$cpr_chemistry_PS', `cpr_spec_chemistry_PS` = '$cpr_spec_chemistry_PS', `cpr_immuno_PS` = '$cpr_immuno_PS', `cpr_spec_immuno_PS` = '$cpr_spec_immuno_PS', `cpr_hema_PS` = '$cpr_hema_PS', `cpr_coag_PS` = '$cpr_coag_PS', 
					`cpr_serology_PS` = '$cpr_serology_PS', `an_name_chemistry_PS` = '$an_name_chemistry_PS', `an_name_spec_chemistry_PS` = '$an_name_spec_chemistry_PS', `an_name_immuno_PS` = '$an_name_immuno_PS', `an_name_spec_immuno_PS` = '$an_name_spec_immuno_PS', 
					`an_name_hema_PS` = '$an_name_hema_PS', `an_name_coag_PS` = '$an_name_coag_PS', `an_name_serology_PS` = '$an_name_serology_PS', `an_num_chemistry_PS` = '$an_num_chemistry_PS', `an_num_spec_chemistry_PS` = '$an_num_spec_chemistry_PS', 
					`an_num_immuno_PS` = '$an_num_immuno_PS', `an_num_spec_immuno_PS` = '$an_num_spec_immuno_PS', `an_num_hema_PS` = '$an_num_hema_PS', `an_num_coag_PS` = '$an_num_coag_PS', `an_num_serology_PS` = '$an_num_serology_PS', 
					`osd_name_microbiology_PS` = '$osd_name_microbiology_PS', `osd_name_molecul_meth_PS` = '$osd_name_molecul_meth_PS', `osd_name_hist_cit_PS` = '$osd_name_hist_cit_PS', `osd_name_other_PS` = '$osd_name_other_PS', 
					`osd_num_microbiology_PS` = '$osd_num_microbiology_PS', `osd_num_mol_meth_PS` = '$osd_num_mol_meth_PS', `osd_num_hist_cit_PS` = '$osd_num_hist_cit_PS', `osd_num_other_PS` = '$osd_num_other_PS', `ss_hospitals_PS` = '$ss_hospitals_PS', 
					`ss_private_clinics_PS` = '$ss_private_clinics_PS', `ss_spec_off_PS` = '$ss_spec_off_PS', `ss_home_visits_PS` = '$ss_home_visits_PS', `ss_pharm_PS` = '$ss_pharm_PS', `ss_ext_nur_PS` = '$ss_ext_nur_PS', `ss_other_PS` = '$ss_other_PS' WHERE `PS`.`ID_PS` = $id_PS AND `PS`.`ID_user` = $id_pers";
					
					$result = mysqli_query($link, $query_PS) or die("Ошибка " . mysqli_error($link)); 
					if($result)
					{
						echo "<span style='color:blue;'>Данные добавлены</span>";
						header("location:prod_PS.php");
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
				//header("location:prod_PS.php");
?>