@extends('layouts.master')

@section('css')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')
<!-- begin:: Content -->
<div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">รายการเอกสาร</h3>
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
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">	
                </div>
            </div>
        </div>

        <div class="kt-portlet__body">    
                            {!! Form::open(['route' => 'addstore', 'method' => 'post', 'files'=>true]) !!}

                                {{-- <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="text-input">เลขที่หนังสือ</label>
                                    <div class="col-md-10">
                                        {!! Form::text('booknum',null,['class'=>'form-control','placeholder'=>'กรุณากรอกเลขที่หนังสือ']); !!}
                                    </div>
                                </div> --}}

                                {{-- <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="date-input">วันที่</label>
                                    <div class="col-md-10">
                                        {!! Form::date('date', null, ['class' => 'form-control datetimepicker','id' => '','placeholder' => '-- เลือกวันที่ --']) !!}
                                    </div>
                                </div> --}}

                                {{-- <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="date-input">เรียน</label>
                                    <div class="col-md-10">
                                        {!! Form::text('position',null,['class'=>'form-control','placeholder'=>'กรุณากรอกตำแหน่ง']); !!}
                                    </div>
                                </div> --}}

                                {{-- <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="text-input">วัตถุประสงค์</label>
                                    <div class="col-md-10">
                                        {!! Form::select('objective_id', $goals->pluck('name','id'), null, ['class'=>'form-control','placeholder' => '-- เลือกวัตถุประสงค์ --']); !!}
                                    </div>
                                </div> --}}

                                {{-- <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="textarea-input">รายละเอียด</label>
                                    <div class="col-md-10">
                                        <textarea name="editor1" rows="10" cols="50"></textarea>
                                    </div>
                                    <script type="text/javascript">

                                        CKEDITOR.replace('editor1', {
                                            toolbar: //กลุ่มเครื่องมือ ตัดออก เพิ่มเข้าได้
                                                [
                                                    [
                                                        'Bold', 'Italic', 'Underline', '-',
                                                        'Subscript', 'Superscript', '-',

                                                        'NumberedList', 'BulletedList', '-',
                                                        'Link', 'Unlink', '-',
                                                        'Cut', 'Copy', 'Paste', '-',
                                                        'Undo', 'Redo'
                                                    ],
                                                    [
                                                        'Outdent', 'Indent', '-',
                                                        'JustifyCenter', 'JustifyRight', 'JustifyBlock'
                                                    ],
                                                    '/',
                                                    [
                                                        'Image', 'Table', 'HorizontalRule', '-',
                                                        'Font', 'FontSize', 'TextColor', 'BGColor'
                                                    ]
                                                ]
                                        }
                                        );
                                    </script>
                                </div> --}}

                                {{-- <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="textarea-input">เรื่อง</label>
                                    <div class="col-md-10">
                                        {!! Form::textarea('topic', null, ['class'=>'form-control','placeholder'=>'กรุณากรอกหัวข้อ']) !!}
                                    </div>
                                </div> --}}

                                <div class="kt-portlet__body">
                                        <div class="kt-uppy" id="kt_uppy_3">
                                            <div class="kt-uppy__drag">
                                                <button type="button" class="uppy-Root uppy-u-reset uppy-DragDrop-container uppy-DragDrop--is-dragdrop-supported" style="width: 100%; height: 100%;">
                                                <input class="uppy-DragDrop-input" type="file" tabindex="-1" focusable="false" name="files[]" multiple="" accept="image/*,video/*">
                                                <div class="uppy-DragDrop-inner"><svg aria-hidden="true" focusable="false" class="UppyIcon uppy-DragDrop-arrow" width="16" height="16" viewBox="0 0 16 16">
                                                    <path d="M11 10V0H5v10H2l6 6 6-6h-3zm0 0" fill-rule="evenodd">
                                                        </path>
                                                    </svg>
                                                    <div class="uppy-DragDrop-label">Drop files here or 
                                                        <span class="uppy-DragDrop-browse">browse</span>
                                                    </div>
                                                    <span class="uppy-DragDrop-note"></span>
                                                </div>
                                            </button>
                                        </div>
                                            <div class="kt-uppy__informer">
                                                <div class="uppy uppy-Informer" aria-hidden="true">
                                                    <p role="alert"> </p>
                                                </div>
                                            </div>
                                            <div class="kt-uppy__progress">
                                                <div class="uppy uppy-ProgressBar" style="position: initial;">
                                                    <div class="uppy-ProgressBar-inner" style="width: 0%;"></div>
                                                    <div class="uppy-ProgressBar-percentage">0</div>
                                                </div>
                                            </div>
                                            <div class="kt-uppy__thumbnails"></div>
                                        </div>
                                    </div>

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="file-input">อัพโหลดไฟล์</label>
                                    <div class="col-md-10">
                                        {!! Form::file('file' , ['accept' => ',.pdf']); !!}
                                    </div>
                                </div>

                        </div>
                        <div class="card-footer" align="center">
                            <button type="submit" class="btn btn-primary">ยืนยัน</button>
                            <a href="javascript:history.back(1)" class="btn btn-danger">ยกเลิก</a>
                            {{-- <button class="btn btn-sm btn-primary" type="submit">ส่ง</button>
            <button class="btn btn-sm btn-danger" type="reset"> ยกเลิก</button> --}}
                        </div>
                        {!! Form::close() !!}

                        
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


