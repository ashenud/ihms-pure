<?php
    if(isset($_GET['msgDelete'])) {
        echo("<div class=\"alert alert-warning alert-dismissible fade show animated fadeIn\" data-auto-dismiss=\"2000\" role=\"alert\">");
            echo("<strong>"); echo("පණිවිඩය මකා දමන ලදී !"); echo("</strong>");
            echo("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">");
                echo("<span aria-hidden=\"true\">"); echo("&times;"); echo("</span>");
            echo("</button>");
        echo("</div>");
    }
?>