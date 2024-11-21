<?php include("side_and_header.php");?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="<?php echo base_url('public/css/blogcategoryadd.css') ?>">
<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
<h2 class="header"> Edit-Blog-Category</h2>
<div class="form1">
    <form class="simple" method="post" action="<?php echo base_url('blogcategoryedit')?>" enctype="multipart/form-data">

        <div class="input-group">
            <label>Seo title</label>
            <input type="text" id="seo_title" name="seo_title" value="<?php echo $user['seo_title']; ?>">
            <div class="error-message"> <?= form_error('seo_title') ?></div>
        </div>
        <div class="input-group">
            <label>Meta Keyword</label>
            <input type="text" id="meta_keyword" name="meta_keyword" value="<?php echo $user['meta_keyword']; ?>">
            <div class="error-message"> <?= form_error('meta_keyword') ?></div>
        </div>
        <div class="input-group">
            <label>Seo Robat</label>
            <input type="text" id="seo_robat" name="seo_robat" value="<?php echo $user['seo_robat']; ?>">
            <div class="error-message"> <?= form_error('seo_robat') ?></div>
        </div>
        <div class="input-group">
            <label>Meta Description</label>
            <textarea  class="ta10em"  name="meta_description">
                <?php echo $user['meta_description']; ?>
            </textarea>
                <div class="error-message"> <?= form_error('meta_description') ?></div>

        </div>

        <div class="input-group">
            <input type="hidden" id="id" name="id" value="<?php echo $user['id']; ?>">
        </div>


        <div class="submit">
            <button type="submit" class="btn" name="update">Update Blog Category</button>
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