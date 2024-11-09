<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo base_url('public/css/styles.css'); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('public/css/user-edit.css'); ?>">
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