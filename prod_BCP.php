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
						$query ="SELECT `ID_BCP`, `ID_pers`, `Main_PS`, `peak_hour_phleb`, `peak_hour_nurse`, `peak_hour_tech`, `peak_hour_biol`, `peak_hour_sec`, `peak_hour_other`, `treat_reg`, `treat_la`, `treat_cent`, `treat_aliq`, `treat_exp`, `treat_other`, `valid_for_BCP`, `BCP_stagg_KPIs`, `Or_and_form` FROM `BCP` WHERE `ID_pers` =  $id_pers";
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
							$j = $i + 1;
							echo "
							<tr><td><form method = 'POST' action = 'Prod_BCP_up.php'> 
								<fieldset>
								<table>
								<tr><td colspan='2'>$j BCP</td></tr>
								<tr>
									<td>
										<table>
											<tr><td colspan='2'>BCP staff during peak hour</td></tr>
											<tr><input type='hidden' name='id_bcp' id='id_bcp' value='$row[0]'/></tr>
											<tr><td><label for='Phleb'>Phlebotomist</label></td> <td><input value='$row[3]' type='text' name='Phleb' id='Phleb' /></td></tr>
											<tr><td><label for='Nurse'>Nurse</label></td> <td><input value='$row[4]' type='text' name='Nurse' id='Nurse' /></td></tr>
											<tr><td><label for='Tech'>Technician</label></td><td><input value='$row[5]' type='text' name='Tech' id='Tech' /></td></tr>
											<tr><td><label for='Bio'>Biologist</label></td> <td><input value='$row[6]' type='text' name='Bio' id='Bio' /></td></tr>
											<tr><td><label for='Sec'>Secretary</label></td> <td><input value='$row[7]' type='text' name='Sec' id='Sec' /></td></tr>
											<tr><td><label for='Other_h'>Other</label></td> <td><input value='$row[8]' type='text' name='Other_h' id='Other_h' /></td></tr>
										</table>
									</td>
									<td>
										<table>
											<tr><td colspan='2'>BCP sample treatment</td></tr>
											<tr><td><label for='Registarion'>Registarion</label></td> <td><select type='text' name='Registarion' id='Registarion' />";
												if ($row[9]=='yes')
												{echo "<option selected value='yes'>yes</option>
												<option value='no'>no</option></td></tr>";}
												else
												{echo "<option value='yes'>yes</option>
												<option selected value='no'>no</option></td></tr>";}
												
											echo "<tr><td><label for='Labeling'>Labeling</label></td> <td><select type='text' name='Labeling' id='Labeling' />";
												if ($row[10]=='yes')
												{echo "<option selected value='yes'>yes</option>
												<option value='no'>no</option></td></tr>";}
												else
												{echo "<option value='yes'>yes</option>
												<option selected value='no'>no</option></td></tr>";}
											echo "<tr><td><label for='Contrifugation'>Contrifugation</label></td> <td><select type='text' name='Contrifugation' id='Contrifugation' />";
												if ($row[11]=='yes')
												{echo "<option selected value='yes'>yes</option>
												<option value='no'>no</option></td></tr>";}
												else
												{echo "<option value='yes'>yes</option>
												<option selected value='no'>no</option></td></tr>";}
											echo "<tr><td><label for='Aliquoting'>Aliquoting</label></td> <td><select type='text' name='Aliquoting' id='Aliquoting' />";
												if ($row[12]=='yes')
												{echo "<option selected value='yes'>yes</option>
												<option value='no'>no</option></td></tr>";}
												else
												{echo "<option value='yes'>yes</option>
												<option selected value='no'>no</option></td></tr>";}
											echo "<tr><td><label for='Ex_test'>Express-tests</label></td> <td><select type='text' name='Ex_test' id='Ex_test' />";
												if ($row[13]=='yes')
												{echo "<option selected value='yes'>yes</option>
												<option value='no'>no</option></td></tr>";}
												else
												{echo "<option value='yes'>yes</option>
												<option selected value='no'>no</option></td></tr>";}
											echo "<tr><td><label for='Other_t'>Other</label></td> <td><input type='text' value ='$row[14]' name='Other_t' id='Other_t' /></td></tr>";
										echo "</table>
									</td></tr>
								<tr><td><label for='med_val'>Who does medical validation for BCP orders?</label></td> <td><input type='text' value ='$row[15]' name='med_val' id='med_val' /></td></tr>
								<tr><td><label for='BsK'>BCP staff KPIs</label></td> <td><select type='text' name='BsK' id='BsK' />";
												if ($row[16]=='yes')
												{echo "<option selected value='yes'>yes</option>
												<option value='no'>no</option></td></tr>";}
												else
												{echo "<option value='yes'>yes</option>
												<option selected value='no'>no</option></td></tr>";}
								echo "<tr><td><label for='Pres_o_and_f'>Prescription origin and form (clinician/patienu-self, paper/integration/machion-readable blancs/etc)</label></td> <td><input type='text' value ='$row[17]'  name='Pres_o_and_f' id='Pres_o_and_f' /></td></tr>
								<tr><td colspan='2'><input  type='submit' name='update_bcp' value='Update'/></td></tr>
								</table>
							</fieldset>
							</form></td></tr>";
				

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
