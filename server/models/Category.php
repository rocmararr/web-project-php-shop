<?php 
require "../config/database.php";

Class Category
{
    public function __construct()
    {  
    }

    // Method for inserting data:
    public function insert($name,$description)
    {
        $sql="INSERT INTO category (name,description,state)
        VALUES('$name','$description','1')";
        return queryExecution($sql);
    }

    // Method for editing data:
    public function edit($idcategory,$name,$description)
    {
        $sql="UPDATE category SET name='$name',description='$description'
        WHERE idcategory = '$idcategory'";
        return queryExecution($sql);
    }

    // Method for deactivating categories:
        public function disable($idcategory)
        {
            $sql="UPDATE category SET state='0'
            WHERE idcategory = '$idcategory'";
            return queryExecution($sql);
        }

    // Method for activating categories:
        public function enable($idcategory)
        {
            $sql="UPDATE category SET state='1'
            WHERE idcategory = '$idcategory'";
            return queryExecution($sql);
        }

    // Method for showing one register's data before editing:
        public function show($idcategory)
        {
            $sql="SELECT * FROM category
            WHERE idcategory = '$idcategory'";
            return queryExecutionSimpleRow($sql);
        }
        
    // Method for showing a list of all registers:
        public function list()
        {
            $sql="SELECT * FROM category";
            return queryExecution($sql);
        }
    
}

?>