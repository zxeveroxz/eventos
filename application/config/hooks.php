<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

use Dotenv\Dotenv;

# Load phpdotenv
$hook['pre_system'] = function () {
    $dotenv = Dotenv::create(FCPATH); //FCPATH=>raiz principal
    $dotenv->load();
};


// compress output
$hook['display_override'][] = array(
    'class' => '',
    'function' => 'compress',
    'filename' => 'compress.php',
    'filepath' => 'hooks'
);
