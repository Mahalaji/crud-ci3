<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo base_url('public/css/login.css') ?>">
</head>

<body>
	<div class="main">
		<h1>User Login </h1>
		
		<div class="form1">
		
			
			<form name="simple" method="POST" action="<?php echo base_url('get') ?>">
			<div class="styl">	Email <br><input type="text" id="req1" name="email" placeholder="Enter email">
				<div class="error-message"><?= form_error('email') ?></div></div>
				<div class="styl">
				Password<br> <input type="password" id="req3" name="password" placeholder="Enter Password">
				<div class="error-message"><?= form_error('password') ?></div></div>


				<div>

					<input type="submit" value="Submit">

					<?php if ($this->session->flashdata('error')): ?>
				<div class="alert alert-danger">
				<div class="error"><?php echo $this->session->flashdata('error'); ?></div>
				</div>
			<?php endif; ?>
			</form>
		</div>
	</div>
</body>

</html>