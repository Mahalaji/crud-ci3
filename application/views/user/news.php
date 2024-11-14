<?php include("side_and_header.php");?>
<link rel="stylesheet" href="<?php echo base_url('public/css/news.css') ?>">

        <div class="info" style=" background: white;">


            <div class="header"
                style=" background: white;">
                <div id="back">
                    <h1>News-List
                    <form align="right" method="post">
                        <a href="<?php echo base_url('blogsite'); ?>"><i class='fas fa-eye' style='font-size:36px'></i></a>


                    <form align="right" method="post">
                    <a href="<?php echo base_url('newsadd'); ?>" style="    padding: 3px;
                                       background: azure;
                                       border-radius: 5px;
                                     font-size: 23px;
                                       border: 1px solid black;">Add-News</a>

                     <form align="right" method="post">
                     <a href="<?php echo base_url('recyclenews'); ?>" style="    padding: 3px;
                                       background: azure;
                                       border-radius: 5px;
                                     font-size: 23px;
                                       border: 1px solid black;">Recycle</a>
                    </h1>
                    <table>
                        <tr>
                            <th>Author_Name</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Delete Status</th>
                            <th>Edit</th>
                            
                        </tr>
                    <?php foreach ($user as $u): ?>
                        <tr>
                            <td><?php echo $u['Author_Name']; ?></td>
                            <td>
                <?php if (!empty($u['Image'])): ?>
                    <img src="<?php echo base_url('uploads/news_images/' . $u['Image']); ?>" alt="news Image" height="50">
                <?php else: ?>
                    <span>No Image</span>
                <?php endif; ?>
            </td>
                            <td><?php echo $u['Title']; ?></td>
                            <td><?php echo $u['Description']; ?></td>
                            <td><?php echo $u['Date']; ?></td>
                            <td><a href="<?php echo base_url('newsrecycledata/' . $u['id']); ?>"><i class='fas fa-trash' style='font-size:20px'></i></a></td>
                            <td><a href="<?php echo base_url('newseditdata/' . $u['id']); ?>"><i class='fas fa-edit' style='font-size:24px'></i></a></td>

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
