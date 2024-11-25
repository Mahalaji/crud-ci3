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