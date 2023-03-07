<?php
session_start();//COMMENCER LA SESSION 
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'staff';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    if($username !== "" && $password !== "")
    {
        $query = "SELECT count(*) FROM login where 
              username = '".$username."' and password = '".$password."' ";

        $exec_query = mysqli_query($db,$query);
        
        $response=mysqli_fetch_array($exec_query);
        $count=$response["count(*)"];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
            $_SESSION['username'] = $username; //sTOCKER LA VALEUR DE USERNAME DANS CETTE SESSION
            $query = "SELECT * FROM login WHERE username='".$username."'";
            $exec_query = mysqli_query($db,$query);
            $response=mysqli_fetch_array($exec_query);

            $_SESSION['type'] = $response['type'];
            $_SESSION['name'] = $response['name'];
            $_SESSION['id'] = $response['id'];

            echo "<script type='text/javascript'> 
            window.location.href ='dashboard.php';
              </script>";
         } //REDIRECT WITH JS
         else

         { echo "<script type='text/javascript'> 
            window.location.href ='LOGINSTAFF.php?erreur=1';
            </script>"; 
           
         }
     }
     
 }
 
 mysqli_close($db); // fermer la connexion
 
 ?>