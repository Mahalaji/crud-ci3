<?php include("side_and_header.php");?>
<link rel="stylesheet" href="<?php echo base_url('public/css/profile.css') ?>">

            <div class="header">
                <h1>User Detail</h1>
                <div class="form1">
                    <form name="simple">
                        <div id="d">
                            <div>
                                <label for="name">Name:</label><br>
                                <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>"readonly><br><br>

                                <label for="email">Email:</label><br>
                                <input type="text" id="email" name="email"
                                    value="<?php echo $user['email']; ?>" readonly><br><br>

                                <label for="mobilenumber">Mobile Number:</label><br>
                                <input type="text" id="mobilenumber" name="mobilenumber"
                                    value="<?php echo $user['mobilenumber']; ?>" readonly><br><br>

                               

                                <label for="city">City:</label><br>
                                <input type="text" id="city" name="city" value="<?php echo $user['city']; ?>" readonly><br><br>
                                <label for="state">State:</label><br>
                                <input type="text" id="state" name="state"
                                    value="<?php echo $user['state']; ?>" readonly><br><br>

                            </div>
                            <div>
                               

                                <label for="country">Country:</label><br>
                                <input type="text" id="country" name="country"
                                    value="<?php echo $user['country']; ?>" readonly><br><br>

                                <label for="pincode">Pincode:</label><br>
                                <input type="text" id="pincode" name="pincode"
                                    value="<?php echo $user['pincode']; ?>" readonly><br><br>

                                <label for="address">Address:</label><br>
                                <input type="text" id="address" name="address"
                                    value="<?php echo $user['address']; ?>" readonly><br><br>

                                <label for="gender">Gender:</label><br>
                                <select id="gender" name="gender" value="<?php echo $user['gender']; ?>" readonly>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select><br><br>

                                
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
</body>
</html>