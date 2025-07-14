<?php
    require('../inc/function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Final Exam</title>
</head>
<body>
    <header class="fixed-top header" style="z-index:100;">
        <?php $current_page = $_GET['page'] ?>
        <?php include("../inc/header.php") ?>
    </header>
    <main class="container">
        <?php
            if (isset($_GET['page']))
            {
                $page = $_GET['page'];
                include("$page");
            } 
        ?>
    </main>
</body>
</html>