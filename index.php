<?php
    include "login.php";
?>

<html>
    <head>
        <!-- Downloading Bootstrap from CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- Linking to local CSS -->
        <link href="./assets/css/index.css" rel="stylesheet" />
    </head>
    <body>
        <div class="skeleton">
            <?php
                include "navbar.php"
            ?>
            <?php
                include "footer.php"
            ?>
        </div>
    </body>
</html>

/*
call on logout button press
<?php
    if ($_SESSION['logedin']==1) { session_destroy();
        header('location:'.$_SERVER['PHP_SELF']);     
    }
?>
*/