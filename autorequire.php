<?php
    function requireAlumno($file){
        $fullpath = $file . '.php' ;

        if( file_exists($fullpath) ) {
            require_once $fullpath ;
        }
    }

    function requireAlumnoModel($file){
        $fullpath = $file . '.php' ;

        if( file_exists($fullpath) ) {
            require_once $fullpath ;
        }
    }

    spl_autoload_register("requireAlumno") ;
    spl_autoload_register("requireAlumnoModel") ;