 <?php 
    function sessionstart($username, $klasse){  //Starten einer Session mit Benutzername und Klasse als Parameter
    session_start([
        'cookie_lifetime' => 2592000, //Coockie setzen für 1 Monat=2592000s
    ]);
    $_SESSION['logedin']=1; //Session-Variable, eingeloggt: 1
    $_SESSION['username']="$username";                
    $_SESSION['klasse']="$klasse";   
    echo "Login erfolgreich";
    }
    
    function authenticate_ad($username, $userpass){
    $adServer = "ldap://10.16.1.1"; //LDAP-Server der Schule
    $ldap = ldap_connect($adServer); //Verbindungsvariable

    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3); //LDAP-Version festlegen
    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0); //Ldap-Verweisen nicht folgen

    // Einloggen für die nach Klassen geordneten Gruppen und heilc aus Gruppe Teachers

    $ldaprdn12a = 'CN='.$username.',OU=12a,OU=Students,OU=default-school,OU=SCHOOLS,DC=srv,DC=marianum-fulda,DC=de';
    $ldaprdn12b = 'CN='.$username.',OU=12b,OU=Students,OU=default-school,OU=SCHOOLS,DC=srv,DC=marianum-fulda,DC=de';
    $ldaprdn12c = 'CN='.$username.',OU=12c,OU=Students,OU=default-school,OU=SCHOOLS,DC=srv,DC=marianum-fulda,DC=de';
    $ldaprdn12d = 'CN='.$username.',OU=12d,OU=Students,OU=default-school,OU=SCHOOLS,DC=srv,DC=marianum-fulda,DC=de';
    $ldaprdn12e = 'CN='.$username.',OU=12e,OU=Students,OU=default-school,OU=SCHOOLS,DC=srv,DC=marianum-fulda,DC=de';
    $ldaprdnheilc = 'CN=heilc,OU=Teachers,OU=default-school,OU=SCHOOLS,DC=srv,DC=marianum-fulda,DC=de';
    
    //$bind = @ldap_bind($ldap, $ldaprdn, $userpass); //Definition des bind, findet jetzt pro Klasse im if statt        
    if         (@ldap_bind($ldap, $ldaprdn12a, $userpass)) { sessionstart($username,"12a");  //Ausführen des Bind, Rückgabewert: Boolean //für alle OU=12a probieren
    }  elseif  (@ldap_bind($ldap, $ldaprdn12b, $userpass)) { sessionstart($username,"12b");  //12b
    }  elseif  (@ldap_bind($ldap, $ldaprdn12c, $userpass)) { sessionstart($username,"12c");  //12b
    }  elseif  (@ldap_bind($ldap, $ldaprdn12d, $userpass)) { sessionstart($username,"12d");  //12b
    }  elseif  (@ldap_bind($ldap, $ldaprdn12e, $userpass)) { sessionstart($username,"12e");  //12b
    }  elseif  ($username=="heilc" && @ldap_bind($ldap, $ldaprdnheilc, $userpass) ) { sessionstart($username,"Teacher");  //Herr Heil
    }  else {echo "Login fehlgeschlagen";}        
    }
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
    if($_SESSION['logedin']) {
      ?>
      <!--
        //abmeldebutton
        /*
        call on logout button press
        <?php
        if ($_SESSION['logedin']==1) { session_destroy();
          header('location:'.$_SERVER['PHP_SELF']);     
        }
        ?>
        */
        -->
      <?php
    }else {
     if(array_key_exists('button1', $_POST)) {
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
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }
    ?>
</body>
</html>
