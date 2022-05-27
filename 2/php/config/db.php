<?php

class db {
   private $conn;
   function connect (){
       try {
        $this->$conn = mysqli_connect("localhost", "admin", "Z57CXvbPEyBQ", "producto");
        return true;
       } catch (\Throwable $th) {
        return false;
       }
    
   }
   function query($sp,$type){
    if($type=="s"){
        $result = $this->$conn->query($sp);
        $data = array();
        while($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
        $this->$conn->close();
        return $data;
    }   
    if ($this->$conn->query($sp) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $this->$conn->error;
        $this->$conn->close();
        return;
    }
    $this->$conn->close();
    return "ok";
   }

}
?>