<?php include("side_and_header.php");?>
<link rel="stylesheet" href="<?php echo base_url('public/css/register.css') ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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