<?php include("side_and_header.php");?>
<link rel="stylesheet" href="<?php echo base_url('public/css/blogadd.css') ?>">
<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
            <h2 class="header"> Add-Blog</h2>
            <div class="form1">
                <form class="simple" method="post" action="<?php echo base_url('add')?>" enctype="multipart/form-data">
                    <div id="d">
                        <div>
                            <div class="input-group">
                                <label>Name</label>
                                <input type="text" id="Name" name="Name" onkeyup="lettersOnly(this)">
                                <div class="error-message"> <?= form_error('Name') ?></div>

                            </div>
                            <div class="input-group">
                                <label>Title</label><br>
                                <input type="text" id="Title" name="Title">
                                <div class="error-message"> <?= form_error('Title') ?></div>


                            </div>
                         

                        </div>
                        <div>
                            <div class="input-group">
                                <label>Upload Image:</label><br>
                                <input type="file" name="image" id="image" />
                                <?php if (isset($upload_error)) { echo '<div class="error-message">' . $upload_error . '</div>'; } ?>
                            </div>
                            <div class="input-group">
                                <label>Create Date</label>
                                <input type="date" id="Create Date" name="Create_Date" required>
                            </div>
                            <div class="input-group">
                                <label>Update Date</label>
                                <input type="date" id="Update Date" name="Update_Date" required>
                            </div>
                            <div class="input-group">
                                <label>Description</label>
                                <textarea id="editor" name="Description">
                     &lt;p&gt;Your massage .&lt;/p&gt;
                       </textarea>
                            </div>

                            <div class="submit">
                                <button type="submit" class="btn" name="update">Add Blog</button>
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