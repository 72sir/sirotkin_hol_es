<?php
	header("Content-Type: text/html; charset=utf-8");
	session_start();
	include 'includes/SQL/db_connect.php';
	mb_internal_encoding("UTF-8");
	
	$title =  "Вы зашли в редактор статей";	
	$title_description = "Вы зашли в редактор статей";			
	
	$author = "Сироткин Александр";
	$copyright = "Все права принадлежат Александру Сироткину";
?>

<!--?php session_destroy();?-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
  <head>
	<?include BESTPDO; ?>
	<?include META_LINKS;?>
	
	
	<link href="logout/css/style.css" media="screen" rel="stylesheet">
	<link href='' rel='stylesheet' type='text/css'>
	
	<script type="text/javascript" src="http://vk.com/js/api/share.js?90" charset="windows-1251"></script>
	
	<title><?echo($title_description);?></title>
</head>

<body>
<center><table border="2" width='100%' height='100%'><tr><td> 
<?php

if ($_GET['id'] != null){
	$ID_get = $_GET['id'];
	$ID_get = trim($ID_get); 	
	$ID_get = htmlspecialchars($ID_get);
};	

if ($_GET['t'] != null){
	$TABLE_get = $_GET['t'];
	$TABLE_get = trim($TABLE_get); 	
	$TABLE_get = htmlspecialchars($TABLE_get);
};		

 if(isset($_SESSION["session_username"])) {
	$login = $_SESSION['session_username'];
	
	$select = "SELECT * FROM `usertbl` where `email`= '$login';";
	$row = DB::prepare($select)->execute()->fetch();
	$id_login_edit_usertbl = $row['id'];
	
	$select = "SELECT * FROM `stat` WHERE id = $ID_get";
	//echo($select);
	$row = DB::prepare($select)->execute()->fetch();
	$id_login_edit_stat = $row['id_login'];	
	
	if ($id_login_edit_stat == $id_login_edit_usertbl){
		if (($TABLE_get != null)&&($ID_get != null)){
			switch ($TABLE_get) {
				case 'edit':
					$select_edit = "SELECT * FROM `stat` WHERE id = $ID_get";	
				break;
				default;
					echo 'Ошибка запроса.';
				break;		
			}
	
			$row = DB::prepare($select_edit)->execute()->fetch();
			$var = $row['description'];
		}

		if(isset($_POST["register"])){
			if (!empty($_POST['code'])) {
				$code=$_POST['code'];
				$select_edit = "UPDATE `stat` SET `id` =  $ID_get, `description` = '".$code."' WHERE `description` =  '".$var."'";
		
				$conn->prepare($select_edit)->execute();
		
				$select_edit = "SELECT * FROM `stat` WHERE id = $ID_get";	
			
				$row = DB::prepare($select_edit)->execute()->fetch();
		
				$var = $row['description'];
		
			}
		}
	
		?>	
		</td></tr></table></center>
		<br>
		<center>
			<form name="registerform" id="registerform" action="edit.php?t=<? echo ("$TABLE_get&id=$ID_get");?>" method="post">
				<textarea name="code" class="input"  id="code" ROWS="42" COLS="185" /><? echo ($var);?></textarea>
				<br><br>
				<p class="submit">
					<input type="submit" name="register" class="button"  id="register" value="Сохранить" />
				</p>
			</form>
		</center>	
		<?	
	
	
	
	}	else {echo("Данные введены не верно");}	
} else {echo("Данные введены не верно");}	
?>	
</body>
</html>