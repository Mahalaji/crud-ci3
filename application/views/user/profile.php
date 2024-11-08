<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                    <li><a href="#" class="active"><i class="fas fa-user"></i> Profile</a></li>
                    <li><a href="#"><i class="fas fa-blog"></i> Blog</a></li>
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
                        <a href="#"><i class='fas fa-sign-out-alt'></i> Logout</a>
                    </div>
                </div>
            </header>
            <div class="header">
                <h1>Update User Detail</h1>
                <div class="form1">
                    <form name="simple">

                        <div id="d">
                            <div>
                                <label for="name">Name:</label><br>
                                <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>"><br><br>

                                <label for="email">Email:</label><br>
                                <input type="text" id="email" name="email"
                                    value="<?php echo $user['email']; ?>" readonly><br><br>

                                <label for="mobilenumber">Mobile Number:</label><br>
                                <input type="text" id="mobilenumber" name="mobilenumber"
                                    value="<?php echo $user['mobilenumber']; ?>" readonly><br><br>

                                <label for="password">Password:</label><br>
                                <input type="password" id="password" name="password"
                                    value="<?php echo $user['password']; ?>" readonly><br><br>

                                <label for="city">City:</label><br>
                                <input type="text" id="city" name="city" value="<?php echo $user['city']; ?>" readonly><br><br>


                            </div>
                            <div>
                                <label for="state">State:</label><br>
                                <input type="text" id="state" name="state"
                                    value="<?php echo $user['state']; ?>" readonly><br><br>

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