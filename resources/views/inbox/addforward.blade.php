@extends('layouts.master')

@section('css')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

{{-- select --}}
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" /> --}}
<style>
    canvas {
        border: 1px black solid;
    }

    .text {
        display: none;
    }
</style>
<link href="{{asset('css2/multi-select.css')}}" media="screen" rel="stylesheet" type="text/css">
<link href="{{asset('css2/multi-select.dev.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('css2/multi-select.dist.css')}}" rel="stylesheet" type="text/css">

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
                {!! Form::open(['route' => 'addforwardstore', 'method' => 'post', 'files'=>true, 'onsubmit'=>'return
                validateForm()', 'class' => 'kt-form kt-form--label-right']) !!}
                <div class="kt-portlet__body">

                    <input name="user_id" type="hidden" value="{{Auth::user()->id}}" />

                    {{-- <input name="edoc_id" type="hidden" value="{{$edoc_id}}" /> --}}

                    {{-- <input name="MAAGER_ID" type="hidden" value="{{Auth::user()->MAAGER_ID}}" /> --}}

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label" >อัพโหลด :</label>
                        <div class="col-lg-6" >
                            {!! Form::file('file' , ['accept' => ',.pdf']); !!}
                            <div class="container-fluid" style="height:5px;">
                                @if( $errors->has('file') )
                                    <span style="color:red;">
                                        {{($errors->first('file') )}}
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">ตัวย่อหน่วยงานของผู้รับ :</label>
                        <div class="col-lg-9">
                            {!! Form::text('pos_abbr',null,['class'=>'form-control', 'id'=>'text'
                            ,'placeholder'=>'ตัวย่อหน่วยงานของผู้รับ']);
                            !!}
                            <div class="container-fluid" style="height:5px;">
                                @if( $errors->has('pos_abbr') )
                                    <span style="color:red;">
                                        {{($errors->first('pos_abbr') )}}
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">เลขที่รับส่วนงาน :</label>
                        <div class="col-lg-9">
                            {!! Form::text('part_num',null,['class'=>'form-control', 'id'=>'text'
                            ,'placeholder'=>'เลขที่รับส่วนงาน']);
                            !!}
                            <div class="container-fluid" style="height:5px;">
                                @if( $errors->has('part_num') )
                                    <span style="color:red;">
                                        {{($errors->first('part_num') )}}
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">วันที่ :</label>
                        <div class="col-lg-3">
                            {!! Form::date('date', $currentday, ['class' => 'form-control','id' =>
                            '','placeholder' => '-- เลือกวันที่ --']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">เวลา :</label>
                        <div class="col-lg-3">
                                {!! Form::time('times',$currenttime, ['class' => 'form-control']) !!}
                                {{ $errors->first('times') }}
                            {{-- {!! Form::time('times',$currenttime, ['class' => 'form-control']) !!}
                            {{ $errors->first('times') }} --}}
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">เรียน :</label>
                        <div class="col-lg-9">
                            {!! Form::textarea('retirement',null,['class'=>'form-control','placeholder'=>'เรียน']); !!}
                            <div class="container-fluid" style="height:5px;">
                                @if( $errors->has('retirement') )
                                    <span style="color:red;">
                                        {{($errors->first('retirement') )}}
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">ประเภทเอกสาร :</label>
                        <div class="col-lg-9">
                            {!! Form::select('edoc_type',
                            array( null => '--เลือกประเภทเอกสาร--' ,
                                'แจ้งเพื่อทราบ' => 'แจ้งเพื่อทราบ',
                                'แจ้งเพื่อดำเนินการ' => 'แจ้งเพื่อดำเนินการ',
                                'แจ้งอบรม/ประชุม/สัมมนา' => 'แจ้งอบรม/ประชุม/สัมมนา') ,
                                '-- เลือกประเภทเอกสาร --',
                            ['class'=>'form-control' ] ); !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">เลือกวัตถุประสงค์ :</label>
                        <div class="col-lg-9">
                            {!! Form::select('objective',
                            array( null => '--เลือกวัตถุประสงค์--' ,
                                'เพื่ออนุมัติ' => 'เพื่ออนุมัติ',
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

                    {{-- <div class="form-group row">
                        <label class="col-lg-3 col-form-label">เลือกผู้รับ :</label>
                        <div class="col-lg-9">
                            <select multiple class="searchable" name="select_manager[]">
                                @foreach($employee as $employees)
                                    @php
                                        $sumname = $employees->TITLE_TH.' '.$employees->FIRST_NAME_TH.' '.$employees->LAST_NAME_TH
                                    @endphp

                                    <option value="{{$employees->id}}"> {{ $sumname }} </option>
                                @endforeach
                            </select>
                         </div>
                    </div> --}}

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
@endsection

@section('js')
<script src="{{asset('js2/jquery.js')}}" type="text/javascript"></script>
<script src="{{asset('js2/jquery.multi-select.js')}}" type="text/javascript"></script>

<script>
    $(document).ready(function () {
        // document.getElementById('native').classList.add('kt-menu__item--open');
        document.getElementById('index2').classList.add('kt-menu__item--open');
    });


    $('.searchable').multiSelect({
        selectableHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='ค้นหา' style='width: 165px; border-radius: 4px' >",
        selectionHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='ค้นหา' style='width: 165px; border-radius: 4px' >",
        afterInit: function (ms) {
            var that = this,
                $selectableSearch = that.$selectableUl.prev(),
                $selectionSearch = that.$selectionUl.prev(),
                selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

            that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                .on('keydown', function (e) {
                    if (e.which === 40) {
                        that.$selectableUl.focus();
                        return false;
                    }
                });

            that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                .on('keydown', function (e) {
                    if (e.which == 40) {
                        that.$selectionUl.focus();
                        return false;
                    }
                });
        },
        afterSelect: function () {
            this.qs1.cache();
            this.qs2.cache();
        },
        afterDeselect: function () {
            this.qs1.cache();
            this.qs2.cache();
        }
    });

</script>


@endsection
