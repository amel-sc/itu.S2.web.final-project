<!-- navigation link -->
<?php 
    $value = array();
    $value[] = array('key' => 'page', 'value' => null);
    $page_index = get_index($value, "page");
?>
<nav class="navbar navbar-expand-lg bg-dark vw-100" data-bs-theme="dark"> 
    <div class="container-fluid">
        <?php $value[$page_index]["value"] = "#"; ?>
        <a class="navbar-brand" href="<?= navigation_link($value) ?>">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <?php $value[$page_index]["value"] = "#"; ?>
                    <a class="nav-link" aria-current="page" href="<?= navigation_link($value) ?>">Link</a>
                </li>
                <li class="nav-item">
                    <?php $value[$page_index]["value"] = "#"; ?>
                    <a class="nav-link" href="<?= navigation_link($value) ?>">Link</a>
                </li>
            </ul>
        </div>
    </div>
</nav>