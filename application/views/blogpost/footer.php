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