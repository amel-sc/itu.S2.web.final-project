<?php
    include('../inc/function.php');
    session_start();
    if(isset($_POST['email']) && isset($_POST['mdp']))
    {
        // value getted
        $nom = $_POST['nom'];
        $birth_date = $_POST['birth_date'];
        $genre = $_POST['genre'];
        $ville = $_POST['ville'];
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        // naviagtion link
        $link = array();
        $link[] = array('key' => 'page', 'value' => null);
        $page_index = get_index($link, "page");
        // verify if inscription exists
        $value = array();
        $value[] = array('key' => 'email', 'value' => $email);
        $value[] = array('key' => 'mdp', 'value' => $mdp);
        // $sql return specific user
        $result = select_table('fn_membre', $value, null);
        // if the user exists, redirect to login page
        if (count($result) > 0)
        {
            $link[$page_index]['value'] = 'inscription.php';
            header('Location: ' . navigation_link($link));
        }
        else
        {
            // insert the new inscription
            $value = array();
            $value[] = array('key' => 'nom', 'value' => $nom);
            $value[] = array('key' => 'birth_date', 'value' => $birth_date);
            $value[] = array('key' => 'genre', 'value' => $genre);
            $value[] = array('key' => 'ville', 'value' => $ville);
            $value[] = array('key' => 'email', 'value' => $email);
            $value[] = array('key' => 'mdp', 'value' => $mdp);
            // insert into the database
            $result = insert_table('fn_membre', $value);
            // link
            $link[$page_index]['value'] = 'login.php';
            header('Location: ' . navigation_link($link));
        }
        
    }

