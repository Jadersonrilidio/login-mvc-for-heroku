<div id="body-form">
	<h1> Login </h1>
	<form action="/projects/mvc/login-mvc/home/login" method="POST">
		<input type="email" placeholder="Email (ex: email@example.com)" name="email">
		<input type="password" placeholder="Password" name="password">
		<input type="submit" name="submit" value="login">
		<a href="/projects/mvc/login-mvc/register"> Not an user yet? <strong> Register yourself! </strong> </a>
	</form>
</div>

<?php if (isset($message)) echo $message; ?>
