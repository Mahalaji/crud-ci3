<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('public/css/register.css'); ?>">
</head>

<body>
    <div class="dashboard">
        <aside class="sidebar">
            <nav class="sidebar-nav">
                <div id="img">
                    <img src="https://www.absglobaltravel.com/public/images/footer-abs-logo.webp" height="50">
                </div>
                <ul>
                <li><a href="<?php echo base_url('profile'); ?>" class="active"><i class="fas fa-user"></i>Profile</a></li>
                    <li><a href="<?php echo base_url('blog'); ?>"><i class="fas fa-blog"></i> Blog</a></li>
                    <li><a href="<?php echo base_url('user/userdata'); ?>"><i class="fas fa-users"></i> Users</a></li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <header class="top-bar">
                <div class="search-bar">
                    <input type="text" placeholder="Search...">
                    <button><i class="fas fa-search"></i></button>
                </div>
                <div class="dropdown">
                    <button class="dropbtn">Account <i class='fas fa-angle-down'></i></button>
                    <div class="dropdown-content">
                        <a href="#"><i class="fas fa-user"></i> Profile</a>
                        <a href="#"><i class='fas fa-lock'></i> Change Password</a>
                        <?php 
                        if( $this->session->userdata('id')) { ?>
                        <a href="<?php echo base_url('logout')?>"><i class='fas fa-sign-out-alt'></i> Logout</a>
                        <?php } ?>
                    </div>
                </div>
            </header>
<div class="main">
		<h1>Add-User</h1>
		<div class="form1">
			<form name="simple"  method="POST" action="<?php echo base_url('create')?>">
              <div id="d">
              <div>
				Name <br><input type="text" id="req1" name="name"  placeholder="Name"><br><br>
				<div class="error-message"> <?= form_error('name') ?></div>
				Email<br> <input type="text" id="req2" name="email" placeholder="Email"><br><br>
				<div class="error-message"> <?= form_error('email') ?></div>
				Mobile Number <br><input type="text" id="req8" name="mobilenumber" placeholder="Mobile Number"><br><br>
				<div class="error-message"> <?= form_error('mobilenumber') ?></div>
				Password<br> <input type="password" id="req3" name="password" placeholder="Password"><br><br>
				<div class="error-message"> <?= form_error('password') ?></div>
				City<br> <input type="text" id="req4" name="city" placeholder="City"><br><br>
				<div class="error-message"> <?= form_error('city') ?></div>
              </div>
              <div>
				State<br> <input type="text" id="req5" name="state" placeholder="State"><br><br>
				<div class="error-message"> <?= form_error('state') ?></div>
				Country <br><input type="text" id="req6" name="country" placeholder="Country"><br><br>
                <div class="error-message"><?= form_error('country') ?></div>
				Pincode <br><input type="text" id="req7" name="pincode" placeholder="Pincode"><br><br>
                <div class="error-message"><?= form_error('pincode') ?></div>
				Address<br> <input type="text" id="req9" name="address" placeholder="Address"><br><br>
				<div class="error-message"> <?= form_error('address') ?></div>
				Gender:<br>
				<select id="selection" name="gender">
					<option>Gender</option>
					<option>Male</option>
					<option>Female</option>
				</select>
				<br><br>
                <div class="error-message"><?= form_error('gender') ?></div>
				<input type="submit"  value="Submit"  >

                </div>  
                </div>  
			</form>
		</div>	
	</div>
</body>
</html>