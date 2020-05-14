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
            <h1>Before audit</h1>
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
                          

					<?php require_once 'connect.php';  
						$query ="SELECT * FROM user"; 
							//$_SESSION['session_username'];
						$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
						if($result)
						{
							$rows = mysqli_num_rows($result); // количество полученных строк
							for ($i = 0 ; $i < $rows ; ++$i)
							{
								$row = mysqli_fetch_row($result);
								{
									if ($row[1]==$_SESSION['session_username'])
									{
										$num_PS=$row[4];
										$num_BCP=$row[5];
									}
								}
							}							 
							// очищаем результат
							mysqli_free_result($result);
						}
						$id_pers=$_SESSION['session_id_us'];
						$query ="SELECT `ID_PS`, `ID_user`, `name_PS`, `Routine_PS_per`, `Urgent_PS_per`, `ProdLoc_PS_per`, `InsInt_PS_per`, `InsExt_PS_per`, `Outsource_PS_per` FROM `PS` WHERE `ID_user` =  $id_pers";
						$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
						if($result)
						{
							$rows = mysqli_num_rows($result); // количество полученных строк
					?>      		
					
					<table>
						<?php 		
							if (($rows == NULL)) {
								echo "<tr id='row_0'></tr>";}
							for ($i = 0 ; $i < $rows ; ++$i)
							{
								$rem=intdiv($i,3);
							if ($i%3 == 0) {echo "<tr id='row_$rem'>";}
						
							
								$row = mysqli_fetch_row($result);
								
								echo "<td><form method = 'POST' action = 'Main_up.php'> <fieldset style='heigth:200px;width:10px;'><table>";
								echo "<tr><input type='hidden' name='id_p' id='id_p' value='$row[0]'/></tr>";
								echo "<tr><td colspan='2'><input type='text' name='name_ps' id='name_ps' value='$row[2]' placeholder='Name'/></td></tr>";
								echo "<tr><td><label for='routine'>routine</label></td> <td><input type='text' name='routine' id='routine' value='$row[3]' /></td></tr>";
								echo "<tr><td><label for='urgent'>urgent</label></td> <td><input type='text' name='urgent' id='urgent' value='$row[4]'/></td></tr>";
								echo "<tr><td><label for='pl'>priduced locally</label></td> <td><input type='text' name='pl' id='pl' value='$row[5]' /></td></tr>";
								echo "<tr><td><label for='ii'>insourced internally</label></td> <td><input type='text' name='ii' id='ii' value='$row[6]'/></td></tr>";
								echo "<tr><td><label for='ie'>insourced externally</label></td> <td><input type='text' name='ie' id='ie' value='$row[7]'/></td></tr>";
								echo "<tr><td><label for='outsource'>outsource</label></td> <td><input type='text' name='outsource' id='outsource' value='$row[8]'/></td></tr>";
								echo "<tr><td><input type='submit' name='update_ps' value='Update'/></td></tr></table></fieldset></form></td>";
					
								
							if ($i%3 == 2) {echo "</tr>";}
							if (($i%3 == 2)&&($i==$rows-1)) {$rem++;
								echo "<tr id='row_$rem'></tr>";}
							
							}
							
							 
							// очищаем результат
							mysqli_free_result($result);
						}

					?>
					
				</table>
					
					
					<?php 
						
						$query ="SELECT `ID_BCP`, `ID_pers`, `Main_PS`, `Req_per_day`, `Max_dur` FROM `BCP` WHERE  `ID_pers` =  $id_pers";
						$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
						if($result)
						{
							$rows = mysqli_num_rows($result); // количество полученных строк
					?>      		
					
				<table>
						<?php 		
							if (($rows == NULL)) {
								echo "<tr id='row_0'></tr>";}
							for ($i = 0 ; $i < $rows ; ++$i)
							{
								$rem=intdiv($i,3);
							if ($i%3 == 0) {echo "<tr id='row_$rem'>";}
						
							
								$row = mysqli_fetch_row($result);
								$j = $i + 1;
								echo "<td><form method = 'POST' action = 'Main_up.php'><fieldset style='heigth:200px;width:10px;'><table><tr><td colspan='2'>$j BCP</td></tr>";
								echo "<tr><input type='hidden' name='id_bcp' id='id_bcp' value='$row[0]'/></tr>";
								echo "<tr><td><label for='BCP_lin'>This BCP linked to PS #</label></td> <td><input type='text' name='BCP_lin' id='BCP_lin' value = '$row[2]' /></td></tr>";
								echo "<tr><td><label for='req_per_day'>Requests per day per</label></td> <td><input type='req_per_day' name='req_per_day' id='req_per_day' value = '$row[3]' /></td></tr>";
								echo "<tr><td><label for='max_dur'>Maximum logistics duration, km</label></td> <td><input type='max_dur' name='max_dur' id='max_dur' value = '$row[4]' /></td></tr>";
								echo "<tr><td><input type='submit' name='update_bcp' value='Update'/></td></tr></table></fieldset></form></td>";
					
								
							if ($i%3 == 2) {echo "</tr>";}
							if (($i%3 == 2)&&($i==$rows-1)) {$rem++;
								echo "<tr id='row_$rem'></tr>";}
							
							}
							
							 
							// очищаем результат
							mysqli_free_result($result);
						}

					?>

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
mysqli_close($link);
?>
