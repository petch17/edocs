@extends('layouts.master')

@section('css')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')

<!-- begin:: Content -->
<div class="kt-subheader kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">ส่งต่อเอกสาร</h3>
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
                {!! Form::open(['route' => 'receiver.store', 'method' => 'post', 'class' => 'kt-form
                kt-form--label-right']) !!}
                <div class="kt-portlet__body">

                    <input name="edoc_id" type="hidden" value="{{$edoc_id}}" />
                    {{-- {!! Form::text('edoc_id',null,['class'=>'form-control','type'=>'hidden']); !!}  --}}

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">เลขที่รับส่วนงาน :</label>
                        <div class="col-lg-6">
                            {!! Form::text('part_id',null,['class'=>'form-control','placeholder'=>'เลขที่รับส่วนงาน']);
                            !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">วันที่ :</label>
                        <div class="col-lg-6">
                            {!! Form::date('date', null, ['class' => 'form-control datetimepicker','id' =>
                            '','placeholder' => '-- เลือกวันที่ --']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">ประเภทเอกสาร :</label>
                        <div class="col-lg-6">
                            {!! Form::select('edoc_type',
                            array('แจ้งเพื่อทราบ' => 'แจ้งเพื่อทราบ', 'แจ้งเพื่อดำเนินการ' => 'แจ้งเพื่อดำเนินการ',
                            'แจ้งอบรม_ประชุม_สัมมนา' => 'แจ้งอบรม_ประชุม_สัมมนา') , '-- เลือกประเภทเอกสาร --',
                            ['class'=>'form-control' ] ); !!}
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-lg-3 col-form-label text-right">เกษียนหนังสือ :</label>
                        <div class="col-lg-6">
                            {!!
                            Form::textarea('retirement',null,['class'=>'form-control','placeholder'=>'เรียน']);
                            !!}
                        </div>
                    </div>

                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-outline-primary">ยืนยัน</button>
                                <button type="reset" class="btn btn-outline-danger"
                                    onclick="window.history.back();">ยกเลิก</button>
                               </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!} 
                <!--end::Form-->

                {{-- <form name="form" id="form" method="post" action="#"
                enctype="multipart/form-data" onsubmit="return validateForm();">
            <div class="form-row">
        
                <div>
                    <label>Enter Text:</label> <input type="text"
                        class="input-field" name="txt_input" maxlength="50">
                </div>
            </div>
            <div class="button-row">
                <input type="submit" id="submit" name="submit"
                    value="Convert">
            </div>
        </form>
        
        @php
        if (isset($_POST['submit'])) {
            
            $img = imagecreate(500, 100);
            
            $textbgcolor = imagecolorallocate($img, 173, 230, 181);
            $textcolor = imagecolorallocate($img, 0, 192, 255);
            
            if ($_POST['txt_input'] != '') {
                $txt = $_POST['txt_input'];
                imagestring($img, 5, 5, 5, $txt, $textcolor);
                ob_start();
                imagepng($img);
                printf('<img src="data:image/png;base64,%s"/ width="100">', base64_encode(ob_get_clean()));
            }
        }
        @endphp --}}
            </div>
        </div>
    </div>
</div>
<!-- end:: Content -->
@endsection

@section('js')
<!--begin::Page Scripts(used by this page) -->
<script src="assets/vendors/custom/uppy/uppy.bundle.js" type="text/javascript"></script>
<script src="./assets/js/demo11/pages/crud/file-upload/uppy.js" type="text/javascript"></script>
<!--end::Page Scripts -->

<script>
    $(document).ready(function () {
        document.getElementById('inbox').classList.add('kt-menu__item--open');
    });
</script>
@endsection