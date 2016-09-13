<?php

    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Leet.php";

    $app = new Silex\Application();
    $app['debug'] = true;
    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app->get('/', function() use ($app) {
        return $app['twig']->render('home.html.twig');
    });

    $app->post('/process', function() use ($app) {
        $input = $_POST['process'];
        $processor = new Leetspeak();
        $results = $processor->convertSentence($input);
        return $app['twig']->render('results.html.twig', array('results'=>$results));
    });

    return $app;


 ?>
