<?php include("side_and_header.php");?>
<link rel="stylesheet" href="<?php echo base_url('public/css/userpass.css') ?>">
            <h1>Update Password</h1>
                <div class="form1">
                    <form name="simple" method="POST" >
                    <label for="password">Old Password:</label><br>
                                <input type="oldpassword" id="oldpassword" name="oldpassword"><br><br>
                                    <div class="error-message"><?= form_error('oldpassword') ?></div>
                                    <label for="newpassword">New Password:</label><br>
                                <input type="password" id="newpassword" name="newpassword"><br><br>
                                    <div class="error-message"><?= form_error('newpassword') ?></div>
                                    <input type="submit" value="Submit">
                    </form>
                    <?php if ($this->session->flashdata('error')): ?>
				<div class="alert alert-danger">
				<div class="error"><?php echo $this->session->flashdata('error'); ?></div>
				</div>
			<?php endif; ?>    
                    </div>
               
        </main>
    </div>
    
                           
</body>
</html>