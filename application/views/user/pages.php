<?php include("side_and_header.php");?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="<?php echo base_url('public/css/pages.css') ?>">

        <div class="info" style=" background: white;">


            <div class="header"
                style=" background: white;">
                <div id="back">
                    <h1>Pages-List
                    <!-- <form align="right" method="post">
                        <a href="<?php echo base_url(''); ?>"><i class='fas fa-eye' style='font-size:36px'></i></a> -->

                    <form align="right" method="post">
                    <a href="<?php echo base_url('pagesadd'); ?>" style="    padding: 3px;
                                       background: azure;
                                       border-radius: 5px;
                                     font-size: 23px;
                                       border: 1px solid black;">Add-Pages</a>

                     <form align="right" method="post">
                     <a href="<?php echo base_url('recyclepages'); ?>" style="    padding: 3px;
                                       background: azure;
                                       border-radius: 5px;
                                     font-size: 23px;
                                       border: 1px solid black;">Recycle</a>
                    </h1>
                    <table>
                        <tr>
                        <th>Title</th>
                        <th>Email</th>
                        <th>Gender</th>
                            <!-- <th>Image</th> -->
                            <th>Description</th>
                            <th>Date</th>
                            <th>Delete Status</th>
                            <th>Edit</th>
                            
                        </tr>
                    <?php foreach ($user as $u): ?>
                        <tr>
                            <td><?php echo $u['Title']; ?></td>
                            <td><?php echo $u['email']; ?></td>
                            <td><?php echo $u['gender']; ?></td>
                            <td><?php echo $u['description']; ?></td>
                            <td><?php echo $u['Date']; ?></td>
                            <td><a href="<?php echo base_url('pagesrecycledata/' . $u['id']); ?>"><i class='fas fa-trash' style='font-size:20px'></i></a></td>
                            <td><a href="<?php echo base_url('pageseditdata/' . $u['id']); ?>"><i class='fas fa-edit' style='font-size:24px'></i></a></td>

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
