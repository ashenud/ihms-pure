<?php 
session_start();
include('../../../../php/basic/connection.php');

$doc_id=$_SESSION["doctor_id"];
$query2="SELECT * FROM doctor_reminder WHERE doctor_id='".$doc_id."' order by date_time DESC LIMIT 5";
$result2=mysqli_query($conn,$query2);
$count=mysqli_num_rows($result2);

if($count == 5) {
    echo  "<p class='count'>ඔබට සිහිකැදවීම් ".$count."+ ඇත.</p>";
}
else if($count > 0) {
    echo  "<p class='count'>ඔබට සිහිකැදවීම් ".$count."ක් ඇත.</p>";
}
else {
    echo  "<p class='count'>ඔබට සිහිකැදවීම් කිසිවක් නැත.</p>";
}



echo '<table class="table table-reminder table-responsive-xl">';
echo '<tbody>';
while ($row2=mysqli_fetch_assoc($result2)) {
echo '<form method="POST" action="/pages/doctor/php/delete-reminder-action.php">';
echo '<tr>';
echo '<td>';
echo '<img class="media-photo" src="/pages/doctor/img/reminder-icon.webp">';
echo '</td>';
echo '<td>';
echo '<span class="discription">'.$row2['doctor_reminder'].'</span>';
echo '</td>';
echo '<td>';
echo '<span class="date pull-right">'.$row2['date_time'].'</span>';
echo '</td>';
echo '<td>';
echo '<input type="hidden" id="del-id" name="date_time" value="'.$row2['date_time'].'">';
echo '<a data-reminder_id="'.$row2['id'].'" name="submit3" class="del-btn btn text-light">මකන්න</a>';
echo '</td>';
echo '</tr>';
echo '</form>';
}
echo '</tbody>';
echo '</table>';

?>