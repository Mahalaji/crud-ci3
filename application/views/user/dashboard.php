<?php include("side_and_header.php");?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="<?php echo base_url('public/css/dashboard.css') ?>">
            <div class="dashboard-content">
                <div class="widget">
                    <h2>Total Users</h2>
                    <p class="widget-value"><?php echo $user;?></p>
                </div>
                <div class="widget">
                    <h2>Total Blogs</h2>
                    <p class="widget-value"><?php echo $blog;?></p>
                </div>
                <div class="widget">
                    <h2>Total News</h2>
                    <p class="widget-value"><?php echo $news;?></p>
                    
                </div>
                <div class="widget wide">
                    <h2>Recent Activity</h2>
                    <ul class="activity-list">
                        <li>User <?php echo $username;?>  signed up</li>
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