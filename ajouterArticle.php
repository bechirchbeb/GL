<?php

    include("./Article.php");
    if(!empty($_POST['naturemateriel']) && !empty($_POST['ref']) && !empty($_POST['description-zone']))
    {
        $a = new Article($_POST['naturemateriel'],$_POST['ref'],$_POST['description-zone']);
        $a->ajouterArticle();
        include("page3.html");
    echo
        "<script>
            alert('Article ajouté !');
        </script>";
    }
?>