@extends('layouts.master')

@section('css')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

{{-- select --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<style>
    canvas {
        border: 1px black solid;
    }

    .text {
        display: none;
    }
</style>
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
                {!! Form::open(['route' => 'receiver.store', 'method' => 'post', 'file'=>true, 'onsubmit'=>'return
                validateForm()', 'class' => 'kt-form
                kt-form--label-right']) !!}
                <div class="kt-portlet__body">

                    <!--get_image-->
                    {{-- <input id="getimg" name="getimg" type="hidden" value="" />
                    <input id="getimg2" name="getimg2" type="hidden" value="" /> --}}
                    <!--end get_image-->

                    <input name="edoc_id" type="hidden" value="{{$edoc_id}}" />

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">เลขที่รับส่วนงาน :</label>
                        <div class="col-lg-6">
                            {!! Form::text('part_id',null,['class'=>'form-control', 'id'=>'text'
                            ,'placeholder'=>'เลขที่รับส่วนงาน']);
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
                            array( 'เพื่ออนุมัติ' => 'เพื่ออนุมัติ',
                             'เพื่ออนุติในหลักการ' => 'เพื่ออนุติในหลักการ',
                             'เพื่ออนุมัติย้อนหลัง' => 'เพื่ออนุมัติย้อนหลัง',
                             'เพื่ออนุมัติเบิกจ่าย' => 'เพื่ออนุมัติเบิกจ่าย',
                             'เพื่ออนุมัติหักล้าง' => 'เพื่ออนุมัติหักล้าง',
                             'เพื่อขอความเห็นชอบ' => 'เพื่อขอความเห็นชอบ',
                             'เพื่อขอความเห็นชอบในหลักการ' => 'เพื่อขอความเห็นชอบในหลักการ',
                             'เพื่อสั่งการ' => 'เพื่อสั่งการ',
                             'เพื่อลงลายมือชื่อในเอกสารที่แนบมา' => 'เพื่อลงลายมือชื่อในเอกสารที่แนบมา',
                             'เพื่อทราบและส่งต่อ' => 'เพื่อทราบและส่งต่อ',
                             'เพื่อทราบและส่งแฟ้มประมวลเรื่องเดิม' => 'เพื่อทราบและส่งแฟ้มประมวลเรื่องเดิม',
                             'เพื่อวิจารณ์และส่งต่อ' => 'เพื่อวิจารณ์และส่งต่อ',
                             'เพื่อวิจารณ์และส่งคืน' => 'เพื่อวิจารณ์และส่งคืน',
                             'เพื่อให้ร่างหนังสือแล้วส่งคืน' => 'เพื่อให้ร่างหนังสือแล้วส่งคืน',
                             'เพื่อตรวจและส่งคืน' => 'เพื่อตรวจและส่งคืน',
                             'เพื่อกันเงินและกำหนดประภทงบประมาณ' => 'เพื่อกันเงินและกำหนดประภทงบประมาณ',
                             'เพื่อตรวจสอบเอกสารแล้วจ่ายเงิน' => 'เพื่อตรวจสอบเอกสารแล้วจ่ายเงิน',
                             'เพื่อทราบและเก็บไว้เป็นหลักฐาน' => 'เพื่อทราบและเก็บไว้เป็นหลักฐาน',
                             'เพื่อดำเนินการต่อไปตามกรรมวิธี' => 'เพื่อดำเนินการต่อไปตามกรรมวิธี',
                             'เพื่อทราบและเก็บเข้าแฟ้มประมวลเรื่อง' => 'เพื่อทราบและเก็บเข้าแฟ้มประมวลเรื่อง',
                             'เพื่อทราบและส่งคืน' => 'เพื่อทราบและส่งคืน',
                             'เพื่อโปรดพิจารณาความเป็นไปได้ในการเสนอราคา' => 'เพื่อโปรดพิจารณาความเป็นไปได้ในการเสนอราคา') ,
                              '-- เลือกประเภทเอกสาร --',
                            ['class'=>'form-control' ] ); !!}
                        </div>
                    </div>

                    <div class="row">

                        <label class="col-lg-3 col-form-label text-right">เกษียนหนังสือ :</label>
                        <div class="col-lg-6">
                            {!!
                            Form::textarea('retirement',null,['class'=>'form-control', 'id'=>'text2'
                            ,'placeholder'=>'เรียน']);
                            !!}
                        </div>
                    </div>

                    <div class="form-group row">
                            <label class="col-lg-3 col-form-label">เลือกผู้รับ :</label>
                            <div class="kt-header__topbar">
                                <!--begin: Search -->

                                <form method="get" class="kt-quick-search__form">
                                    <div class="col-lg-12">


                                            <div class="kt-portlet__body">
                                                <select id="kt-dual-listbox-2" class="kt-dual-listbox" multiple
                                                    data-available-title="รายชื่อทั้งหมด"
                                                    data-selected-title="รายชื่อที่เลือก"
                                                    data-add="<i class='flaticon2-next'></i>"
                                                    data-remove="<i class='flaticon2-back'></i>"
                                                    data-add-all="<i class='flaticon2-fast-next'></i>"
                                                    data-remove-all="<i class='flaticon2-fast-back'></i>"
                                                    >
                                                    {{-- <select style="width: 200px" id="manager">
                                                            <option></option>
                                                            @foreach($manager as $managers)
                                                            <option>{{$managers->EMPCODE}}</option>
                                                            @endforeach
                                                        </select> --}}

                                                        {!! Form::select('select_manager',$employee->pluck( 'EMPCODE','TITLE_TH','FIRST_NAME_TH','LAST_NAME_TH' , 'id' ),
                                                        null, ['class'=>'form-control','id'=>'manager','placeholder'=>'กรุณากรอกชื่อเรื่อง']); !!}
                                                </select>
                                            </div>

                                    </div>
                                </form>

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
            </div>
        </div>
    </div>
</div>
{{-- <br>
<div style="width:200px">


    <canvas id='textCanvas' class='text' height='50' width="100%"></canvas>
    <img id='image' type="hidden">
    <br>

    <canvas id='textCanvas2' class='text' height='50' width="100%"></canvas>
    <img id='image2'>

</div>
<br> --}}
<!-- end:: Content -->
@endsection

@section('js')
<!--begin::Page Scripts(used by this page) -->
{{-- <script src="assets/vendors/custom/uppy/uppy.bundle.js" type="text/javascript"></script>
<script src="./assets/js/demo11/pages/crud/file-upload/uppy.js" type="text/javascript"></script> --}}
<!--end::Page Scripts -->
<link href="{{asset('assets/vendors/general/dual-listbox/dist/dual-listbox.css')}}" rel="stylesheet" type="text/css" />

<script src="{{asset('assets/js/demo11/pages/components/extended/dual-listbox.js')}}" type="text/javascript"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        document.getElementById('sent').classList.add('kt-menu__item--open');
    });

    $("#manager").select2({
            placeholder: "เลือกผู้บริหาร",
            allowClear: true
        });

    // var tCtx = document.getElementById('textCanvas').getContext('2d'),
    //     imageElem = document.getElementById('image');

    // document.getElementById('text').addEventListener('keyup', function () {
    //     tCtx.canvas.width = tCtx.measureText(this.value).width;
    //     tCtx.font = "18px THSarabunNew";
    //     tCtx.fillText(this.value, 0, 25);
    //     imageElem.src = tCtx.canvas.toDataURL();
    //     // console.log(imageElem.src);
    //     // alert(imageElem.src);
    //     document.getElementById("getimg").value = imageElem.src;
    // }, false);

    // var tCtx2 = document.getElementById('textCanvas2').getContext('2d'),
    //     imageElem2 = document.getElementById('image2');

    // document.getElementById('text2').addEventListener('keyup', function () {
    //     tCtx2.canvas.width = tCtx2.measureText(this.value).width;
    //     tCtx2.font = "18px THSarabunNew";
    //     tCtx2.fillText(this.value, 0, 25);
    //     imageElem2.src = tCtx2.canvas.toDataURL();
    //     document.getElementById("getimg2").value = imageElem.src;
    // }, false);

</script>
@endsection
