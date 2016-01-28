<?php
class Person_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function get_people() {
        
        $people = array();
        
        $path = $this->config->item('people_csv_file_path');
        $fp = @fopen($path, 'r');
        
        while($person = fgetcsv($fp)) {
            $people[] = $person;
        }
        
        fclose($fp);
        
        return $people;
        
    }
    
    public function update_people($people) {
        
        $path = $this->config->item('people_csv_file_path');
        $fp = fopen($path, 'w');

        foreach ($people as $person) {
            fputcsv($fp, $person);
        }

        fclose($fp);
        
    }

}