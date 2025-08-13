<?php
use Livro\Control\Page; 

// usando template twig (form.html)
class TwigSampleControl extends Page 
{ 
    public function __construct() 
    {

        $loader = new \Twig\Loader\FilesystemLoader('App/Resources');
	    $twig = new \Twig\Environment($loader);

        $replaces = array(); 
        $replaces['title'] = 'Título'; 
        $replaces['action'] = 'index.php?class=TwigSampleControl&method=onGravar'; 
        $replaces['nome'] = 'Maria'; 
        $replaces['endereco'] = 'Rua das flores'; 
        $replaces['telefone'] = '(51) 1234-5678'; 
        
        $content = $twig->render('form.html', $replaces); 
        echo $content;
    }
    
    public function onGravar($params)
    {
        echo '<pre>';
        var_dump($_POST);
        echo '</pre>';
    }
}
