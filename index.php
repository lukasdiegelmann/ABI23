<?php
    //include "login.php";
    //include "ticker.php";
?>

<html>
    <?php
        //createTickerentry("1","2",NULL,"4", NULL,"6","7");
        //$result = readTicker(1, 2);
        //foreach($result as $row) {
            //echo $row['id'];
            //echo $row['committee'];
            //echo $row['creator'];
            //echo $row['creationdate'];
            //echo $row['eventdate'];
            //echo $row['eventplace'];
            //echo $row['expiredate'];
            //echo $row['title'];
            //echo $row['content'];
        //}
    ?>
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
                include "navbar.php";
                echo "cookie";
                echo $_SESSION['logedin'];
                echo $_SESSION['username'];
            ?>    
            <div class="skeleton__content">
                <!-- This is where to put the main content of the website -->
            </div>
            <div class="skeleton__footer">
                <?php
                    include "footer.php";
                ?>
            </div>
        </div>
    </body>
</html>


