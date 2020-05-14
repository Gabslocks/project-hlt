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
		mysqli_query($link, "SET character_set_results = utf8");	?>
	
	
        <div id="header">
            <h1>List of System</h1>
			<h2>Welcome, <span><?php echo $_SESSION['session_username'];?></span></h2>
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
                    <p><button id="b_add" type="button" onclick="Add_new()" name="Add">+ Add new</button></p>
					 <?php require_once 'connect.php';
					mysqli_query($link, "SET NAMES utf8");
					mysqli_query($link, "SET CHARACTER utf8");
					mysqli_query($link, "SET character_set_client = utf8");
					mysqli_query($link, "SET character_set_connection = utf8");
					mysqli_query($link, "SET character_set_results = utf8");	
					

						$query ="SELECT * FROM ListOfSys";
						$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
						if($result)
						{
							$rows = mysqli_num_rows($result); // количество полученных строк
					?>      		
					<script>						
							var num_el = <?php echo $rows; ?>;
							var num_r=Math.floor(num_el/3);
							
							
							function Add_new(){
								row='row_'+num_r;
								var first = document.getElementById(row); //первый элемент li списка ul
								
								if ( num_el%3 == 0)
									{
										var num = "<td><form method = 'POST' action='LoS_w.php'><fieldset style='heigth:200px;width:300px;'><table><tr><td colspan='2'>System "+(num_el)+"</td></tr><tr><td colspan='2'><input type='text' name='Name' id='Name_sys' placeholder='Name'/></td></tr><tr><td><label for='type'>Type</label></td> <td><input type='text' name='type' id='type' /></td></tr><tr><td><label for='Ven_web'>Vendor website</label></td> <td><input type='text' name='Ven_web' id='Ven_web' /></td></tr><tr><td><label for='Sup_by'>Supported by</label></td> <td><input type='text' name='Sup_by' id='Sup_by' /></td></tr><tr><td><label for='Inst_site'>Installation Site</label></td> <td><input type='text' name='Inst_site' id='Inst_site' /></td></tr><tr><td><label for='Dep'>Departments</label></td> <td><input type='text' name='Dep' id='Dep' /></td></tr><tr><td><label for='Users'>Users</label></td> <td><input type='text' name='Users' id='Users' /></td></tr><tr><td><label for='D_o_ins'>Dateof of installation</label></td> <td><input type='text' name='D_o_ins' id='D_o_ins' /></td></tr><tr><td><label for='D_o_end'>Data of end of Contract</label></td> <td><input type='text' name='D_o_end' id='D_o_end' /></td></tr><tr><td><label for='Add_inf'>Additional information</label></td> <td><textarea type='text' name='Add_inf' id='Add_inf' ></textarea></td></tr><tr><td><input type='submit' name='ins' value='Confirm'/><input type='reset' value='Clear'/></td></tr></table></form></fieldset></form></td>";
										first.insertAdjacentHTML('beforeEnd', num);
										num_el++;
									}
									else if ( num_el%3 == 1)
									{
										var num = "<td><form method = 'POST' action='LoS_w.php'><fieldset style='heigth:200px;width:300px;'><table><tr><td colspan='2'>System "+num_el+"</td></tr><tr><td colspan='2'><input type='text' name='Name' id='Name_sys' placeholder='Name'/></td></tr><tr><td><label for='type'>Type</label></td> <td><input type='text' name='type' id='type' /></td></tr><tr><td><label for='Ven_web'>Vendor website</label></td> <td><input type='text' name='Ven_web' id='Ven_web' /></td></tr><tr><td><label for='Sup_by'>Supported by</label></td> <td><input type='text' name='Sup_by' id='Sup_by' /></td></tr><tr><td><label for='Inst_site'>Installation Site</label></td> <td><input type='text' name='Inst_site' id='Inst_site' /></td></tr><tr><td><label for='Dep'>Departments</label></td> <td><input type='text' name='Dep' id='Dep' /></td></tr><tr><td><label for='Users'>Users</label></td> <td><input type='text' name='Users' id='Users' /></td></tr><tr><td><label for='D_o_ins'>Dateof of installation</label></td> <td><input type='text' name='D_o_ins' id='D_o_ins' /></td></tr><tr><td><label for='D_o_end'>Data of end of Contract</label></td> <td><input type='text' name='D_o_end' id='D_o_end' /></td></tr><tr><td><label for='Add_inf'>Additional information</label></td> <td><textarea type='text' name='Add_inf' id='Add_inf' ></textarea></td></tr><tr><td><input type='submit' name='ins' value='Confirm'/><input type='reset' value='Clear'/></td></tr></table></form></fieldset></form></td>";
										first.insertAdjacentHTML('beforeEnd', num);
										num_el++;
									}
									else if ( num_el%3 == 2)
									{
										var num = "<td><form method = 'POST' action='LoS_w.php'><fieldset style='heigth:200px;width:300px;'><table><tr><td colspan='2'>System "+num_el+"</td></tr><tr><td colspan='2'><input type='text' name='Name' id='Name_sys' placeholder='Name'/></td></tr><tr><td><label for='type'>Type</label></td> <td><input type='text' name='type' id='type' /></td></tr><tr><td><label for='Ven_web'>Vendor website</label></td> <td><input type='text' name='Ven_web' id='Ven_web' /></td></tr><tr><td><label for='Sup_by'>Supported by</label></td> <td><input type='text' name='Sup_by' id='Sup_by' /></td></tr><tr><td><label for='Inst_site'>Installation Site</label></td> <td><input type='text' name='Inst_site' id='Inst_site' /></td></tr><tr><td><label for='Dep'>Departments</label></td> <td><input type='text' name='Dep' id='Dep' /></td></tr><tr><td><label for='Users'>Users</label></td> <td><input type='text' name='Users' id='Users' /></td></tr><tr><td><label for='D_o_ins'>Dateof of installation</label></td> <td><input type='text' name='D_o_ins' id='D_o_ins' /></td></tr><tr><td><label for='D_o_end'>Data of end of Contract</label></td> <td><input type='text' name='D_o_end' id='D_o_end' /></td></tr><tr><td><label for='Add_inf'>Additional information</label></td> <td><textarea type='text' name='Add_inf' id='Add_inf' ></textarea></td></tr><tr><td><input type='submit' name='ins' value='Confirm'/><input type='reset' value='Clear'/></td></tr></table></form></fieldset></form></td>";
										first.insertAdjacentHTML('beforeEnd', num);
										num_el++;
										add_row();
									}
							}
							function add_row(){
								row='row_'+num_r;
								var first = document.getElementById(row);
								num_r++;
								var new_html = '<tr id="row_' + num_r +'"></tr>';
								first.insertAdjacentHTML('afterEnd', new_html);
							}
					</script>
				
				 						
					<table>
						<?php 		
							if (($rows == NULL)) {
								echo "<tr id='row_0'></tr>";}
							for ($i = 0 ; $i < $rows ; ++$i)
							{
								$rem=intdiv($i,3);
							if ($i%3 == 0) {echo "<tr id='row_$rem'>";}
						
							
								$row = mysqli_fetch_row($result);
								
								echo "<td><form method = 'POST' action='LoS_w.php'><fieldset style='heigth:200px;width:300px;'><table><tr>";
								echo "<td colspan='2'>System $i</td></tr>";
								echo "<tr><input type='hidden' name='id_s' id='id_s' value='$row[0]'/></tr>";
								echo "<tr><td colspan='2'><input type='text' name='Name' id='Name_sys' placeholder='Name' value='$row[2]'/></td></tr>";
								echo "<tr><td><label for='Type'>Type</label></td> <td><input type='text' name='Type' id='Type' value='$row[3]'/></td></tr>";
								echo "<tr><td><label for='Ven_web'>Vendor website</label></td> <td><input type='text' name='Ven_web' id='Ven_web' value='$row[4]'/></td></tr>";
								echo "<tr><td><label for='Sup_by'>Supported by</label></td> <td><input type='text' name='Sup_by' id='Sup_by' value='$row[5]'/></td></tr>";
								echo "<tr><td><label for='Inst_site'>Installation Site</label></td> <td><input type='text' name='Inst_site' id='Inst_site' value='$row[6]'/></td></tr>";
								echo "<tr><td><label for='Dep'>Departments</label></td> <td><input type='text' name='Dep' id='Dep' value='$row[7]'/></td></tr>";
								echo "<tr><td><label for='Users'>Users</label></td> <td><input type='text' name='Users' id='Users' value='$row[8]'/></td></tr>";
								echo "<tr><td><label for='D_o_ins'>Dateof of installation</label></td> <td><input type='text' name='D_o_ins' id='D_o_ins' value='$row[9]'/></td></tr>";
								echo "<tr><td><label for='D_o_end'>Data of end of Contract</label></td> <td><input type='text' name='D_o_end' id='D_o_end' value='$row[10]'/></td></tr>";
								echo "<tr><td><label for='Add_inf'>Additional information</label></td> <td><textarea type='text' name='Add_inf' id='Add_inf' value='$row[11]'></textarea></td></tr>";
								echo "<tr><td><input type='submit' name='update' value='Confirm'/><input type='reset' value='Clear'/></td></tr></table></fieldset></form></td>";
		
								
							if ($i%3 == 2) {echo "</tr>";}
							if (($i%3 == 2)&&($i==$rows-1)) {$rem++;
								echo "<tr id='row_$rem'></tr>";}
							
							}
							
							 
							// очищаем результат
							mysqli_free_result($result);
						}

					?>
					<script>
					if (num_el%3 == 0)
							{
								add_row();
							}
					</script>
				</table>
				
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
