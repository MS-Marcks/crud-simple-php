<?php

include ("/app/crud-simple-php/2/php/config/db.php");

class Product {
    function get_data_full(){
        $query = new DB();
        if($query->connect()== true){
            return $query->query("CALL sp_search_product","s");
        }
    }  
    function get_data_single($id){
        $query = new DB();
        if($query->connect()== true){
            return $query->query("CALL sp_search_product_single ($id);","s");
        }
    }    
    function create($nombre,$precio,$existencia){
        $query = new DB();
        if($query->connect()== true){
            echo "CALL sp_create_product ('$nombre',$precio,$existencia);";
            return $query->query("CALL sp_create_product ('$nombre',$precio,$existencia);","");
        }
    }
    function update($id,$nombre,$precio,$existencia){
        $query = new DB();
        if($query->connect()== true){
            return $query->query("CALL sp_update_product ($id,'$nombre',$precio,$existencia)","");
        }
    }
    function delete($id){
        $query = new DB();
        if($query->connect()== true){
            return $query->query("CALL sp_delete_product ($id)","");
        }
    }
}
?>