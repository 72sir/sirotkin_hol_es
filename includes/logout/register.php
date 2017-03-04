<?php //require_once("includes/connection.php"); ?>
<?php //include("includes/header.php"); ?>

<?php
if(isset($_POST["register"])){
	if(!empty($_POST['username']) && !empty($_POST['password'])) {

		$username=$_POST['username'];
		$password=$_POST['password'];
	
		$select_register = "SELECT * FROM usertbl WHERE email='".$username."'";
		$row = DB::prepare($select_register)->execute()->fetch();
		$var = $row['id'];

		if($var == Null){
			
			$password = md5(md5(trim($password)));
			
			$select_register_insert ="INSERT INTO usertbl (email, password) VALUES ('$username', '$password')";
			
			//mail("$username", "My Subject", "Line 1\nLine 2\nLine 3"); 

			
			try{				
				$conn->prepare($select_register_insert)->execute();
				$message = "Ваш аккаунт создан";
				
				if(!empty($_POST['username']) && !empty($_POST['password'])) {
    
					$username=$_POST['username'];
	
					$username = trim($username); 	
					$username = htmlspecialchars($username);
	
					$password=$_POST['password'];

					
					$password = trim($password); 	
					$password = htmlspecialchars($password);
					
					$password = md5(md5(trim($password)));
					
					$select_login = "SELECT * FROM usertbl WHERE email = '".$username."' && password = '".$password."'";
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

				
				
			} catch(PDOException $e) {
					echo $e->getMessage();
					$message = "Заполните поля!";
				}
		} else {$message = "Данный пользователь уже существует.";}

	} else {	$message = "Заполните все поля!";}
}
?>


<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
<CENTER>
<div class="container mregister"><div id="login">
	<h99>РЕГИСТРАЦИЯ</h99>
<form name="registerform" id="registerform" action="?t=register" method="post">
	<p>
		<label for="user_pass">Email<br />
		<input type="email" name="username" id="username" class="input" value="" size="20" /></label>
	</p>
	
	<p>
		<label for="user_pass">Пароль<br />
		<input type="password" name="password" id="password" class="input" value="" size="32" /></label>
	</p>	
	

	<p class="submit">
		<input type="submit" name="register" id="register" class="button" value="Зарегистрировать" />
	</p>
	
	<p class="regtext">Зарегистрировались?<br><a href="?t=login" >Вход в акаунт!</a></p>
</form>
	
</div>
</div>
</CENTER>	
	
	
	<?php //include("includes/footer.php"); ?>