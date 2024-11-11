
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
                <li><a href="#home">Home</a></li>
                <li>About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="featured-post">
            <h2>Featured Post</h2>
            <article class="featured">
                <div class="post-image" style="background-image: url('https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1352&q=80');"></div>
                <div class="post-content">
                    <h3>The Future of Web Design</h3>
                    <p>Explore the cutting-edge trends and technologies shaping the future of web design. From AI-driven layouts to immersive 3D experiences, discover what's next in the digital realm.</p>
                    <a href="#" class="read-more">Read More</a>
                </div>
            </article>
        </section>

        <section id="recent-posts">
            <h2>Recent Posts</h2>
            <div class="post-grid">
                <?php
                foreach($user as $row):
                ?>
                
                <article class="content">
                   
                    <div class="post-image" >
                    <img src="uploads/images/<?php echo $row['image'] ?>"  style="    width: -webkit-fill-available;
    height: 14rem;"/>
                    </div>
                    <div class="post-content">
                     <h3><?php echo $row['Title']; ?></h3>
                     <p><?php echo $row['Description']; ?></p>
                     <p> Create Date: <?= $row['Create_Date']; ?></p>
                     <p> Update Date: <?= $row['Update_Date']; ?></p>
                     
                        <a href="#" class="read-more">Read More</a>
                    
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
            $(".content").slice(0, 3).show();
            $("#loadMore").on("click", function(e){
                e.preventDefault();
                $(".content:hidden").slice(0, 3).slideDown();
                if($(".content:hidden").length == 0) {
                $("#loadMore").text("").addClass("");
                }
            });
            
            })
    </script>
</body>
</html>