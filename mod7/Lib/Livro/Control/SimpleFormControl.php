<?php
use Livro\Control\Page;
// exemplo usando widget SimpleForm
use Livro\Widgets\Form\SimpleForm;

// essa classe tem métodos de Page
class SimpleFormControl extends Page
{
    public function __construct()
    {       
        $form = new SimpleForm('my_form');
        $form->setTitle('Título');
        $form->addField('Nome', 'nome', 'text', 'Maria', 'form-control');
        $form->addField('Endereço', 'endereco', 'text', 'Rua das flores', 'form-control');
        $form->addField('Telefone', 'telefone', 'text', '(51) 1234-5678', 'form-control');
        $form->setAction('index.php?class=SimpleFormControl&method=onGravar');
        $form->show();
    }
    
    // recebe parâmetros de get e post, já que em show() de Page tem $_REQUEST
    public function onGravar($param)
    {
        echo '<pre>';
        var_dump($param);
        echo '</pre>';
    }
}
