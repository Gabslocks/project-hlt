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
		<div id="header">
            <h1>List of Tests</h1>
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
            <div id="article">        
				<p><button id="b_add" type="button" onclick="Add_new()" name="Add">+ Add new</button></p>			
                    <?php require_once 'connect.php';
					mysqli_query($link, "SET NAMES utf8");
					mysqli_query($link, "SET CHARACTER utf8");
					mysqli_query($link, "SET character_set_client = utf8");
					mysqli_query($link, "SET character_set_connection = utf8");
					mysqli_query($link, "SET character_set_results = utf8");	

					
						$query ="SELECT * FROM Tests";
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
										var num_0 = "<td><form method = 'POST' action='LoT_w.php'><fieldset style='heigth:200px;width:300px;'><table><tr><td colspan='2'>The produced test "+num_el+"</td></tr><tr><td colspan='2'><input type='text' name='name' id='name' placeholder='Name of assay'/></td></tr><tr><td><label for='W_PS'>Which PS</label></td> <td><input type='text' name='W_PS' id='W_PS' /></td></tr><tr><td><label for='Cat_num'>Catalog #</label></td> <td><input type='text' name='Cat_num' id='Cat_num' /></td></tr><tr><td><label for='Vpm_av'>Volume per month av.</label></td> <td><input type='text' name='Vpm_av' id='Vpm_av' /></td></tr><tr><td><label for='Analizer'>Analizer</label></td> <td><input type='text' name='Analizer' id='Analizer' /></td></tr><tr><td><input type='submit' name='ins' value='Confirm'/><input type='reset' value='Clear'/></td></tr></table></fieldset></form></td>";
										first.insertAdjacentHTML('beforeEnd', num_0);
										num_el++;
									}
									else if (num_el%3 == 1)
									{
										var num_1 = "<td><form method = 'POST' action='LoT_w.php'><fieldset style='heigth:200px;width:300px;'><table><tr><td colspan='2'>The produced test "+num_el+"</td></tr><tr><td colspan='2'><input type='text' name='name' id='name' placeholder='Name of assay'/></td></tr><tr><td><label for='W_PS'>Which PS</label></td> <td><input type='text' name='W_PS' id='W_PS' /></td></tr><tr><td><label for='Cat_num'>Catalog #</label></td> <td><input type='text' name='Cat_num' id='Cat_num' /></td></tr><tr><td><label for='Vpm_av'>Volume per month av.</label></td> <td><input type='text' name='Vpm_av' id='Vpm_av' /></td></tr><tr><td><label for='Analizer'>Analizer</label></td> <td><input type='text' name='Analizer' id='Analizer' /></td></tr><tr><td><input type='submit' name='ins' value='Confirm'/><input type='reset' value='Clear'/></td></tr></table></fieldset></form></td>";
										first.insertAdjacentHTML('beforeEnd', num_1);
										num_el++;
									}
									else if (num_el%3 == 2)
									{
										var num_2 = "<td><form method = 'POST' action='LoT_w.php'><fieldset style='heigth:200px;width:300px;'><table><tr><td colspan='2'>The produced test "+num_el+"</td></tr><tr><td colspan='2'><input type='text' name='name' id='name' placeholder='Name of assay'/></td></tr><tr><td><label for='W_PS'>Which PS</label></td> <td><input type='text' name='W_PS' id='W_PS' /></td></tr><tr><td><label for='Cat_num'>Catalog #</label></td> <td><input type='text' name='Cat_num' id='Cat_num' /></td></tr><tr><td><label for='Vpm_av'>Volume per month av.</label></td> <td><input type='text' name='Vpm_av' id='Vpm_av' /></td></tr><tr><td><label for='Analizer'>Analizer</label></td> <td><input type='text' name='Analizer' id='Analizer' /></td></tr><tr><td><input type='submit' name='ins' value='Confirm'/><input type='reset' value='Clear'/></td></tr></table></fieldset></form></td>";
										first.insertAdjacentHTML('beforeEnd', num_2);
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
								echo "<td><form method = 'POST' action='LoT_w.php'><fieldset style='heigth:200px;width:300px;'><table><tr>";
								echo "<td colspan='2'>The produced test $i </td></tr>";
								echo "<tr><input type='hidden' name='id_t' id='id_t' value='$row[0]'/></tr>";
								echo "<tr><td colspan='2'><input type='text' name='name' id='name' placeholder='Name of assay' value='$row[3]'/></td></tr>";
								echo "<tr><td><label for='W_PS'>Which PS</label></td> <td><input type='text' name='W_PS' id='W_PS' value='$row[2]' /></td></tr>";
								echo "<tr><td><label for='Cat_num'>Catalog #</label></td> <td><input type='text' name='Cat_num' id='Cat_num' value='$row[4]' /></td></tr>";
								echo "<tr><td><label for='Vpm_av'>Volume per month av.</label></td><td><input type='text' name='Vpm_av' id='Vpm_av' value='$row[5]'/></td></tr>";
								echo "<tr><td><label for='Analizer'>Analizer</label></td> <td><input type='text' name='Analizer' id='Analizer' value='$row[6]' /></td></tr>";
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
