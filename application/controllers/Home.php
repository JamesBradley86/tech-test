<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
    
    // update all names (non-js fallback)
    public function update_all() {
        
        // get people array from submitted form 
        $people_raw = $this->input->post('people');
            
        // group people array by person
        $people_grouped = array_chunk($people_raw, 2);
        
        // create our final array which will be nicer to work with
        $people = array();
        
        foreach($people_grouped as $person) {
            
            $firstname = $person[0]['firstname'];
            $surname = $person[1]['surname'];
            
            $people[] = array($firstname, $surname);
        }
        

        // pass to person model to update csv file
        $this->person_model->update_people($people);
        
        $this->data['notify'] = 'Database updated.';
        // show home page
        $this->index();
        
    }
    
    public function update_person($index) {
        
        // get params
        $first_name = $this->input->post('first_name');
        $surname = $this->input->post('surname');
        
        // update person
        $this->person_model->update_person($first_name, $surname, $index);    
            
    }
    
}
