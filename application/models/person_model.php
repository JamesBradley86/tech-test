<?php
class Person_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
        $this->csv_path = $this->config->item('people_csv_file_path');
    }
    
    public function get_people() {
        
        $people = array();

        $fp = @fopen($this->csv_path, 'r');
        
        while($person = fgetcsv($fp)) {
            $people[] = $person;
        }
        
        fclose($fp);
        
        return $people;
        
    }
    
    public function update_people($people) {
        
        $fp = fopen($this->csv_path, 'w');

        foreach ($people as $person) {
            fputcsv($fp, $person);
        }

        fclose($fp);
        
    }
    
    public function update_person($first_name, $surname, $index) {
        
        $people = $this->get_people();;
        $people[$index] = array($first_name, $surname);
        $this->update_people($people);
            
    }
    
    

}