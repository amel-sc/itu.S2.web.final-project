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
        $sql = 'SELECT * FROM fn_emprunt WHERE id_objet = "%s" and date_retour > curdate()';
        $sql = sprintf($sql, $id_object);
        $result = one_query($sql);

        return $result;
    }

    //uplaod image
    function upload_image($file)
    {
        $upload_dir = dirname(__DIR__).'/assets/uploads/';
        $max_size = 500 * 1024 * 1024;
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg', 'video/mp4'];

        if ($file['error'] !== UPLOAD_ERR_OK) {
            die('Erreur lors de l’upload : ' . $file['error']);
        }

        // Vérifie la taille
        if ($file['size'] > $max_size) {
            die('Le fichier est trop volumineux.');
        }

        // Vérifie le type MIME avec `finfo`
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        if (!in_array($mime, $allowedMimeTypes)) {
            die('Type de fichier non autorisé : ' . $mime);
        }

        // renommer le fichier
        $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

        $newName = $originalName . '_' . uniqid() . '.' . $extension;

        // Déplace le fichier
        move_uploaded_file($file['tmp_name'], $upload_dir . $newName);

        //add post in BDD
        $file_path = '../assets/uploads/' . $newName;
        return $file_path;
    }

    // function to get object by name, category and member
    function get_object_cat_membre($nom_objet, $id_categorie, $id_membre)
    {
        $sql = 'SELECT * FROM fn_objet WHERE nom_objet = "%s" AND id_categorie = "%s" AND id_membre = "%s"';
        $sql = sprintf($sql, $nom_objet, $id_categorie, $id_membre);

        return $sql;
    }


    // function get object
    function get_objet($id){
        $sql = 'SELECT * FROM fn_v_objet_membre_categorie WHERE id_objet = "%s"';
        $sql = sprintf($sql, $id);
        $result = one_query($sql);

        return $result;
    }

    // function to get principal image
    function get_first_image($id_objet)
    {
        $sql = 'select * from fn_images_objet where id_objet = "%s"';
        $sql = sprintf($sql, $id_objet);
        $result = one_query($sql);

        return $result;
    }

    // function get emprunt by objet
    function get_emprunt_by_objet($id_objet)
    {
        $sql = 'select * from fn_emprunt where id_objet = "%s"';
        $sql = sprintf($sql, $id_objet);
        $result = array_query($sql);

        return $result;
    }

    // function to get date emprunt and date retour
    function get_emprunt_return_date ($day_number)
    {
        $sql = 'select curdate() as date_emprunt';
        $result['date_emprunt'] = one_query($sql)['date_emprunt'];

        $sql = 'select date_add(curdate(), interval %s day) as date_retour';
        $sql = sprintf($sql, $day_number);
        $result['date_retour'] = one_query($sql)['date_retour'];

        return $result;
    }
?>