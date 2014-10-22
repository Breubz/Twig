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

$twig->render('blog.html.twig');

echo $twig->render('blog.html.twig', [
    'articles'=> $articles,
]);
