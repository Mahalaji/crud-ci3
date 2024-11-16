<?php include("side_and_header.php");?>
<link rel="stylesheet" href="<?php echo base_url('public/css/blogcategory.css') ?>">

        <div class="info" style=" background: white;">


            <div class="header"
                style=" background: white;">
                <div id="back">
                    <h1>Blog-Category-List
                    <!-- <form align="right" method="post">
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
                                       border: 1px solid black;">Recycle</a> -->
                    </h1>
                    <table>
                        <tr>
                            <th>Seo Title</th>
                            <th>Meta Description</th>
                            <th>Meta Keyword</th>
                            <th>Seo Robat</th>
                            
                        </tr>

                    <?php 
                     foreach ($blogcategory as $u): ?>
                        <tr>
                           
                            <td><?php echo $u['seo_title']; ?></td>
                            <td><?php echo $u['meta_description']; ?></td>
                            <td><?php echo $u['meta_keyword']; ?></td>
                            <td><?php echo $u['seo_robat']; ?></td>
                            <!-- <td><a href="<?php echo base_url('blogrecycledata/' . $u['id']); ?>"><i class='fas fa-trash' style='font-size:20px'></i></a></td>
                            <td><a href="<?php echo base_url('blogeditdata/' . $u['id']); ?>"><i class='fas fa-edit' style='font-size:24px'></i></a></td> -->

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
