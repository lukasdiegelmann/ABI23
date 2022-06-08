<?php
  include "login.php";
?>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Google Font-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@1,300&display=swap" rel="stylesheet">
  <!-- fontawesome.com-->
  <script src="https://kit.fontawesome.com/1c799d369e.js" crossorigin="anonymous"></script>
  <!-- Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>  <!-- Eigene CSS-->
  <!-- Eigene CSS -->
  <link href="assets/css/login.css" rel="stylesheet" />
</head>
<body>
  <?php
    if(array_key_exists('loginbutton', $_POST)) {
          authenticate_ad($_POST['username'], $_POST['password']);
      }
   ?>
      </form>
        <div class="login">
            <div class="login__wrapper">
                <div class="login__wrapper__image">
                    <img src="assets/imgs/blue-m.jpg" alt="...">
                </div>
                <form class="needs-validation" method="post" novalidate>
                    <!-- Username Input -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="username" required>
                        <label for="floatingInput">Benutzername</label>
                    </div>

                    <!-- Password Input -->
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required >
                        <label for="floatingPassword">Passwort</label>
                    </div>

                    <div class="form-floating">
                        <div class="form-text">Bitte verwende die Daten für deinen Marianum-Cloud-Zugang</div>
                    </div>
                    
                    <div class="login__wrapper__form__submit">
                        <button name="loginbutton" type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }
  
    ?>
</body>
</html>
