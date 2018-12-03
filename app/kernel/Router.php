<?php

class Router {

    public static function analyse($request){
        $result = array(
            'controller'    => 'Error',
            'action'        => 'error404',
            'params'        => array()
        );

        if($request === '' || $request === '/'){ // Route vers la page d'accueil
            $result['controller']   = 'Page';
            $result['action']       = 'index';
        } else {
            $parts = explode('/', $request);

            if($parts[0] == 'meme' && ((count($parts) == 1) || count($parts) == 2)){ // Route vers la page de meme
                $result['controller']       = 'Page';
                $result['action']           = 'meme';
                if(count($parts) == 2)
                    $result['params']['id'] = $parts[1];
            }
        }

        return $result;
    }
    
}