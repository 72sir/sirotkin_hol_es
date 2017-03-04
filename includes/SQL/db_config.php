<?php	
	define('DB_HOST', 'localhost');
	//define('DB_HOST', 'localhost');
	define('DB_NAME', 'u291736931_wordp');
	define('DB_USER', 'u291736931_wordp');
	define('DB_PASS', 'A4qYoCeri1');
	define('DB_CHAR', 'utf8');
	
	define("USERNAME","u291736931_wordp" );
	define("PASSWORD","A4qYoCeri1" );
	//define("HOST","mysql.hostinger.ru" );
	define("HOST","localhost" );
	define("DBNAME","u291736931_wordp" );

	
	$stroka_SQL = "includes/SQL";
	define("SELECT","$stroka_SQL/select.php" );
	define("BESTPDO","$stroka_SQL/bestpdo.php" );
	define("PRODUCT","$stroka_SQL/get_all_products_2.php" );
	define("DBCONNECT","$stroka_SQL/db_connect.php" );
	define("SAVEFILES","$stroka_SQL/99_ishodniki.php" );
	define("FOOTER","$stroka_SQL/footer.php" );
	define("MENY","$stroka_SQL/meny.php" );
	define("META_LINKS","$stroka_SQL/meta_links.php" );
	define("EDIT","$stroka_SQL/edit.php" );
	
	
	$stroka_logout = "includes/logout";
	define("LOGIN", "$stroka_logout/login.php" );
	define("DESTROY","$stroka_logout/destroy.php" );
	define("REGISTER","$stroka_logout/register.php" );
	
?>