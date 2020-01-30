<?php

$pdo = new PDO('mysql:host=127.0.0.1;dbname=classicmodels','root', '');
$q = $pdo->query('SELECT employees.firstName, employees.lastName, employees.jobTitle, offices.city
                  FROM employees INNER JOIN offices ON employees.officeCode = offices.officeCode
 ');
if ($q === false) {
    //Pour connaître l'erreur, on utilise la méthode errorInfo()
    var_dump($pdo->errorInfo());    //Permet d'arrêter l'exécution en affichant un message
    die('Erreur SQL');
}

$employees = $q->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
//print_r($employees);
print_r( $employees);
echo '</pre>';

/*  Query permettant la récupération de tous les job titles dans un tableau */

$query = $pdo->query('SELECT DISTINCT(jobTitle) FROM employees');

if($query === false) {
    var_dump($pdo->errorInfo());
    die('sql ERROR');
}

$jobTitle = $query->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($jobTitle);
echo '</pre>';

if(!empty($_POST)) {
    $searchResult = $_POST["jobs"];
    echo '<pre>';
    print_r($searchResult);
    echo '</pre>';
}

include ('index.phtml');

