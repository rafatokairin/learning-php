<?php
use Livro\Control\Page; 

class TwigWelcomeControl extends Page 
{ 
    public function __construct() 
    {
        parent::__construct();
        
        $loader = new \Twig\Loader\FilesystemLoader('App/Resources'); 
        $twig = new \Twig\Environment($loader); 
        
        $replaces = [];
        $replaces['nome'] = 'José Augusto';
        $replaces['rua'] = 'Rua das Acácias, 123';
        $replaces['cep'] = '12.345-678';
        $replaces['fone'] = '(00) 1234-5678'; 
        
        $content = $twig->render('welcome.html', $replaces); 
        echo $content;
    }
    
    public function onSaibaMais($params)
    {
        echo 'mais informações...';
    }
}
