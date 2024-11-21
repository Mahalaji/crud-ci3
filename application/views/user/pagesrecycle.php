<?php include("side_and_header.php");?>
<link rel="stylesheet" href="<?php echo base_url('public/css/pagesrecycle.css') ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <div class="info" style=" background: white;">


            <div class="header"
                style=" background: white;">
                <div id="back">
                    <h1>Pages-Recycle-List
                    
                    </h1>
                    <table>
                        <tr>
                        <th>Title</th>
                        <th>Email</th>
                        <th>Gender</th>
                            <!-- <th>Image</th> -->
                            <th>Description</th>
                            <th>Date</th>
                            <th>Delete</th>
                            <th>Restore</th>
                            
                        </tr>
                    <?php foreach ($user as $u): ?>
                        <tr>
                            <td><?php echo $u['Title']; ?></td>
                            <td><?php echo $u['email']; ?></td>
                            <td><?php echo $u['gender']; ?></td>
                            <td><?php echo $u['description']; ?></td>
                            <td><?php echo $u['Date']; ?></td>
                            <td><a href="<?php echo base_url('pagesdelete/' . $u['id']); ?>"><i class='fas fa-trash'
                                            style='font-size:20px'></i></a></td>
                                <td><a href="<?php echo base_url('pagesrestore/' . $u['id']); ?>"><i
                                            class='fa fa-download' style='font-size:25px'></i></a></td>

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
