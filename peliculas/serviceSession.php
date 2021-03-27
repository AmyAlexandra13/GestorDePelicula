<?php


    session_start();

    $GLOBALS["sessionName"] = "Peliculas";

    function Add($item){

        $peliculas = GetList();

        if(count($peliculas) == 0){
            $item["id"] = 1;
        }else{

            $lastElement = getLastElement($peliculas);

            $item["id"] = $lastElement["id"] + 1;
        }      

        array_push($peliculas, $item);

       $_SESSION[$GLOBALS["sessionName"]] = $peliculas;         
    }

    function Edit($item){      

        $peliculas = GetList();
        $arraypelicula = GetById($item["id"]);

        if($peli != null && count($peli) > 0 ){
      
            $index = getIndexElement($peliculas,"id",$item["id"]);
            $peliculas[$index] = $item;

            $_SESSION[$GLOBALS["sessionName"]] =  $peliculas;    

        }           
    }


    function GetList(){

        $peliculas = isset($_SESSION[$GLOBALS["sessionName"]]) ? $_SESSION[$GLOBALS["sessionName"]] : [];
        
        return $peliculas;

    }

    
    function GetById($id){

        $peliculas = GetList();

        $pelicula = searchProperty($peliculas,"id",$id);     
        
        return   $pelicula[0];
    }


?>



