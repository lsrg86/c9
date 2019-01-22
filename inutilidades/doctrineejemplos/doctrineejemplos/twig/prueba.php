<?php
//https://symfony.com/doc/current/templating.html

require_once("vendor/autoload.php");

$loader = new \Twig_Loader_Filesystem(__DIR__.'/templates');
$twig = new \Twig_Environment($loader);
$x = (object) [
    'href' => '1',
    'caption' => '2'
];
$y = (object) [
    'href' => '3',
    'caption' => '4'
];
$x = array('href' => '11', 'caption' => 'ccaa');
$y = array('href' => '22', 'caption' => 'pptt');
class Clase {
    private $href, $caption;
    function __construct($h, $c) {$this->href=$h; $this->caption=$c;}
    function getHref() { return $this->href; }
    function getCaption() { return $this->caption; }
    function get($word) {
        if($word=='one') {
            return 'uno';
        }
        return 'dos';
    }
}

$x = new Clase('enlace', 'completo');
$y = new Clase('de', 'verdad');

echo $twig->render('demo.twig', ['name' => 'zhinyz',
                                'more' => 'here',
                                'navigation' => array($x, $y)]);