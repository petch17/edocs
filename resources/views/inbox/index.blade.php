@extends('layouts.master')

@section('css')
@endsection

@section('content')
<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="alert alert-light alert-elevate" role="alert">
        <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
        <div class="alert-text">
            DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table.
            <br>For more info see <a class="kt-link kt-font-bold" href="https://datatables.net/" target="_blank">the official home</a> of the plugin.
        </div>
    </div>

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Basic
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <div class="dropdown dropdown-inline">
                            <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="la la-download"></i> Export  	
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <ul class="kt-nav">
                                    <li class="kt-nav__section kt-nav__section--first">
                                        <span class="kt-nav__section-text">Choose an option</span>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon la la-print"></i>
                                            <span class="kt-nav__link-text">Print</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon la la-copy"></i>
                                            <span class="kt-nav__link-text">Copy</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon la la-file-excel-o"></i>
                                            <span class="kt-nav__link-text">Excel</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon la la-file-text-o"></i>
                                            <span class="kt-nav__link-text">CSV</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                            <span class="kt-nav__link-text">PDF</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        &nbsp;
                        <a href="#" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                            New Record
                        </a>
                    </div>	
                </div>		</div>
        </div>

        <div class="kt-portlet__body">
            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                <thead>
                    <tr>
                        <th>Record ID</th>
                        <th>Order ID</th>
                        <th>Country</th>
                        <th>Ship City</th>
                        <th>Ship Address</th>
                        <th>Company Agent</th>
                        <th>Company Name</th>
                        <th>Ship Date</th>
                        <th>Status</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>61715-075</td>
                        <td>China</td>
                        <td>Tieba</td>
                        <td>746 Pine View Junction</td>
                        <td>Nixie Sailor</td>
                        <td>Gleichner, Ziemann and Gutkowski</td>
                        <td>2/12/2018</td>
                        <td>3</td>
                        <td>2</td>
                        <td nowrap></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>63629-4697</td>
                        <td>Indonesia</td>
                        <td>Cihaur</td>
                        <td>01652 Fulton Trail</td>
                        <td>Emelita Giraldez</td>
                        <td>Rosenbaum-Reichel</td>
                        <td>8/6/2017</td>
                        <td>6</td>
                        <td>3</td>
                        <td nowrap></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>68084-123</td>
                        <td>Argentina</td>
                        <td>Puerto Iguazú</td>
                        <td>2 Pine View Park</td>
                        <td>Ula Luckin</td>
                        <td>Kulas, Cassin and Batz</td>
                        <td>5/26/2016</td>
                        <td>1</td>
                        <td>2</td>
                        <td nowrap></td>
                    </tr>
                </tbody>

            </table>
            <!--end: Datatable -->
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