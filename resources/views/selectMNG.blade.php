@extends('layouts.master')

@section('css')
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

@endsection

@section('content')

<!-- begin:: Content -->
<div class="kt-subheader kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">เลือกผู้บริหาร</h3>
        </div>
    </div>
</div>

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="kt-portlet kt-margin-top-30">
                <!--begin::Form-->
                {!! Form::open(['route' => 'SCMNGstore', 'method' => 'post', 'files'=>true, 'class' => 'kt-form
                kt-form--label-right']) !!}
                <div class="kt-portlet__body">

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

                        </div>
                    </div>
                    @else
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">เลือกผู้บริหาร :</label>
                        <div class="col-lg-6">
                            <select style="width: 100%" id="manager" name="MANAGER_ID" class="form-control">
                                @foreach($manager as $managers)
                                    @php
                                        $sumname = $managers->TITLE_TH.' '.$managers->FIRST_NAME_TH.' '.$managers->LAST_NAME_TH
                                    @endphp

                                    @if ($managers->id == Auth::user()->MANAGER_ID)
                                        <option value="{{$managers->id}}" selected> {{ $sumname }} </option>
                                    @else
                                        <option value="{{ $managers->id }}">{{ $sumname }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif

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
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="{{asset('assets/js/select2.min.js')}}"></script>

    <script>

        $("#manager").select2({
            placeholder: "-- เลือกผู้บริหาร --",
            allowClear: true
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
