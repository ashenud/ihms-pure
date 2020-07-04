<?php
    if(isset($_GET['ReminderDeleteSuccess'])) {
        echo("<div class=\"alert alert-warning alert-dismissible fade show animated fadeIn\" role=\"alert\">");
            echo("<strong>"); echo("සිහිකැඳවීම මැකීම සාර්ථකයී !"); echo("</strong>");
            echo("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">");
                echo("<span aria-hidden=\"true\">"); echo("&times;"); echo("</span>");
            echo("</button>");
        echo("</div>");
    }
?>