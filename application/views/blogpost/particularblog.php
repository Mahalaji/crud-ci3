
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attractive Blog</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('public/blog/particularblog.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav>
            <h1>Mahala ji</h1>
            <ul>
              <li><a href="<?php echo base_url('blogsite'); ?>">Home</a></li>
                <li><a href="<?php echo base_url('blogsdata'); ?>">Blogs</a></li>
                <li><a href="<?php echo base_url('newsshow'); ?>">News</a></li>
            </ul>
        </nav>
    </header>

    <main>
       
    <div class="row">
    <section id="recent-posts" class="col-md-9">
            <div class="post-grid">
                <article class="featured">
                    <div class="post-image" >
                    <img src="<?php echo base_url('uploads/images/'.$user['image']); ?>"/>
                    </div>
                    <div class="post-content">
                        <h3><strong> Title: </strong><?php  echo $user['Title'];  ?></h3>
                        <p><?php echo $user['Description']; ?></p>
                        <p class="para"> <strong> Create Date: </strong><?= $user['Create_Date']; ?></p>
                        <p class="para"> <strong> Update Date:</strong> <?= $user['Update_Date']; ?></p>
                    </div>
                </article>
            </div>
               
    </section>
    <div class="col-md-3" style=" margin-top: 40px;">
        
          <ul class="list">
            <h4><strong>Related Category Blogs</strong></h4>
            <?php foreach ($sideblog as $row):?>
              
              <a href="<?= base_url('blogs/'). $row['blog_title_category']. '/'. $row['slug'];?>">
              <li class="li-container"><img src="<?= base_url('uploads/images/' . $row['image']); ?>" class="card-img-top" ?>
                <h5 class="card-title"><?= $row['Title']; ?></h5>
                </a>
              </li>
              <?php endforeach; ?>
          </ul>
    </div>
    </div>
        
    </main>
 
    <footer>
        <p>&copy; 2024 Attractive Blog. All rights reserved.</p>
    </footer>

</body>
</html>