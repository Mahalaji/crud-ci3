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
/* General Reset */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Poppins', sans-serif;
    background-color: #f1f1f1;
    color: #333;
    line-height: 1.7;
    padding-top: 50px; /* Add padding for fixed navbar */
}

/* Header */
header {
    background: #34495e;
    /* padding: 15px 5%; */
    padding-right: 5%;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

header nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Header - Logo and Navigation Links (Left Aligned) */
header .logo img {
    height: 90px;
}

header ul {
    display: flex;
    list-style: none;
    align-items: center;
}

header ul li {
    margin-left: 30px;
}

header a {
    color: #fff;
    text-decoration: none;
    font-weight: 500;
    font-size: 1.1rem;
    transition: color 0.3s ease, transform 0.3s ease;
}

header a:hover {
    color: #f39c12;
    transform: translateY(-2px);
}

/* Header - Search Bar (Centered) */
header .search-bar {
    position: absolute;
    left: 45%;
    transform: translateX(-50%); /* Center the search bar */
    width: 400px;
    display: flex;
    align-items: center;
}

header .search-bar input {
    padding: 0.7rem 1.2rem 0.7rem 2.5rem; /* Added padding-left for the icon */
    border: 2px solid #3498db;
    border-radius: 20px;
    font-size: 1rem;
    width: 100%;
    transition: border-color 0.3s ease, background-color 0.3s ease;
}

header .search-bar input:focus {
    border-color: #f39c12;
    outline: none;
    background-color: #f7f7f7;
}

/* Search Icon */
header .search-bar .search-icon {
    position: absolute;
    left: 10px; /* Position the icon inside the input field */
    font-size: 1.3rem;
    color: #3498db;
    pointer-events: none; /* Prevent the icon from interfering with typing */
}

/* Header - Logo and Navigation Links (Left Aligned) */
header .logo img {
    height: 90px;
    max-width: 100%;
    margin-left: 90%;
}
header a.active {
    text-decoration: underline;
    color: #f39c12; 
}

/* Main Content */
main {
    max-width: 1200px;
    margin: 0 auto;
    padding: 5rem 3%;
}

h2 {
    font-size: 2.6rem;
    font-weight: 700;
    color: #2c3e50;
    text-align: center;
    margin-bottom: 3rem;
    text-transform: uppercase;
    letter-spacing: 2px;
}

h2::after {
    content: '';
    display: block;
    width: 50px;
    height: 3px;
    background-color: #f39c12;
    margin: 10px auto 0;
}

.post-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 2.5rem;
    margin-top: 3rem;
}

/* Article Cards */
article {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

article:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
}

.post-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.post-image:hover img {
    transform: scale(1.05);
}

.post-content {
    padding: 1.5rem;
    text-align: center;
}

.post-content h3 {
    font-size: 1.6rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 1rem;
    transition: color 0.3s ease;
}

.post-content h3:hover {
    color: #f39c12;
}

.post-content p {
    color: #7f8c8d;
    margin-bottom: 1.5rem;
    line-height: 1.6;
    font-size: 1rem;
}

.read-more {
    display: inline-block;
    background-color: #3498db;
    color: #fff;
    padding: 0.8rem 1.5rem;
    text-decoration: none;
    border-radius: 30px;
    font-weight: 600;
    text-transform: uppercase;
    transition: background-color 0.3s ease, transform 0.3s ease;
    font-size: 0.9rem;
}

.read-more:hover {
    background-color: #2980b9;
    transform: translateY(-2px);
}

a {
    text-decoration: none;
}
/* Footer */
footer {
    background-color: #2c3e50;
    color: #fff;
    text-align: center;
    padding: 3rem 5%;
    margin-top: 4rem;
}

footer p {
    font-size: 1rem;
    letter-spacing: 1px;
}

/* Mobile Responsiveness */
@media (max-width: 1024px) {
    header h1 {
        font-size: 2rem;
    }

    header ul {
        flex-direction: column;
        align-items: center;
        margin-top: 10px;
    }

    header ul li {
        margin: 10px 0;
    }

    .post-grid {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    }

    .read-more {
        padding: 0.6rem 1.2rem;
        font-size: 0.8rem;
    }
}

@media (max-width: 768px) {
    header {
        padding: 20px;
    }

    header h1 {
        font-size: 1.8rem;
    }

    h2 {
        font-size: 2rem;
    }

    .post-content h3 {
        font-size: 1.4rem;
    }

    .post-content p {
        font-size: 0.9rem;
    }
}

@media (max-width: 480px) {
    main {
        padding: 2rem 5%;
    }

    h2 {
        font-size: 1.75rem;
    }

    .post-content h3 {
        font-size: 1.2rem;
    }

    .post-content p {
        font-size: 0.9rem;
    }

    .read-more {
        padding: 0.5rem 1rem;
        font-size: 0.75rem;
    }
}

</style>

<body>
    <header>
        <nav>
        <div class="logo">
            <a href="<?php echo base_url('blogsite'); ?>"><img src="logo.png" alt="Logo"></a>
        </div>
        <ul>
            <li><a href="<?php echo base_url('blogsite'); ?>" class="<?= ($this->uri->segment(1) == 'blogsite') ? 'active' : ''; ?>">Home</a></li>
            <li><a href="<?php echo base_url('blogsdata'); ?>" class="<?= ($this->uri->segment(1) == 'blogsdata') ? 'active' : ''; ?>">Blogs</a></li>
            <li><a href="<?php echo base_url('newsshow'); ?>" class="<?= ($this->uri->segment(1) == 'newsshow') ? 'active' : ''; ?>">News</a></li>
        </ul>
        <div class="search-bar">
            <input type="text" placeholder="Search..." />
            <span class="search-icon">&#128269;</span>
        </div>
        </nav>
        
    </header>

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
    <script>

document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.querySelector('.search-bar input');
    const posts = document.querySelectorAll('.post-grid article');  

    searchInput.addEventListener('input', function () {
        const searchText = searchInput.value.toLowerCase(); 
        
        posts.forEach(post => {
            const title = post.querySelector('.post-content h3').textContent.toLowerCase();  
            const description = post.querySelector('.post-content p').textContent.toLowerCase(); 

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
