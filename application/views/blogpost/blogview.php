<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attractive Blog</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<style>
/* Reset default styles */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Poppins', sans-serif;
    background-color: #f7f7f7;
    color: #333;
    line-height: 1.6;
}

/* Header */
header {
    background: linear-gradient(45deg, #8e44ad, #3498db);
    padding: 1rem 5%;
    position: sticky;
    top: 0;
    z-index: 1000;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

nav h1 {
    color: #fff;
    font-size: 2rem;
    font-weight: 700;
    letter-spacing: 1px;
}

nav ul {
    display: flex;
    list-style: none;
}

nav ul li {
    margin-left: 2rem;
}

nav a {
    color: #fff;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease, transform 0.3s ease;
}

nav a:hover {
    color: #f39c12;
    transform: scale(1.1);
}

/* Main content */
main {
    padding: 4rem 5%;
    max-width: 1200px;
    margin: 0 auto;
}

h2 {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    text-align: center;
    margin-bottom: 3rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.post-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 2.5rem;
    justify-items: center;
    margin-top: 3rem;
}

/* Article Cards */
article {
    background-color: #fff;
    border-radius: 16px;
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

article:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
}

.post-image {
    height: 200px;
    background-size: cover;
    background-position: center;
    border-top-left-radius: 16px;
    border-top-right-radius: 16px;
    transition: transform 0.3s ease;
}

.post-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.post-image:hover img {
    transform: scale(1.1);
}

.post-content {
    padding: 1.5rem;
    text-align: center;
    background-color: white;
}

.post-content h3 {
    font-size: 1.75rem;
    font-weight: 600;
    color: #34495e;
    margin-bottom: 1rem;
    transition: color 0.3s ease;
}

.post-content h3:hover {
    color: #3498db;
}

.post-content p {
    color: #7f8c8d;
    margin-bottom: -1.5rem;
    line-height: 1.6;
    font-size: 1rem;
}

.read-more {
    display: inline-block;
    background-color: #3498db;
    color: #fff;
    padding: 0.8rem 1.5rem;
    text-decoration: none;
    border-radius: 4px;
    font-weight: 600;
    text-transform: uppercase;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.read-more:hover {
    background-color: #2980b9;
    transform: translateY(-2px);
}

.feature {
    height: 412px;
}

a {
    text-decoration: none;
}

footer {
    background-color: #34495e;
    color: #fff;
    text-align: center;
    padding: 2rem;
    margin-top: 4rem;
    font-size: 1rem;
    letter-spacing: 1px;
}

/* Featured Post Section */
#featured-post .featured {
    display: grid;
    grid-template-columns: 1fr 1fr;
    /* gap: 3rem; */
    margin-bottom: 3rem;
}

#featured-post .post-image {
    min-height: 350px;
    border-radius: 16px;
    transition: transform 0.5s ease;
}

#featured-post .post-image:hover {
    transform: scale(1.05);
}

#featured-post h2 {
    font-size: 2.5rem;
    color: #2c3e50;
    text-align: center;
    font-weight: 700;
    margin-bottom: 2rem;
}

/* Mobile Responsiveness */
@media (max-width: 768px) {
    nav {
        flex-direction: column;
        align-items: flex-start;
    }

    nav h1 {
        margin-bottom: 1rem;
    }

    nav ul {
        margin-top: 1rem;
        flex-direction: column;
    }

    nav ul li {
        margin-left: 0;
        margin-bottom: 1rem;
    }

    .post-grid {
        grid-template-columns: 1fr;
    }

    footer {
        font-size: 0.9rem;
    }

    .post-content h3 {
        font-size: 1.4rem;
    }

    .read-more {
        padding: 0.6rem 1.2rem;
    }

}

/* Hover effects for images */
.post-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.post-image:hover img {
    transform: scale(1.05);
}

/* Scroll animations for elements */
.fade-in {
    opacity: 0;
    transform: translateY(50px);
    transition: opacity 0.6s ease-out, transform 0.6s ease-out;
}

.fade-in.visible {
    opacity: 1;
    transform: translateY(0);
}
</style>

<script>
// Scroll animation trigger
window.addEventListener('scroll', function() {
    let elements = document.querySelectorAll('.fade-in');
    elements.forEach(element => {
        if (element.getBoundingClientRect().top < window.innerHeight) {
            element.classList.add('visible');
        }
    });
});
</script>

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
        <section id="featured-post">
            <h2>Featured Post</h2>
            <article class="featured">
                <div class="post-image"
                    style="background-image: url('https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1352&q=80');">
                </div>
                <div class="post-content">
                    <h3>The Future of Web Design</h3>
                    <p>Explore the cutting-edge trends and technologies shaping the future of web design. From AI-driven
                        layouts to immersive 3D experiences, discover what's next in the digital realm.</p>
                    <a href="#" class="read-more">Read More</a>
                </div>
            </article>
        </section>

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
                        <a
                            href="<?php echo base_url('blogs/'). $row['blog_title_category']. '/'. $row['slug']. '/'. $row['id'];?>">
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
                        <a
                            href="<?php echo base_url('news/') . $news['news_title_category'].'/'.  $news['slug']. '/'. $news['id'];?>">
                            <h3><?php  echo $news['Title'];  ?></h3>
                            <p><?php echo $news['Description']; ?></p>
                        </a>
                    </div>
                </article>
                <?php endforeach; ?>

            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Attractive Blog. All rights reserved.</p>
    </footer>
</body>

</html>