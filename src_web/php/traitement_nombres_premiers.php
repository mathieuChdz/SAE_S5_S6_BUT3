<?php

$arg1 = $_POST['number'];
$resultat = exec("mpiexec -n 4 --host node1,node2,node3,node4 python3 ../../Module_CalculNombresPremiers/nombres_Premiers.py $arg1");

header("Location: ../module_nombres_premiers.php?res=$resultat");

?>