<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('public/css/blogadd.css'); ?>">
</head>

<body>
    <div class="dashboard">
        <aside class="sidebar">
            <nav class="sidebar-nav">
                <div id="img">
                    <img src="https://www.absglobaltravel.com/public/images/footer-abs-logo.webp" height="50">
                </div>
                <ul>
                    <li><a href="<?php echo base_url('dashboard'); ?>" class="active"><i class="fa fa-home"></i>Home</a>
                    </li>
                    <li><a href="<?php echo base_url('profile'); ?>"><i class="fas fa-user"></i>Profile</a></li>
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
                        <a href="<?php echo base_url('updateprofile')?>"><i class='fas fa-user'></i>Profile</a>
                        <a href="<?php echo base_url('adminpass')?>"><i class="fas fa-lock"></i> Change Password</a>
                        <?php 
                        if( $this->session->userdata('id')) { ?>
                        <a href="<?php echo base_url('logout')?>"><i class='fas fa-sign-out-alt'></i> Logout</a>
                        <?php } ?>
                    </div>
                </div>
            </header>
            <h2 class="header"> Add-Blog</h2>
            <div class="form1">
                <form class="simple" method="post" action="<?php echo base_url('add')?>" enctype="multipart/form-data">
                    <div id="d">
                        <div>
                            <div class="input-group">
                                <label>Name</label>
                                <input type="text" id="Name" name="Name" onkeyup="lettersOnly(this)">
                                <div class="error-message"> <?= form_error('Name') ?></div>

                            </div>
                            <div class="input-group">
                                <label>Title</label><br>
                                <input type="text" id="Title" name="Title">
                                <div class="error-message"> <?= form_error('Title') ?></div>


                            </div>
                            <div class="input-wrapper">
                                <label>Description</label>
                                <textarea id="editor" name="Description">
                     &lt;p&gt;Your massage .&lt;/p&gt;
                       </textarea>
                            </div>

                        </div>
                        <div>
                            <div class="input-wrapper">
                                <label for="image">Upload Image:</label>
                                <input type="file" name="image" id="image" />
                                <?php if (isset($upload_error)) { echo '<div class="error-message">' . $upload_error . '</div>'; } ?>
                            </div>
                            <div class="input-group">
                                <label>Create Date</label>
                                <input type="date" id="Create Date" name="Create_Date" required>
                            </div>
                            <div class="input-group">
                                <label>Update Date</label>
                                <input type="date" id="Update Date" name="Update_Date" required>
                            </div>


                            <div class="submit">
                                <button type="submit" class="btn" name="update">Add Blog</button>
                            </div>
                        </div>

                    </div>
            </div>

            </form>
            <script src="profile-update.js"></script>
            <script>
            function lettersOnly(input) {
                var regex = /[^a-z ]/gi;
                input.value = input.value.replace(regex, "");
            }
            </script>
            <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
            editor.resize(300, 500);
            </script>
            <script>
            CKEDITOR.replace('editor')
            </script>
</body>

</html>