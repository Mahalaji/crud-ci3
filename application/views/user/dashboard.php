<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('public/css/dashboard.css') ?>">
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="dashboard">
        <aside class="sidebar">
            <div class="sidebar-header">
            </div>
            <nav class="sidebar-nav">
                <div id="img"><img src="https://www.absglobaltravel.com/public/images/footer-abs-logo.webp"
                        height="50"></div>
                <ul>
                    <li><a href="#" class="active"><i class="fas fa-user"></i>Profile</a></li>
                    <li><a href="#"><i class="fas fa-blog"></i> Blog</a></li>
                    <li><a href="<?php echo base_url('userdata')?>"><i class="fas fa-users"></i> Users</a></li>

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
                    <button class="dropbtn">Account <i class=' fas fa-angle-down'></i></button>
                    <div class="dropdown-content">
                        <a href="#"><i class="fas fa-user"></i> profile</a>
                        <a href="#"><i class='fas fa-lock'></i> Change Password</a>
                        <a href="#"><i class='fas fa-sign-out-alt'></i> Logout</a>
                    </div>
                </div>

            </header>
            <div class="dashboard-content">
                <div class="widget">
                    <h2>Total Users</h2>
                    <p class="widget-value">10,234</p>
                    <p class="widget-change positive">+5.3%</p>
                </div>
                <div class="widget">
                    <h2>Revenue</h2>
                    <p class="widget-value">$54,321</p>
                    <p class="widget-change negative">-2.1%</p>
                </div>
                <div class="widget">
                    <h2>Active Sessions</h2>
                    <p class="widget-value">1,234</p>
                    <p class="widget-change positive">+12.7%</p>
                </div>
                <div class="widget wide">
                    <h2>Recent Activity</h2>
                    <ul class="activity-list">
                        <li>User John signed up</li>
                        <li>User Jane made a purchase</li>
                        <li>User Bob updated their profile</li>
                        <li>User Alice submitted a support ticket</li>
                    </ul>
                </div>
            </div>
        </main>
    </div>
</body>

</html>