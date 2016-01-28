<?php
class Person_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
        $this->csv_path = $this->config->item('people_csv_file_path');
    }
    
    public function get_people() {
        
        $fp = @fopen($this->csv_path, 'r');
        if(!$fp) die('Could not find CSV file at ' . $this->csv_path);
        
        $people = array();

        while($person = fgetcsv($fp)) {
            $people[] = $person;
        }
        
        fclose($fp);
        
        return $people;
        
    }
    
    public function update_people($people) {
        
        $fp = @fopen($this->csv_path, 'w');
        if(!$fp) die('Could not find CSV file at ' . $this->csv_path);
        
        foreach ($people as $person) {
            fputcsv($fp, $person);
        }

        fclose($fp);
        
    }
    
    public function update_person($first_name, $surname, $index) {
        
        $people = $this->get_people();
        if(!array_key_exists($index, $people)) {
            die('Index out of range.');
        }
    
        $people[$index] = array($first_name, $surname);
        $this->update_people($people);
            
    }
    
    

}