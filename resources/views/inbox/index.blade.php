@extends('layouts.master')

@section('css')
<!-- Main styles for this application-->
<link href="css/style.css" rel="stylesheet">
<link href="vendors/pace-progress/css/pace.min.css" rel="stylesheet">
<link href="node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        {{-- <li class="breadcrumb-item" href="{{ url('/home') }}">หนัาหลัก</li> --}}
        <li class="breadcrumb-item"><a href="javascript:window.location"><i class="fa fa-file"></i> รายการเอกสาร</a>
        </li>
        {{-- <li class="breadcrumb-item" href="{{ url('/home') }}">รายการเอกสาร</li> --}}
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-file"></i> เอกที่รอการอนุมัติ

                    <a href="#" class="float-right btn btn-primary">+ สร้างเอกสาร</a>
                    {{-- <a href="{{ route('addcreate') }}" class="float-right">+ เพิ่มเอกสาร</a> --}}
                </div>
                <div class="card-body">
                        <i class="fa fa-circle" style="color:red;"></i> ด่วนที่สุด &nbsp;
                        <i class="fa fa-circle" style="color:orange"></i> ด่วนมาก &nbsp;
                        <i class="fa fa-circle" style="color:yellow"></i> ด่วน &nbsp;
                        <i class="fa fa-circle" style="color:green"></i> ปกติ &nbsp;
                        <i class="fa fa-circle" style="color:black"></i> ลับ <br><br>
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>เลขที่หนังสือ</th>
                                <th>เรื่อง</th>
                                <th>วัตถุประสงค์</th>
                                <th>เรียน</th>
                                <th>วันที่</th>
                                <th><i class="fa fa-gear"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach($edocs as $index=>$item)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$item->booknum}}</td>
                                <td>{{$item->topic}}</td>
                                <td>{{$item->tbobjective->name}}</td>
                                <td>{{$item->position}}</td>
                                <td> --}}
                                    {{-- {{DateTime::createFromFormat('Y-m-d', $item->date)->format('d-m-Y') }} --}}
                                    {{-- @php
                                        $date_in = $item->date; 
                                        $date1 = show_tdate($date_in) ;  
                                        echo $date1 ;
                                    @endphp --}}
                               {{-- </td>
                            <td><a target="_blank" href="{{ route('inbox.show' , ['id' => $item->id]) }}"><i class="fa fa-search"></i></a></td>
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
<!-- Plugins and scripts required by this view-->
<script src="node_modules/datatables.net/js/jquery.dataTables.js"></script>
<script src="node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
<script src="js/datatables.js"></script>

<script>
        $(document).ready(function () {
            document.getElementById('inbox').classList.add('active');
        });
    </script>
@endsection

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