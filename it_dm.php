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
		mysqli_query($link, "SET character_set_results = utf8");	
		
			
				$id_pers=$_SESSION['session_id_us'];
				$query1 ="SELECT * FROM `IT_DM` WHERE `ID_user`=$id_pers";
						$result = mysqli_query($link, $query1) or die("Ошибка " . mysqli_error($link)); 
						if($result)
						{
							$rows = mysqli_num_rows($result); // количество полученных строк
							$row = mysqli_fetch_row($result);
						
						
?>

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
			
				<form method = "POST" action='It_DM_w.php'> 
						<fieldset>
							<table class="hidden-empty-cells">
								<tr>
								<td colspan="2">Information systems</td>
								</tr>
								<tr>
								<td>Basic IT support</td><td></td><td><select  type="text" name="Basic_IT" id="Basic_IT" />
									<?php
									if("$row[2]"=="internal")
									{
									echo "<option selected value='internal'>internal</option>
									<option value='outsource'>outsource</option>
									<option value='no dedicated person'>no dedicated person</option></td>";
									}
									elseif("$row[2]"=="outsource")
									{
									echo "<option value='internal'>internal</option>
									<option selected value='outsource'>outsource</option>
									<option value='no dedicated person'>no dedicated person</option></td>";
									}
									else
									{
									echo "<option value='internal'>internal</option>
									<option value='outsource'>outsource</option>
									<option selected value='no dedicated person'>no dedicated person</option></td>";
									}
									?>
								</tr>		
								<tr>
								<td></td><td>if internal - please specify # of people</td><td><input type="number" name="num_b_IT" id="num_b_IT" value="$row[3]"/>
								</td>
								</tr>
								<tr>
								<td>System Administrator</td><td></td><td><select type="text" name="Sys_adm" id="Sys_adm"/>
									<?php
									if("$row[4]"=="internal")
									{
									echo "<option selected value='internal'>internal</option>
									<option value='outsource'>outsource</option>";
									}
									else
									{
									echo "<option value='internal'>internal</option>
									<option selected value='outsource'>outsource</option></td>";
									}
									?>
								</tr>
								<tr>
								<td></td><td>if internal - please specify # of people</td><td><input type="number" name="Sys_adm_num" value="$row[5]" id="Sys_adm_num"/></td>
								</tr>
								<tr>
								<td>Parameterization of assays</td><td></td><td><select type="text" name="Par_of_assays" id="Par_of_assays"/>
									<?php
									if("$row[6]"=="internal")
									{
									echo "<option selected value='internal'>internal</option>
									<option value='vendor of analytical platform'>vendor of analytical platform</option>
									<option value='both'>both</option></td>";
									}
									elseif("$row[6]"=="vendor of analytical platform")
									{
									echo "<option  value='internal'>internal</option>
									<option selected value='vendor of analytical platform'>vendor of analytical platform</option>
									<option value='both'>both</option></td>";
									}
									else
									{
									echo "<option  value='internal'>internal</option>
									<option value='vendor of analytical platform'>vendor of analytical platform</option>
									<option selected value='both'>both</option></td>";
									}
									?>
								</tr>
								<tr>
								<td></td><td>if internal - please specify # of people</td><td><input type="number" name="Par_of_assays_num" value="$row[7]" id="Par_of_assays_num"/></td>
								</tr>
								<tr>
								<td></td><td>if vendor - please specify # of type</td>
								</tr>
								<tr>
								<td></td><td>Abbott</td><td><select type="text" name="Abbott" id="vendor"/>
									<?php
									if("$row[8]"=="internal")
									{
									echo "<option selected value='yes'>yes</option>
									<option value='no'>no</option><</td>";
									}
									else
									{
									echo "<option  value='yes'>yes</option>
									<option selected value='no'>no</option><</td>";
									}
									?>
								</tr>
								<tr>
								<td></td><td>Beckman Coulter</td><td><select type="text" name="Beck_coult" id="vendor"/>
									<?php
									if("$row[9]"=="internal")
									{
									echo "<option selected value='yes'>yes</option>
									<option value='no'>no</option></td>";
									}
									else
									{
									echo "<option  value='yes'>yes</option>
									<option selected value='no'>no</option></td>";
									}
									?>
								</tr>
								<tr>
								<td></td><td>Roche</td><td><select type="text" name="Roche" id="vendor"/>
									<?php
									if("$row[10]"=="internal")
									{
									echo "<option selected value='yes'>yes</option>
									<option value='no'>no</option></td>";
									}
									else
									{
									echo "<option  value='yes'>yes</option>
									<option selected value='no'>no</option></td>";
									}
									?>
								</tr>
								<tr>
								<td></td><td>Siemens</td><td><select type="text" name="Siemens" id="vendor"/>
									<?php
									if("$row[11]"=="internal")
									{
									echo "<option selected value='yes'>yes</option>
									<option value='no'>no</option></td>";
									}
									else
									{
									echo "<option  value='yes'>yes</option>
									<option selected value='no'>no</option></td>";
									}
									?>
								</tr>
								<tr>
								<td>Automation Application</td><td></td><td><select type="text" name="Auto_App" id="Auto_App"/>
									<?php
									if("$row[12]"=="internal")
									{
									echo "<option selected value='internal'>internal</option>
									<option value='vendor of analytical platform'>vendor of analytical platform</option>
									<option value='we do not have automation'>we do not have automation</option></td>";
									}
									elseif("$row[12]"=="vendor of analytical platform")
									{
									echo "<option  value='internal'>internal</option>
									<option selected value='vendor of analytical platform'>vendor of analytical platform</option>
									<option value='we do not have automation'>we do not have automation</option></td>";
									}
									else
									{
									echo "<option  value='internal'>internal</option>
									<option value='vendor of analytical platform'>vendor of analytical platform</option>
									<option selected value='we do not have automation'>we do not have automation</option></td>";
									}
									?>
								</tr>
								<tr>
								<td>Other</td><td></td><td><input type="text" name="Other_IS" value='<?php echo $row[13];?>' id="Other_IS"/></td>
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
									<?php
									if("$row[14]"=="internal")
									{
									echo "<option selected value='internal'>internal</option>
									<option selected value='outsource'>outsource</option>
									<option value='vendor of analytical platform'>vendor of analytical platform</option>
									<option value='no dedicated person'>no dedicated person</option></td>";
									}
									elseif("$row[14]"=="outsource")
									{
									echo "<option  value='internal'>internal</option>
									<option selected value='outsource'>outsource</option>
									<option value='vendor of analytical platform'>vendor of analytical platform</option>
									<option value='no dedicated person'>no dedicated person</option></td>";
									}
									elseif("$row[14]"=="vendor of analytical platform")
									{
									echo "<option  value='internal'>internal</option>
									<option value='outsource'>outsource</option>
									<option selected value='vendor of analytical platform'>vendor of analytical platform</option>
									<option value='no dedicated person'>no dedicated person</option></td>";
									}
									else
									{
									echo "<option  value='internal'>internal</option>
									<option value='outsource'>outsource</option>
									<option value='vendor of analytical platform'>vendor of analytical platform</option>
									<option selected value='no dedicated person'>no dedicated person</option></td>";
									}
									?>
								</tr>		
								<tr>
								<td></td><td>if internal - please specify # of people</td><td><input type="number" value="$row[15]" name="BI_en_num" id="BI_en_num"/>
								</td>
								</tr>
								<tr>
								<td>Data support</td><td></td><td><select type="text" name="Data_sup" id="Data_sup"/>
									<?php
									if("$row[16]"=="internal")
									{
									echo "<option selected value='internal'>internal</option>
									<option selected value='outsource'>outsource</option>
									<option value='vendor of analytical platform'>vendor of analytical platform</option>
									<option value='no dedicated person'>no dedicated person</option></td>";
									}
									elseif("$row[16]"=="outsource")
									{
									echo "<option  value='internal'>internal</option>
									<option selected value='outsource'>outsource</option>
									<option value='vendor of analytical platform'>vendor of analytical platform</option>
									<option value='no dedicated person'>no dedicated person</option></td>";
									}
									elseif("$row[16]"=="vendor of analytical platform")
									{
									echo "<option  value='internal'>internal</option>
									<option value='outsource'>outsource</option>
									<option selected value='vendor of analytical platform'>vendor of analytical platform</option>
									<option value='no dedicated person'>no dedicated person</option></td>";
									}
									else
									{
									echo "<option  value='internal'>internal</option>
									<option value='outsource'>outsource</option>
									<option value='vendor of analytical platform'>vendor of analytical platform</option>
									<option selected value='no dedicated person'>no dedicated person</option></td>";
									}
									?>
								</tr>
								<tr>
								<td></td><td>if internal - please specify # of people</td><td><input value="$row[17]" type="number" name="Data_sup_num" id="Data_sup_num"/></td>
								</tr>
								<tr>
								<td>Medical Statistic</td><td></td><td><select  type="text" name="med_stat" id="med_stat"/>
									<?php
									if("$row[18]"=="internal")
									{
									echo "<option selected value='internal'>internal</option>
									<option value='outsource'>outsource</option>
									<option value='no dedicated person'>no dedicated person</option></td>";
									}
									elseif("$row[18]"=="vendor of analytical platform")
									{
									echo "<option  value='internal'>internal</option>
									<option selected value='outsource'>outsource</option>
									<option value='no dedicated person'>no dedicated person</option></td>";
									}
									else
									{
									echo "<option  value='internal'>internal</option>
									<option value='outsource'>outsource</option>
									<option selected value='no dedicated person'>no dedicated person</option></td>";
									}
									?>
								</tr>
								<tr>
								<td></td><td>if internal - please specify # of people</td><td><input type="number" value="$row[19]" name="med_stat_num" id="med_stat_num"/></td>
								</tr>			
								<tr>
								<td>Data Science</td><td></td><td><select type="text" name="Data_sc" id="Data_sc"/>
									<?php
									if("$row[20]"=="internal")
									{
									echo "<option selected value='internal'>internal</option>
									<option selected value='outsource'>outsource</option>
									<option value='vendor of analytical platform'>vendor of analytical platform</option>
									<option value='no dedicated person'>no dedicated person</option></td>";
									}
									elseif("$row[20]"=="outsource")
									{
									echo "<option  value='internal'>internal</option>
									<option selected value='outsource'>outsource</option>
									<option value='vendor of analytical platform'>vendor of analytical platform</option>
									<option value='no dedicated person'>no dedicated person</option></td>";
									}
									elseif("$row[20]"=="vendor of analytical platform")
									{
									echo "<option  value='internal'>internal</option>
									<option value='outsource'>outsource</option>
									<option selected value='vendor of analytical platform'>vendor of analytical platform</option>
									<option value='no dedicated person'>no dedicated person</option></td>";
									}
									else
									{
									echo "<option value='internal'>internal</option>
									<option value='outsource'>outsource</option>
									<option value='vendor of analytical platform'>vendor of analytical platform</option>
									<option selected value='no dedicated person'>no dedicated person</option></td>";
									}
									?>
								</tr>
								<tr>
								<td></td><td>if internal - please specify # of people</td><td><input type="number" value="$row[21]" name="Data_sc_num" id="Data_sc_num"/></td>
								</tr>
								<tr>
								<td>Other</td><td></td><td><input type="text" value='<?php echo $row[22];?>' name="Other_DM" id="Other_DM"/></td>
								</tr>
							</table>
					</fieldset>
					<table class="hidden-empty-cells">
								<tr>
								<td>Are some of your systems developed in house?</td><td></td><td><select type="text" name="SDiH" id="SDiH"/>

									<?php
									if("$row[23]"=="LIS")
									{
									echo "<option selected value='LIS'>LIS</option>
									<option value='HIS'>HIS</option>
									<option value='middleware'>middleware</option>
									<option value='other'>other</option></td>";
									}
									elseif("$row[23]"=="HIS")
									{
									echo "<option value='LIS'>LIS</option>
									<option selected value='HIS'>HIS</option>
									<option value='middleware'>middleware</option>
									<option value='other'>other</option></td>";
									}
									elseif("$row[23]"=="middleware")
									{
									echo "<option value='LIS'>LIS</option>
									<option value='HIS'>HIS</option>
									<option selected value='middleware'>middleware</option>
									<option value='other'>other</option></td>";
									}
									else
									{
									echo "<option value='LIS'>LIS</option>
									<option value='HIS'>HIS</option>
									<option value='middleware'>middleware</option>
									<option selected value='other'>other</option></td>";
									}
									?>
								</tr>		
								<tr>
								<td>Do you have a wriiten IT plan, strategy, KPIs?</td><td></td><td colspan="2"><select type="text" name="writter" id="writter"/>
									<?php
									if("$row[24]"=="internal")
									{
									echo "<option selected value='yes'>yes</option>
									<option value='no'>no</option></td>";
									}
									else
									{
									echo "<option  value='yes'>yes</option>
									<option selected value='no'>no</option></td>";
									}
									?>
								</tr>

								<tr>
								<td>Do you have corporation Data Warehouse?</td><td></td><td><select type="text" name="CorpDW" id="CorpDW"/>
									<?php
									if("$row[25]"=="internal")
									{
									echo "<option selected value='yes'>yes</option>
									<option value='no'>no</option></td>";
									}
									else
									{
									echo "<option  value='yes'>yes</option>
									<option selected value='no'>no</option></td>";
									}
									?>
								</tr>
								<tr>
								<td></td><td>if yes - please specify connected system</td><td></td>
								</tr>			
								<tr>
								<td></td><td>LIS</td><td><select  type="text" name="LIS_DW" id="spec_DW"/>
									<?php
									if("$row[26]"=="internal")
									{
									echo "<option selected value='yes'>yes</option>
									<option value='no'>no</option></td>";
									}
									else
									{
									echo "<option  value='yes'>yes</option>
									<option selected value='no'>no</option></td>";
									}
									?>
								</tr>
								<tr>
								<td></td><td>Middleware</td><td><select  type="text" name="Miwa_DW" id="spec_DW"/>
									<?php
									if("$row[27]"=="internal")
									{
									echo "<option selected value='yes'>yes</option>
									<option value='no'>no</option></td>";
									}
									else
									{
									echo "<option  value='yes'>yes</option>
									<option selected value='no'>no</option></td>";
									}
									?>
								</tr>
								<tr>
								<td></td><td>Invoicing</td><td><select  type="text" name="Inv_DW" id="spec_DW"/>
									<?php
									if("$row[28]"=="internal")
									{
									echo "<option selected value='yes'>yes</option>
									<option value='no'>no</option></td>";
									}
									else
									{
									echo "<option  value='yes'>yes</option>
									<option selected value='no'>no</option></td>";
									}
									?>
								</tr>
								<tr>
								<td></td><td>Other</td><td><input  type="text" value='<?php echo $row[29];?>' name="Oth_DW" id="spec_DW"/></td>
								</tr>
								<tr>
								<td>Do you have any Master Data Management solution?</td><td></td><td colspan="2"><select type="text" name="MDMS" id="MDMS"/>
									<?php
									if("$row[30]"=="internal")
									{
									echo "<option selected value='yes'>yes</option>
									<option value='no'>no</option></td>";
									}
									else
									{
									echo "<option  value='yes'>yes</option>
									<option selected value='no'>no</option></td>";
									}
									?>
								</tr>

								<tr>
								<td>Do you have any automated reporting?</td><td></td><td><select type="text" name="auto_rep" id="auto_rep"/>
									<?php
									if("$row[31]"=="internal")
									{
									echo "<option selected value='yes'>yes</option>
									<option value='no'>no</option></td>";
									}
									else
									{
									echo "<option  value='yes'>yes</option>
									<option selected value='no'>no</option></td>";
									}
									?>
								</tr>
								<tr>
								<td></td><td>if yes - please specify connected system</td><td></td>
								</tr>			
								<tr>
								<td></td><td>LIS</td><td><select  type="text" name="LIS_AR" id="spec_AR"/>
									<?php
									if("$row[32]"=="internal")
									{
									echo "<option selected value='yes'>yes</option>
									<option value='no'>no</option></td>";
									}
									else
									{
									echo "<option  value='yes'>yes</option>
									<option selected value='no'>no</option></td>";
									}
									?>
								</tr>
								<tr>
								<td></td><td>Middleware</td><td><select  type="text" name="Miwa_AR" id="spec_AR"/>
									<?php
									if("$row[33]"=="internal")
									{
									echo "<option selected value='yes'>yes</option>
									<option value='no'>no</option></td>";
									}
									else
									{
									echo "<option  value='yes'>yes</option>
									<option selected value='no'>no</option></td>";
									}
									?>
								</tr>
								<tr>
								<td></td><td>Invoicing</td><td><select  type="text" name="Inv_AR" id="spec_AR"/>
									<?php
									if("$row[34]"=="internal")
									{
									echo "<option selected value='yes'>yes</option>
									<option value='no'>no</option></td>";
									}
									else
									{
									echo "<option  value='yes'>yes</option>
									<option selected value='no'>no</option></td>";
									}
									?>
								</tr>
								<tr>
								<td></td><td>Other</td><td><input  type="text" value='<?php echo $row[35];?>' name="Oth_AR" id="spec_AR"/></td>
								</tr>
								
								<tr>
								<td>Do you have KPI monitoring tools?</td><td></td><td><select type="text" name="KPI_mon" id="KPI_mon"/>
									<?php
									if("$row[36]"=="internal")
									{
									echo "<option selected value='yes'>yes</option>
									<option value='no'>no</option></td>";
									}
									else
									{
									echo "<option  value='yes'>yes</option>
									<option selected value='no'>no</option></td>";
									}
									?>
								</tr>
								<tr>
								<td></td><td>if yes - please specify</td><td></td>
								</tr>			
								<tr>
								<td></td><td>Costing</td><td><select type="text" name="costing_KPI" id="spec_KPI"/>
									<?php
									if("$row[37]"=="internal")
									{
									echo "<option selected value='yes'>yes</option>
									<option value='no'>no</option></td>";
									}
									else
									{
									echo "<option  value='yes'>yes</option>
									<option selected value='no'>no</option></td>";
									}
									?>
								</tr>
								<tr>
								<td></td><td>TTR</td><td><select type="text" name="TTR_KPI" id="spec_KPI"/>
									<?php
									if("$row[38]"=="internal")
									{
									echo "<option selected value='yes'>yes</option>
									<option value='no'>no</option></td>";
									}
									else
									{
									echo "<option  value='yes'>yes</option>
									<option selected value='no'>no</option></td>";
									}
									?>
								</tr>
								<tr>
								<td></td><td>Quality</td><td><select type="text" name="Qual_KPI" id="spec_KPI"/>
									<?php
									if("$row[39]"=="internal")
									{
									echo "<option selected value='yes'>yes</option>
									<option value='no'>no</option></td>";
									}
									else
									{
									echo "<option  value='yes'>yes</option>
									<option selected value='no'>no</option></td>";
									}
									?>
								</tr>
								<tr>
								<td></td><td>Other</td><td><input type="text" name="Oth_KPI" value='<?php echo $row[40];?>' id="spec_KPI"/></td>
								</tr>
								<tr>
								<td>is it possible to extract raw data for samples, ordered tests results for 1 day/week/month?</td><td></td><td><select type="text" name="pos_ext" id="pos_ext"/>
									<?php
									if("$row[41]"=="internal")
									{
									echo "<option selected value='yes'>yes</option>
									<option value='no'>no</option></td>";
									}
									else
									{
									echo "<option  value='yes'>yes</option>
									<option selected value='no'>no</option></td>";
									}
									?>
								</tr>
								<tr>
								<td>Is your laboratory HEPA or RGPD complient?</td><td></td><td><select type="text" name="lab_comp" id="lab_comp"/>
									<?php
									if("$row[42]"=="HEPA")
									{
									echo "<option value='none'>none</option>
									<option selected value='HEPA'>HEPA</option>
									<option value='RGPD'>RGPD</option>
									<option value='both'>both</option></td>";
									}
									elseif("$row[42]"=="RGPD")
									{
									echo "<option  value='none'>none</option>
									<option value='HEPA'>HEPA</option>
									<option selected value='RGPD'>RGPD</option>
									<option value='both'>both</option></td>";
									}
									elseif("$row[42]"=="both")
									{
									echo "<option value='none'>none</option>
									<option value='HEPA'>HEPA</option>
									<option value='RGPD'>RGPD</option>
									<option selected value='both'>both</option></td>";
									}
									else
									{
									echo "<option selected value='none'>none</option>
									<option value='HEPA'>HEPA</option>
									<option value='RGPD'>RGPD</option>
									<option value='both'>both</option></td>";
									}
									?>
								</tr>
								<?php
								if ($rows==0)
								{
									echo "<tr><td colspan='3'><input name='ins' type='submit' value='Confirm'/><input type='reset' value='Clear'/></td></tr>";
								}
								else
								{
									echo "<tr><td colspan='3'><input name='update'  type='submit' value='Confirm'/><input type='reset' value='Clear'/></td></tr>";
								}
								?>
								</table>
				</form> 
				
			</div>

        <div id="footer">
            <p>Contact:  </p>
            <p>Roflan developer, 2020</p>
        </div>
    </body>
</html>
<?php
						
						// очищаем результат
							mysqli_free_result($result);}
							} else header("location:admin.php?level=0");

?>
