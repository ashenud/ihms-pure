<?php
    if(isset($_GET['error1'])) {
        echo("<div class=\"alert alert-danger alert-dismissible fade show animated fadeIn\" role=\"alert\">");
            echo("<strong>"); echo("ඊ මේල් පණිවිඩ යැවීම අසාර්ථකයි !"); echo("</strong>");
            echo("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">");
                echo("<span aria-hidden=\"true\">"); echo("&times;"); echo("</span>");
            echo("</button>");
        echo("</div>");
    }
?>