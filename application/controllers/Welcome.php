<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // load person model
        $this->load->model('person_model');
        
        // data array for passing to views
        $this->data = array();
        
    }
    
	public function index() {
        
        $this->data['people'] = $this->person_model->get_people();
        
		$this->load->view('template', $this->data);
	}
}
