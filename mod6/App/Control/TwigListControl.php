<?php
use Livro\Control\Page; 

class TwigListControl extends Page 
{ 
    public function __construct() 
    {
        parent::__construct();
        
        $loader = new \Twig\Loader\FilesystemLoader('App/Resources'); 
        $twig = new \Twig\Environment($loader); 
        
        $replaces = [];
        $replaces['titulo'] = 'Lista de pessoas'; 
        $replaces['pessoas'] = array(
                    array('codigo' => '1',
                          'nome' => 'Anita Garibaldi',
                          'endereco' => 'Rua dos Gaudérios'),
                    array('codigo' => '2',
                          'nome' => 'Bento Gonçalves',
                          'endereco' => 'Rua dos Gaudérios'),
                    array('codigo' => '3',
                          'nome' => 'Giuseppe Garibaldi',
                          'endereco' => 'Rua dos Gaudérios')
                );
        
        $content = $twig->render('list.html', $replaces); 
        echo $content;
    }
}
