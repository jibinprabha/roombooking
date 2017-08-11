<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

class MY_Loader extends MX_Loader {

	public function template($template_name, $vars = array(), $return = FALSE)
    {
        if($return):
        $content  = $this->view('partials/header', $vars, $return);
        $content  = $this->view('partials/navigation', $vars, $return);

        $content .= $this->view($template_name, $vars, $return);
        $content .= $this->view('partials/footer', $vars, $return);

        return $content;
    else:
        $this->view('partials/header', $vars);

        $this->view('partials/navigation', $vars);
        $this->view($template_name, $vars);
        $this->view('partials/footer', $vars);
    endif;
    }
}