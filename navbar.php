<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="https://informatik.marianum-fulda.de/abi23" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img src="/abi23/assets/imgs/blue-m.jpg" alt="" width="40" height="40">
        </a>
    
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="ticker.php" class="nav-link px-2 link-secondary">Ticker</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Umfragen</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Bilder</a></li>
        </ul>
    
        <div class="col-md-3 text-end">
            <?php 
                if($_SESSION['logedin']==1) {
            ?>
                    <button type="button" class="btn btn-outline-primary me-2">Logout</button>
            <?php
                }else{
            ?>
                <button onclick="location.href = '/abi23/login_page.php';"type="button" class="btn btn-outline-primary me-2">Login</button>
            <?php
                }
            //if ($_SESSION['logedin']==1) { session_destroy();
          //header('location:'.$_SERVER['PHP_SELF']);   
           ?>
            
            
            
           
        </div>
    </header>
</div>
