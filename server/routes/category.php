<?php

require_once "../models/Category.php";

$category = new Category();

$idcategory = isset($_POST["idcategory"])?
trimInput($_POST["idcategory"]):"";
$name = isset($_POST["name"])?
trimInput($_POST["name"]):"";
$description = isset($_POST["description"])?
trimInput($_POST["description"]):"";

switch($_GET["op"]){
    case 'saveandedit':
        if(empty($idcategory)){
            $response=$category->insert($name,$description);
            echo $response ? "Registered category" : "Couldn't show category";
        }
        else{
            $response=$category->edit($idcategory,$name,$description);
            echo $response ? "Updated category" : "Couldn't update category";
        }
    break;

    case 'disable':
        $response=$category->disable($idcategory);
        echo $response ? "Disabled category" : "Couldn't disable category";

    break;

    case 'enable':
        $response=$category->enable($idcategory);
        echo $response ? "Enabled category" : "Couldn't enable category";
    break;

    case 'show':
        $response=$category->show($idcategory);
        echo json_encode($response);
    break;

    case 'list':
        $data= Array();
        while ($register=$response->fetch_object()){
            $data[]=array(
                "0"=>$register->idcategory,
                "1"=>$register->name,
                "2"=>$register->description,
                "3"=>$register->state,
            );
        }
        $results = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
        echo json_encode($results);
    break;
}

?>