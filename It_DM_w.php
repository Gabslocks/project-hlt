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
					$B_IT = htmlentities(mysqli_real_escape_string($link, $_POST['Basic_IT']));			$SDIH = htmlentities(mysqli_real_escape_string($link, $_POST['SDiH']));
					$N_B_IT = htmlentities(mysqli_real_escape_string($link, $_POST['num_b_IT'])); 		$WR = htmlentities(mysqli_real_escape_string($link, $_POST['writter']));
					$S_AD = htmlentities(mysqli_real_escape_string($link, $_POST['Sys_adm']));			$C_DW = htmlentities(mysqli_real_escape_string($link, $_POST['CorpDW']));
					$N_S_AD = htmlentities(mysqli_real_escape_string($link, $_POST['Sys_adm_num'])); 	$LIS_DW = htmlentities(mysqli_real_escape_string($link, $_POST['LIS_DW']));
					$P_A = htmlentities(mysqli_real_escape_string($link, $_POST['Par_of_assays']));		$M_DW = htmlentities(mysqli_real_escape_string($link, $_POST['Miwa_DW']));
					$N_P_A = htmlentities(mysqli_real_escape_string($link, $_POST['Par_of_assays_num']));
					$AB = htmlentities(mysqli_real_escape_string($link, $_POST['Abbott'])); 			$I_DW = htmlentities(mysqli_real_escape_string($link, $_POST['Inv_DW']));
					$B_C = htmlentities(mysqli_real_escape_string($link, $_POST['Beck_coult']));		$O_DW = htmlentities(mysqli_real_escape_string($link, $_POST['Oth_DW']));
					$RO = htmlentities(mysqli_real_escape_string($link, $_POST['Roche'])); 				$MDMS = htmlentities(mysqli_real_escape_string($link, $_POST['MDMS']));
					$SI = htmlentities(mysqli_real_escape_string($link, $_POST['Siemens']));			$A_R = htmlentities(mysqli_real_escape_string($link, $_POST['auto_rep']));
					$A_A = htmlentities(mysqli_real_escape_string($link, $_POST['Auto_App'])); 			$L_AR = htmlentities(mysqli_real_escape_string($link, $_POST['LIS_AR']));
					$O_IS = htmlentities(mysqli_real_escape_string($link, $_POST['Other_IS']));			$M_AR = htmlentities(mysqli_real_escape_string($link, $_POST['Miwa_AR']));
					$BI_E = htmlentities(mysqli_real_escape_string($link, $_POST['BI_en'])); 			$I_AR = htmlentities(mysqli_real_escape_string($link, $_POST['Inv_AR']));
					$N_BI_E = htmlentities(mysqli_real_escape_string($link, $_POST['BI_en_num']));		$O_AR = htmlentities(mysqli_real_escape_string($link, $_POST['Oth_AR']));
					$D_SU = htmlentities(mysqli_real_escape_string($link, $_POST['Data_sup'])); 		$KPI_M = htmlentities(mysqli_real_escape_string($link, $_POST['KPI_mon']));
					$N_D_SU = htmlentities(mysqli_real_escape_string($link, $_POST['Data_sup_num']));	$KPI_C = htmlentities(mysqli_real_escape_string($link, $_POST['costing_KPI']));
					$O_DM = htmlentities(mysqli_real_escape_string($link, $_POST['Other_DM']));			$KPI_TTR = htmlentities(mysqli_real_escape_string($link, $_POST['TTR_KPI']));
					$M_S = htmlentities(mysqli_real_escape_string($link, $_POST['med_stat'])); 			$KPI_Q = htmlentities(mysqli_real_escape_string($link, $_POST['Qual_KPI']));
					$N_M_S = htmlentities(mysqli_real_escape_string($link, $_POST['med_stat_num']));	$KPI_O = htmlentities(mysqli_real_escape_string($link, $_POST['Oth_KPI']));
					$D_SC = htmlentities(mysqli_real_escape_string($link, $_POST['Data_sc'])); 			$P_E = htmlentities(mysqli_real_escape_string($link, $_POST['pos_ext']));
					$N_D_SC = htmlentities(mysqli_real_escape_string($link, $_POST['Data_sc_num']));	$L_C = htmlentities(mysqli_real_escape_string($link, $_POST['lab_comp'])); 
					
					
					$query ="INSERT INTO IT_DM VALUES (NULL,  '".$_SESSION['session_id_us']."', 
							'$B_IT', '$N_B_IT', '$S_AD', '$N_S_AD', '$P_A', '$N_P_A', '$AB', '$B_C', '$RO', '$SI', 
							'$A_A', '$O_IS', '$BI_E', '$N_BI_E', '$D_SU', '$N_D_SU', '$M_S', '$N_M_S', '$D_SC', '$N_D_SC',
							'$O_DM', '$SDIH', '$WR', '$C_DW', '$LIS_DW', '$M_DW', '$I_DW', '$O_DW', '$MDMS', '$A_R',
							'$L_AR', '$M_AR', '$I_AR', '$O_AR', '$KPI_M', '$KPI_C', '$KPI_TTR', '$KPI_Q', '$KPI_O', '$P_E', '$L_C')"; 
							  
					$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
					if($result)
					{
						echo "<span style='color:blue;'>Данные добавлены</span>";
						header("location:it_dm.php");
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
					$B_IT = htmlentities(mysqli_real_escape_string($link, $_POST['Basic_IT']));			$SDIH = htmlentities(mysqli_real_escape_string($link, $_POST['SDiH']));
					$N_B_IT = htmlentities(mysqli_real_escape_string($link, $_POST['num_b_IT'])); 		$WR = htmlentities(mysqli_real_escape_string($link, $_POST['writter']));
					$S_AD = htmlentities(mysqli_real_escape_string($link, $_POST['Sys_adm']));			$C_DW = htmlentities(mysqli_real_escape_string($link, $_POST['CorpDW']));
					$N_S_AD = htmlentities(mysqli_real_escape_string($link, $_POST['Sys_adm_num'])); 	$LIS_DW = htmlentities(mysqli_real_escape_string($link, $_POST['LIS_DW']));
					$P_A = htmlentities(mysqli_real_escape_string($link, $_POST['Par_of_assays']));		$M_DW = htmlentities(mysqli_real_escape_string($link, $_POST['Miwa_DW']));
					$N_P_A = htmlentities(mysqli_real_escape_string($link, $_POST['Par_of_assays_num']));
					$AB = htmlentities(mysqli_real_escape_string($link, $_POST['Abbott'])); 			$I_DW = htmlentities(mysqli_real_escape_string($link, $_POST['Inv_DW']));
					$B_C = htmlentities(mysqli_real_escape_string($link, $_POST['Beck_coult']));		$O_DW = htmlentities(mysqli_real_escape_string($link, $_POST['Oth_DW']));
					$RO = htmlentities(mysqli_real_escape_string($link, $_POST['Roche'])); 				$MDMS = htmlentities(mysqli_real_escape_string($link, $_POST['MDMS']));
					$SI = htmlentities(mysqli_real_escape_string($link, $_POST['Siemens']));			$A_R = htmlentities(mysqli_real_escape_string($link, $_POST['auto_rep']));
					$A_A = htmlentities(mysqli_real_escape_string($link, $_POST['Auto_App'])); 			$L_AR = htmlentities(mysqli_real_escape_string($link, $_POST['LIS_AR']));
					$O_IS = htmlentities(mysqli_real_escape_string($link, $_POST['Other_IS']));			$M_AR = htmlentities(mysqli_real_escape_string($link, $_POST['Miwa_AR']));
					$BI_E = htmlentities(mysqli_real_escape_string($link, $_POST['BI_en'])); 			$I_AR = htmlentities(mysqli_real_escape_string($link, $_POST['Inv_AR']));
					$N_BI_E = htmlentities(mysqli_real_escape_string($link, $_POST['BI_en_num']));		$O_AR = htmlentities(mysqli_real_escape_string($link, $_POST['Oth_AR']));
					$D_SU = htmlentities(mysqli_real_escape_string($link, $_POST['Data_sup'])); 		$KPI_M = htmlentities(mysqli_real_escape_string($link, $_POST['KPI_mon']));
					$N_D_SU = htmlentities(mysqli_real_escape_string($link, $_POST['Data_sup_num']));	$KPI_C = htmlentities(mysqli_real_escape_string($link, $_POST['costing_KPI']));
					$O_DM = htmlentities(mysqli_real_escape_string($link, $_POST['Other_DM']));			$KPI_TTR = htmlentities(mysqli_real_escape_string($link, $_POST['TTR_KPI']));
					$M_S = htmlentities(mysqli_real_escape_string($link, $_POST['med_stat'])); 			$KPI_Q = htmlentities(mysqli_real_escape_string($link, $_POST['Qual_KPI']));
					$N_M_S = htmlentities(mysqli_real_escape_string($link, $_POST['med_stat_num']));	$KPI_O = htmlentities(mysqli_real_escape_string($link, $_POST['Oth_KPI']));
					$D_SC = htmlentities(mysqli_real_escape_string($link, $_POST['Data_sc'])); 			$P_E = htmlentities(mysqli_real_escape_string($link, $_POST['pos_ext']));
					$N_D_SC = htmlentities(mysqli_real_escape_string($link, $_POST['Data_sc_num']));	$L_C = htmlentities(mysqli_real_escape_string($link, $_POST['lab_comp'])); 

					$query_up ="UPDATE `IT_DM` SET `Basic_IT_sup`='$B_IT',`Basic_IT_sup_num`='$N_B_IT',`Sys_adm`='$S_AD',
					`Sys_adm_num`='$N_S_AD',`Par_of_assays`='$P_A',`Par_of_assays_num`='$N_P_A',`Abbott`='$AB',`Beck_coulter`='$B_C',
					`Roche`='$RO',`Siemens`='$SI',`Auto_app`='$A_A',`Other_IS`='$O_IS',`BI_eng`='$BI_E',`BI_eng_num`='$N_BI_E',
					`Data_sup_IT`='$D_SU',`Data_sup_IT_num`='$N_D_SU',`Med_stat`='$M_S',`Med_stat_num`='$N_M_S',`Data_Science`='$D_SC',
					`Data_Science_num`='$N_D_SC',`Other_DM`='$O_DM',`Sys_dev_in_house`='$SDIH',`Written_IT_plan_KPIs`='$WR',
					`Corp_data_warehouse`='$C_DW',`DW_spec_LIS`='$LIS_DW',`DW_spec_Mid`='$M_DW',`DW_spec_Inv`='$I_DW',`DW_spec_other`='$O_DW',
					`Master_data_man_sol`='$MDMS',`Auto_rep`='$A_R',`AR_spec_LIS`='$L_AR',`AR_spec_Mid`='$M_AR',`AR_spec_Inv`='$I_AR',
					`AR_spec_other`='$O_AR',`KPI_mo_rools`='$KPI_M',`KPI_spec_Cost`='$KPI_C',`KPI_spec_TTR`='$KPI_TTR',`KPI_spec_Quality`='$KPI_Q',
					`KPI_spec_Other`='$KPI_O',`Ext_data_for_one`='$P_E',`HERA_RGPD`='$L_C' WHERE `IT_DM`.`ID_user` = $id_pers";
					$result = mysqli_query($link, $query_up) or die("Ошибка " . mysqli_error($link)); 
					if($result)
					{
						echo "<span style='color:blue;'>Данные обновлены</span>";
						header("location:it_dm.php");
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
				//header("location:it_dm.php");
?>

