<?php include("side_and_header.php");?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="<?php echo base_url('public/css/blogedit.css') ?>">
<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
<h2 class="header"> Edit-Company</h2>
<div class="form1">
    <form class="simple" method="post" action="<?php echo base_url('editcompany')?>" enctype="multipart/form-data">
        <div>

            <div class="input-group">
                <label>Company Name</label><br>
                <input type="text" id="companyname" name="companyname" value="<?php echo $user['companyname']; ?>">
                <input type="hidden" id="id" name="id" value="<?php echo $user['id']; ?>">
                <div class="error-message"> <?= form_error('companyname') ?></div>
            </div>
            <div class="input-group">
                <label>Company Type</label>
                <input type="text" id="companytype" name="companytype" onkeyup="lettersOnly(this)"
                    value="<?php echo $user['companytype']; ?>">
                <div class="error-message"> <?= form_error('companytype') ?></div>
            </div>

            <div class="input-group">
                <label>Company Email</label>
                <input type="text" id="companyemail" name="companyemail" value="<?php echo $user['companyemail']; ?>">
            </div>

            <div class="submit">
                <button type="submit" class="btn" name="update">Update Company</button>
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