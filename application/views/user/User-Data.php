<?php include("side_and_header.php");?>
<link rel="stylesheet" href="<?php echo base_url('public/css/user-data.css') ?>">

            <div class="header">
                <h1 id="user">User List
                    <form align="right" method="post">
                        <a href="<?php echo base_url('userregister'); ?>" style="    padding: 3px;
                                       background: grey;
                                       border-radius: 5px;
                                     font-size: 23px;
                                       border: 1px solid grey;">Add</a>
                </h1>
                <table>
                    <tr>

                        <th>Name</th>
                        <th>Email</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Password Change</th>
                    </tr>

                    <?php foreach ($user as $u): ?>
                    <tr>

                        <td><?php echo $u['name']; ?></td>
                        <td><?php echo $u['email']; ?></td>
                        <td><a href="<?php echo base_url('usereditdata/' . $u['id']); ?>"><i class='fas fa-edit' style='font-size:24px'></i></a></td>

                        <td><a href="<?php echo base_url('userdeletedata/' . $u['id']); ?>"><i class='fas fa-trash' style='font-size:36px'></i></a></td>
                        <td><a href="<?php echo base_url('userpass/' . $u['id'] ); ?>"><i class='fas fa-lock' style='font-size:24px'></i></a></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <div class="pagination-links">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </main>
    </div>
</body>

</html>