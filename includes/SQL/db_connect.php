<?php

	require 'db_config.php';
	
	$host = HOST;
	$dbname = DBNAME;	
	
	// ��������� �� ������ �����������
	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname", USERNAME, PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	
	catch(PDOException $e) {	echo 'ERROR: ' . $e->getMessage();	}
 
?>