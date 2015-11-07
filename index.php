<?php
header('Content-Type: text/html; charset="ISO-8859-9"');
if(isset($_GET["page"])){
    $page = $_GET["page"];
}
else $page = "durum_paneli";

    include "includes/meta.php";
    include "includes/header.php";
    include "includes/menu.php";




    $paths = "pages/$page.php";
    if (file_exists($paths)) {
        include "$paths";
    } else {  ?>

    <script LANGUAGE="JavaScript">
        window.location = "404.html";
    </script>


   <?php } include "includes/footer.php";  ?>