<?php

error_reporting(E_ALL ^ E_NOTICE | E_WARNING);
ini_set('display_errors', 'ON'); 

class PageController extends Controller {

    public function index(){
        $imagedefault = Images::getAllImageDefault();

        $template = $this->twig->loadTemplate('/Page/index.html.twig');
        echo $template->render(array(
            'message'   => $message,
            'imagedefaults' => $imagedefault
        ));
    }

    public function help(){
        $template = $this->twig->loadTemplate('/Page/help.html.twig');
        echo $template->render(array());
    }

    public function meme(){
        $message = '';

        if (!empty($_FILES)){
            $file_name = $_FILES['fichier']['name'];
            $file_extension = strrchr($file_name, ".");
       
            $file_tmp_name = $_FILES['fichier']['tmp_name'];
            $file_dest = './assets/images/';
       
            $extensions_autorisees = array('.jpg', '.png', '.jpeg', '.gif', '.JPG', '.PNG', '.JPEG', '.GIF');
       
            $file_name = 'meme_'.time().$file_extension;

            if(in_array($file_extension, $extensions_autorisees)){                
                if(move_uploaded_file($file_tmp_name, $file_dest.$file_name)){
                    chmod($file_dest.$file_name, 0777);
                    Images::upload($file_name, $file_dest);
                    $message = 'Fichier envoyé avec succès';
                } else {
                   $message = 'Une erreur est survenue';    
                 }
            } else {
                $message = 'Ce n\'est pas la bonne extension';
            }
       
        }

        if(isset($this->route['params']['id'])){
            $image = Images::getImageDefault($this->route['params']['id']);
        } else {
            $image = Images::getImage(); 
        }

        
        //$filmsbygenres = Film::getFilmByGenre($this->route['params']['id']);

        $imagesdefault = Images::getAllImageDefault();

        $template = $this->twig->loadTemplate('/Page/meme.html.twig');
        echo $template->render(array(
            'image' => $image,
            'imagedefaults' => $imagesdefault,
            //'filmbygenres' => $filmsbygenres,
        ));
    }

    public function publish(){

        if(isset($_POST)){

        }
       
        $template = $this->twig->loadTemplate('/Page/publish.html.twig');
        echo $template->render(array(
            'message'   => $message,
            'imagedefaults' => $imagedefault
        ));
        
    }
    
}
?>