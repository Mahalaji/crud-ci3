<?php include("side_and_header.php");?>
<link rel="stylesheet" href="<?php echo base_url('public/css/newsedit.css') ?>">
<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
            <h2 class="header"> Add-News</h2>
            <div class="form1">
                <form class="simple" method="post" action="<?php echo base_url('addnews')?>" enctype="multipart/form-data">
                    <div id="d">
                        <div>
                            <div class="input-group">
                                <label>Author_Name</label>
                                <input type="text" id="Author_Name" name="Author_Name" onkeyup="lettersOnly(this)">
                                <div class="error-message"> <?= form_error('Author_Name') ?></div>

                            </div>
                            <div class="input-group">
                                <label>Title</label><br>
                                <input type="text" id="Title" name="Title">
                                <div class="error-message"><?= form_error('Title'); ?></div>
                            </div>
                            <div class="input-group">
                    <label>News Category</label>
                    <select id="news_title_category" name="news_title_category" required>
                    <option value="">Select News Category</option>
                        <?php if (!empty($category)): ?>
                        <?php foreach ($category as $categorys): ?>
                        <option value="<?php echo $categorys['seo_title']; ?>"><?php echo $categorys['seo_title']; ?>
                        </option>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <option value="">No Categories Available</option>
                        <?php endif; ?>
                    </select>
                </div>

                        </div>
                        <div>
                            <div class="input-group">
                                <label>Upload Image:</label><br>
                                <input type="file" name="image" id="image" />
                                <?php if (isset($upload_error)) { echo '<div class="error-message">' . $upload_error . '</div>'; } ?>
                            </div>
                            <div class="input-group">
                                <label>Date</label>
                                <input type="date" id="Date" name="Date" required>
                            </div>
                            <div class="input-group">
                                <label>Mobile Number</label>
                                <input type="text" id="Number" name="Number" required>
                            </div>
                            <div class="input-group">
                                <label>Email</label>
                                <input type="text" id="Email" name="Email" required>
                            </div>
                            <div class="input-group">
                                <label>Seo title</label>
                                <input type="text" id="seo_title" name="seo_title" required>
                            </div>
                            <div class="input-group">
                                <label>Meta Keyword</label>
                                <input type="text" id="meta_keyword" name="meta_keyword" required>
                            </div>
                            <div class="input-group">
                                <label>Seo Robat</label>
                                <input type="text" id="seo_robat" name="seo_robat" required>
                            </div>
                            <div class="input-group">
                                <label>Meta Description</label>
                                <input type="text" id="meta_description" name="meta_description" required>
                            </div>
                            <div class="input-group">
                                <label>Description</label>
                                <textarea id="editor" name="Description">
                     &lt;p&gt;Your massage .&lt;/p&gt;
                       </textarea>
                            </div>

                            <div class="submit">
                                <button type="submit" class="btn" name="update">Add News</button>
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