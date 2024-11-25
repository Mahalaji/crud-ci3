<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attractive Blog</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('public/blog/particularnews.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/blog/header.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/blog/footer.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<?php include("header.php"); ?>

    <main>
       
       <div class="row">
       <section id="recent-posts" class="col-md-9">
               <div class="post-grid">
                   <article class="featured">
                   <div class="post-image">
                        <img src="<?php echo base_url('uploads/news_images/'.$news['Image']); ?>" />
                    </div>
                    <div class="post-content">
                        <h3><strong> Title: </strong><?php echo $news['Title']; ?></h3>
                        <p><?php echo $news['Description']; ?></p>
                        <p class="para"> <strong> Date: </strong><?= $news['Date']; ?></p>
                    </div>
                   </article>
               </div>
                  
       </section>
       <div class="col-md-3" style="padding-left: 100px; margin-top: 40px;">
       <h4><strong>Related Category News</strong></h4>
           
             <ul class="list">
               
               <?php foreach ($sidenews as $news):?>
                 
                 <a href="<?= base_url('news/') . $news['news_title_category'].'/'.  $news['slug'];?>">
                 <li class="li-container"><img src="<?php echo base_url('uploads/news_images/'.$news['Image']); ?>" class="card-img-top" ?>
                   <h5 class="card-title"><?= $news['Title'];?></h5>
                   </a>
                 </li>
                 <?php endforeach; ?>
             </ul>
       </div>
       </div>
           
       </main>
       <?php include("footer.php"); ?>

</body>

</html>