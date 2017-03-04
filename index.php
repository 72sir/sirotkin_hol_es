<?php
	$author = "Сироткин Александр";
	$copyright = "Все права принадлежат Александру Сироткину";
	
	header("Content-Type: text/html; charset=utf-8");
	session_start();
	include 'includes/SQL/db_connect.php';
	/* Установка внутренней кодировки в UTF-8 */
	mb_internal_encoding("UTF-8");
	
	include BESTPDO; 

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
	
// title выводим данные для информации о станице
if (($TABLE_get == null)&&($ID_get == null)){
	$select_title = 'SELECT * FROM `stat` ORDER BY `id`';	
	
	$stmt = $conn->prepare($select_title);
	$stmt->execute(array('id' => $id));
	$result = $stmt->fetchAll();
	$title = "Изучаем программирование на андроид устройства простыми примерами. Бесплатные уроки, примеры, описания и код в доступном виде ждет Вас на нашем сайте. " ;
	$title_description = "Изучаем программирование на андроид устройства простыми примерами. Бесплатные уроки, примеры, описания и код в доступном виде ждет Вас на нашем сайте. ";
	
	foreach($result as $row) {$title = $title . " " . $row['information'];}
	
} else

//ВЫВОДИМ КОД ПО ТАБЛИЦЕ И ИД 
if (($TABLE_get != null)&&($ID_get != null)){
	switch ($TABLE_get) {
		case 'stat':
			$select_title_edit = "SELECT * FROM `stat` where `id`= $ID_get";
			
			$row = DB::prepare($select_title_edit)->execute()->fetch();
	
			$title = $row['description'];
			$title_description = $row['name']." Приятного просмотра Вам!";
		break;
		
		case 'code':
			$select_title_edit = "SELECT * FROM `code` where `id`= $ID_get";
			
			$row = DB::prepare($select_title_edit)->execute()->fetch();
	
			$title = $row['description'];
			$title_description = $row['name']." Приятного просмотра Вам!";
		break;
		
		case 'log':
			$select_log_title = "SELECT * FROM `stat` WHERE id_login = '$ID_get'";				
			$row = DB::prepare($select_log_title)->execute()->fetch();
			$title_description = "Ваши статьи для редактирования:  " . $row['information'];
			$title = $row['description'];
		break;
		
		case 'edit':
			//$title =  "Вы зашли в редактор статей";	
			//$title_description = "Вы зашли в редактор статей";			
		break;
		
		default;
			$title_description = "Ошибка запроса.";
			$title =  "Ошибка запроса.";
		break;		
	}
} 	else 
	if (($TABLE_get != NULL)&&($ID_get == null)){
	switch ($TABLE_get) {
		case 'sql':
			$select_product_title = 'SELECT * FROM `stat`  WHERE `version` = "SQL" ORDER BY `id`';	
			$stmt = $conn->prepare($select_product_title);
			$stmt->execute(array('id' => $id));
			$result = $stmt->fetchAll();
		
			foreach($result as $row) {$var = $var . " " . $row['information'];}
		
			$title = "Изучаем программирование на андроид устройства простыми примерами. Бесплатные уроки, примеры, описания и код в доступном виде ждет Вас на нашем сайте. ".$var;
			$title_description = $title ;
		break;
		case 'login':		
			$title_description = "Войдите на сайт как пользователь что бы бесплатно скачивать примеры для программирования.";
			$title = "Войдите на сайт как пользователь что бы бесплатно скачивать примеры для программирования.";
		break;
		case 'register':			
			$title_description = "Зарегистрируйтесь на сайте как пользователь что бы бесплатно скачивать примеры для программирования.";
			$title =  "Зарегистрируйтесь на сайте как пользователь что бы бесплатно скачивать примеры для программирования.";
		break;
		case 'search':
			$title_description = "Поиск на сайте Sirotkin.hol.es";
			$title =  "Поиск на сайте Sirotkin.hol.es";
		break;
		default;
			$title_description = "Ошибка запроса.";
			$title =  "Ошибка запроса.";
		break;	

	};
	}
$var = null;
	
if ($title != null){
	$title = trim($title); 	
	$title = htmlspecialchars($title);
} else {$title =  "Добро пожаловать на сайт! Программируйте с легкостью в свое Удовольствие!";};	

if ($title_description != null){
	$title_description = trim($title_description); 	
	$title_description = htmlspecialchars($title_description);
} else {$title_description =  "Добро пожаловать на сайт! Программируйте с легкостью в свое Удовольствие!";};
?>
<!--?php session_destroy();?-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
  <head>
	<?include META_LINKS;?>
	
	<title><?echo($title_description);?></title>
	
</head>

<body>
	<script src="highlighter/prettify.js"></script> 
	
	
	<? include "indexacia/mail.php";?>
	
	<? include MENY;?>
	
	
