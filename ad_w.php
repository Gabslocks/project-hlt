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
		<?php 
		require_once 'connect.php';
		mysqli_query($link, "SET NAMES utf8");
		mysqli_query($link, "SET CHARACTER utf8");
		mysqli_query($link, "SET character_set_client = utf8");
		mysqli_query($link, "SET character_set_connection = utf8");
		mysqli_query($link, "SET character_set_results = utf8");   
		
		$arr=$_POST['list'];
		for ($i=0; $i<count($arr); $i++)
		{
		$masword=explode("~", $arr[$i]);
		$ID_us=$masword[0];;
		$login=$masword[1];
		$password=$masword[2];
		$mail=$masword[3];
		$num_ps=$masword[4];
		$num_bcp=$masword[5];
		$role=$masword[6];	
		}
	
		?>
	
	
        <div id="header">
           
			<nav>
			    <ul>
			        <li><a href="admin.php?level=0" >Back</a></li>
					<li><a href="logout.php" >Logout</a></li>
			    </ul>
			</nav>  
        </div>
		 
          
        <div class="wrapper">
         
            <div id="article">             
                <?php         
				if (isset($_POST['check_ps'])) //отображение пользователей
				{	
					$query ="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='PS';";
						$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
						$PS_find ="SELECT * FROM `PS` WHERE `ID_user`='$ID_us'";
						
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
				if (isset($_POST['check_bcp'])) //Bcp пользователя
				{	
					$query ="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='BCP';";
						$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
						$PS_find ="SELECT * FROM `BCP`  WHERE `ID_pers`='$ID_us'";
						
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
				if (isset($_POST['check_IT'])) //IT Dep пользователя
				{	
					$query ="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='IT_DM';";
						$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
						$PS_find ="SELECT * FROM `IT_DM`  WHERE `ID_user`='$ID_us'";
						
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
				if (isset($_POST['check_los'])) //Системы пользователя 
				{	
					$query ="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='ListOfSys';";
						$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
						$PS_find ="SELECT * FROM `ListOfSys`  WHERE `ID_pers`='$ID_us'";
						
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
				if (isset($_POST['check_lot'])) // тесты пользователя
				{	
					$query ="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='Tests';";
						$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
						$PS_find ="SELECT * FROM `Tests` WHERE `ID_user`='$ID_us'";
						
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
				if (isset($_POST['delete'])) // тесты пользователя
				{	
				
							echo "In progress";
							
							
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
