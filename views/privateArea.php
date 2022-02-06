<div id="body-form">
	<h1> Welcome! </h1>
	<form action="/home/logout" method="POST">
		<li> <?php echo "Id: "; if (isset($_SESSION['id'])) echo $_SESSION['id']; ?> </li>
		<li> <?php echo "Username: "; if (isset($_SESSION['username'])) echo $_SESSION['username']; ?> </li>
		<li> <?php echo "Email: "; if (isset($_SESSION['email'])) echo $_SESSION['email']; ?> </li>
		<li> <?php echo "Password: "; if (isset($_SESSION['password'])) echo $_SESSION['password']; ?> </li>
		<input type="submit" name="submit" value="logout">
	</form>
</div>
</div>	