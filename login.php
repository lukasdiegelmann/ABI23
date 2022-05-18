 <?php 
    function sessionstart($username, $klasse, $nickname){  //Starten einer Session mit Benutzername und Klasse als Parameter
    session_start([
        'cookie_lifetime' => 2592000, //Coockie setzen für 1 Monat=2592000s
    ]);
    $_SESSION['logedin']=1; //Session-Variable, eingeloggt: 1
    $_SESSION['username']="$username";                
    $_SESSION['klasse']="$klasse";   
    $_SESSION['name'] = "$nickname";
    echo "Login erfolgreich";
    }
    
    function authenticate_ad($username, $userpass, $nickname){

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
    if         (@ldap_bind($ldap, $ldaprdn12a, $userpass)) { sessionstart($username,"12a", $nickname);  //Ausführen des Bind, Rückgabewert: Boolean //für alle OU=12a probieren
    }  elseif  (@ldap_bind($ldap, $ldaprdn12b, $userpass)) { sessionstart($username,"12b", $nickname);  //12b
    }  elseif  (@ldap_bind($ldap, $ldaprdn12c, $userpass)) { sessionstart($username,"12c", $nickname);  //12b
    }  elseif  (@ldap_bind($ldap, $ldaprdn12d, $userpass)) { sessionstart($username,"12d", $nickname);  //12b
    }  elseif  (@ldap_bind($ldap, $ldaprdn12e, $userpass)) { sessionstart($username,"12e", $nickname);  //12b
    }  elseif  ($username=="heilc" && @ldap_bind($ldap, $ldaprdnheilc, $userpass) ) { sessionstart($username,"Teacher", $nickname);  //Herr Heil
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
  <!-- Eigene CSS-->
  <link rel="stylesheet" href="style.css">
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
      ?>
        <form class="loginbox" method="$_POST">
        <!-- Username input -->
        <div class="form-outline mb-4">
          <input type="text" id="form2Example1" class="form-control" name="username"/>
          <label class="form-label" for="form2Example1">Marianum-Benutzername</label>
        </div>


          <!-- Nik  input -->
          <div class="form-outline mb-4">
            <input type="text" id="form2Example1" class="form-control" name="nickname" />
            <label class="form-label" for="form2Example1">Nickname</label>
          </div>
        

        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" id="form2Example2" class="form-control" name="password"/>
          <label class="form-label" for="form2Example2">Password</label>
        </div>

        <!-- 2 column grid layout for inline styling -->

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4" onclick="<?php authenticate_ad($_POST['username'], $_POST['password'], $_POST['nickname']); ?>">Sign in</button>
      </form>
    <?php
    }
    ?>
</body>
</html>
