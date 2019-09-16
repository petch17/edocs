@extends('layouts.master')

@section('css')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')

<!-- begin:: Content -->
<div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">อัพโหลดเอกสาร</h3>
            </div>
        </div>
    </div>

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="kt-portlet kt-margin-top-30">
                    {{-- <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                อัพโหลด
                            </h3>
                        </div>
                    </div> --}}
                    <!--begin::Form-->
                            {!! Form::open(['route' => 'addstore', 'method' => 'post', 'files'=>true, 'class' => 'kt-form kt-form--label-right']) !!}
                        <div class="kt-portlet__body">

                            <input name="user_id" type="hidden" value="{{Auth::user()->id}}" />

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">เรื่อง :</label>
                                <div class="col-lg-6">
                                {!! Form::text('topic',null,['class'=>'form-control','placeholder'=>'กรุณากรอกชื่อเรื่อง']); !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label text-right">เรียน :</label>
                                <div class="col-lg-6">
                                {!! Form::text('retirement',null,['class'=>'form-control','placeholder'=>'เรียน']); !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label text-right">ประเภทเอกสาร :</label>
                                <div class="col-lg-6">
                                    {!! Form::select('edoc_type',
                                    array( 'แจ้งเพื่อทราบ' => 'แจ้งเพื่อทราบ',
                                     'แจ้งเพื่อดำเนินการ' => 'แจ้งเพื่อดำเนินการ',
                                     'แจ้งอบรม/ประชุม/สัมมนา' => 'แจ้งอบรม/ประชุม/สัมมนา') ,
                                      '-- เลือกประเภทเอกสาร --',
                                    ['class'=>'form-control' ] ); !!}
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-lg-3 col-form-label text-right">อัพโหลด :</label>
                                <div class="col-lg-6">
                                        {!! Form::file('file' , ['accept' => ',.pdf']); !!}
                                </div>
                            </div>


                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-outline-primary">ยืนยัน</button>
                                        <button type="reset" class="btn btn-outline-danger" onclick="window.history.back();">ยกเลิก</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    <!--end::Form-->
                </div>
            </div>
        </div>
</div>
<!-- end:: Content -->
@endsection

@section('js')
<!--begin::Page Scripts(used by this page) -->
{{-- <script src="assets/vendors/custom/uppy/uppy.bundle.js" type="text/javascript"></script>
<script src="./assets/js/demo11/pages/crud/file-upload/uppy.js" type="text/javascript"></script> --}}
<!--end::Page Scripts -->

<script>
    $(document).ready(function () {
        document.getElementById('inbox').classList.add('kt-menu__item--open');
    });
</script>
@endsection
