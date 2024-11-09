<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('public/css/blog.css'); ?>">
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

        <div class="info" style=" background: white;">


            <div class="header"
                style=" background: white;">
                <div id="back">
                    <h1>Blog-List
                    <form align="right" method="post">
                    <a href="<?php echo base_url('blogadd'); ?>" style="    padding: 3px;
                                       background: grey;
                                       border-radius: 5px;
                                     font-size: 23px;
                                       border: 1px solid grey;">Add-Blog</a>

                     <form align="right" method="post">
                     <a href="<?php echo base_url('blogrecycle'); ?>" style="    padding: 3px;
                                       background: grey;
                                       border-radius: 5px;
                                     font-size: 23px;
                                       border: 1px solid grey;">Recycle</a>
                    </h1>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Create Date</th>
                            <th>Update Date</th>
                            <th>Delete Status</th>
                            <th>Edit</th>
                            
                        </tr>
                    <?php foreach ($blogs as $u): ?>
                        <tr>
                            <td><?php echo $u['Name']; ?></td>
                            <td><?php echo $u['Title']; ?></td>
                            <td><?php echo $u['Description']; ?></td>
                            <td><?php echo $u['Create_Date']; ?></td>
                            <td><?php echo $u['Update_Date']; ?></td>
                            <td><a href="<?php echo base_url('blogrecycledata/' . $u['id']); ?>"><i class='fas fa-trash' style='font-size:36px'></i></a></td>
                            <td><a href="<?php echo base_url('blogeditdata/' . $u['id']); ?>"><i class='fas fa-edit' style='font-size:24px'></i></a></td>

                        </tr>
                        <?php endforeach; ?>
                </table>
                <div class="pagination-links">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
