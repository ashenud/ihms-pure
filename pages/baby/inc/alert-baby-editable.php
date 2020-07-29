<?php
    if(isset($_GET['success'])) {
        echo("<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">");
            echo("<strong>"); echo("Updated"); echo("</strong>");
            echo("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">");
                echo("<span aria-hidden=\"true\">"); echo("&times;"); echo("</span>");
            echo("</button>");
        echo("</div>");
    }

    if(isset($_GET['error'])) {
        echo("<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">");
            echo("<strong>"); echo("Fail to update"); echo("</strong>");
            echo("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">");
                echo("<span aria-hidden=\"true\">"); echo("&times;"); echo("</span>");
            echo("</button>");
        echo("</div>");
    }
?>