<?php
    if(isset($_GET['mNicError'])) {
        echo("<div class=\"alert alert-danger alert-dismissible fade show animated fadeIn\" role=\"alert\">");
            echo("<strong>"); echo("You enterd NIC is already registred !"); echo("</strong>");
            echo("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">");
                echo("<span aria-hidden=\"true\">"); echo("&times;"); echo("</span>");
            echo("</button>");
        echo("</div>");
    }
?>