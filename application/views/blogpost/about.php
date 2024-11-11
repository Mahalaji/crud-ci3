<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <link rel="stylesheet" href="<?php echo base_url('public/blog/about.css'); ?>">
</head>
<body>

    <!-- Header Section -->
    <header>
        <div class="container">
            <h1>My Blog</h1>
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Blog Posts</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content Section -->
    <div class="container">
        <main>
            <!-- Blog Post Section -->
            <article>
                <h2>First Blog Post</h2>
                <p class="date">Posted on: October 11, 2024</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut felis ligula...</p>
                <a href="#">Read more</a>
            </article>

            <!-- Blog Post Section -->
            <article>
                <h2>Second Blog Post</h2>
                <p class="date">Posted on: October 10, 2024</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut felis ligula...</p>
                <a href="#">Read more</a>
            </article>
        </main>

        <!-- Sidebar Section -->
        <aside>
            <h3>About Me</h3>
            <p>Hello! I am a passionate writer and tech enthusiast. Welcome to my blog!</p>
            <h3>Categories</h3>
            <ul>
                <li><a href="#">Technology</a></li>
                <li><a href="#">Lifestyle</a></li>
                <li><a href="#">Travel</a></li>
            </ul>
        </aside>
    </div>

    <!-- Footer Section -->
    <footer>
        <div class="container">
            <p>&copy; 2024 My Blog. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
