
<br>
<?php

$response = array();
$j = 0;
$urlg = "img/img_WrGallery/gallery_custom.gif";
 
	
	$stmt = $conn->prepare($select_product);
	$stmt->execute(array('id' => $id));
	$result = $stmt->fetchAll();
	
	if ( count($result) ) {
	
	echo "<center>";	
		
	echo "<table border='1'>";	
	
	if ( count($result) ) {	
	$response["products"] = array();
    echo "<tr>";

	foreach($result as $row) {

		//echo $row[4];
			if ($row['id_files'] != null){
				
				$id_row = $row['id_files'];
				$id_code = $row['id_code'];
				$id_index_table = $row['id'];
				
				$sql   = "SELECT * from `files` where `id` = $id_row";
				$id_db_1=$id_row;
				$count = DB::prepare($sql)->execute()->fetch();			
				
				$sql  = "SELECT * from `code` where `id`= $id_code"; ///index.php?post=php/php_activity.php
				$count_code = DB::prepare($sql)->execute()->fetch();
			
				if ($id_code!= null){$code_stroka = 'Koд';} else {$code_stroka = null;}
	
				if(isset($_SESSION["session_username"])) {
					$url_f = $count['url'] ; 
					$code_id = $count_code['id'];
					$code_url =  "?id=$code_id&t=code" ;
				
					//$url_f = $url_f;
				} else {
					$url_f = "?t=login" ; 
					$code_url = "?t=login" ; 
				}
			}			
			
			$row_id = $row['id'];
			$row_img = $row['img'];
			$row_name = $row['name'];
			
			echo "<td>";/*?id_db=$id_db_1&url=$row[1]*/
			echo "<a href='?t=stat&id=$row_id'>";
			echo "<div  id='Tiot'>";
			echo "<center>";
			echo "<klg>$row_name</klg>";
			echo "<img src = '$row_img' class='imgTiost' alt='Перейти на $row_name' >" ;
			echo "</center><mal_pr><br></mal_pr>";
			
			if($url_f != null){
				echo "
				<center>
				<table border=0 width='92%'>
				<tr><td><a href=' $code_url'><mal_pr><div align='left'>$code_stroka</mal_pr></div></a></td>
				<td>
				<a href=' $url_f'><mal_pr><div align='right'>Скачать пример</mal_pr></div></a>
				</td></td></table>
				</center>
				";  
				$url_f = null; 
			}
			
			if($edit_text != null){
				echo "<center><table border=0 width='92%'><tr><td><a href='edit.php?t=edit&id=$row_id'><mal_pr><div align='right'>Редактировать статью</mal_pr></div></a></td></td></table></center>";  
				
			}
			
			echo "</div>";
			echo "</a>"	;
			echo "</td>";
		
		if($j == 3){echo "</tr>";echo "<tr>"; $j = -1;}
		$j++;
	}
	if ($j != 0 ){
		while($j < 4){
			
			echo "<td>";
			echo "<a href=''>";
			echo "		<div  id='Tiot'>";
				echo "<center>";
			echo "&nbsp;";
			
		
			echo "</center>";
			echo "</div>";
			echo "</a>"	;
			echo "</td>";			
			
			
			if($j == 4){echo "</tr>";}
			++$j;
		}
		
		
	}
	
	echo "</table>";
	echo "</center>";
	} else {	echo "Ничего не найдено. <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>";}
  
  

  } else {
    echo "Ничего не найдено. <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>";	
	
  }

?>

	<?echo "<br>";?>

</center>