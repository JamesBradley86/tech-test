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
    
    // update all names
    public function update() {
        
        // get people array from submitted form 
        $people_raw = $this->input->post('people');
            
        // group people array by person
        $people_grouped = array_chunk($people_raw, 2);
        
        // create our final array which will be nicer to work with
        $people = array();
        
        foreach($people_grouped as $person) {
            
            $firstname = $person[0]['firstname'];
            $surname = $person[1]['surname'];
            
            $people[] = (object) array('firstname' => $firstname, 'surname' => $surname);
        }
        
        /* (now we have something like this...)
        
        array (size=7)
          0 => 
            object(stdClass)[15]
              public 'firstname' => string 'Jeff' (length=4)
              public 'surname' => string 'Stelling' (length=8)
          1 => 
            object(stdClass)[16]
              public 'firstname' => string 'Chris' (length=5)
              public 'surname' => string 'Kamara' (length=6)
          2 => 
            object(stdClass)[17]
              public 'firstname' => string 'Alex' (length=4)
              public 'surname' => string 'Hammond' (length=7)
          3 => 
            object(stdClass)[18]
              public 'firstname' => string 'Jim' (length=3)
              public 'surname' => string 'White' (length=5)
          4 => 
            object(stdClass)[19]
              public 'firstname' => string 'Natalie' (length=7)
              public 'surname' => string 'Sawyer' (length=6)
        */
        
        // pass to model to update csv file
        
        $this->person_model->update_people($people);
        $this->index();
        
    }
}
