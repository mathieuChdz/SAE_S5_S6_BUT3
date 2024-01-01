<?php
/*session_start();
if (!isset($_SESSION["login"])){
	header("Location: ../index.php");
}*/

if (isset($_POST['word'])){


    // partie chiffrement
    if (isset($_POST['chiffrer'])){

        // vérification que les variables 'chiffrer' et 'message' ne sont pas nulles
        if ($_POST['chiffrer']!=null and $_POST['word']!=null){

            // vérification que la variable 'cle' n'est pas nulle
            if ($_POST['key']!=null){
                

                $arg2 = $_POST['word'];
            

                while (($arg2[0]==' ')==1){
                    $arg2=substr($arg2,1);
                }
                
                
                while (($arg2[-1]==' ')==1){
                    $arg2=substr($arg2,0,strlen($arg2)-1);
                }

                $arg1 = sizeof(explode(" ",$arg2))+1;


                $arg3 = $_POST['key'];
    
                $res = exec("python3 Module_Chiffrement/codage.py $arg1 $arg2 $arg3"); 

                header("Location: ../module_chiffrement.php?res=$res");
            }
            // la variable clé est nulle
            else{
                header("Location: ../module_chiffrement.php?err=1");
            }
        }
        // la variables message est nulle
        else{
            header("Location: ../module_chiffrement.php?err=2");
        }
    }

    // partie déchiffrement
    if (isset($_POST['dechiffrer'])){

        // vérification que les variables 'chiffrer' et 'message' ne sont pas nulles
        if ($_POST['dechiffrer']!=null and $_POST['word']!=null){

            // vérification que la variable 'cle' n'est pas nulle
            if ($_POST['key']!=null){
                $arg1 = $_POST['word'];
                $arg2 = $_POST['key'];

                $res = exec("python3 Module_Chiffrement/decodage.py $arg1 $arg2"); 
                
                header("Location: ../module_chiffrement.php?res=$res");
            }
            // la variable clé est nulle
            else{
                header("Location: ../module_chiffrement.php?err=1");
            }
        }
        // la variables message est nulle
        else{
            header("Location: ../module_chiffrement.php?err=2");
        }
    }

}

?>
