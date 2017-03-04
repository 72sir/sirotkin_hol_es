<div id="lista">
<!--
------------- Грузим редактор статей по пользователю
-->
<ul>



<?php if(!isset($_SESSION["session_username"])) {} else {
	
	$login = $_SESSION['session_username'];

	// ВЫВОДИМ ИД ПОЛЬЗОВАТЕЛЯ ПО ЛОГИНУ ИЗ USERTBL
	$select = "SELECT * FROM `usertbl` where `email`= '$login';";
	$row = DB::prepare($select)->execute()->fetch();
	$id_f = $row['id'];
	
	// ВЫВОДИМ СУММУ ВСЕХ ЗАПИСЕЙ ПО ЛОГИНУ
	$select = "SELECT count(description) as result_count FROM `stat` where `id_login`= '$id_f';";
	$row = DB::prepare($select)->execute()->fetch();
	$result_count = $row['result_count'];	
}; 
	
	
if ($result_count > 0){
	echo("<li>");
	echo ("<a href=index.php?t=log&id=$id_f>");
	echo ("<set>");			
	echo ($result_count);
	echo("</set><br><setint>Редактор</setint></a></li>");
}?>

<!--
------------- Грузим Вход/Выход по пользователю
-->

<?php if(!isset($_SESSION["session_username"])) {?>	

	<li><a href =<? echo("?t=login"); ?>><p>Вход</p></a></li>
<?php	} else {	?>

	<li>
		<a href=<? echo(DESTROY); ?>>
		<set><?php echo $_SESSION['session_username'];?></set><br>
		<setint>BЫЙТИ</setint>		
		</a>
	</li>
<?php	 //session_destroy();

	};  ?>

	<!--li><a href="index.php?post=php/php_Literat.php"><p>Information</p></a></li-->
	
	<li>
	
	<!--Поиск<br /><input type="hind" name="hind" id="hind" class="input" value="" size="32" />-->
	
	<form name="search" method="post" action="?t=search">
		<input type="search" name="query" placeholder="Поиск">
		<button type="submit">Найти</button> 
	</form>
	&nbsp;
	</li>
	<li><a href="?id=115&t=stat"><p>О сайте</p></a></li>
	<li><a href="?t=sql"><p>SQLite</p></a></li>
	<!--li><a href="index.php">Android</a></li-->
	<li><a href="/"><p>Android</p></a></li>
	<li><a href="/django/index.html"><p>Django</p></a></li>
	<li>
	</li>
</ul>
</div>