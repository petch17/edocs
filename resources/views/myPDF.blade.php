<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
                @font-face {
                    font-family: 'THSarabunNew';
                    font-style: normal;
                    font-weight: normal;
                    src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
                }
                @font-face {
                    font-family: 'THSarabunNew';
                    font-style: normal;
                    font-weight: bold;
                    src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
                }
                @font-face {
                    font-family: 'THSarabunNew';
                    font-style: italic;
                    font-weight: normal;
                    src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
                }
                @font-face {
                    font-family: 'THSarabunNew';
                    font-style: italic;
                    font-weight: bold;
                    src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
                }

                body {
                    font-family: "THSarabunNew";
                }
        </style>
        {{-- <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
    <style>

        body {
            font-family: 'Sarabun', sans-serif;
        }
    </style> --}}
    <title> ใบปฏิบัติการ </title>
    </head>
    <body>
            <img src="{{ public_path('img/TOT_LOGO.png') }} " height="15%" width="15%">

            <center>
                <h2 style="margin-top:-25px;">ใบปฏิบัติการ</h2>
            </center>
                <table style="width:100%">
                    <tr>
                    <th>เลขที่ : ทีโอที พพซ.15/77777777</th>
                        <th align="right">วันที่ 
                            {{-- {{DateTime::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y') }} --}}
                            <?php 
                            $date = 15/06/1998 ;
                            $date_in = $date; 
                            $date1 = show_tdate($date_in) ;  
                            echo $date1 ; ?> 
                        </th>
                    </tr>
                </table>
    
                <table style="width:100%">
                    <tr>
                        <th>เรื่อง : ..............</th>
                    </tr>
                </table>
    
                <table style="width:100%">
                    <tr>
                        <th>จาก : ผส.พพซ.1</th>
                        

                    </tr>
                </table>
                <br>
                <table style="width:100%; border: 1px solid black; border-collapse: collapse;">
                    <tr>
                        <th align="center" rowspan="2" style="border: 1px solid black;">เลขที่</th>
                        <th align="center" colspan="3" style="border: 1px solid black;">เรียน</th>
                    </tr>
                    <tr>
                        <th align="center" style="border: 1px solid black;">ตำแหน่งย่อ</th>
                        <th align="center" style="border: 1px solid black;">วัตถุประสงค์</th>
                        <th align="center" style="border: 1px solid black;">รายละเอียด</th>
                    </tr>
                    {{-- @foreach($data2 as $index) --}}
                    <tr>
                        <th align="center" style="border: 1px solid black;">1</th>
                        <td align="center" style="border: 1px solid black;">.............</td>
                        <td align="center" style="border: 1px solid black;">............</td>
                        <td align="center" style="border: 1px solid black;">เพื่อเข้าร่วมประชุมเวลา 12.00</td>
                    </tr>
                    {{-- @endforeach --}}
                </table>
    
                <b>หมายเหตุ : </b>
                <br />
                <br />
                <div align="right">
                    <b>ลายเซ็น</b>
                    <img src="http://npcrimage-all.netpracharat.com/imageverify/4zNtRjOxHMo2OOTF20Y6ur4TtaGssNcbimage(7).jpg" height="25%" width="25%"><br />
                </div>

                <div align="right"> </div>

                <hr style="opacity: .4;" />
    </body>

</html>

<?php
    function  show_tdate($date_in)
    {
        $month_arr = array("มกราคม" , "กุมภาพันธ์" , "มีนาคม" , "เมษายน" , "พฤษภาคม" , "มิถุนายน" , "กรกฏาคม" , "สิงหาคม" , "กันยายน" , "ตุลาคม" ,"พฤศจิกายน" , "ธันวาคม" ) ;

        $tok = strtok($date_in, "-");
        $year = $tok ;

        $tok  = strtok("-");
        $month = $tok ;

        $tok = strtok("-");
        $day = $tok ;

        $year_out = $year + 543 ;
        $cnt = $month-1 ;
        $month_out = $month_arr[$cnt] ;

        if ($day < 10 )
        $day_out = "".$day; 
        else
        $day_out = $day ;

        $t_date = $day_out." ".$month_out." ".$year_out ;

        return $t_date ;
    }
?>