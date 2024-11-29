<?php include("side_and_header.php");?>
<link rel="stylesheet" href="<?php echo base_url('public/css/blogadd.css') ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
<h2 class="header"> Add-Company</h2>
<div class="form1">
    <form class="simple" method="post" action="<?php echo base_url('addcompany')?>" enctype="multipart/form-data">

        <div>

            <div class="input-group">
                <label>Company Name</label><br>
                <input type="text" id="companyname" name="companyname">
                <div class="error-message"><?= form_error('companyname'); ?></div>
            </div>
            <div class="input-group">
                <label>Company Type</label>
                <input type="text" id="companytype" name="companytype" onkeyup="lettersOnly(this)">
                <div class="error-message"> <?= form_error('Name') ?></div>
            </div>

            <div class="input-group">
                <label>Company Email</label>
                <input type="text" id="companyemail" name="companyemail" required>
            </div>

            <div class="submit">
                <button type="submit" class="btn" name="update">Add Company</button>
            </div>
        </div>
    </form>
</div>

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