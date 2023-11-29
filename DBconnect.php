<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS','');
    define ('DB_NAME','projetphp');
    try
    {
        $bdd = new PDO('mysql:host='.DB_HOST. ';dbname='.DB_NAME, DB_USER, DB_PASS);
        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    
?>