
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attractive Blog</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('public/blog/blogview.css'); ?>">
</head>

<body>
    <header>
        <nav>
            <h1>Attractive Blog</h1>
            <ul>
              <li><a href="<?php echo base_url('blogsite'); ?>">Home</a></li>
                <li><a href="<?php echo base_url('blogsshow'); ?>">Blogs</a></li>
                <li><a href="<?php echo base_url('newsshow'); ?>">News</a></li>
            </ul>
        </nav>
    </header>

    <main>
       

        <section id="recent-posts">
            <h2>Recent Blogs</h2>
            <div class="post-grid">
                <?php
                foreach($user as $row):
                ?>
                
                <article class="featured">
                   
                    <div class="post-image" >
                    <img src="uploads/images/<?php echo $row['image'] ?>"  style="    
    height: 14rem;"/>
                    </div>
                    <div class="post-content">
                     <h3><?php echo $row['Title']; ?></h3>
                     <p><?php echo $row['Description']; ?></p>
                     <p> Create Date: <?= $row['Create_Date']; ?></p>
                     <p> Update Date: <?= $row['Update_Date']; ?></p>
                     
                    
                </article>
                <?php endforeach; ?>

                </div>
             <a href="#" id="loadMore">Load More</a>
                
            </div>
        </section>
 
    </main>

    <footer>
        <p>&copy; 2024 Attractive Blog. All rights reserved.</p>
    </footer>
    <script>
      $(document).ready(function(){
            $(".featured").slice(0, 3).show();
            $("#loadMore").on("click", function(e){
                e.preventDefault();
                $(".featured:hidden").slice(0, 3).slideDown();
                if($(".featured:hidden").length == 0) {
                $("#loadMore").text("").addClass("");
                }
            });
            
            })
    </script>
</body>
</html>