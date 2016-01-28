<?php
class Person_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function get_people() {
        
        $people = array();
        
        $path = $this->config->item('people_csv_file_path');
        $file = fopen($path, 'r');
        
        while($person = fgetcsv($file)) {
            $people[] = $person;
        }
        
        return $people;
        
    }

}