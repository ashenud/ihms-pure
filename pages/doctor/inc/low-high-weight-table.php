<div class="card card-table">
    <div class="card-table-header">
        <p>Overweight and Underweight Babies</p>
    </div>
    <div class="card-body card-table-body">
        <?php

            $low_weight= array ();
            $high_weight= array ();

            $query1="CREATE TEMPORARY TABLE IF NOT EXISTS max_age AS (SELECT baby_id,MAX(baby_age_in_months) AS age FROM growth GROUP BY baby_id)";
            $result1=mysqli_query($conn, $query1);

            $query2="SELECT * FROM max_age";
            $result2=mysqli_query($conn, $query2);

            while ($row1 = mysqli_fetch_assoc($result2)) {

                $query3="SELECT baby_id,weight,baby_age_in_months FROM growth WHERE baby_id='".$row1['baby_id']."' AND baby_age_in_months='".$row1['age']."'";
                $result3=mysqli_query($conn, $query3);
                $row2=mysqli_fetch_assoc($result3);

                $baby_id=$row2['baby_id'];
                $weight=$row2['weight'];
                $months=$row2['baby_age_in_months'];

                $query4="SELECT baby_gender FROM baby_register WHERE baby_id='".$row2['baby_id']."'";
                $result4=mysqli_query($conn, $query4);
                $row3=mysqli_fetch_assoc($result4);

                $gender=$row3['baby_gender'];
                
                $boy_chart_low_values=array(2.4, 2.8, 3.4, 4, 4.6, 5.2, 5.8, 6.3, 6.7, 7.0, 7.4, 7.7, 8, 8.2, 8.45, 8.65, 8.8, 8.9, 9, 9.2, 9.3, 9.45, 9.6, 9.8, 10, 10.15, 10.25, 10.35, 10.5, 10.6, 10.7, 10.8, 10.9, 11, 11.1, 11.2, 11.4, 11.5, 11.6, 11.7, 11.85, 12, 12.1, 12.2, 12.4, 12.5, 12.6, 12.75, 12.85, 13, 13.15, 13.25, 13.4, 13.5, 13.65, 13.75, 13.9, 14, 14.15, 14.25, 14.4);
                
                $boy_chart_high_values=array(4.2, 5.4, 6.4, 7.5, 8.3, 9, 9.7, 10.3, 10.7, 11.2, 11.6, 12, 12.3, 12.6, 12.9, 13.1, 13.5, 13.8, 14, 14.2, 14.4, 14.7, 14.9, 15.1, 15.3, 15.5, 15.8, 16.1, 16.4, 16.7, 16.9, 17.1, 17.3, 17.5, 17.7, 18, 18.2, 18.4, 18.6, 18.8, 19.1, 19.3, 19.6, 19.8, 20, 20.2, 20.4, 20.6, 20.8, 21, 21.2, 21.4, 21.7, 21.9, 22.1, 22.4, 22.6, 22.9, 23.1, 23.3, 23.5);
                
                $girl_chart_low_values=array(2.4, 2.8, 3.4, 4, 4.6, 5.2, 5.8, 6.3, 6.7, 7.0, 7.4, 7.7, 8, 8.2, 8.45, 8.65, 8.8, 8.9, 9, 9.2, 9.3, 9.45, 9.6, 9.8, 10, 10.15, 10.25, 10.35, 10.5, 10.6, 10.7, 10.8, 10.9, 11, 11.1, 11.2, 11.4, 11.5, 11.6, 11.7, 11.85, 12, 12.1, 12.2, 12.4, 12.5, 12.6, 12.75, 12.85, 13, 13.15, 13.25, 13.4, 13.5, 13.65, 13.75, 13.9, 14, 14.15, 14.25, 14.4);
                
                $girl_chart_high_values=array(4.2, 5.4, 6.4, 7.5, 8.3, 9, 9.7, 10.3, 10.7, 11.2, 11.6, 12, 12.3, 12.6, 12.9, 13.1, 13.5, 13.8, 14, 14.2, 14.4, 14.7, 14.9, 15.1, 15.3, 15.5, 15.8, 16.1, 16.4, 16.7, 16.9, 17.1, 17.3, 17.5, 17.7, 18, 18.2, 18.4, 18.6, 18.8, 19.1, 19.3, 19.6, 19.8, 20, 20.2, 20.4, 20.6, 20.8, 21, 21.2, 21.4, 21.7, 21.9, 22.1, 22.4, 22.6, 22.9, 23.1, 23.3, 23.5);
                
                if($gender=='M') {

                    if(0==$months) {
                        if($boy_chart_low_values[0]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[0]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(1==$months) {
                        if($boy_chart_low_values[1]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[1]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(2==$months) {
                        if($boy_chart_low_values[2]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[2]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(3==$months) {
                        if($boy_chart_low_values[3]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[3]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(4==$months) {
                        if($boy_chart_low_values[4]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[4]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(5==$months) {
                        if($boy_chart_low_values[5]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[5]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(6==$months) {
                        if($boy_chart_low_values[6]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[6]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(7==$months) {
                        if($boy_chart_low_values[7]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[7]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(8==$months) {
                        if($boy_chart_low_values[8]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[8]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(9==$months) {
                        if($boy_chart_low_values[9]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[9]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(10==$months) {
                        if($boy_chart_low_values[10]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[10]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(11==$months) {
                        if($boy_chart_low_values[11]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[11]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(12==$months) {
                        if($boy_chart_low_values[12]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[12]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(13==$months) {
                        if($boy_chart_low_values[13]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[13]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(14==$months) {
                        if($boy_chart_low_values[14]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[14]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(15==$months) {
                        if($boy_chart_low_values[15]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[15]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(16==$months) {
                        if($boy_chart_low_values[16]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[16]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(17==$months) {
                        if($boy_chart_low_values[17]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[17]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(18==$months) {
                        if($boy_chart_low_values[18]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[18]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(19==$months) {
                        if($boy_chart_low_values[19]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[19]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(20==$months) {
                        if($boy_chart_low_values[20]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[20]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(21==$months) {
                        if($boy_chart_low_values[21]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[21]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(22==$months) {
                        if($boy_chart_low_values[22]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[22]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(23==$months) {
                        if($boy_chart_low_values[23]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[23]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(24==$months) {
                        if($boy_chart_low_values[24]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[24]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(25==$months) {
                        if($boy_chart_low_values[25]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[25]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(26==$months) {
                        if($boy_chart_low_values[26]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[26]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(27==$months) {
                        if($boy_chart_low_values[27]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[27]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(28==$months) {
                        if($boy_chart_low_values[28]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[28]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(29==$months) {
                        if($boy_chart_low_values[29]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[29]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(30==$months) {
                        if($boy_chart_low_values[30]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[30]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(31==$months) {
                        if($boy_chart_low_values[31]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[31]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(32==$months) {
                        if($boy_chart_low_values[32]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[32]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(33==$months) {
                        if($boy_chart_low_values[33]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[33]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(34==$months) {
                        if($boy_chart_low_values[34]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[34]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(35==$months) {
                        if($boy_chart_low_values[35]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[35]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(36==$months) {
                        if($boy_chart_low_values[36]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[36]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(37==$months) {
                        if($boy_chart_low_values[37]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[37]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(38==$months) {
                        if($boy_chart_low_values[38]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[38]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(39==$months) {
                        if($boy_chart_low_values[39]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[39]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(40==$months) {
                        if($boy_chart_low_values[40]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[40]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(41==$months) {
                        if($boy_chart_low_values[41]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[41]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(42==$months) {
                        if($boy_chart_low_values[42]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[42]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(43==$months) {
                        if($boy_chart_low_values[43]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[43]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(44==$months) {
                        if($boy_chart_low_values[44]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[44]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(45==$months) {
                        if($boy_chart_low_values[45]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[45]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(46==$months) {
                        if($boy_chart_low_values[46]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[46]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(47==$months) {
                        if($boy_chart_low_values[47]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[47]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(48==$months) {
                        if($boy_chart_low_values[48]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[48]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(49==$months) {
                        if($boy_chart_low_values[49]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[49]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(50==$months) {
                        if($boy_chart_low_values[50]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[50]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(51==$months) {
                        if($boy_chart_low_values[51]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[51]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(52==$months) {
                        if($boy_chart_low_values[52]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[52]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(53==$months) {
                        if($boy_chart_low_values[53]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[53]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(54==$months) {
                        if($boy_chart_low_values[54]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[54]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(55==$months) {
                        if($boy_chart_low_values[55]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[55]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(56==$months) {
                        if($boy_chart_low_values[56]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[56]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(57==$months) {
                        if($boy_chart_low_values[57]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[57]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(58==$months) {
                        if($boy_chart_low_values[58]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[58]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(59==$months) {
                        if($boy_chart_low_values[59]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[59]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(60==$months) {
                        if($boy_chart_low_values[60]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($boy_chart_high_values[60]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }                                                
                }
                else if($gender=='F'){

                    if(0==$months) {
                        if($girl_chart_low_values[0]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[0]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(1==$months) {
                        if($girl_chart_low_values[1]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[1]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(2==$months) {
                        if($girl_chart_low_values[2]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[2]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(3==$months) {
                        if($girl_chart_low_values[3]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[3]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(4==$months) {
                        if($girl_chart_low_values[4]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[4]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(5==$months) {
                        if($girl_chart_low_values[5]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[5]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(6==$months) {
                        if($girl_chart_low_values[6]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[6]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(7==$months) {
                        if($girl_chart_low_values[7]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[7]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(8==$months) {
                        if($girl_chart_low_values[8]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[8]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(9==$months) {
                        if($girl_chart_low_values[9]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[9]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(10==$months) {
                        if($girl_chart_low_values[10]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[10]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(11==$months) {
                        if($girl_chart_low_values[11]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[11]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(12==$months) {
                        if($girl_chart_low_values[12]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[12]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(13==$months) {
                        if($girl_chart_low_values[13]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[13]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(14==$months) {
                        if($girl_chart_low_values[14]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[14]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(15==$months) {
                        if($girl_chart_low_values[15]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[15]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(16==$months) {
                        if($girl_chart_low_values[16]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[16]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(17==$months) {
                        if($girl_chart_low_values[17]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[17]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(18==$months) {
                        if($girl_chart_low_values[18]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[18]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(19==$months) {
                        if($girl_chart_low_values[19]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[19]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(20==$months) {
                        if($girl_chart_low_values[20]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[20]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(21==$months) {
                        if($girl_chart_low_values[21]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[21]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(22==$months) {
                        if($girl_chart_low_values[22]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[22]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(23==$months) {
                        if($girl_chart_low_values[23]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[23]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(24==$months) {
                        if($girl_chart_low_values[24]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[24]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(25==$months) {
                        if($girl_chart_low_values[25]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[25]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(26==$months) {
                        if($girl_chart_low_values[26]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[26]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(27==$months) {
                        if($girl_chart_low_values[27]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[27]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(28==$months) {
                        if($girl_chart_low_values[28]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[28]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(29==$months) {
                        if($girl_chart_low_values[29]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[29]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(30==$months) {
                        if($girl_chart_low_values[30]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[30]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(31==$months) {
                        if($girl_chart_low_values[31]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[31]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(32==$months) {
                        if($girl_chart_low_values[32]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[32]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(33==$months) {
                        if($girl_chart_low_values[33]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[33]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(34==$months) {
                        if($girl_chart_low_values[34]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[34]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(35==$months) {
                        if($girl_chart_low_values[35]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[35]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(36==$months) {
                        if($girl_chart_low_values[36]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[36]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(37==$months) {
                        if($girl_chart_low_values[37]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[37]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(38==$months) {
                        if($girl_chart_low_values[38]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[38]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(39==$months) {
                        if($girl_chart_low_values[39]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[39]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(40==$months) {
                        if($girl_chart_low_values[40]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[40]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(41==$months) {
                        if($girl_chart_low_values[41]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[41]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(42==$months) {
                        if($girl_chart_low_values[42]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[42]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(43==$months) {
                        if($girl_chart_low_values[43]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[43]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(44==$months) {
                        if($girl_chart_low_values[44]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[44]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(45==$months) {
                        if($girl_chart_low_values[45]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[45]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(46==$months) {
                        if($girl_chart_low_values[46]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[46]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(47==$months) {
                        if($girl_chart_low_values[47]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[47]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(48==$months) {
                        if($girl_chart_low_values[48]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[48]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(49==$months) {
                        if($girl_chart_low_values[49]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[49]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(50==$months) {
                        if($girl_chart_low_values[50]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[50]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(51==$months) {
                        if($girl_chart_low_values[51]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[51]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(52==$months) {
                        if($girl_chart_low_values[52]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[52]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(53==$months) {
                        if($girl_chart_low_values[53]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[53]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(54==$months) {
                        if($girl_chart_low_values[54]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[54]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(55==$months) {
                        if($girl_chart_low_values[55]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[55]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(56==$months) {
                        if($girl_chart_low_values[56]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[56]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(57==$months) {
                        if($girl_chart_low_values[57]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[57]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(58==$months) {
                        if($girl_chart_low_values[58]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[58]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(59==$months) {
                        if($girl_chart_low_values[59]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[59]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                    else if(60==$months) {
                        if($girl_chart_low_values[60]>$weight) {
                            $low_weight[]=$row2['baby_id'];
                        }
                        else if($girl_chart_high_values[60]<$weight) {
                            $high_weight[]=$row2['baby_id'];
                        }
                    }

                }
            }
        ?>

        <table class="mdl-data-table table-responsive-xl bordered" id="datatable">
            <thead>
                <tr>
                    <th>Mother NIC</th>
                    <th>Baby ID</th>
                    <th>states</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>

        <?php
            $length = count($low_weight);

            for($i=0; $i<$length; $i++) { 
                $query5="SELECT mother_nic, baby_id FROM baby_register WHERE baby_id='$low_weight[$i]'";
                $result5= mysqli_query($conn,$query5);
        ?>



        <?php
                if ($result5) {
                    while ($row4 = mysqli_fetch_assoc($result5)) {
        ?>
                <tr>
                    <td><?php echo $row4['mother_nic']; ?></td>
                    <td><?php echo $row4['baby_id']; ?></td>
                    <td><span class="badge badge-under">underweight</span></td>
                    <td>
                        <form action="../general/view-data.php" method="POST">
                            <input type="hidden" name="view-id" value="<?php echo $row4['baby_id']; ?>">
                            <button type="submit" name="view-btn" class="btn view-btn"><i class="fa fa-eye" aria-hidden="true"></i></button>
                        </form>
                    </td>

                </tr>

        <?php
                    }
                }
            }                                            
        ?>

        <?php

            $length = count($high_weight);

            for($i=0; $i<$length; $i++) { 
                $query6="SELECT mother_nic, baby_id FROM baby_register WHERE baby_id='$high_weight[$i]'";
                $result6= mysqli_query($conn,$query6);
        ?>



        <?php
                if ($result6) {
                    while ($row5 = mysqli_fetch_assoc($result6)) {
        ?>
                <tr>
                    <td><?php echo $row5['mother_nic']; ?></td>
                    <td><?php echo $row5['baby_id']; ?></td>
                    <td><span class="badge badge-over">overweight</span></td>
                    <td>
                        <form action="../general/view-data.php" method="POST">
                            <input type="hidden" name="view-id" value="<?php echo $row5['baby_id']; ?>">
                            <button type="submit" name="view-btn" class="btn view-btn"><i class="fa fa-eye" aria-hidden="true"></i></button>
                        </form>
                    </td>

                </tr>

        <?php
                    }
                }
            }    

            $query7= "DROP TEMPORARY TABLE IF EXISTS max_age";
            $result7= mysqli_query($conn,$query7);
        ?>

            </tbody>
        </table>    

    </div>


</div>