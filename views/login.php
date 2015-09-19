<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/bower_components/bootstrap/dist/css/bootstrap.min.css" />
</head>
<body>
	<h4 class="text-center">Author: Mayank Mishra</h4>
	<div class="container">
	<div class="col-sm-4 col-sm-offset-4" style="margin-top: 30px">
		<div class="text-danger text-center"><?php if(isset($_GET['error'])) echo $_GET['error']; ?></div>
	<form class="form" action="/car/controller/login.php" method="POST">
		<div class="form-group">
			<label>Username</label>
			<input type="text" class="form-control" name="username" />
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="password" />
		</div>
		<div class="form-group">
			<button class="btn btn-default" type="submit">Login</button>
		</div>
	</form>	
	</div>
	</div>
</body>
</html>
