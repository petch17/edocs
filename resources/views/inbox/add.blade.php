@extends('layouts.master')

@section('css')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        {{-- <li class="breadcrumb-item" href="{{ url('/home') }}">Home</li> --}}
        <li class="breadcrumb-item"><a href="{{ route('inbox.index') }}"><i class="fa fa-file"></i> รายการเอกสาร</a>
        </li>
        <li class="breadcrumb-item">เพิ่มเอกสาร</li>
    </ol>
    <div class="container-fluid">
        <div class="card">
            <div class="card-block">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header">
                            <strong>เพิ่มเอกสาร</strong>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'addstore', 'method' => 'post', 'files'=>true]) !!}

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="text-input">เลขที่หนังสือ</label>
                                    <div class="col-md-10">
                                        {!! Form::text('booknum',null,['class'=>'form-control','placeholder'=>'กรุณากรอกเลขที่หนังสือ']); !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="date-input">วันที่</label>
                                    <div class="col-md-10">
                                        {!! Form::date('date', null, ['class' => 'form-control datetimepicker','id' => '','placeholder' => '-- เลือกวันที่ --']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="date-input">เรียน</label>
                                    <div class="col-md-10">
                                        {!! Form::text('position',null,['class'=>'form-control','placeholder'=>'กรุณากรอกตำแหน่ง']); !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="text-input">วัตถุประสงค์</label>
                                    <div class="col-md-10">
                                        {!! Form::select('objective_id', $goals->pluck('name','id'), null, ['class'=>'form-control','placeholder' => '-- เลือกวัตถุประสงค์ --']); !!}
                                    </div>
                                </div>

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

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="textarea-input">เรื่อง</label>
                                    <div class="col-md-10">
                                        {!! Form::textarea('topic', null, ['class'=>'form-control','placeholder'=>'กรุณากรอกหัวข้อ']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="file-input">อัพโหลดไฟล์</label>
                                    <div class="col-md-10">
                                        {!! Form::file('file' , ['accept' => ',.pdf']); !!}
                                    </div>
                                </div>


                            {{-- </form> --}}
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
        </div>
    </div>
</main>
@endsection
@section('js')
<script>
        $(document).ready(function () {
            document.getElementById('inbox').classList.add('active');
        });
    </script>
@endsection