<div id="stranka">
<div id="obsah" align="justify">
	
<?php 

	
// Выводим основное меню всех записей //get_all_products_2.php
if (($TABLE_get == null)&&($ID_get == null)){	

	echo("<center><img src='icon/header.png' class='imgTiosticon'>");
	$select_product = 'SELECT * FROM `stat`  WHERE `version` = "AlexandrKlimov" ORDER BY `id`';	
	
	include PRODUCT;
	
	$select_product = 'SELECT * FROM `stat`  WHERE `version` = "SQL" ORDER BY `id`';	
	
	include PRODUCT;
	
	$select_product = 'SELECT * FROM `stat`  WHERE `version` = "AlexandrSirotkin" ORDER BY `id`';	
	
	include PRODUCT;
		
	$select_product = 'SELECT * FROM `stat`  WHERE `version` != "AlexandrSirotkin" && `version` != "SQL" && `version` != "AlexandrKlimov"   ORDER BY `id`';	
	
	include PRODUCT;
} else
//ВЫВОДИМ КОД ПО ТАБЛИЦЕ И ИД 
if (($TABLE_get != null)&&($ID_get != null)){
	switch ($TABLE_get) {
		case 'Django':
			//echo "i равно 0";
			$select = "SELECT * FROM `Django`";
		break;
		
		case 'stat':
			//echo "i равно 0";
			$select = "SELECT * FROM `stat` where `id`= $ID_get";
		break;
		
		case 'code':
			//echo "i равно 0";
			$select = "SELECT * FROM `code` where `id`= $ID_get";
		break;
		
		case 'code':
			//echo "i равно 0";
			$select = "SELECT * FROM `code` where `id`= $ID_get";
		break;

		case 'log':
			//echo "i равно 0";
			$url_f = null;
			$select_product = "SELECT * FROM `stat` WHERE id_login = '$ID_get'";	
			$edit_text = $ID_get;
			include PRODUCT;	
			$edit_text = null; 
		break;
		
		case 'edit':
			//echo "Вы зашли в редактор статьи - $ID_get";
			$select_edit = "SELECT * FROM `stat` WHERE id = $ID_get";
			include EDIT;
			//$select = NULL;
			//$edit_text = null; 
		break;
		
		default;
			echo 'Ошибка запроса.';
		break;		
	}
	
	// Заголовок и ссылка на скачку файлов в уроке
	$row = DB::prepare($select)->execute()->fetch();
	$var = $row['description'];
	$url_f = $row['id_files'] ;
	
	$sql   = "SELECT * from `files` where `id`='$url_f';";

	echo($count['id_files']);
	
	/**
	*Делаем выборку из таблицы code имеется ли там код на данный урок
	**/
	
if ($row['id_files']  != null)
{
	$url_f = $row['id_files'] ;
	$sql   = "SELECT * from `files` where `id`='$url_f';";
	$count_files = DB::prepare($sql)->execute()->fetch();
	$title = $row['information'];	

	if(!isset($_SESSION["session_username"])){$url_f  = "?t=login";} else {$url_f = $count_files['url'];}			

	include SAVEFILES;	

	} else {
	$title = $row['information'];
	echo("<pts><center>$title</center></pts>");
	echo("<div class='separator'>&nbsp;</div>");
}
echo $var; } else 
	if (($TABLE_get != NULL)&&($ID_get == null)){
		switch ($TABLE_get) {
			case 'sql':
				//$select_product ="SELECT * FROM `stat` WHERE `description` LIKE '%sql%'";
				$select_product = 'SELECT * FROM `stat`  WHERE `version` = "SQL" ORDER BY `id`';
				include PRODUCT;	
			break;
			case 'login':			
				include LOGIN;	
			break;
			case 'register':			
				include REGISTER;	
			break;
			// Header делаем поиск по базе данных
			case 'search':			
				$query = $_POST['query'];
				$query = trim($query); 	
				$query = htmlspecialchars($query);
		
				if (!empty($query)){ 
					if (strlen($query) < 3) {
						$text = 'Слишком короткий поисковый запрос.';
					} else if (strlen($query) > 128) {
						$text = 'Слишком длинный поисковый запрос.';
					} else { 
						$select_product ="SELECT * FROM `stat` WHERE `description` LIKE '%$query%'";	
						include PRODUCT;
					}
				}		
			break;
			default;
				echo 'Ошибка запроса.';
			break;
		};
	}

?>
</div>

	<? include FOOTER;?>
	<br><br>
	<? include "indexacia/mail_logo.php";?>
	<? //include "indexacia/vk_web_group.php";?>
	<br>
</div>
<script src="highlighter/prettify.js"></script>
<script>prettyPrint();</script>
</body>
</html>
