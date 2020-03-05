<?php

class maclasse{
    function __construct($c){
        echo 'Je viens de créer ma classe';
        if ($c !== "toto"){
            throw new Exception('Mots différents');
        } else {
            echo "\nMots Pareil";
        }
}
}

?>