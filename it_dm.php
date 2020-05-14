<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} 

if($_SESSION["session_role"]==10)
	{
	
?>	
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="struct.css" rel="stylesheet">
        <title>Preliminary questionairre</title>
    </head>
    <body>
		<?php require_once 'connect.php';
		mysqli_query($link, "SET NAMES utf8");
		mysqli_query($link, "SET CHARACTER utf8");
		mysqli_query($link, "SET character_set_client = utf8");
		mysqli_query($link, "SET character_set_connection = utf8");
		mysqli_query($link, "SET character_set_results = utf8");	
		
				
				if(isset($_POST['Basic_IT']) && isset($_POST['num_b_IT']) && isset($_POST['Sys_adm']) && isset($_POST['Sys_adm_num']) && isset($_POST['Par_of_assays'])
					&& isset($_POST['Abbott']) && isset($_POST['Beck_coult']) && isset($_POST['Roche']) && isset($_POST['Siemens']) && isset($_POST['Auto_App'])
					&& isset($_POST['Other_IS']) && isset($_POST['BI_en']) && isset($_POST['BI_en_num']) && isset($_POST['Data_sup']) && isset($_POST['Data_sup_num'])
					&& isset($_POST['med_stat']) && isset($_POST['med_stat_num']) && isset($_POST['Data_sc']) && isset($_POST['Data_sc_num']) && isset($_POST['SDiH'])
					&& isset($_POST['writter']) && isset($_POST['CorpDW']) && isset($_POST['LIS_DW']) && isset($_POST['Miwa_DW']) && isset($_POST['Inv_DW'])
					&& isset($_POST['Oth_DW']) && isset($_POST['MDMS']) && isset($_POST['auto_rep']) && isset($_POST['LIS_AR']) && isset($_POST['Miwa_AR'])
					&& isset($_POST['Inv_AR']) && isset($_POST['Oth_AR']) && isset($_POST['KPI_mon']) && isset($_POST['costing_KPI']) && isset($_POST['TTR_KPI'])
					&& isset($_POST['Qual_KPI']) && isset($_POST['Oth_KPI']) && isset($_POST['pos_ext']) && isset($_POST['lab_comp'])&& isset($_POST['Par_of_assays_num'])&& isset($_POST['Other_IS'])&& isset($_POST['Other_DM']))
				{
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
					
					//$id = ;
					$query ="INSERT INTO IT_DM VALUES (NULL,  '".$_SESSION['session_id_us']."', 
							'$B_IT', '$N_B_IT', '$S_AD', '$N_S_AD', '$P_A', '$N_P_A', '$AB', '$B_C', '$RO', '$SI', 
							'$A_A', '$O_IS', '$BI_E', '$N_BI_E', '$D_SU', '$N_D_SU', '$M_S', '$N_M_S', '$D_SC', '$N_D_SC',
							'$O_DM', '$SDIH', '$WR', '$C_DW', '$LIS_DW', '$M_DW', '$I_DW', '$O_DW', '$MDMS', '$A_R',
							'$L_AR', '$M_AR', '$I_AR', '$O_AR', '$KPI_M', '$KPI_C', '$KPI_TTR', '$KPI_Q', '$KPI_O', '$P_E', '$L_C')"; 
							  
							
					
					$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
					if($result)
					{
						//echo "<span style='color:blue;'>Данные добавлены</span>";
					}
					else
					{
						echo "<span style='color:red;'>Error with result. Please, contact us</span>";
					}
					
					mysqli_close($link);	
				}	
				
?>
	
	
        <div id="header">
            <h1>Before audit</h1>
			<h2>Welcome, <span><?php echo $_SESSION['session_username']; ?>
