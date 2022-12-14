<?php

function dni_clientes($dni){        

	$ctx = stream_context_create(['http' => ['timeout' => 15]]);
	if (false !== ($content = file_get_contents('http://25.21.196.223/dni.php?DNY='.$dni, false, $ctx))) {
		return $content."";
	} else {
		return 'No Disponible...';
	}
}

function mensaje_error()
{
	$CI = &get_instance();
	if ($CI->session->flashdata("error")) {
		return $CI->session->flashdata("error");
	}
	return false;
}

function pw_hash($password)
{
	return password_hash($password, PASSWORD_DEFAULT, ['cost' => 15]);
}
function pw_verify($password, $hash)
{
	return password_verify($password, $hash);
}


/**
 * Some important function are here below!
 * Remove comment to start using any of these.
 */

if (!function_exists('is_post')) {

	/**
	 * If the method of request is POST return true else false.
	 * 
	 *  @return bool  */
	function is_post()
	{
		return (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST')  ? true : false;
	}
}

if (!function_exists('is_get')) {

	/**
	 * If the method of request is GET return true else false.
	 * 
	 *  @return bool  */
	function is_get()
	{
		return (strtoupper($_SERVER['REQUEST_METHOD']) === 'GET')  ? true : false;
	}
}

if (!function_exists('input_print')) {

	/**
	 * To print database inside a input field use this.
	 * It will escape values such as ', " or other entities.
	 * 
	 *  @return mixed  */
	function input_print($str)
	{

		return htmlentities($str);
	}
}



if (!function_exists('set_custom_header')) {
	/**
	 * It will setup custom header
	 * 
	 * @param mixed $custom_header to set css or any other thing to the header
	 * @return void It will set value only nothing will be return.
	 */
	function set_custom_header($file)
	{
		$str = '';
		$ci = &get_instance();
		$custom_header  = $ci->config->item('custom_header');

		if (empty($file)) {
			return;
		}

		if (is_array($file)) {
			if (!is_array($file) && count($file) <= 0) {
				return;
			}
			foreach ($file as $item) {
				$custom_header[] = $item;
			}
			$ci->config->set_item('custom_header', $custom_header);
		} else {
			$str = $file;
			$custom_header[] = $str;
			$ci->config->set_item('custom_header', $custom_header);
		}
	}
}

if (!function_exists('get_custom_header')) {
	/**
	 * It will get customer header if set up.
	 * 
	 *  @return void|string  */
	function get_custom_header()
	{
		$str = '';
		$ci = &get_instance();
		$custom_header  = $ci->config->item('custom_header');


		if (!is_array($custom_header)) {
			return;
		}

		foreach ($custom_header as $item) {
			$str .= $item . "
";
		}

		return $str;
	}
}

if (!function_exists('set_custom_footer')) {
	/**
	 * It will setup custom footer
	 * 
	 * @param mixed $custom_footer to set js or any other thing to the footer
	 * @return void It will set value only nothing will be return.
	 */
	function set_custom_footer($file)
	{
		$str = '';
		$ci = &get_instance();
		$custom_footer  = $ci->config->item('custom_footer');

		if (empty($file)) {
			return;
		}

		if (is_array($file)) {
			if (!is_array($file) && count($file) <= 0) {
				return;
			}
			foreach ($file as $item) {
				$custom_footer[] = $item;
			}
			$ci->config->set_item('custom_footer', $custom_footer);
		} else {
			$str = $file;
			$custom_footer[] = $str;
			$ci->config->set_item('custom_footer', $custom_footer);
		}
	}
}

if (!function_exists('get_custom_footer')) {
	/**
	 * It will get customer footer if set up.
	 * 
	 *  @return void|string  */
	function get_custom_footer()
	{
		$str = '';
		$ci = &get_instance();
		$custom_footer  = $ci->config->item('custom_footer');

		if (!is_array($custom_footer)) {
			return;
		}

		foreach ($custom_footer as $item) {
			$str .= $item . "
";
		}

		return $str;
	}
}


/* End of file ayudas_helper.php and path \application\helpers\ayudas_helper.php */
