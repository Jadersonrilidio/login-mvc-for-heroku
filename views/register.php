<div id="body-form-register">
	<h1>Register</h1>
	<form action="/projects/mvc/login-mvc/register/register" method="POST">
		<input type="text" name="username" placeholder="Username" maxlength="64">
		<input type="email" name="email" placeholder="Email (ex: email@example.com)" maxlength="128">
		<input type="password" name="password" placeholder="Password" maxlength="32">
		<input type="password" name="rpt_password" placeholder="Repeat password" maxlength="32">
		<input type="submit" name="submit" value="Register">
		<a href="/projects/mvc/login-mvc/home"> Already registered? <strong> Login! </strong> </a>
	</form>
</div>

<?php if (isset($message)) echo $message; ?>