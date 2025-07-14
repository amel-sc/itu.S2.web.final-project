<?php 
    include('../inc/function.php');
    session_start();
    if (isset($_POST['nom_objet']) && isset($_POST['id_categorie']) && isset($_FILES['nom_image']))
    {
        // naviagation link
        $link = array();
        $link[] = array('key' => 'page', 'value' => null);
        $page_index = get_index($link, "page");

        // value getted
        $nom_objet = $_POST['nom_objet'];
        $id_categorie = $_POST['id_categorie'];
        // check if the image is uploaded
        if ($_FILES['nom_image']['name'] == "")
        {
            $nom_image = "../assets/images/user.png"; // default image
        }
        else
        {
            $nom_image = upload_image($_FILES["nom_image"]);
        }
        $id_membre = $_SESSION['current_user']['id_membre'];

        // inserts 
        // insert the image
        $insert_image = array();
        $insert_image[] = array('key' => "nom_image", 'value' => $nom_image);
        $insert_image[] = array('key' => "id_objet", 'value' => null);
        $id_object_index = get_index($insert_image, "id_objet");
        // insert the object
        $insert_objet = array();
        $insert_objet[] = array('key' => "nom_objet", 'value' => $nom_objet);
        $insert_objet[] = array('key' => "id_categorie", 'value' => $id_categorie);
        $insert_objet[] = array('key' => "id_membre", 'value' => $id_membre);

        // request to get the object by name, category and member
        $request_object = get_object_cat_membre($nom_objet, $id_categorie, $id_membre);
        $request_result = one_query($request_object);
        $number_result = count_request_result($request_object);
        // verify if the object exists
        if ($number_result == 0)
        {   
            // insert the object
            insert_table('fn_objet', $insert_objet);
            // get the object id of the final object
            $other_condition[] = 'ORDER BY id_objet DESC LIMIT 1';
            // get the last object inserted
            $request_object = select_table('fn_objet', null, $other_condition);
            // get the id of the last object inserted
            $id_last_object = $request_object[0]['id_objet'];
            // insert the image
            $insert_image[$id_object_index]['value'] = $id_last_object;
            insert_table('fn_images_objet', $insert_image);

            // redirect to the home page
            $link[$page_index]['value'] = 'upload_object.php';
            header('Location: ' . navigation_link($link));
        }
        else 
        {
            // if the object exists, insert the image
            // insert image
            $insert_image[$id_object_index]['value'] = $request_result['id_objet'];
            insert_table('fn_images_objet', $insert_image);
            // redirect to the home page
            $link[$page_index]['value'] = 'upload_object.php';
            header('Location: ' . navigation_link($link));
        }
    }
?>