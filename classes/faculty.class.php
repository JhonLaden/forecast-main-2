<?php

require_once 'database.php';

class Faculty{
    //attributes

    public $firstname;
    public $lastname;
    public $email;
    public $academic_rank;
    public $department;
    public $admission_role = 'None';
    public $status = 'Inactive';

    protected $db ;

    function __construct(){
        $this->db = new Database();
    }

    //Methods
    function add_faculty(){
        $sql = "INSERT INTO faculty (firstname, lastname, email, academic_rank, department, admission_role, status) VALUE 
        (:firstname, :lastname, :email, :academic_rank, :department, :admission_role, :status);";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':academic_rank', $this->academic_rank);
        $query->bindParam(':department', $this->department);
        $query->bindParam(':admission_role', $this->admission_role);
        $query->bindParam(':status', $this->status);

        if($query->execute()){
            return true;
        }else{
            false;
        }
    }

    function show(){
        $sql = "SELECT * FROM faculty ; ";
        $query =  $this->db->connect()->prepare($sql);
    
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
        
    }

}

?>