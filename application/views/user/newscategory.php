<?php include("side_and_header.php");?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="<?php echo base_url('public/css/newscategory.css') ?>">

        <div class="info" style=" background: white;">


            <div class="header"
                style=" background: white;">
                <div id="back">
                    <h1>Category-List
                    <form align="right" method="post">
                    <a href="<?php echo base_url('newscategoryadd'); ?>" style="    padding: 3px;
                                       background: azure;
                                       border-radius: 5px;
                                     font-size: 23px;
                                       border: 1px solid black;">Add-Category</a>
                    </h1>
                    <table>
                        <tr>
                           <!-- <th>Blog Id</th> -->
                            <th>Seo Title</th>
                            <th>Meta Description</th>
                            <th>Meta Keyword</th>
                            <th>Seo Robat</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            
                        </tr>

                    <?php 
                     foreach ($newscategory as $u): ?>
                        <tr>
                        <!-- <td><?php echo $u['id']; ?></td> -->
                            <td><?php echo $u['seo_title']; ?></td>
                            <td><?php echo $u['meta_description']; ?></td>
                            <td><?php echo $u['meta_keyword']; ?></td>
                            <td><?php echo $u['seo_robat']; ?></td> 
                            <td><a href="<?php echo base_url('newscategoryeditdata/' . $u['id']); ?>"><i class='fas fa-edit' style='font-size:24px'></i></a></td> 
                            <td><a href="<?php echo base_url('newscategorydelete/' . $u['id']); ?>"><i class='fas fa-trash'
                            style='font-size:20px'></i></a></td>
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
