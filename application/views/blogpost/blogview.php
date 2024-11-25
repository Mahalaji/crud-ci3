<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attractive Blog</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('public/blog/blogview.css'); ?>">
</head>

<body>

    <div class="header">

        <nav>
            <ul>
                <li><a href="<?php echo base_url('blogsite'); ?>"
                        class="<?= ($this->uri->segment(1) == 'blogsite') ? 'active' : ''; ?>">Home</a></li>
                <li><a href="<?php echo base_url('blogsdata'); ?>"
                        class="<?= ($this->uri->segment(1) == 'blogsdata') ? 'active' : ''; ?>">Blogs</a></li>
                <li><a href="<?php echo base_url('newsshow'); ?>"
                        class="<?= ($this->uri->segment(1) == 'newsshow') ? 'active' : ''; ?>">News</a></li>
            </ul>
        </nav>
        <div class="sides"> <a href="#" class="menu"> </a></div>
        <div class="info">

            <h4><a href="#category">UI DESIGN</a></h4>
            <h1>KEN BURNS HEADERS ARE THE BEST</h1>
            <div class="meta">
                <a href="https://twitter.com/nodws" target="_b" class="author"></a><br>
                By <a href="https://twitter.com/nodws" target="_b">James Nodws</a> on May 30, 2019
            </div>
        </div>
    </div>

    <main>
        <section id="recent-posts">
            <h2>Recent Blogs</h2>
            <div class="post-grid">
                <?php 
                foreach($user as $row):
                ?>
                <article class="feature">
                    <div class="post-image">
                        <img src="uploads/images/<?php echo $row['image'] ?>" style="height: 14rem;" />
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
        </section>

        <section id="recent-posts">
            <h2>Recent News</h2>
            <div class="post-grid">
                <?php
                foreach($newsview as $news):
                ?>
                <article class="feature">
                    <div class="post-image">
                        <img src="uploads/news_images/<?php echo $news['Image'] ?>" style="height: 14rem;" />
                    </div>
                    <div class="post-content">
                        <a href="<?php echo base_url('news/') . $news['news_title_category'].'/'.  $news['slug'];?>">
                            <h3><?php  echo $news['Title'];  ?></h3>
                            <p><?php echo $news['Description']; ?></p>
                        </a>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="waves">
            <div class="wave" id="wave1"></div>
            <div class="wave" id="wave2"></div>
            <div class="wave" id="wave3"></div>
            <div class="wave" id="wave4"></div>
        </div>
        <ul class="social-icon">
            <li class="social-icon_item"><a class="social-icon_link" href="#">
                    <ion-icon name="logo-facebook"></ion-icon>
                </a></li>
            <li class="social-icon_item"><a class="social-icon_link" href="#">
                    <ion-icon name="logo-twitter"></ion-icon>
                </a></li>
            <li class="social-icon_item"><a class="social-icon_link" href="#">
                    <ion-icon name="logo-linkedin"></ion-icon>
                </a></li>
            <li class="social-icon_item"><a class="social-icon_link" href="#">
                    <ion-icon name="logo-instagram"></ion-icon>
                </a></li>
        </ul>
        <ul class="menu">
            <li class="menu_item"><a class="menu_link" href="#">Home</a></li>
            <li class="menu_item"><a class="menu_link" href="#">About</a></li>
            <li class="menu_item"><a class="menu_link" href="#">Services</a></li>
            <li class="menu_item"><a class="menu_link" href="#">Team</a></li>
            <li class="menu_item"><a class="menu_link" href="#">Contact</a></li>

        </ul>
        <p>&copy;2021 Nadine Coelho | All Rights Reserved</p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('.search-bar input');
        const posts = document.querySelectorAll('.post-grid article');

        searchInput.addEventListener('input', function() {
            const searchText = searchInput.value.toLowerCase();

            posts.forEach(post => {
                const title = post.querySelector('.post-content h3').textContent.toLowerCase();
                const description = post.querySelector('.post-content p').textContent
                    .toLowerCase();

                if (title.includes(searchText) || description.includes(searchText)) {
                    post.style.display = 'block';
                } else {
                    post.style.display = 'none';
                }
            });
        });
    });
    </script>

</body>

</html>