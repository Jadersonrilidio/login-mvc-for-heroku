<div id="body-form">
	<h1> Login </h1>
	<form action="/home/login" method="POST">
		<input type="email" placeholder="Email (ex: email@example.com)" name="email">
		<input type="password" placeholder="Password" name="password">
		<input type="submit" name="submit" value="login">
		<a href="/register"> Not an user yet? <strong> Register yourself! </strong> </a>
	</form>
</div>

<?php if (isset($message)) echo $message; ?>
