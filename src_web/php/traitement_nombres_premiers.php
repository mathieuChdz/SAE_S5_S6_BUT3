<?php

session_start();

$arg1 = $_POST['number'];
$arg2 = $_POST['workers'];


if ($arg2 == "1"){
    $resultat = exec("mpiexec -n 1 --host node1 python3 Module_CalculNombresPremiers/nombres_Premiers.py $arg1 > resultat.txt 2>&1", $output, $return_var);
}

elseif ($arg2 == "2"){
    $resultat = exec("mpiexec -n 2 --host node1,node2 python3 Module_CalculNombresPremiers/nombres_Premiers.py $arg1 > resultat.txt 2>&1", $output, $return_var);
}

elseif ($arg2 == "3"){
    $resultat = exec("mpiexec -n 3 --host node1,node2,node3 python3 Module_CalculNombresPremiers/nombres_Premiers.py $arg1 > resultat.txt 2>&1", $output, $return_var);
}

elseif ($arg2 == "4"){
    $resultat = exec("mpiexec -n 4 --host node1,node2,node3,node4 python3 Module_CalculNombresPremiers/nombres_Premiers.py $arg1 > resultat.txt 2>&1", $output, $return_var);
}
/*$resultat = exec("mpiexec -n 4 --host node1,node2,node3,node4 python3 /Module_CalculNombresPremiers/nombres_Premiers.py $arg1");*/

/*$resultat = exec("python3 Module_CalculNombresPremiers/nombres_Premiers.py $arg1");*/
$_SESSION['resultat'] = $resultat;

header("Location: ../module_nombres_premiers.php?N=$arg1#resultat");

?>