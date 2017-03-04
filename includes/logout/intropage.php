<?php 
	require("includes/constants.php");

	session_start();
	
	
	$url_werlkom = Loc_welcome;
	
	if(!isset($_SESSION["session_username"])) {
		header("location:login.php");
	} else {
		
	header("Refresh: 2; url=$url_werlkom");
		
?>


<?php include("includes/header.php"); ?>
<div id="welcome">	
<center>
	<h2>Добро пожаловать, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
	<p>
		Через 3 секунды Вы автоматически должны перейти на главную страницу <br> <br>
		<?php echo("<a href='$url_werlkom'") ?>">На главную</a></p>


</center>
</div>

<?php include("includes/footer.php"); ?>
	

<?php
}
?>
