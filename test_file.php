<?php

require_once './vendor/autoload.php';


$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . "/templates");
$twig = new \Twig\Environment($loader, [
    'cache' => __DIR__ . "/data/cache/twig",
    'debug' => true,
]);

echo $twig->render('testTemplate2.twig', ['name' => ['Fabien', "n"=>'Anotehr name'], 'name2' => 'Fabien2']);


