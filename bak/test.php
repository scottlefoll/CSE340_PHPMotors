<!-- Main PHP Motors Model -->

<?php
    function getClassifications(){
    // Create a connection object from the phpmotors connection function
    $db = phpmotorsConnect(); 
    // The SQL statement to be used with the database 
    $sql = 'SELECT classificationName FROM carclassification ORDER BY classificationName ASC'; 
    // The next line creates the prepared statement using the phpmotors connection      
    $stmt = $db->prepare($sql);
    // The next line runs the prepared statement 
    $stmt->execute(); 
    // The next line gets the data from the database and 
    // stores it as an array in the $classifications variable 
    $classifications = $stmt->fetchAll(); 
    // The next line closes the interaction with the database 
    $stmt->closeCursor(); 
    // The next line sends the array of data back to where the function 
    // was called (this should be the controller) 
    return $classifications;
    }
?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; ?>

<?php

$action = filter_input(INPUT_POST, 'action');
    if ($action == NULL){
        $action = filter_input(INPUT_GET, 'action');
    }

    switch ($action){
        case 'something':
            break;
        default:
            include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/home.php';
            // include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/template.php';
    }

    ?>