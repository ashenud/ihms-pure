<?php
    if(isset($_SESSION['baby_id'])) {
        echo("<div class=\"alert alert-success alert-dismissible fade show animated fadeIn delay-1s\" role=\"alert\">");
            echo("<strong>"); echo("Welcome to Infant Health Management System!"); echo("</strong>");
            echo("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">");
                echo("<span aria-hidden=\"true\">"); echo("&times;"); echo("</span>");
            echo("</button>");
        echo("</div>");
    }
?>