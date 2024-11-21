<?php include("side_and_header.php");?>
<link rel="stylesheet" href="<?php echo base_url('public/css/blogrecycle.css') ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
            <div class="info" style=" background: white;">

                <div class="header" style=" background: white;">
                    <div id="back">
                        <h1>Blog Recycle List</h1>
                        <table>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Create Date</th>
                                <th>Update Date</th>
                                <th>Delete</th>
                                <th>Restore</th>

                            </tr>
                            <?php foreach ($blogrecycle as $u): ?>
                            <tr>
                                <td><?php echo $u['Name']; ?></td>
                                <td>
                                    <?php if (!empty($u['image'])): ?>
                                    <img src="<?php echo base_url('uploads/images/' . $u['image']); ?>" alt="Blog Image"
                                        height="50">
                                    <?php else: ?>
                                    <span>No Image</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $u['Title']; ?></td>
                                <td><?php echo $u['Description']; ?></td>
                                <td><?php echo $u['Create_Date']; ?></td>
                                <td><?php echo $u['Update_Date']; ?></td>
                                <td><a href="<?php echo base_url('blogdelete/' . $u['id']); ?>"><i class='fas fa-trash'
                                            style='font-size:20px'></i></a></td>
                                <td><a href="<?php echo base_url('blogrestore/' . $u['id']); ?>"><i
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