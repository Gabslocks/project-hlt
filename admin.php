<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="a_style.css" rel="stylesheet">
        <title>Admin</title>
    </head>
    <body>
		<?php require_once 'connect.php';
		mysqli_query($link, "SET NAMES utf8");
		mysqli_query($link, "SET CHARACTER utf8");
		mysqli_query($link, "SET character_set_client = utf8");
		mysqli_query($link, "SET character_set_connection = utf8");
		mysqli_query($link, "SET character_set_results = utf8");
			?>
	
	
        <div id="header">
           
			<nav>
			    <ul>
			        <li><a href="admin.php?level=0">Users</a></li>
                    <li><a href="admin.php?level=1">PS</a></li>
                    <li><a href="admin.php?level=2">BCP</a></li>
                    <li><a href="admin.php?level=3">IT Dep</a></li>
					<li><a href="admin.php?level=4">List of sys</a></li>
                    <li><a href="admin.php?level=5">List of test</a></li>
                    <li><a href="logout.php" >Выход</a></li>
			    </ul>
			</nav>  
        </div>
		 
          
        <div class="wrapper">
         
            <div id="article">             
                <?php         
				if ($_GET['level']==0) //отображение пользователей
				{	
					$query ="SELECT * FROM user";				 
					$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 					
					$row=mysqli_num_rows($result);
					if($result)
					{
						//$rows = mysqli_num_rows($result); // количество полученных строк
						echo '<form method="POST" action="ad_w.php">
						<p><select name="list[]" size="15"  required >';	 
						
						for($i=0; $i<$row; ++$i)
						{
							$arr=mysqli_fetch_array($result);
							
						echo '<option value="'.$arr[0].'~'.$arr[1].'~'.$arr[2].'~'.$arr[3].'~'.$arr[4].'~'.$arr[5].'~'.$arr[6].'">ID: '.$arr[0].', login: '.$arr[1].', password: '.$arr[2].', mail: '.$arr[3].', number PS: '.$arr[4].', number BCP: '.$arr[5].', role: '.$arr[6].'</option>';
							
						}
						
						echo "</select></p>
						<p><input type='submit' name='check_ps' value='PS'/>
						<input type='submit' name='check_bcp' value='BCP'/>
						<input type='submit' name='check_IT' value='ID Dep'/></p> 
						
						<p><input type='submit' name='check_los' value='LoS'/>
						<input type='submit' name='check_lot' value='LoT'/>
						<input type='submit' name='delete' value='Delete'/></p></form>";
						mysqli_free_result($result);
					}
				}
				if ($_GET['level']==1) //PS пользователя
				{	
					
						$query ="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='PS';";
						$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
						$PS_find ="SELECT * FROM `PS`";
						
						$result1 = mysqli_query($link, $PS_find) or die("Ошибка " . mysqli_error($link)); 
						if($result)
						{
							$rows = mysqli_num_rows($result); // количество полученных строк
							$rows1 = mysqli_num_rows($result1); // количество полученных строк
							echo "<table><tbody>";
							echo "<tr><td>ID</td>";
							
							$row = mysqli_fetch_row($result);
	
							for ($i = 0 ; $i < $rows-1; $i++)
							{
								$row = mysqli_fetch_row($result);
								echo "<td>$row[0]</td>";
							}
							echo "</tr>";
							for ($i = 0 ; $i < $rows1 ; ++$i)
							{
								$row1 = mysqli_fetch_row($result1);
								echo "<tr>";
									for ($j = 0 ; $j < $rows; ++$j) echo  "<td>$row1[$j]</td>";
								echo "</tr>";
							}
							echo "</tbody></table>";
							 
							// очищаем результат
							mysqli_free_result($result);
							mysqli_free_result($result1);
						}	
				}
				if ($_GET['level']==2) //Bcp пользователя
				{	
					$query ="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='BCP';";
						$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
						$PS_find ="SELECT * FROM `BCP`";
						
						$result1 = mysqli_query($link, $PS_find) or die("Ошибка " . mysqli_error($link)); 
						if($result)
						{
							$rows = mysqli_num_rows($result); // количество полученных строк
							$rows1 = mysqli_num_rows($result1); // количество полученных строк
							echo "<table><tbody>";
							echo "<tr><td>ID</td>";
							
							$row = mysqli_fetch_row($result);
	
							for ($i = 0 ; $i < $rows-1; $i++)
							{
								$row = mysqli_fetch_row($result);
								echo "<td>$row[0]</td>";
							}
							echo "</tr>";
							for ($i = 0 ; $i < $rows1 ; ++$i)
							{
								$row1 = mysqli_fetch_row($result1);
								echo "<tr>";
									for ($j = 0 ; $j < $rows; ++$j) echo  "<td>$row1[$j]</td>";
								echo "</tr>";
							}
							echo "</tbody></table>";
							 
							// очищаем результат
							mysqli_free_result($result);
							mysqli_free_result($result1);
						}	
				}
				if ($_GET['level']==3) //IT Dep пользователя
				{	
					$query ="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='IT_DM';";
						$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
						$PS_find ="SELECT * FROM `IT_DM`";
						
						$result1 = mysqli_query($link, $PS_find) or die("Ошибка " . mysqli_error($link)); 
						if($result)
						{
							$rows = mysqli_num_rows($result); // количество полученных строк
							$rows1 = mysqli_num_rows($result1); // количество полученных строк
							echo "<table><tbody>";
							echo "<tr><td>ID</td>";
							
							$row = mysqli_fetch_row($result);
	
							for ($i = 0 ; $i < $rows-1; $i++)
							{
								$row = mysqli_fetch_row($result);
								echo "<td>$row[0]</td>";
							}
							echo "</tr>";
							for ($i = 0 ; $i < $rows1 ; ++$i)
							{
								$row1 = mysqli_fetch_row($result1);
								echo "<tr>";
									for ($j = 0 ; $j < $rows ; ++$j) echo  "<td>$row1[$j]</td>";
								echo "</tr>";
							}
							echo "</tbody></table>";
							 
							// очищаем результат
							mysqli_free_result($result);
							mysqli_free_result($result1);
						}	
				}
				if ($_GET['level']==4) //Системы пользователя 
				{	
					$query ="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='ListOfSys';";
						$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
						$PS_find ="SELECT * FROM `ListOfSys`";
						
						$result1 = mysqli_query($link, $PS_find) or die("Ошибка " . mysqli_error($link)); 
						if($result)
						{
							$rows = mysqli_num_rows($result); // количество полученных строк
							$rows1 = mysqli_num_rows($result1); // количество полученных строк
							echo "<table><tbody>";
							echo "<tr><td>ID</td>";
							
							$row = mysqli_fetch_row($result);
	
							for ($i = 0 ; $i < $rows-1; $i++)
							{
								$row = mysqli_fetch_row($result);
								echo "<td>$row[0]</td>";
							}
							echo "</tr>";
							for ($i = 0 ; $i < $rows1 ; ++$i)
							{
								$row1 = mysqli_fetch_row($result1);
								echo "<tr>";
									for ($j = 0 ; $j < $rows ; ++$j) echo  "<td>$row1[$j]</td>";
								echo "</tr>";
							}
							echo "</tbody></table>";
							 
							// очищаем результат
							mysqli_free_result($result);
							mysqli_free_result($result1);
						}	
				}
				if ($_GET['level']==5) // тесты пользователя
				{	
					$query ="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='Tests';";
						$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
						$PS_find ="SELECT * FROM `Tests`";
						
						$result1 = mysqli_query($link, $PS_find) or die("Ошибка " . mysqli_error($link)); 
						if($result)
						{
							$rows = mysqli_num_rows($result); // количество полученных строк
							$rows1 = mysqli_num_rows($result1); // количество полученных строк
							echo "<table><tbody>";
							echo "<tr><td>ID</td>";
							
							$row = mysqli_fetch_row($result);
	
							for ($i = 0 ; $i < $rows-1 ; $i++)
							{
								$row = mysqli_fetch_row($result);
								echo "<td>$row[0]</td>";
							}
							echo "</tr>";
							for ($i = 0 ; $i < $rows1 ; ++$i)
							{
								$row1 = mysqli_fetch_row($result1);
								echo "<tr>";
									for ($j = 0 ; $j < $rows ; ++$j) echo  "<td>$row1[$j]</td>";
								echo "</tr>";
							}
							echo "</tbody></table>";
							 
							// очищаем результат
							mysqli_free_result($result);
							mysqli_free_result($result1);
						}	
				}
				?>
			</div>
		</div>
		
        <div id="footer">
            <p>contact: vup.rum@mail.ru</p>
            <p>Roflan developer, 2018</p>
        </div>
    </body>
</html>
<?php

?>
