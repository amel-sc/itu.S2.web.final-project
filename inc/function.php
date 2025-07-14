<?php
    require('connexion.php');
    require("connexion.php");
    require("gen_functions.php");
    
    // navigation link functions
    // function to create links
    function navigation_link($value)
    {
        $link = 'model.php?';
        for ($i = 0; $i < count($value); $i++)
        {
            if ($i > 0) {
                $link = $link . '&';
            }
    
            $link = $link . $value[$i]['key'] . '=' . $value[$i]['value'];
        }
    
        return $link;
    }
    // function to get the index of one motif in value
    function get_index($value, $key)
    {
        $index = null;
        for ($i = 0; $i < count($value); $i++)
        {
            if ($value[$i]['key'] == $key)
            {
                $index = $i;
            }
        }

        return $index;
    }   

    

    // function web 
    // login function
    function login_function($email, $mdp)
    {
        $sql = 'SELECT * FROM membre WHERE email = "%s" AND mdp = "%s"';
        $sql = sprintf($sql, $email, $sql);
        $query = mysqli_query(dbconnect(), $sql);
        $exist = mysqli_num_rows($query);
        if ()
    }
?>