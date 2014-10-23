<?php
/**
 * Created by PhpStorm.
 * User: AntoineEisele
 * Date: 22/10/14
 * Time: 17:37
 */

require __DIR__.'/vendor/autoload.php';

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem([
    __DIR__.'/views'
]);

$twig = new Twig_Environment($loader, [
   //'cache => null,
]);

$dsn = 'mysql:host=localhost;dbname=blog';
$user = 'root';
$password = 'root';

try {
    $pdo = new PDO($dsn, $user, $password);
}   catch(PDOException $e){
    @mail('Antoine_eisele+error@hotmail.com','Erreur sur le site', $e->getMessage());
    echo 'Erreur de connexion a la DB';
    die;
    //var_dump($e);
}

$sql = "SELECT * FROM article";
$pdoStmt = $pdo->query($sql);
$articles = ($pdoStmt->fetchAll(PDO::FETCH_OBJ));



/**
$dbh = new PDO('mysql:host=localhost;dbname=blog', $user, $pass);

$articles = [
    [
        'name'  => 'My beautiful Article',
        'content'   => 'Hi, BITCH, it\'s my content',
        'enabled'   => true,
        'date'      => new DateTime('now'),
    ],
    [
        'name'  => 'My beautiful Article number 2',
        'content'   => 'Hi, BITCH, it\'s my second content',
        'enabled'   => false,
        'date'      => new DateTime('now'),
    ],
    [
        'name'  => 'My beautiful Article number 3',
        'content'   => 'Hi, BITCH, it\'s my third content',
        'enabled'   => true,
        'date'      => new DateTime('now'),
    ],

];
**/



echo $twig->render('Blog/article.html.twig', [
    'articles'=> $articles,
]);
