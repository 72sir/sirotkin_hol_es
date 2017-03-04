<?php
	session_start();
	//require_once("includes/connection.php"); 

if(isset($_SESSION["session_username"])){
	// echo "Session is set"; // for testing purposes
				?>
			<script language="JavaScript" type="text/javascript">
			<!--
				location="index.php"; 
			//--> 
			</script>
			<?
	exit;
}

if(isset($_POST["login"])){
if(!empty($_POST['username']) && !empty($_POST['password'])) {
    
	$username=$_POST['username'];
	
	$username = trim($username); 	
	$username = htmlspecialchars($username);
	
    $password=$_POST['password'];

	$password = trim($password); 	
	$password = htmlspecialchars($password);	
	
	$password = md5(md5(trim($password)));

	$select_login = "SELECT * FROM usertbl WHERE email = '".$username."' AND password = '".$password."'";
	$row = DB::prepare($select_login)->execute()->fetch();
	$var = $row['id'];

    if($var != Null){
		
		$dbusername = $row['email'];
		$dbpassword = $row['password'];
	
		if($username == $dbusername && $password == $dbpassword){
			$_SESSION['session_username']=$username;

			?>
			<script language="JavaScript" type="text/javascript">
			<!--
				location="index.php"; 
			//--> 
			</script>
			<?
			/* Redirect browser */
			header("Location: index.php");
			exit;
		}
	} else {$message = "Invalid username or password!";}
} else { $message = "All fields are required!"; }
}
?>

<?php //include("includes/header.php"); ?>

	
	<center><div class="container mlogin"><div id="login">
    <h99>ВХОД</h99>
<form name="loginform" id="loginform" action="" method="POST">
    <p>
        <label for="user_login">Email<br />
        <input type="email" name="username" id="username" class="input" value="" size="20" /></label>
    </p>
    <p>
        <label for="user_pass">Пароль<br />
        <input type="password" name="password" id="password" class="input" value="" size="20" /></label>
    </p>
        <p class="submit">
        <input type="submit" name="login" class="button" value="Войти" />
    </p>
        <p class="regtext">У Вас нет аккаунта? <a href="?t=register" >Зарегистрируйтесь</a></p>
</form>

    </div>

    </div>
	</center>
	
	<?php //include("includes/footer.php"); ?>
	
	<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
	