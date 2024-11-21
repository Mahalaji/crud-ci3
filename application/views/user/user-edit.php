<?php include("side_and_header.php");?>
<link rel="stylesheet" href="<?php echo base_url('public/css/user-edit.css') ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
            <div class="header">
                <h1>Update User Detail</h1>
                <div class="form1">
                    <form name="simple" method="POST" action="<?php echo base_url('update') ?>">

                        <div id="d">
                            <div>
                                <label for="name">Name:</label><br>
                                <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>"><br><br>
                                <div class="error-message"> <?= form_error('name') ?></div>

                                <label for="email">Email:</label><br>
                                <input type="text" id="email" name="email"
                                    value="<?php echo $user['email']; ?>"><br><br>
                                    <div class="error-message"> <?= form_error('email') ?></div>

                                <label for="mobilenumber">Mobile Number:</label><br>
                                <input type="text" id="mobilenumber" name="mobilenumber"
                                    value="<?php echo $user['mobilenumber']; ?>"><br><br>
                                    <div class="error-message"> <?= form_error('mobilenumber') ?></div>

                                <label for="password">Password:</label><br>
                                <input type="password" id="password" name="password"
                                    value="<?php echo $user['password']; ?>"><br><br>
                                    <div class="error-message"><?= form_error('password') ?></div>

                                <label for="city">City:</label><br>
                                <input type="text" id="city" name="city" value="<?php echo $user['city']; ?>"><br><br>
                                <div class="error-message"><?= form_error('city') ?></div>

                                <input type="hidden" id="id" name="id" value="<?php echo $user['id']; ?>">

                            </div>
                            <div>
                                <label for="state">State:</label><br>
                                <input type="text" id="state" name="state"
                                    value="<?php echo $user['state']; ?>"><br><br>
                                    <div class="error-message"> <?= form_error('state') ?></div>

                                <label for="country">Country:</label><br>
                                <input type="text" id="country" name="country"
                                    value="<?php echo $user['country']; ?>"><br><br>
                                    <div class="error-message"> <?= form_error('country') ?></div>

                                <label for="pincode">Pincode:</label><br>
                                <input type="text" id="pincode" name="pincode"
                                    value="<?php echo $user['pincode']; ?>"><br><br>
                                    <div class="error-message"> <?= form_error('pincode') ?></div>

                                <label for="address">Address:</label><br>
                                <input type="text" id="address" name="address"
                                    value="<?php echo $user['address']; ?>"><br><br>
                                    <div class="error-message"><?= form_error('address') ?></div>

                                <label for="gender">Gender:</label><br>
                                <select id="gender" name="gender" value="<?php echo $user['gender']; ?>">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select><br><br>
                                <div class="error-message"> <?= form_error('gender') ?></div>

                                <input type="submit" value="Submit">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </main>
    </div>
</body>

</html>