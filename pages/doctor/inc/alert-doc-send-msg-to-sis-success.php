<?php
    if(isset($_GET['send2SisSuccess'])) {
        echo("<div class=\"alert alert-success alert-dismissible fade show animated fadeIn\" data-auto-dismiss=\"2000\" role=\"alert\">");
            echo("<strong>"); echo("Message Send successfully !"); echo("</strong>");
            echo("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">");
                echo("<span aria-hidden=\"true\">"); echo("&times;"); echo("</span>");
            echo("</button>");
        echo("</div>");
    }
?>