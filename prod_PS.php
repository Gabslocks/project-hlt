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
        <link href="s_main.css" rel="stylesheet">
        <title>Preliminary questionairre</title>
    </head>
    <body>
		<?php require_once 'connect.php';
		mysqli_query($link, "SET NAMES utf8");
		mysqli_query($link, "SET CHARACTER utf8");
		mysqli_query($link, "SET character_set_client = utf8");
		mysqli_query($link, "SET character_set_connection = utf8");
		mysqli_query($link, "SET character_set_results = utf8");	?>
	
	
        <div id="header">
            <h1>Before audit</h1>
			<h2>Welcome, <span><?php echo $_SESSION['session_username'];?></span></h2>
			<nav class="menu">
				<input type="checkbox" id="checkbox" class="menu_checkbox">
				<label for="checkbox" class="menu_btn"><div class="menu_icon"></div></label>
				<div class="menu_container">
					<ul class="menu_list">
						<li class="menu_item"><a class="menu_link" href="main.php">Structure</a></li>
						<li class="menu_item"><a class="menu_link" href="prod_PS.php">Production</a></li>
						<li class="menu_item"><a class="menu_link" href="loT.php">List of test</a></li>														
						<li class="menu_item"><a class="menu_link" href="prod_BCP.php">BCP</a></li>
						<li class="menu_item"><a class="menu_link" href="it_dm.php">IT department</a></li>
						<li class="menu_item"><a class="menu_link" href="loS.php">List of system</a></li>
						<li class="menu_item"><a class="menu_link" href="logout.php">Exit</a></li>
					</ul>
				</div>
			</nav>
        </div>
		 
          
            <div id="article">             
                          
		
					

						<?php 
						$id_pers=$_SESSION['session_id_us'];
						$query ="SELECT `ID_PS`, `ID_user`, `name_PS`, `Location_PS`, `Work_DpY_PS`, `Work_HpW`, `Num_req_av_PS`, `Num_tes_av_PS`, `Num_primetubes_av_PS`, `Space_PS`, `Automation_PS`, 
						`tt_num_tech_p_shift_max_PS`, `tt_tech_work_hour_per_week_PS`, `tt_num_val_bios_max_per_shift_PS`, 
						`tt_val_bios_work_hour_per_week_PS`, `tech_valid_result_PS`, `sup_chemistry_PS`, `sup_spec_chemistry_PS`, 
						`sup_immuno_PS`, `sup_spec_immuno_PS`, `sup_hema_PS`, `sup_coag_PS`, `sup_serology_PS`, `cpr_chemistry_PS`, 
						`cpr_spec_chemistry_PS`, `cpr_immuno_PS`, `cpr_spec_immuno_PS`, `cpr_hema_PS`, `cpr_coag_PS`, `cpr_serology_PS`, 
						`an_name_chemistry_PS`, `an_name_spec_chemistry_PS`, `an_name_immuno_PS`, `an_name_spec_immuno_PS`, 
						`an_name_hema_PS`, `an_name_coag_PS`, `an_name_serology_PS`, `an_num_chemistry_PS`, `an_num_spec_chemistry_PS`, 
						`an_num_immuno_PS`, `an_num_spec_immuno_PS`, `an_num_hema_PS`, `an_num_coag_PS`, `an_num_serology_PS`, 
						`osd_name_microbiology_PS`, `osd_name_molecul_meth_PS`, `osd_name_hist_cit_PS`, `osd_name_other_PS`, 
						`osd_num_microbiology_PS`, `osd_num_mol_meth_PS`, `osd_num_hist_cit_PS`, `osd_num_other_PS`, `ss_hospitals_PS`, 
						`ss_private_clinics_PS`, `ss_spec_off_PS`, `ss_home_visits_PS`, `ss_pharm_PS`, `ss_ext_nur_PS`, `ss_other_PS` FROM `PS` WHERE `ID_user` =  $id_pers";
						
						$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
						if($result)
						{
							$rows = mysqli_num_rows($result); // количество полученных строк
					?>      		
					
					<table>
						
							<?php	
							for ($i = 0 ; $i < $rows ; ++$i)
							{

								$row = mysqli_fetch_row($result);
								
								echo "
								<tr><td>
									<form method = 'POST' action = 'Prod_PS_up.php'>
									<fieldset>
									<table class='hidden-empty-cells'>
									<tr><input name='name_ps' id='name_ps' value='$row[2]' disabled/></tr>
										<tr><input type='hidden' name='id_ps' id='id_ps' value='$row[0]'/></tr>
										<tr><td>Location of Production Site</td><td><select type='text' name='loc_PS' id='loc_PS'/>";
											if ($row[3]=='Inside Hospital')
												{echo "<option selected value='Inside Hospital'>Inside Hospital</option>
													<option value='Outside Hospital'>Outside Hospital</option></td></tr>	";}
												else
												{echo "<option value='Inside Hospital'>Inside Hospital</option>
											<option selected value='Outside Hospital'>Outside Hospital</option></td></tr>	";}
										echo "<tr><td>Working days per year</td><td><input type='text' value='$row[4]' name='work_days_per_year' id='work_days_per_year'/></td></tr>
										<tr><td>Working days per week</td><td><input type='text' value='$row[5]' name='work_days_per_week' id='work_days_per_week'/></td></tr>
										<tr><td># of request per avarage day for a Production Site</td><td><input value='$row[6]' type='text' name='req_PS' id='req_PS'/></td></tr>
										<tr><td># of tests per avarage day for 1 Production Site</td><td><input type='text' value='$row[7]' name='tests_PS' id='tests_PS'/></td></tr>
										<tr><td># of primary tubes per avarage day for a Production Site</td><td><input type='text' value='$row[8]' name='pr_t_PS' id='pr_t_PS'/></td></tr>
										<tr><td>Production Space, m2</td><td><input type='text' value='$row[9]' name='sp_PS' id='sp_PS'/></td></tr>	
										<tr><td>Do you have any automation?</td><td><select type='text' name='auto_PS' id='auto_PS'/>";
												if ($row[10]=='sorter')
												{echo "<option selected value='sorter'>sorter</option>
												<option value='track'>track</option>
												<option value='both'>both</option>
												<option value='none'>none</option></td></tr>";}
												elseif ($row[10]=='track')
												{echo "<option value='sorter'>sorter</option>
												<option selected value='track'>track</option>
												<option value='both'>both</option>
												<option value='none'>none</option></td></tr>";}
												elseif ($row[10]=='both')
												{echo "<option value='sorter'>sorter</option>
												<option value='track'>track</option>
												<option selected value='both'>both</option>
												<option value='none'>none</option></td></tr>";}
												else
												{echo "<option value='sorter'>sorter</option>
												<option value='track'>track</option>
												<option value='both'>both</option>
												<option selected value='none'>none</option></td></tr>";}
									echo "</table>
								
									<fieldset ><table class='hidden-empty-cells'>
											<tr><td colspan='2'>Time Table</td></tr>
											<tr><td>Number of technitians per shift max</td><td><input value='$row[11]' type='number' name='TT_num_of_tech' id='TT_num_of_tech'/></td></tr>		
											<tr><td>Technicians working hour per week total</td><td><input value='$row[12]' type='number' name='TT_tech_work' id='TT_tech_work'/></td></tr>						
											<tr><td>Number of validation biologists max per shift </td><td><input value='$row[13]' type='number' name='TT_num_of_val_bio' id='TT_num_of_val_bio'/></td></tr>				
											<tr><td>Validation biologists working hour per week total</td><td><input value='$row[14]' type='number' name='TT_val_bio' id='TT_val_bio'/></td></tr>				
									</table></fieldset>

									<table class='hidden-empty-cells'>
										<tr><td >Technical validation of results</td><td  colspan='3'><select type='text' name='tech_val' id='tech_val'/>";
												if($row[15]=='manual')
												{echo "<option value='none'>none</option>
												<option selected value='manual'>manual</option>
												<option value='middleware'>middleware</option>
												<option value='both'>both</option></td></tr>";}
												elseif($row[15]=='middleware')
												{echo "<option value='none'>none</option>
												<option value='manual'>manual</option>
												<option selected value='middleware'>middleware</option>
												<option value='both'>both</option></td></tr>";}
												elseif($row[15]=='both')
												{echo "<option value='none'>none</option>
												<option value='manual'>manual</option>
												<option value='middleware'>middleware</option>
												<option selected value='both'>both</option></td></tr>";}
												else
												{echo "<option selected value='none'>none</option>
												<option value='manual'>manual</option>
												<option value='middleware'>middleware</option>
												<option value='both'>both</option></td></tr>";}											
									echo "</table>
										
									<fieldset><table class='hidden-empty-cells'>
										<tr><td colspan='3'>Type of the contract with suppliers? CPR?</td></tr>
										<tr><td></td><td>Supplier</td><td>CPR/non CPR</td></tr>
										<tr><td>Chemistry</td><td><input type='text value='$row[16]' name='Chemistry_sup' id='Chemistry_sup'/></td><td><select name='Chemistry_CPR' id='Chemistry_CPR'/>";	
																											if($row[17]=='All Inclusive CPR')
																											{echo "<option value='non CPR'>non CPR</option>
																											<option selected value='All Inclusive CPR'>All Inclusive CPR</option>
																											<option value='Partially CPR'>Partially CPR</option></td></tr>";}
																											elseif($row[17]=='Partially CPR')
																											{echo "<option value='non CPR'>non CPR</option>
																											<option value='All Inclusive CPR'>All Inclusive CPR</option>
																											<option selected value='Partially CPR'>Partially CPR</option></td></tr>";}
																											else
																											{echo "<option selected value='non CPR'>non CPR</option>
																											<option value='All Inclusive CPR'>All Inclusive CPR</option>
																											<option value='Partially CPR'>Partially CPR</option></td></tr>";}		
										echo "<tr><td>Special Chemistry (low volume tests dedicated to separate group)</td><td><input value='$row[18]' type='text' name='Spec_chemistry_sup' id='Spec_chemistry_sup'/></td><td><select name='Spec_chemistry_CPR' id='Spec_chemistry_CPR'/>";
																											if($row[19]=='All Inclusive CPR')
																											{echo "<option value='non CPR'>non CPR</option>
																											<option selected value='All Inclusive CPR'>All Inclusive CPR</option>
																											<option value='Partially CPR'>Partially CPR</option></td></tr>";}
																											elseif($row[19]=='Partially CPR')
																											{echo "<option value='non CPR'>non CPR</option>
																											<option value='All Inclusive CPR'>All Inclusive CPR</option>
																											<option selected value='Partially CPR'>Partially CPR</option></td></tr>";}
																											else
																											{echo "<option selected value='non CPR'>non CPR</option>
																											<option value='All Inclusive CPR'>All Inclusive CPR</option>
																											<option value='Partially CPR'>Partially CPR</option></td></tr>";}
										echo "<tr><td>Immuno</td><td><input type='text' value='$row[20]' name='Immuno_sup' id='Immuno_sup'/></td><td><select name='Immuno_CPR' id='Immuno_CPR'/>";
																											if($row[21]=='All Inclusive CPR')
																											{echo "<option value='non CPR'>non CPR</option>
																											<option selected value='All Inclusive CPR'>All Inclusive CPR</option>
																											<option value='Partially CPR'>Partially CPR</option></td></tr>";}
																											elseif($row[21]=='Partially CPR')
																											{echo "<option value='non CPR'>non CPR</option>
																											<option value='All Inclusive CPR'>All Inclusive CPR</option>
																											<option selected value='Partially CPR'>Partially CPR</option></td></tr>";}
																											else
																											{echo "<option selected value='non CPR'>non CPR</option>
																											<option value='All Inclusive CPR'>All Inclusive CPR</option>
																											<option value='Partially CPR'>Partially CPR</option></td></tr>";}
										echo "<tr><td>Special Immuno (low volume tests dedicated to separate group)</td><td><input type='text' value='$row[22]' name='Spec_immuno_sup' id='Spec_immuno_sup'/></td><td><select name='Spec_immuno_CPR' id='Spec_immuno_CPR'/>";
																											if($row[23]=='All Inclusive CPR')
																											{echo "<option value='non CPR'>non CPR</option>
																											<option selected value='All Inclusive CPR'>All Inclusive CPR</option>
																											<option value='Partially CPR'>Partially CPR</option></td></tr>";}
																											elseif($row[23]=='Partially CPR')
																											{echo "<option value='non CPR'>non CPR</option>
																											<option value='All Inclusive CPR'>All Inclusive CPR</option>
																											<option selected value='Partially CPR'>Partially CPR</option></td></tr>";}
																											else
																											{echo "<option selected value='non CPR'>non CPR</option>
																											<option value='All Inclusive CPR'>All Inclusive CPR</option>
																											<option value='Partially CPR'>Partially CPR</option></td></tr>";}
										echo "<tr><td>Hema</td><td><input type='text' name='Hema_sup' value='$row[24]' id='Hema_sup'/></td><td><select name='Hema_CPR' id='Hema_CPR'/>";
																											if($row[25]=='All Inclusive CPR')
																											{echo "<option value='non CPR'>non CPR</option>
																											<option selected value='All Inclusive CPR'>All Inclusive CPR</option>
																											<option value='Partially CPR'>Partially CPR</option></td></tr>";}
																											elseif($row[25]=='Partially CPR')
																											{echo "<option value='non CPR'>non CPR</option>
																											<option value='All Inclusive CPR'>All Inclusive CPR</option>
																											<option selected value='Partially CPR'>Partially CPR</option></td></tr>";}
																											else
																											{echo "<option selected value='non CPR'>non CPR</option>
																											<option value='All Inclusive CPR'>All Inclusive CPR</option>
																											<option value='Partially CPR'>Partially CPR</option></td></tr>";}
										echo "<tr><td>Coag</td><td><input type='text' name='Coag_sup' value='$row[26]' id='Coag_sup'/></td><td><select name='Coag_CPR' id='Coag_CPR'/>";
																											if($row[27]=='All Inclusive CPR')
																											{echo "<option value='non CPR'>non CPR</option>
																											<option selected value='All Inclusive CPR'>All Inclusive CPR</option>
																											<option value='Partially CPR'>Partially CPR</option></td></tr>";}
																											elseif($row[27]=='Partially CPR')
																											{echo "<option value='non CPR'>non CPR</option>
																											<option value='All Inclusive CPR'>All Inclusive CPR</option>
																											<option selected value='Partially CPR'>Partially CPR</option></td></tr>";}
																											else
																											{echo "<option selected value='non CPR'>non CPR</option>
																											<option value='All Inclusive CPR'>All Inclusive CPR</option>
																											<option value='Partially CPR'>Partially CPR</option></td></tr>";}
										echo "<tr><td>Serology</td><td><input type='text' value='$row[28]' name='Serology_sup' id='Serology_sup'/></td><td><select name='Serology_CPR' id='Serology_CPR'/>";
																											if($row[29]=='All Inclusive CPR')
																											{echo "<option value='non CPR'>non CPR</option>
																											<option selected value='All Inclusive CPR'>All Inclusive CPR</option>
																											<option value='Partially CPR'>Partially CPR</option></td></tr>";}
																											elseif($row[29]=='Partially CPR')
																											{echo "<option value='non CPR'>non CPR</option>
																											<option value='All Inclusive CPR'>All Inclusive CPR</option>
																											<option selected value='Partially CPR'>Partially CPR</option></td></tr>";}
																											else
																											{echo "<option selected value='non CPR'>non CPR</option>
																											<option value='All Inclusive CPR'>All Inclusive CPR</option>
																											<option value='Partially CPR'>Partially CPR</option></td></tr>";}
									echo "</table></fieldset>
									
									<fieldset><table class='hidden-empty-cells'>
										<tr><td colspan='2'>Analyzers</td></tr>
										<tr><td></td><td>Name</td><td>#</td></tr>
										<tr><td>Chemistry</td><td><input type='text' value='$row[30]' name='Chemistry_name' id='Chemistry_name'/></td><td><input value='$row[31]' type='number' name='Chemistry_num' id='Chemistry_num'/></td></tr>
										<tr><td>Special Chemistry (low volume tests dedicated to separate group)</td><td><input type='text' name='Spec_chemistry_name' value='$row[32]' id='Spec_chemistry_name'/></td><td><input type='number' value='$row[33]' name='Spec_chemistry_num' id='Spec_chemistry_num'/></td></tr>
										<tr><td>Immuno</td><td><input type='text' name='Immuno_name' value='$row[34]' id='Immuno_name'/></td><td><input value='$row[35]' type='number' name='Immuno_num' id='Immuno_num'/></td></tr>
										<tr><td>Special Immuno (low volume tests dedicated to separate group)</td><td><input type='text' value='$row[36]' name='Spec_immuno_name' id='Spec_immuno_name'/></td><td><input type='number' value='$row[37]' name='Spec_immuno_num' id='Spec_immuno_num'/></td></tr>
										<tr><td>Hema</td><td><input type='text'  value='$row[38]' name='Hema_name' id='Hema_name'/></td><td><input type='number' value='$row[39]' name='Hema_num' id='Hema_num'/></td></tr>
										<tr><td>Coag</td><td><input type='text' value='$row[40]' name='Coag_name' id='Coag_name'/></td><td><input type='number' value='$row[41]' name='Coag_num' id='Coag_num'/></td></tr>
										<tr><td>Serology</td><td><input type='text' value='$row[42]' name='Serology_name' id='Serology_name'/></td><td><input type='number' value='$row[43]' name='Serology_num' id='Serology_num'/></td></tr>
									</table></fieldset>
									
									<fieldset><table class='hidden-empty-cells'>
										<tr><td colspan='2'>Other specialized departments</td></tr>
										<tr><td></td><td>Name</td><td>#</td></tr>
										<tr><td>Microbiology</td><td><input type='text' value='$row[44]' name='Microbiology_name' id='Microbiology_name'/></td><td><input type='number' value='$row[45]' name='Microbiology_num' id='Microbiology_num'/></td></tr>
										<tr><td>Moleclar methods</td><td><input type='text' value='$row[46]' name='Mol_meth_name' id='Mol_meth_name'/></td><td><input type='number' value='$row[47]' name='Mol_meth_num' id='Mol_meth_num'/></td></tr>
										<tr><td>Histologe, Citology</td><td><input type='text' value='$row[48]' name='Hist_cit_name' id='Hist_cit_name'/></td><td><input type='number' value='$row[49]' name='Hist_cit_num' id='Hist_cit_num'/></td></tr>
										<tr><td>Other option</td><td><input type='text' value='$row[50]' name='oth_opt_name' id='oth_opt_name'/></td><td><input type='number' value='$row[51]' name='oth_opt_num' id='oth_opt_num'/></td></tr>
									</table></fieldset>
									
									<fieldset><table class='hidden-empty-cells'>
										<tr><td colspan='2'>Sample source for the PS</td></tr>
										<tr><td>Hospitals</td><td><select type='text' name='Hos_sampl' id='Hos_sampl'/>";
											if ($row[52]=='yes')
												{echo "<option selected value='yes'>yes</option>
												<option value='no'>no</option></td></tr>";}
												else
												{echo "<option value='yes'>yes</option>
												<option selected value='no'>no</option></td></tr>";}
										echo "<tr><td>Private clinics</td><td><select type='text' name='Pr_cl_sampl' id='Pr_cl_sampl'/>";
											if ($row[53]=='yes')
												{echo "<option selected value='yes'>yes</option>
												<option value='no'>no</option></td></tr>";}
												else
												{echo "<option value='yes'>yes</option>
												<option selected value='no'>no</option></td></tr>";}
										echo "<tr><td>Special offices (BCP - Blood Collection Point)</td><td><select type='text' name='Spec_of_sampl' id='Spec_of_sampl'/>";
											if ($row[54]=='yes')
												{echo "<option selected value='yes'>yes</option>
												<option value='no'>no</option></td></tr>";}
												else
												{echo "<option value='yes'>yes</option>
												<option selected value='no'>no</option></td></tr>";}
										echo "<tr><td>Home visits</td><td><select type='text' name='Home_vis_sampl' id='Home_vis_sampl'/>";
											if ($row[55]=='yes')
												{echo "<option selected value='yes'>yes</option>
												<option value='no'>no</option></td></tr>";}
												else
												{echo "<option value='yes'>yes</option>
												<option selected value='no'>no</option></td></tr>";}
										echo "<tr><td>Pharmacies</td><td><select stype='text' name='Pharm_sampl' id='Pharm_sampl'/>";
											if ($row[56]=='yes')
												{echo "<option selected value='yes'>yes</option>
												<option value='no'>no</option></td></tr>";}
												else
												{echo "<option value='yes'>yes</option>
												<option selected value='no'>no</option></td></tr>";}
										echo "<tr><td>External nurses</td><td><select type='text' name='Ext_nur_sampl' id='Ext_nur_sampl'/>";
											if ($row[57]=='yes')
												{echo "<option selected value='yes'>yes</option>
												<option value='no'>no</option></td></tr>";}
												else
												{echo "<option value='yes'>yes</option>
												<option selected value='no'>no</option></td></tr>";}
										echo "<tr><td>Other</td><td><input type='text' value='$row[58]' name='Oth_sampl' id='Oth_sampl'/>";
											
									echo "</table></fieldset>
								
								<input type='submit' name='update_ps' value='Update'/>
								</fieldset></form>
								</td></tr>";
				

							// очищаем результат
							
						}
						mysqli_free_result($result);
						}

					?>
					
				</table>
			</div>

		
        <div id="footer">
            <p>Contact:  </p>
            <p>Roflan developer, 2020</p>
        </div>
    </body>
</html>
<?php
	} else header("location:admin.php?level=0");

?>