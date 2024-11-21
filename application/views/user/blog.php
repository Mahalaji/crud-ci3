<?php include("side_and_header.php");?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="<?php echo base_url('public/css/blog.css') ?>">

        <div class="info" style=" background: white;">


            <div class="header"
                style=" background: white;">
                <div id="back">
                    <h1>Blog-List
                    <form align="right" method="post">
                        <a href="<?php echo base_url('blogsite'); ?>"><i class='fas fa-eye' style='font-size:36px'></i></a>

                    <form align="right" method="post">
                    <a href="<?php echo base_url('blogadd'); ?>" style="    padding: 3px;
                                       background: azure;
                                       border-radius: 5px;
                                     font-size: 23px;
                                       border: 1px solid black;">Add-Blog</a>

                     <form align="right" method="post">
                     <a href="<?php echo base_url('blogrecycle'); ?>" style="    padding: 3px;
                                       background: azure;
                                       border-radius: 5px;
                                     font-size: 23px;
                                       border: 1px solid black;">Recycle</a>
                    </h1>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Blog Category</th>
                            <th>Description</th>
                            <th>Create Date</th>
                            <th>Update Date</th>
                            <th>Delete Status</th>
                            <th>Edit</th>
                            
                        </tr>
                    <?php foreach ($blogs as $u): ?>
                        <tr>
                            <td><?php echo $u['Name']; ?></td>
                            <td>
                <?php if (!empty($u['image'])): ?>
                    <img src="<?php echo base_url('uploads/images/' . $u['image']); ?>" alt="Blog Image" height="50">
                <?php else: ?>
                    <span>No Image</span>
                <?php endif; ?>
            </td>
                            <td><?php echo $u['Title']; ?></td>
                            <td><?php echo $u['blog_title_category']; ?></td>
                            <td><?php echo $u['Description']; ?></td>
                            <td><?php echo $u['Create_Date']; ?></td>
                            <td><?php echo $u['Update_Date']; ?></td>
                            <td><a href="<?php echo base_url('blogrecycledata/' . $u['id']); ?>"><i class='fas fa-trash' style='font-size:20px'></i></a></td>
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
