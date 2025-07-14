<?php
    include('../inc/function.php');
    session_start();
    if (isset($_GET['day_number']))
    {
        // navigation_link
        $link = array();
        $link[] = array('key' => 'page', 'value' => null);
        $page_index = get_index($link, "page");

        // values getted
        $day = $_GET['day_number'];
        $id_objet = $_GET['id_objet'];
        $id_membre = $_SESSION['current_user']['id_membre'];

        // insert into emprunt
        // insert values
        //get date_emprunt and date_retour
        $dates = get_emprunt_return_date($day);

        $insert_values = array();
        $insert_values[] = array('key' => "id_objet", 'value' => $id_objet);
        $insert_values[] = array('key' => "id_membre", 'value' => $id_membre);
        $insert_values[] = array('key' => "date_emprunt", 'value' => $dates['date_emprunt']);
        $insert_values[] = array('key' => "date_retour", 'value' => $dates['date_retour']);
        // insert value into table
        insert_table("fn_emprunt", $insert_values);

        // header
        $link[$page_index]['value'] = "object_list.php";
        header('Location: ' . navigation_link($link));
    }
?>
