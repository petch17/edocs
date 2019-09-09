@extends('layouts.master')

@section('css')
<link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<!-- begin:: Content -->
<div class="kt-subheader kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">รายการเอกสารที่ยังไม่ผ่านการอนุมัติ</h3>
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
        {{-- <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="{{ route('addcreate') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i> อัพโหลดเอกสาร
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="kt-portlet__body">
            <!--begin: Datatable -->
            <table id="table1" class="table table-striped- table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ชื่อไฟล์</th>
                        <th><i class="fa fa-cog"></i></th>
                    </tr>
                </thead>

               
                <tbody>
                @foreach($edocs as $index=>$item)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$item->topic}}</td>
                        <td>
                            <a href="{{ url('destroy/'.$item->id) }}" data-toggle="kt-tooltip" title="ลบ">
                                <i class="fa fa-trash-alt"></i>
                            </a>
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

<script>
    $(document).ready(function() {
        document.getElementById('inbox').classList.add('kt-menu__item--open');

        $('#table1').DataTable();

    });
</script>
@endsection

@php

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

if ($day < 10) $day_out="" . $day; else $day_out=$day; $t_date=$day_out . " " . $month_out . " " . $year_out; return $t_date; } @endphp