<?php
    if(isset($_GET['success1'])) {
        echo("<div class=\"alert alert-success alert-dismissible fade show animated fadeIn\" role=\"alert\">");
            echo("<strong>"); echo("Emails Send Successfully !"); echo("</strong>");
            echo("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">");
                echo("<span aria-hidden=\"true\">"); echo("&times;"); echo("</span>");
            echo("</button>");
        echo("</div>");
    }
?>