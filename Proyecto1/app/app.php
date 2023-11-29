<?php
    if(isset($_GET["view"])){
        $view = $_GET["view"];
        require "app/vistas/" . $view . ".php";
    }else{
        require "app/vistas/home.php";
    }
?>