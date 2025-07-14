<?php
    require('connexion.php');
    require("gen_function.php");
    
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

    // function to get emprunt by object
    function get_current_emprunt($id_object)
    {
        $sql = 'SELECT * FROM fn_emprunt WHERE id_objet = "%s" and datediff(now() , date_retour) > 0';
        $sql = sprintf($sql, $id_object);
        $result = one_query($sql);

        return $result;
    }


    // function get object
    function get_objet($id){
        $sql = 'SELECT * FROM fn_objet WHERE id_objet = '.$id;
        $query = mysqli_query(dbconnect() , $sql);
        $result = mysqli_fetch_assoc($query);
        mysqli_free_result($query);
        return $result;
    }
?>