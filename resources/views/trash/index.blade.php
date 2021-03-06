@extends('layouts.master')

@section('css')
<link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<!-- begin:: Content -->
<div class="kt-subheader kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">รายการเอกสารที่ถูกลบ</h3>
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
                        <th width="10%">ลำดับ</th>
                        <th width="35%">ชื่อไฟล์</th>
                        <th width="20%"><i class="fa fa-cog"></i></th>
                    </tr>
                </thead>

                <tbody>
                @foreach($trashs as $index=>$item)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$item->topic}}</td>
                        <td>
                            <a target="_blank" href="http://203.113.14.20:3000/pdffile/{{$item->file}}" data-toggle="kt-tooltip" title="ดูรายละเอียด">
                                <i class="fa fa-search"></i>
                            </a>
                            &nbsp; &nbsp;

                            <a href="{{ route('restoretrash' , ['id' => $item->id]) }}" data-toggle="kt-tooltip" title="กู้คืน">
                                <i class="fa fa-redo"></i>
                            </a>

                            &nbsp; &nbsp;

                            <a href="" class="delBtn" data-id="{{$item->id}}" data-toggle="kt-tooltip" title="ลบ">
                                <i class="fa fa-trash-alt"></i>
                            </a>
                            <input type="hidden" name="_token" id="_token" value="{{ csrf_token()}}">

                        </td>
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

<script>
    $(document).ready(function() {
        document.getElementById('trash').classList.add('kt-menu__item--open');
        $('#table1').DataTable();
    });
</script>

<script>
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
                        url: '{{ url('trash')}}/' + id,
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
