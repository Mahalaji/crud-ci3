<?php include("side_and_header.php");?>
<link rel="stylesheet" href="<?php echo base_url('public/css/newsedit.css') ?>">
<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<h2 class="header"> Edit-News</h2>
<div class="form1">
    <form class="simple" method="post" action="<?php echo base_url('newsedit')?>" enctype="multipart/form-data">
        <div id="d">
            <div>
                <div class="input-group">
                    <label>Author_Name</label>
                    <input type="text" id="Author_Name" name="Author_Name" onkeyup="lettersOnly(this)"
                        value="<?php echo $user['Author_Name']; ?>">
                    <div class="error-message"> <?= form_error('Author_Name') ?></div>

                </div>
                <div class="input-group">
                    <label>Title</label>
                    <input type="text" id="Title" name="Title" value="<?php echo $user['Title']; ?>">
                    <input type="hidden" id="id" name="id" value="<?php echo $user['id']; ?>">
                    <div class="error-message"> <?= form_error('Title') ?></div>
                    <div class="input-group">
                        <div class="input-group">
                           <br> <label>News Category</label>
                            <select id="news_title_category" name="news_title_category" >
                                <option value=""><?php echo $user['news_title_category']; ?></option>
                                <?php if (!empty($category)): ?>
                                <?php foreach ($category as $categorys): ?>
                                <option value="<?php echo $categorys['seo_title']; ?>">
                                    <?php echo $categorys['seo_title']; ?>
                                </option>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <option value="">No Categories Available</option>
                                <?php endif; ?>
                            </select>
                        </div>

                    </div>


                </div>
                <div>
                    <div class="input-group">
                        <label>Upload Image:</label><br>
                        <?php if (!empty($user['Image'])): ?>
                        <img src="<?php echo base_url('uploads/news_images/' . $user['Image']); ?>" alt="News Image"
                            height="100">
                        <?php else: ?>
                        <span>No Image</span>
                        <?php endif; ?>
                        <input type="file" name="image" id="image" />
                        <?php if (isset($upload_error)) { echo '<div class="error-message">' . $upload_error . '</div>'; } ?>
                    </div>
                    <div class="input-group">
                    <label>Seo title</label>
                    <input type="text" id="seo_title" name="seo_title" value="<?php echo $user['seo_title']; ?>">
                </div>
                <div class="input-group">
                    <label>Meta Keyword</label>
                    <input type="text" id="meta_keyword" name="meta_keyword"
                        value="<?php echo $user['meta_keyword']; ?>">
                </div>
                <div class="input-group">
                    <label>Seo Robat</label>
                    <input type="text" id="seo_robat" name="seo_robat" value="<?php echo $user['seo_robat']; ?>">
                </div>
                <div class="input-group">
                    <label>Meta Description</label>
                    <input type="text" id="meta_description" name="meta_description"
                        value="<?php echo $user['meta_description']; ?>">
                </div>
                    <div class="input-group">
                        <label>Date</label>
                        <input type="date" id="Date" name="Date" value="<?php echo $user['Date']; ?>">
                    </div>
                    <div class="input-group">
                        <label>Mobile Number</label>
                        <input type="text" id="Number" name="Number" value="<?php echo $user['Number']; ?>" required>
                    </div>
                    <div class="input-group">
                        <label>Email</label>
                        <input type="text" id="Email" name="Email" value="<?php echo $user['Email']; ?>" required>
                    </div>
                    <div class="input-wrapper">
                        <label>Description</label>
                        <textarea id="editor" name="Description" value="<?php echo $user['Description']; ?>">
                     &lt;p&gt;<?php echo $user['Description']; ?>&lt;/p&gt;
                       </textarea>
                    </div>

                    <div class="submit">
                        <button type="submit" class="btn" name="update">Update News</button>
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