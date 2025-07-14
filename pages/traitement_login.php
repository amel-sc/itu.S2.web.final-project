<?php
    include('../inc/function.php');
    session_start();
    if(isset($_POST['email']) && isset($_POST['mdp']))
    {
        $link = array();
        $link[] = array('key' => 'page', 'value' => null);
        $page_index = get_index($link, "page");
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        $value = array();
        $value[] = array('key' => 'email', 'value' => $email);
        $value[] = array('key' => 'mdp', 'value' => $mdp);
        
        // check if the user exists
        $result = select_table('fn_membre', $value, null);
        if(count($result) > 0)
        {
            $_SESSION['current_user'] = $result[0];
            $link[$page_index]['value'] = 'home.php';
            header('Location: ' . navigation_link($link));
        }
        else
        {
            $link[$page_index]['value'] = 'inscription.php';
            header('Location: ' . navigation_link($link));
        }
    }

