<?php
	
	require_once('../lib/Factory.php');
	require_once('../models/UserModel.php');
	
	session_start();		
	if( isset($_SESSION['_user']) ){
		$user = unserialize($_SESSION['_user']);
	}
	else {
		header('Location:/car/views/login.php');
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Logged In : <?php echo $user->getType(); ?></title>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/bower_components/bootstrap/dist/css/bootstrap.min.css" />
</head>
<body>
	<div class="container" style="margin-top:30px">
		<div class="text-danger text-center"><?php if(isset($_GET['error'])) echo $_GET['error']; ?></div>
		<div class="col-sm-4">	
			<form class="form" method="POST" enctype="multipart/form-data" action="/car/controller/upload.php">
				<input type="file" class="form-control" name="csv" />
				<br>
				<button class="btn btn-sm btn-default" type="submit">Upload</button>
			</form>
		</div>
		<?php if( $user->getType() == 'Admin' ) : ?>
		<div class="col-sm-4">
			<form class="form" method="POST" action="/car/controller/addtemplate.php">
				<input class="form-control" type="text" name="name" placeholder="Name of Template" />
				<textarea class="form-control" name="template" placeholder="Content"></textarea>
				<br>
				<button class="btn btn-sm btn-default" type="submit">Create New Template</button>
			</form>
		</div>
		<?php endif; ?>
	</div>
	<br><br><br>
	<div class="container">
		<div class="col-xs-3">
			<h4>List of Jobs</h4>
			<ul class="list-group">
				<?php $csvList = Factory::getInstance('CSVUploader')->getCsvList(); ?>
				<?php foreach( $csvList as $csv ) : ?>
				<li class="list-group-item">
					<a class="list-group-item-heading" href="/car/views/admin.php?fileId=<?php echo $csv['hash']; ?>">
						<?php echo $csv['name']; ?>
					</a>
					<br>
					<small class="text-muted list-group-item-text">added on <?php echo date('j M,Y - H:i',strtotime($csv['addedOn'])); ?></small>
				</li>
				<?php endforeach; ?> 
			</ul>
		</div>
		<div class="col-xs-9">
		<?php if( isset($_GET['fileId'])) : ?> 
		<?php $fileData = Factory::getInstance('CSVUploader')->readDataById( $_GET['fileId'] ); ?>		<table class="table table-bordered">
		<tr class="info">
			<td><input type="checkbox" /></td>
			<td>S.No.</td>
			<td>Choose a Template</td>
			<td>
				<select class="form-control">
					<option disabled selected>Choose a Template</option>
					<?php $templates = Factory::getInstance('TemplateManager')->getAllTemplates(); ?>
					<?php foreach( $templates as $template )  :?>
						<option>
							<?php echo $template['name']; ?>
						</option>
					<?php endforeach; ?>	
				</select>
			</td>
		</tr>
		<?php $count = 1; ?>
		<?php foreach( $fileData as $lines ) : ?>
			<tr>
				<td>
					<input type="checkbox" />
				</td>
				<td>
					<?php echo $count++; ?>
				</td>
				<?php foreach( $lines as $lineData ) : ?>
					<td><?php echo $lineData; ?></td>
				<?php endforeach; ?>
			</tr>
		<?php endforeach; ?>
		</table>
		<?php endif; ?>
		<button class="btn btn-sm btn-success">Send SMS to selected Users</button>
        <button class="btn btn-sm btn-warning" type="button">Send Dummy SMS</button>
		</div>
	</div>
</body>
</html>
