<?php
class Person_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function get_people() {
        
        $people = array();
        
        $path = $this->config->item('people_csv_file_path');
        $f = @fopen($path, 'r');
        
        while($person = fgetcsv($f)) {
            $people[] = $person;
        }
        
        return $people;
        
    }
    
    public function update_people($people) {
        
        $data = '';
        foreach($people as $person) {
            $data .= $person->firstname . ',' . $person->surname . "\r\n";
        }
        
        $path = $this->config->item('people_csv_file_path');
        file_put_contents($path, $data);
        
    }

}