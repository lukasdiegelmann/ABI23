<html>

<head> 
<?php include "include/head.php"; 
      function sessionstart($username,$klasse){  //Starten einer Session mit Benutzername und Klasse als Parameter
        session_start([
          'cookie_lifetime' => 2592000, //Coockie setzen für 1 Monat=2592000s
        ]);
        $_SESSION['logedin']=1; //Session-Variable, eingeloggt: 1
        $_SESSION['username']="$username";                
        $_SESSION['klasse']="$klasse";   
        $_SESSION['name'] = "$nickname";
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
</head>

