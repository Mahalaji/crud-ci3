<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attractive Blog</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('public/blog/blogshow.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/blog/header.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/blog/footer.css'); ?>">

</head>

<body>
    <?php include("header.php"); ?>
    <main>
        <div class="row">
            <section id="recent-posts" class="col-md-9">
                <h2>Recent Blogs</h2>
                <div class="post-grid">
                    <?php foreach($user as $row):?>

                    <article class="featured">

                        <div class="post-image">
                            <img src="uploads/images/<?php echo $row['image'] ?>" style=" height: 14rem;" />
                        </div>
                        <div class="post-content">
                            <a href="<?php echo base_url('blogs/'). $row['blog_title_category']. '/'. $row['slug'];?>">
                                <h3><?php  echo $row['Title'];  ?></h3>
                                <p><?php echo $row['Description']; ?></p>
                            </a>
                        </div>
                    </article>
                    <?php endforeach; ?>

                </div>
                <a href="#" id="loadMore">Load More</a>
            </section>
            <div class="col-md-3" style=" margin-top: 40px;">
                <h5><strong>Blog Categories:-</strong></h5>
                <h5 class="form-like">
                    <ul class="list">
                        <?php foreach ($sideblogcategory as $row):?>
                            <a href="<?= base_url('blogss/'. $row['seo_title'] ); ?>">
                                <h5 class="card-title"><?= $row['seo_title']; ?></h5>
                            </a>
                            </li>
                            <?php endforeach; ?>
                    </ul>
                </h5>
            </div>
        </div>
    </main>
    <?php include("footer.php"); ?>
    <script>
    $(document).ready(function() {
        $(".featured").slice(0, 2).show();
        $("#loadMore").on("click", function(e) {
            e.preventDefault();
            $(".featured:hidden").slice(0, 2).slideDown();
            if ($(".featured:hidden").length == 0) {
                $("#loadMore").hide();
            }
        });

    })
    </script>
</body>

</html>