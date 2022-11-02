<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dni
{

    public function foto($dni)
    {
        $path_dni = strtr(
			rtrim(FCPATH."dni/".$dni.".jpg", '/\\'),
			'/\\',
			DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
		);

        if(file_exists($path_dni))
            return;
      
        $url = "https://tramite.munisjl.gob.pe/tramite/plataforma/view/Login/verificarCedula.php?ndoc=" . $dni;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
        $data = curl_exec($ch);
        curl_close($ch);
        //return $data;

        $url = "https://tramite.munisjl.gob.pe/tramite/plataforma/view/validardni.php";
        $fields = array('ndoc' => $dni, 'tipo' => 2);
        $fields_string = http_build_query($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        $data = curl_exec($ch);
        curl_close($ch);        

        $resp = explode("'", $data, 100);
        $datos = new SimpleXMLElement($resp[1]);
        if(isset($datos->return->datosPersona->foto)){
            $foto =  $datos->return->datosPersona->foto;
            $data = base64_decode($foto);
            $im = imagecreatefromstring($data);
            if ($im !== false) {
                //header('Content-Type: image/png');
                imagepng($im,$path_dni);
                //imagedestroy($im);
            }
        }else{
            $path_no = strtr(
                rtrim(FCPATH."dni/no.jpg", '/\\'),
                '/\\',
                DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
            );

            $im = imagecreatefrompng($path_no);
            imagepng($im,$path_dni);

        }
        
    }
}
