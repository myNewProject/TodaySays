<?php
class MY_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if (!$this->input->is_cli_request()) {
			$this->load->library('session');
		}
	}
}