<?php include("side_and_header.php");?>
<link rel="stylesheet" href="<?php echo base_url('public/css/pagesadd.css') ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
            <h2 class="header"> Edit-pages</h2>
            <div class="form1">
            <form class="simple" method="post" action="<?php echo base_url('pagesedit')?>" enctype="multipart/form-data">
                    <div id="d">
                        <div>
                            
                            <div class="input-group">
                                <label>Title</label><br>
                                <input type="text" id="Title" name="Title" value="<?php echo $user['Title']; ?>">
                                <input type="hidden" id="id" name="id" value="<?php echo $user['id']; ?>">
                                <div class="error-message"> <?= form_error('Title') ?></div>


                        </div>
                        <div>
                           
                            
                            <div class="input-group">
                                <label>Mobile Number</label>
                                <input type="text" id="number" name="number" value="<?php echo $user['number']; ?>">
                                <div class="error-message"> <?= form_error('number') ?></div>
                            </div>
                            <div class="input-group">
                                <label>Email</label>
                                <input type="text" id="email" name="email" value="<?php echo $user['email']; ?>">
                                <div class="error-message"> <?= form_error('email') ?></div>
                            </div>
                            <div class="input-group">
                            <label >Gender:</label><br>
                                <select id="gender" name="gender" value="<?php echo $user['gender']; ?>" >
                                <div class="error-message"> <?= form_error('gender') ?></div>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select><br><br>
                                </div>
                            <div class="input-group">
                                <label>Date</label>
                                <input type="date" id="Date" name="Date" value="<?php echo $user['Date']; ?>" required>
                            </div>
                            <div class="input-group">
                                <label>Description</label>
                                <textarea id="editor" name="description"value="<?php echo $user['description']; ?>" required>
                     &lt;p&gt;Your massage .&lt;/p&gt;
                       </textarea>
                            </div>

                            <div class="submit">
                                <button type="submit" class="btn" name="update">Update Pages</button>
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