@extends('layouts.master')

@section('css')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

{{-- select --}}
<link href="{{asset('assets/css/select2.min.css')}}" rel="stylesheet" />

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
                {!! Form::open(['route' => 'addstore', 'method' => 'post', 'files'=>true, 'class' => 'kt-form
                kt-form--label-right']) !!}
                <div class="kt-portlet__body">

                    <input name="user_id" type="hidden" value="{{Auth::user()->id}}" />



                    @if(Auth::user()->MANAGER_ID == null)
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">เลือกผู้บริหาร :</label>
                        <div class="col-lg-6">
                            <select style="width: 100%" id="manager" name="MANAGER_ID" class="form-control">
                                <option></option>
                                @foreach($manager as $managers)
                                @php $sumname = $managers->TITLE_TH.' '.$managers->FIRST_NAME_TH.'
                                '.$managers->LAST_NAME_TH @endphp
                                <option value="{{$managers->id}}">
                                    {{$managers->EMPCODE}}&nbsp;&nbsp;{{$sumname}}
                                </option>
                                @endforeach
                            </select>
                            {{-- {!! Form::select('select_manager',$manager->pluck( 'EMPCODE','TITLE_TH','FIRST_NAME_TH','LAST_NAME_TH' , 'id' ),
                                null, ['class'=>'form-control','id'=>'manager','placeholder'=>'กรุณากรอกชื่อเรื่อง']); !!} --}}

                        </div>
                    </div>
                    @else
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">เลือกผู้บริหาร :</label>
                            <div class="col-lg-6">
                                <select style="width: 100%" id="manager" name="MANAGER_ID" class="form-control">
                                    @foreach($manager as $managers)
                                    @php $sumname =  $managers->TITLE_TH.' '.$managers->FIRST_NAME_TH.'
                                    '.$managers->LAST_NAME_TH  @endphp
                                    <option value="{{ Auth::user()->MANAGER_ID }}">
                                        {{$sumname}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">เรื่อง :</label>
                        <div class="col-lg-6">
                            {!! Form::text('topic',null,['class'=>'form-control','placeholder'=>'กรุณากรอกชื่อเรื่อง']);
                            !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">เรียน :</label>
                            <div class="col-lg-9">
                                <select multiple class="searchable" name="select_manager[]">
                                    @foreach($manager2 as $manager22)
                                    @php
                                    $sumname2 = $manager22->TITLE_TH.' '.$manager22->FIRST_NAME_TH.' '.$manager22->LAST_NAME_TH
                                    @endphp
                                    <option value="{{$manager22->id}}">{{$sumname2}}</option>

                                    {{-- <input name="POS_ABBR" type="hidden" value="{{ $manager22->POS_ABBR }}" /> --}}
                                    @endforeach
                                    {{-- <option></option> --}}
                                </select>
                            </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">ประเภทเอกสาร :</label>
                        <div class="col-lg-6">
                            {!! Form::select('edoc_type',
                            array( 'แจ้งเพื่อทราบ' => 'แจ้งเพื่อทราบ',
                            'แจ้งเพื่อดำเนินการ' => 'แจ้งเพื่อดำเนินการ',
                            'แจ้งอบรม/ประชุม/สัมมนา' => 'แจ้งอบรม/ประชุม/สัมมนา') ,
                            '-- เลือกประเภทเอกสาร --',
                            ['class'=>'form-control' ] ); !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">อัพโหลด :</label>
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
<!-- end:: Content -->
@endsection

@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="{{asset('assets/js/select2.min.js')}}"></script>

<script>

        $("#manager").select2({
            placeholder: "เลือกผู้บริหาร",
            allowClear: true
        });

</script>

<script src="{{asset('js2/jquery.js')}}" type="text/javascript"></script>
<script src="{{asset('js2/jquery.multi-select.js')}}" type="text/javascript"></script>

<script>
    $(document).ready(function () {
        document.getElementById('inbox').classList.add('kt-menu__item--open');
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
<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 8px;
    }

    .select2-container--default .select2-selection--single,
    .select2-container--default .select2-selection--multiple {
        line-height: 2;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered .select2-selection__clear {
        border: 0;
        position: absolute;
        top: 80%;
        font-family: "LineAwesome";
        text-decoration: inherit;
        text-rendering: optimizeLegibility;
        text-transform: none;
        -moz-osx-font-smoothing: grayscale;
        -webkit-font-smoothing: antialiased;
        font-smoothing: antialiased;
        content: "";
        font-size: 1.4rem;
        display: inline-block;
        left: auto;
        right: 1.85rem;
        margin-right: 0.4rem;
        margin-top: -1rem;
    }
</style>

@endsection