</span></h2>
			<nav>
			    <ul>
			       <li><a>Бургер</a></li>	
						<ul>
							<li><a href="main.php">Structure</a></li>
							<li><a href="prod_PS.php">Production</a></li>
							<li><a href="prod_BCP.php">BCP</a></li>
							<li><a href="loT.php">List of test</a></li>														
							<li><a href="it_dm.php">IT department</a></li>
							<li><a href="loS.php">List of system</a></li>
							<li><a href="logout.php">Exit</a></li>	
						</ul>
                    </li>
			    </ul>
			</nav>   
        </div>
		 
          
        <div class="wrapper">
            <!--<div id="sidebar1" class="aside">
                <h2>Лента новостей</h2>
                <p>//////////////////</p>
                <h3>Options</h3>
                <ul>
                    <li>Item1</li>
                    <li>Item2</li>
                    <li>Item3</li>
                </ul>
            </div> -->
            <div id="article">             
			
				<form method = "POST"> 
						<fieldset>
							<table class="hidden-empty-cells">
								<tr>
								<td colspan="2">Information systems</td>
								</tr>
								<tr>
								<td>Basic IT support</td><td></td><td><select  type="text" name="Basic_IT" id="Basic_IT"/>
									<option selected value="internal">internal</option>
									<option value="outsource">outsource</option>
									<option value="no dedicated person">no dedicated person</option></td>
								</tr>		
								<tr>
								<td></td><td>if internal - please specify # of people</td><td><input type="number" name="num_b_IT" id="num_b_IT"/>
								</td>
								</tr>
								<tr>
								<td>System Administrator</td><td></td><td><select type="text" name="Sys_adm" id="Sys_adm"/>
									<option selected value="internal">internal</option>
									<option value="outsource">outsource</option></td>
								</tr>
								<tr>
								<td></td><td>if internal - please specify # of people</td><td><input type="number" name="Sys_adm_num" id="Sys_adm_num"/></td>
								</tr>
								<tr>
								<td>Parameterization of assays</td><td></td><td><select type="text" name="Par_of_assays" id="Par_of_assays"/>
									<option selected value="internal">internal</option>
									<option value="vendor of analytical platform">vendor of analytical platform</option>
									<option value="both">both</option></td>
								</tr>
								<tr>
								<td></td><td>if internal - please specify # of people</td><td><input type="number" name="Par_of_assays_num" id="Par_of_assays_num"/></td>
								</tr>
								<tr>
								<td></td><td>if vendor - please specify # of type</td>
								</tr>
								<tr>
								<td></td><td>Abbott</td><td><select type="text" name="Abbott" id="vendor"/>
									<option selected value="yes">yes</option>
									<option value="no">no</option><</td>
								</tr>
								<tr>
								<td></td><td>Beckman Coulter</td><td><select type="text" name="Beck_coult" id="vendor"/>
									<option selected value="yes">yes</option>
									<option value="no">no</option></td>
								</tr>
								<tr>
								<td></td><td>Roche</td><td><select type="text" name="Roche" id="vendor"/>
									<option selected value="yes">yes</option>
									<option value="no">no</option></td>
								</tr>
								<tr>
								<td></td><td>Siemens</td><td><select type="text" name="Siemens" id="vendor"/>
									<option selected value="yes">yes</option>
									<option value="no">no</option></td>
								</tr>
								<tr>
								<td>Automation Application</td><td></td><td><select type="text" name="Auto_App" id="Auto_App"/>
									<option selected value="internal">internal</option>
									<option value="vendor of analytical platform">vendor of analytical platform</option>
									<option value="we don't have automation">we don't have automation</option></td>
								</td>
								</tr>
								<tr>
								<td>Other</td><td></td><td><input type="text" name="Other_IS" id="Other"/></td>
								</tr>
							</table>
					</fieldset>

					<fieldset >
							<table class="hidden-empty-cells">
								<tr>
								<td colspan="2">Data Management</td>
								</tr>
								<tr>
								<td>BI engineering</td><td></td><td><select type="text" name="BI_en" id="BI_en"/>
									<option selected value="internal">internal</option>
									<option value="outsource">outsource</option>
									<option value="vendor of analytical platform">vendor of analytical platform</option>
									<option value="no dedicated person">no dedicated person</option></td>
								</tr>		
								<tr>
								<td></td><td>if internal - please specify # of people</td><td><input type="number" name="BI_en_num" id="BI_en_num"/>
								</td>
								</tr>
								<tr>
								<td>Data support</td><td></td><td><select type="text" name="Data_sup" id="Data_sup"/>
									<option selected value="internal">internal</option>
									<option value="internal">outsource</option>
									<option value="vendor of analytical platform">vendor of analytical platform</option>
									<option value="no dedicated person">no dedicated person</option></td>
								</tr>
								<tr>
								<td></td><td>if internal - please specify # of people</td><td><input type="number" name="Data_sup_num" id="Data_sup_num"/></td>
								</tr>
								<tr>
								<td>Medical Statistic</td><td></td><td><select  type="text" name="med_stat" id="med_stat"/>
									<option selected value="internal">internal</option>
									<option value="outsource">outsource</option>
									<option value="no dedicated person">no dedicated person</option></td>
								</tr>
								<tr>
								<td></td><td>if internal - please specify # of people</td><td><input type="number" name="med_stat_num" id="med_stat_num"/></td>
								</tr>			
								<tr>
								<td>Data Science</td><td></td><td><select type="text" name="Data_sc" id="Data_sc"/>
									<option selected value="internal">internal</option>
									<option value="outsource">outsource</option>
									<option value="vendor of analytical platform">vendor of analytical platform</option>
									<option value="no dedicated person">no dedicated person</option></td>
								</tr>
								<tr>
								<td></td><td>if internal - please specify # of people</td><td><input type="number" name="Data_sc_num" id="Data_sc_num"/></td>
								</tr>
								<tr>
								<td>Other</td><td></td><td><input type="text" name="Other_DM" id="Other"/></td>
								</tr>
							</table>
					</fieldset>
					<table class="hidden-empty-cells">
								<tr>
								<td>Are some of your systems developed in house?</td><td colspan="2"><select type="text" name="SDiH" id="SDiH"/>
									<option selected value="LIS">LIS</option>
									<option value="HIS">HIS</option>
									<option value="middleware">middleware</option>
									<option value="other">other</option></td>
								</tr>		
								<tr>
								<td>Do you have a wriiten IT plan, strategy, KPIs?</td><td colspan="2"><select type="text" name="writter" id="writter"/>
									<option selected value="yes">yes</option>
									<option value="no">no</option>
									</td>
								</tr>

								<tr>
								<td>Do you have corporation Data Warehouse?</td><td><select type="text" name="CorpDW" id="CorpDW"/>
									<option selected value="yes">yes</option>
									<option value="no">no</option>
									</td>
								</tr>
								<tr>
								<td></td><td>if yes - please specify connected system</td><td></td>
								</tr>			
								<tr>
								<td></td><td>LIS</td><td><select  type="text" name="LIS_DW" id="spec_DW"/>
									<option selected value="yes">yes</option>
									<option value="no">no</option></td>
								</tr>
								<tr>
								<td></td><td>Middleware</td><td><select  type="text" name="Miwa_DW" id="spec_DW"/>
									<option selected value="yes">yes</option>
									<option value="no">no</option></td>
								</tr>
								<tr>
								<td></td><td>Invoicing</td><td><select  type="text" name="Inv_DW" id="spec_DW"/>
									<option selected value="yes">yes</option>
									<option value="no">no</option></td>
								</tr>
								<tr>
								<td></td><td>Other</td><td><input  type="text" name="Oth_DW" id="spec_DW"/></td>
								</tr>
								<tr>
								<td>Do you have any Master Data Management solution?</td><td colspan="2"><select type="text" name="MDMS" id="MDMS"/>
									<option selected value="yes">yes</option>
									<option value="no">no</option>
									</td>
								</tr>

								<tr>
								<td>Do you have any automated reporting?</td><td><select type="text" name="auto_rep" id="auto_rep"/>
									<option selected value="yes">yes</option>
									<option value="no">no</option>
									</td>
								</tr>
								<tr>
								<td></td><td>if yes - please specify connected system</td><td></td>
								</tr>			
								<tr>
								<td></td><td>LIS</td><td><select  type="text" name="LIS_AR" id="spec_AR"/>
									<option selected value="yes">yes</option>
									<option value="no">no</option></td>
								</tr>
								<tr>
								<td></td><td>Middleware</td><td><select  type="text" name="Miwa_AR" id="spec_AR"/>
									<option selected value="yes">yes</option>
									<option value="no">no</option></td>
								</tr>
								<tr>
								<td></td><td>Invoicing</td><td><select  type="text" name="Inv_AR" id="spec_AR"/>
									<option selected value="yes">yes</option>
									<option value="no">no</option></td>
								</tr>
								<tr>
								<td></td><td>Other</td><td><input  type="text" name="Oth_AR" id="spec_AR"/></td>
								</tr>
								
								<tr>
								<td>Do you have KPI monitoring tools?</td><td><select type="text" name="KPI_mon" id="KPI_mon"/>
									<option selected value="yes">yes</option>
									<option value="no">no</option>
									</td>
								</tr>
								<tr>
								<td></td><td>if yes - please specify</td><td></td>
								</tr>			
								<tr>
								<td></td><td>Costing</td><td><select type="text" name="costing_KPI" id="spec_KPI"/>
									<option selected value="yes">yes</option>
									<option value="no">no</option></td>
								</tr>
								<tr>
								<td></td><td>TTR</td><td><select type="text" name="TTR_KPI" id="spec_KPI"/>
									<option selected value="yes">yes</option>
									<option value="no">no</option></td>
								</tr>
								<tr>
								<td></td><td>Quality</td><td><select type="text" name="Qual_KPI" id="spec_KPI"/>
									<option selected value="yes">yes</option>
									<option value="no">no</option></td>
								</tr>
								<tr>
								<td></td><td>Other</td><td><input type="text" name="Oth_KPI" id="spec_KPI"/></td>
								</tr>
								<tr>
								<td>is it possible to extract raw data for samples, ordered tests results for 1 day/week/month?</td><td><select type="text" name="pos_ext" id="pos_ext"/>
									<option selected value="yes">yes</option>
									<option value="no">no</option>
									</td>
								</tr>
								<tr>
								<td>Is your laboratory HEPA or RGPD complient?</td><td><select type="text" name="lab_comp" id="lab_comp"/>
									<option selected value="none">none</option>
									<option value="HEPA">HEPA</option>
									<option value="RGPD">RGPD</option>
									<option value="both">both</option>
									</td>
								</tr>
								<tr><td><input type='submit' value='Confirm'/><input type='reset' value='Clear'/></td></tr>
							</table>
				</form> 
				
			</div>
        </div>
		
        <div id="footer">
            <p>Contact:  </p>
            <p>Roflan developer, 2020</p>
        </div>
    </body>
</html>
<?php
	} else header("location:admin.php");

?>
