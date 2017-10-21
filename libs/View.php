<?php
//gestion des views et chargement de Twig
//@TODO charger twig depuis le controlelr frontal et l'integrer via une gestion de dependance
class View {

    function __construct() {
        //echo 'this is the view';
    }

    public function render(string $name, $params = array())
    {
        $loader = new Twig_Loader_Filesystem(ROOT.DS.'views');
        $twig = new Twig_Environment($loader);
        $template = $twig->loadTemplate($name.'.twig')->render($params);

        echo $template;
    }

}
