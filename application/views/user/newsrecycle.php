<?php include("side_and_header.php");?>
<link rel="stylesheet" href="<?php echo base_url('public/css/newsrecycle.css') ?>">

            <div class="info" style=" background: white;">

                <div class="header" style=" background: white;">
                    <div id="back">
                        <h1>News-Recycle-List

                        </h1>
                        <table>
                            <tr>
                                <th>Author_Name</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Delete</th>
                                <th>Restore</th>

                            </tr>
                            <?php foreach ($newsrecycle as $u): ?>
                            <tr>
                                <td><?php echo $u['Author_Name']; ?></td>
                                <td>
                                    <?php if (!empty($u['Image'])): ?>
                                    <img src="<?php echo base_url('uploads/news_images/' . $u['Image']); ?>"
                                        alt="news Image" height="50">
                                    <?php else: ?>
                                    <span>No Image</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $u['Title']; ?></td>
                                <td><?php echo $u['Description']; ?></td>
                                <td><?php echo $u['Date']; ?></td>
                                <td><a href="<?php echo base_url('newsdelete/' . $u['id']); ?>"><i class='fas fa-trash'
                                            style='font-size:20px'></i></a></td>
                                <td><a href="<?php echo base_url('newsrestore/' . $u['id']); ?>"><i
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