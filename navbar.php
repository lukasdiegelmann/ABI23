<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="https://informatik.marianum-fulda.de/abi23" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img src="/abi23/assets/imgs/blue-m.jpg" alt="" width="40" height="40">
        </a>
    
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="pages/ticker.php" class="nav-link px-2 link-dark">Ticker</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Umfragen</a></li>
            <li><a href="pages/images_platter.php" class="nav-link px-2 link-dark">Bilder/Sprüche</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Sponsoren</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Vorschläge</a></li>
            <li><a href="pages/contact.php" class="nav-link px-2 link-dark">Kontakt</a></li>
        </ul>
    
        <div class="col-md-3 text-end">
            <?php 
                if($_SESSION['logedin']==1) {
                    ?>
                        <form method="post" action="index.php?logoutbutton">
                            <button type="submit" class="btn btn-outline-primary me-2">Logout</button>                          
                        </form>
                    <?php            
                }else{
                    ?>
                        <form action="/abi23/login_page.php">
                            <button type="submit" class="btn btn-outline-primary me-2">Login</button>                          
                        </form>
                    <?php  
                }
                if(isset($_GET['logoutbutton'])) {
                    session_destroy();
                    header('Location: /abi23/'); 
                }
              
           ?>
            
            
            
           
        </div>
    </header>
</div>
