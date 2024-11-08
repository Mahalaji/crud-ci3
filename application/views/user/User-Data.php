<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('public/css/user-data.css'); ?>">
</head>

<body>
    <div class="dashboard">
        <aside class="sidebar">
            <nav class="sidebar-nav">
                <div id="img">
                    <img src="https://www.absglobaltravel.com/public/images/footer-abs-logo.webp" height="50">
                </div>
                <ul>
                    <li><a href="<?php echo base_url('profile'); ?>" class="active"><i class="fas fa-user"></i> Profile</a></li>
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
                <h1 id="user">User List
                    <form align="right" method="post">
                        <a href="<?php echo base_url('userregister'); ?>" style="    padding: 3px;
                                       background: grey;
                                       border-radius: 5px;
                                     font-size: 23px;
                                       border: 1px solid grey;">Add</a>
                </h1>
                <table>
                    <tr>

                        <th>Name</th>
                        <th>Email</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Password Change</th>
                    </tr>

                    <?php foreach ($user as $u): ?>
                    <tr>

                        <td><?php echo $u['name']; ?></td>
                        <td><?php echo $u['email']; ?></td>
                        <td><a href="<?php echo base_url('usereditdata/' . $u['id']); ?>">Edit</a></td>

                        <td><a href="<?php echo base_url('userdeletedata/' . $u['id']); ?>" style="    padding: 5px;
                                       background: grey;
                                       border-radius: 7px;
                                       border: 1px solid grey;">Delete</a></td>
                        <td><a href="<?php echo base_url('userpass/' . $u['id'] ); ?>">Change</a></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <div class="pagination-links">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </main>
    </div>
</body>

</html>