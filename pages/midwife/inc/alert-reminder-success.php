<?php
    if(isset($_GET['Resuccess'])) {
        echo("<div class=\"alert alert-success alert-dismissible fade show animated fadeIn\" role=\"alert\">");
            echo("<strong>"); echo("සිහිකැඳවීම එක් කිරීම සාර්ථකයී !"); echo("</strong>");
            echo("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">");
                echo("<span aria-hidden=\"true\">"); echo("&times;"); echo("</span>");
            echo("</button>");
        echo("</div>");
    }
?>