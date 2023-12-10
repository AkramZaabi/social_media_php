    <?php

if (!defined('DB_HOST')) {
    define('DB_HOST', 'localhost');
}

if (!defined('DB_USER')) {
    define('DB_USER', 'root');
}

if (!defined('DB_PASS')) {
    define('DB_PASS', '');
}

if (!defined('DB_NAME')) {
    define('DB_NAME', 'projetphp');
}

        try
        {
            $pdo = new PDO('mysql:host='.DB_HOST. ';dbname='.DB_NAME, DB_USER, DB_PASS);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        catch (Exception $e)
        {
            echo 'problem';
            die('Erreur : ' . $e->getMessage());
        }

 
    $query_commentaire =  $pdo->query('SELECT * FROM  commentaire ');
    $query_evenement =  $pdo->query('SELECT * FROM  evenement ');
    $query_message =  $pdo->query('SELECT * FROM  message ');
    $query_amis =  $pdo->query('SELECT * FROM  amis ');
    $query_user =  $pdo->query('SELECT * FROM  utilisateur ');
    $query_publication =  $pdo->query('SELECT * FROM  publication ');
    $query_participant =  $pdo->query('SELECT * FROM  participant ');
    $query_reactions =  $pdo->query('SELECT * FROM  reagir ');




  
    $users = $query_user->fetchAll();
    $publications = $query_publication->fetchAll();
    $participant = $query_amis->fetchAll();






    ?>
