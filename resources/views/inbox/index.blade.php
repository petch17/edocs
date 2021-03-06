@extends('layouts.master')

@section('css')
<link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<!-- begin:: Content -->
<div class="kt-subheader kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">รายการเอกสารสร้างเอง</h3>
            {{-- <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">Application</a>
                    <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
                </div> --}}
        </div>
    </div>
</div>

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        @if(Auth::user()->MANAGER_ID != null)
                        <a href="{{ route('addcreate') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i> อัพโหลดเอกสาร
                        </a>
                        @else
                        <a href="{{ route('SCMNG') }}" class="btn btn-brand btn-elevate btn-icon-sm" onclick="myFunction()">
                            <i class="la la-plus"></i> อัพโหลดเอกสาร
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="kt-portlet__body">
            <!--begin: Datatable -->
            <table id="table1" class="table table-striped- table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="10%">ลำดับ</th>
                        <th width="70%">เรื่อง</th>
                        <th width="20%"><i class="fa fa-cog"></i></th>
                    </tr>
                </thead>

                <tbody>
                @foreach($edocs as $index=>$item)
                    <tr>
                        <td>
                            @if( $item->secert == null && $item->speed == null )
                                {{$index+1}}
                                <span style=" height: 10px; width: 10px; background-color: green;
                                border-radius: 50%; display: inline-block;">
                                </span>
                            @elseif( $item->secert == null && $item->speed != null )
                                @if( $item->speed == 'ด่วน' )
                                    {{$index+1}}&nbsp;
                                    <span style=" height: 10px; width: 10px; background-color: yellow;
                                    border-radius: 50%; display: inline-block;">
                                    </span>
                                @elseif( $item->speed == 'ด่วนมาก' )
                                    {{$index+1}}&nbsp;
                                    <span style=" height: 10px; width: 10px; background-color: orange;
                                    border-radius: 50%; display: inline-block;">
                                    </span>
                                @else
                                    {{$index+1}}&nbsp;
                                    <span style=" height: 10px; width: 10px; background-color: red;
                                    border-radius: 50%; display: inline-block;">
                                    </span>
                                @endif
                            @elseif( $item->secert != null && $item->speed == null )
                                {{$index+1}}&nbsp;
                                <span style=" height: 10px; width: 10px; background-color: green;
                                border-radius: 50%; display: inline-block;">
                                </span>&nbsp;<a>ลับ</a>
                            @else
                                @if( $item->speed == 'ด่วน' )
                                    {{$index+1}}&nbsp;
                                    <span style=" height: 10px; width: 10px; background-color: yellow;
                                    border-radius: 50%; display: inline-block;">
                                    </span>&nbsp;<a>ลับ</a>
                                @elseif( $item->speed == 'ด่วนมาก' )
                                    {{$index+1}}&nbsp;
                                    <span style=" height: 10px; width: 10px; background-color: orange;
                                    border-radius: 50%; display: inline-block;">
                                    </span>&nbsp;<a>ลับ</a>
                                @else
                                    {{$index+1}}&nbsp;
                                    <span style=" height: 10px; width: 10px; background-color: red;
                                    border-radius: 50%; display: inline-block;">
                                    </span>&nbsp;<a>ลับ</a>
                                @endif
                            @endif
                        </td>
                        <td>
                            <a href="" class="alram" data-id="{{$item->topic}}" > {{$item->topic}} </a>
                        </td>
                        <td>
                            <a target="_blank" href="http://203.113.14.20:3000/pdffile/{{$item->file}}" data-toggle="kt-tooltip" title="ดูรายละเอียด">
                                <i class="fa fa-search"></i>
                            </a>
                            &nbsp; &nbsp;

                            {{-- <a href="" class="delBtn" data-id="{{$item->id}}" data-toggle="kt-tooltip" title="ลบ">
                                <i class="fa fa-trash-alt"></i>
                            </a> --}}
                            <a href="{{ route('updatetrash' , ['id' => $item->id]) }}" data-toggle="kt-tooltip" title="ลบ">
                                <i class="fa fa-trash-alt"></i>
                            </a>
                            <input type="hidden" name="_token" id="_token" value="{{ csrf_token()}}">

                            &nbsp; &nbsp;
                            {{-- <a target="_blank" href="http://203.113.14.20:3000/pdffile/{{$item->file}}" download data-toggle="kt-tooltip" title="ดาวน์โหลด">
                                <i class="fa fa-download"></i>
                            </a> --}}
                            {{-- <a target="_blank" href="{{ route('inbox.show' , ['id' => $item->id]) }}" data-toggle="kt-tooltip" title="ดาวน์โหลด">
                                <i class="fa fa-download"></i>
                            </a> --}}
                        </td>
                        {{-- วิธีเรียกใช้วันที่ภาษาไทย --}}
                        {{-- @php
                            $date_in = $item->date;
                            $date1 = show_tdate($date_in) ;
                            echo $date1 ;
                        @endphp --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end:: Content -->

@endsection

@section('js')
<script src="{{asset('assets/js/demo11/scripts.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/demo11/pages/crud/datatables/basic/basic.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/demo11/sweetalert.min.js') }}"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

<script>
    function myFunction() {
        alert("กรุณาเลือกผู้บริหารก่อน").style.color = "red";
    }
</script>

<script>
$(document).on('click', '.alram', function (e) {
        e.preventDefault();
        var topic = $(this).data('id');
        // alert(topic);
            Swal.fire(
                topic,
            )
    });
</script>

<script>
    $(document).ready(function() {
        document.getElementById('index1').classList.add('kt-menu__item--open');

        $('#table1').DataTable();

    });

    $(document).on('click', '.delBtn', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        // alert(id);
        swal({
            title: "คุณต้องการลบ?",
            text: "หากคุณทำการลบข้อมูล จะไม่สามารถทำการกู้คืนได้อีก",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: "DELETE",
                        url: '{{ url('inbox')}}/' + id,
                        data: { ids: id, _token: $('#_token').val(), },
                        success: function (data) {
                            // alert(1)
                            // alert(data.success)
                            if (data.success == "1") {
                                swal("ทำการลบข้อมูลสำเร็จ", {
                                    icon: "success",
                                }).then(() => {
                                    // alert(1);
                                    location.reload();
                                });
                            } else {
                                swal({
                                    title: "พบข้อผิดพลาด",
                                    text: "กรุณาติดต่อผู้ดูแลระบบ",
                                    icon: "warning",
                                    dangerMode: true,

                                });
                            }
                        }
                    });
                } else {
                    swal("ยกเลิกการลบข้อมูล");
                }
            });
    });
</script>
@endsection

{{-- @php

function show_tdate($date_in) {
$month_arr = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");

$tok = strtok($date_in, "-");
$year = $tok;

$tok = strtok("-");
$month = $tok;

$tok = strtok("-");
$day = $tok;

$year_out = $year + 543;
$cnt = $month - 1;
$month_out = $month_arr[$cnt];

if ($day < 10) $day_out="" . $day; else $day_out=$day; $t_date=$day_out . " " . $month_out . " " . $year_out; return $t_date; } @endphp --}}
