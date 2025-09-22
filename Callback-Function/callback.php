<?php
    function backFunc($item){
        return strlen($item);
    }


    $str= ["apple","orange","banana","coconut"];
    $length = array_map("backFunc",$str);
    print_r($length);
?>