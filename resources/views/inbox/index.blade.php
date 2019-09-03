@extends('layouts.master')

@section('css')
@endsection

@section('content')
<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <div class="kt-portlet__head-label">
                    <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="kt_table_1"></label>
                </div>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="{{ route('addcreate') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                            New Record
                        </a>
                    </div>	
                </div>
            </div>
        </div>

        <div class="kt-portlet__body">
            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover  ">
                <thead>
                    <tr>

                        <th>#</th>
                        <th>ชื่อไฟล์</th>
                        <th>#</th>

                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>ประชุม</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>ประชุมลับ</td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>123</td>
                        <td>ประชุมลับมาก</td>
                        <td></td>
                    </tr>
                </tbody>



            </table>
            <!--end: Datatable -->
            <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="kt_table_1_info" role="status" aria-live="polite">
                    Showing 1 to 10 of 50 entries
                </div>
            </div>

            <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="kt_table_1_paginate">
                    <ul class="pagination">
                        <li class="paginate_button page-item previous disabled" id="kt_table_1_previous">
                            <a href="#" aria-controls="kt_table_1" data-dt-idx="0" tabindex="0" class="page-link">
                                <i class="la la-angle-left"></i>
                            </a>
                        </li>
                        <li class="paginate_button page-item active">
                            <a href="#" aria-controls="kt_table_1" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                        </li>
                        <li class="paginate_button page-item ">
                            <a href="#" aria-controls="kt_table_1" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                        </li>
                        <li class="paginate_button page-item ">
                            <a href="#" aria-controls="kt_table_1" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                        </li>
                        <li class="paginate_button page-item ">
                            <a href="#" aria-controls="kt_table_1" data-dt-idx="4" tabindex="0" class="page-link">4</a>
                        </li>
                        <li class="paginate_button page-item ">
                            <a href="#" aria-controls="kt_table_1" data-dt-idx="5" tabindex="0" class="page-link">5</a>
                        </li>
                        <li class="paginate_button page-item next" id="kt_table_1_next">
                            <a href="#" aria-controls="kt_table_1" data-dt-idx="6" tabindex="0" class="page-link">
                                <i class="la la-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>	</div>
<!-- end:: Content -->

@endsection

@section('js')
<script src="./assets/js/demo11/scripts.bundle.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<script src="./assets/js/demo11/pages/crud/datatables/basic/basic.js" type="text/javascript"></script>

<script>
$(document).ready(function () {
    document.getElementById('inbox').classList.add('active');
});
</script>
@endsection

<?php

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

    if ($day < 10)
        $day_out = "" . $day;
    else
        $day_out = $day;

    $t_date = $day_out . " " . $month_out . " " . $year_out;

    return $t_date;
}
?>

