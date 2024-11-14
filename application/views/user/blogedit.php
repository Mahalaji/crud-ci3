<?php include("side_and_header.php");?>
<link rel="stylesheet" href="<?php echo base_url('public/css/blogedit.css') ?>">
<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
            <h2 class="header"> Edit-Blog</h2>
            <div class="form1">
                <form class="simple" method="post" action="<?php echo base_url('edit')?>" enctype="multipart/form-data">
                    <div id="d">
                        <div>
                            <div class="input-group">
                                <label>Name</label>
                                <input type="text" id="Name" name="Name" onkeyup="lettersOnly(this)"
                                    value="<?php echo $user['Name']; ?>">
                                <div class="error-message"> <?= form_error('Name') ?></div>

                            </div>
                            <div class="input-group">
                                <label>Title</label><br>
                                <input type="text" id="Title" name="Title" value="<?php echo $user['Title']; ?>">
                                <input type="hidden" id="id" name="id" value="<?php echo $user['id']; ?>">
                                <div class="error-message"> <?= form_error('Title') ?></div>


                            </div>
                            

                        </div>
                        <div>
                            <div class="input-group">
                                <label for="image">Upload Image:</label><br>
                                <?php if (!empty($user['image'])): ?>
                                <img src="<?php echo base_url('uploads/images/' . $user['image']); ?>" alt="Blog Image"
                                    height="100">
                                <?php else: ?>
                                <span>No Image</span>
                                <?php endif; ?>
                                <input type="file" name="image" id="image" />
                                <?php if (isset($upload_error)) { echo '<div class="error-message">' . $upload_error . '</div>'; } ?>
                            </div>
                            <div class="input-group">
                                <label>Create Date</label>
                                <input type="date" id="Create Date" name="Create_Date"
                                    value="<?php echo $user['Create_Date']; ?>">
                            </div>
                            <div class="input-group">
                                <label>Update Date</label>
                                <input type="date" id="Update Date" name="Update_Date"
                                    value="<?php echo $user['Update_Date']; ?>">
                            </div>
                            <div class="input-wrapper">
                                <label>Description</label>
                                <textarea id="editor" name="Description" value="<?php echo $user['Description']; ?>">
                     &lt;p&gt;Your massage .&lt;/p&gt;
                       </textarea>
                            </div>

                            <div class="submit">
                                <button type="submit" class="btn" name="update">Update Blog</button>
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