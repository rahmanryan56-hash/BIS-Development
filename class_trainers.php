<?php

require_once('class_database.php');

class Trainers extends Database {


	static public $table_name="trainers";
	static protected $db_columns = ['id', 'name', 'email', 'location', 'certifications','years_experience', 'specialization'];


public $id;
public $name;
public $email;
public $location;
public $certifications;
public $years_experience;
public $specialization;





}




?>
