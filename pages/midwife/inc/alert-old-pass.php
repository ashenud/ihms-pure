<?php
    if(isset($_GET['errorOldPass'])) {
        echo("<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">");
            echo("<strong>"); echo("Old password dosen't match!"); echo("</strong>");
            echo("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">");
                echo("<span aria-hidden=\"true\">"); echo("&times;"); echo("</span>");
            echo("</button>");
        echo("</div>");
    }
?>