<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Dotenv\Dotenv;
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/userguide3/general/hooks.html
|
*/

# Load phpdotenv
$hook['pre_system'] = function () {
    try{
    $dotenv = Dotenv::create(FCPATH); //FCPATH=>raiz principal FCPATH
    $dotenv->load();
    }catch(Exception $e ){
        echo "Verifique las Variables de Entorno '.env' <hr/>";
        echo $e->getMessage();
        die();
    }

};


// compress output
$hook['display_override'][] = array(
    'class' => '',
    'function' => 'compress',
    'filename' => 'compress.php',
    'filepath' => 'hooks'
);
