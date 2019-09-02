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
                            <strong>ตั้งแท่นเอกสาร</strong>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="date-input">เลขที่รับส่วนงาน</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="text-input" type="text" name="text-input"
                                            placeholder="กรอกเลขที่รับส่วนงาน">
                                        {{-- <span class="help-block">โปรดใส่ข้อมูล</span> --}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="text-input">เลขที่หนังสือ</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="text-input" type="text" name="text-input"
                                            placeholder="กรอกเลขที่หนังสือ">
                                        {{-- <span class="help-block">โปรดใส่ข้อมูล</span> --}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="text-input">ประเภทเอกสาร</label>
                                    <div class="col-md-10">
                                        <select name="type" id="type" class="form-control">
                                            <option value="แจ้งเพื่อทราบ"> แจ้งเพื่อทราบ </option>
                                            <option value="แจ้งเพื่อดำเนินการ"> แจ้งเพื่อดำเนินการ </option>
                                            <option value="แจ้งอบรม_ประชุม_สัมมนา"> แจ้งอบรม/ประชุม/สัมมนา </option>
                                        </select>
                                    </div>
                                    {{-- <div class="col-md-10"> --}}
                                        {{-- <input class="form-control" id="text-input" type="text" name="text-input"
                                            placeholder="กรอกประเภทเอกสาร"> --}}
                                        {{-- <span class="help-block">โปรดใส่ข้อมูล</span> --}}
                                    {{-- </div> --}}
                                </div>

                                <a1>
                                    <!-- แจ้งเพื่อทราบ -->
                                    <div class="แจ้งเพื่อทราบ box row" style="">
                                        <div class="col-md-1 col-lg-2"> วันที่ </div>
                                        <div class="col-md-10">
                                            <input type="date" name="date1" id="date1" class="form-control" min="2019-08-19" value="2019-08-19">
                                        </div>
                                    </div>
                                     <!-- แจ้งเพื่อดำเนินการ -->
                                    <div class="แจ้งเพื่อดำเนินการ box row" style="display: none;">
                                        <div class="col-md-1 col-lg-2"> วันที่ </div>
                                        <div class="col-md-10" id="local_time">
                                            <input type="date" name="date2" id="date2" class="form-control" value="2019-08-19">
                                            <!--type="date" name="date"--></div>
                                            <div class="col-md-1 col-lg-2">กำหนดส่ง </div>
                                            <div class="col-md-10" id="local_time">
                                                <input type="date" name="date3" id="date3" class="form-control" value="2019-08-19" required="required">
                                            </div>
                                    </div>
                                     <!-- แจ้งอบรม/ประชุม/สัมมนา -->
                                    <div class="แจ้งอบรม_ประชุม_สัมมนา box row" style="display: none;">
                                                <div class="col-md-1 col-lg-2">เริ่มวันที่ </div>
                                                <div class="col-md-10" id="local_time">
                                                    <input type="date" name="startdate" id="startdate" class="form-control" min="2019-08-19" value="2019-08-19">
                                                </div>
                                                <div class="col-md-1 col-lg-1">เวลา </div>
                                                <div class="col-md-10" id="local_time">
                                                    <input type="time" name="starttime" id="starttime" class="form-control" value="11:30">
                                                </div>
                                                <div class="col-md-1 col-lg-1">น. </div>
                                    </div>
                                    <br>
                                    <div class="แจ้งอบรม_ประชุม_สัมมนา box row" style="display: none;">
                                        <div class="col-md-1 col-lg-2">ถึงวันที่ </div>
                                        <div class="col-md-10" id="local_time">
                                            <input type="date" name="enddate" id="enddate" class="form-control" min="2019-08-19" value="2019-08-19">
                                        </div>
                                        <div class="col-md-1 col-lg-1">เวลา </div>
                                        <div class="col-md-10" id="local_time">
                                            <input type="time" name="endtime" id="endtime" class="form-control" value="11:30">
                                        </div>
                                        <div class="col-md-1 col-lg-1">น. </div>
                                    </div>
                                </a1>

                                {{-- <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="date-input">วันที่</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="date-input" type="date" name="date-input"
                                            placeholder="กรอกวันที่"> --}}
                                        {{-- <span class="help-block">โปรดใส่ข้อมูล</span> --}}
                                    {{-- </div>
                                </div> --}}

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="textarea-input">รายละเอียด</label>
                                    <div class="col-md-10">
                                        <textarea name="editor1" rows="10" cols="50"></textarea>
                                        {{-- <span class="help-block">โปรดใส่ข้อมูล</span> --}}
                                    </div>
                                    <script type="text/javascript">

                                        CKEDITOR.replace('editor1', {

                                            // height: "200px", //กำหนดความสูง

                                            // width: "", //กำหนดความกว้าง

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
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="file-input">File input</label>
                                    <div class="col-md-10">
                                        <input id="file-input" type="file" name="file-input">
                                        <span class="help-block" style="color:red;">เอกสารต้องเป็นไฟล์ PDF
                                            แนวตั้งเท่านั้น</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">เลือกตำแหน่งตราประทับ</label>
                                    <div class="col-md-10 col-form-label">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-checkbox1" type="checkbox"
                                                value="check1">
                                            <label class="form-check-label" for="inline-checkbox1">มุมซ้าย</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-checkbox2" type="checkbox"
                                                value="check2">
                                            <label class="form-check-label" for="inline-checkbox2">ตรงกลาง</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-checkbox3" type="checkbox"
                                                value="check3">
                                            <label class="form-check-label" for="inline-checkbox3">มุมขวา</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="textarea-input">เกษียนหนังสือ</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" id="textarea-input" name="textarea-input"
                                            rows="9" placeholder="เรียน"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="date-input">ตำแหน่ง</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="text-input" type="text" name="text-input"
                                            placeholder="กรอกตำแหน่ง">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">ชั้นความเร็ว</label>
                                    <div class="col-md-6 col-form-label">
                                        <div class="form-check form-check-inline mr-1">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio1" type="radio"
                                                value="option1" name="inline-radios">
                                            <label class="form-check-label" for="inline-radio1">ลับ</label>
                                        </div>
                                            <input class="form-check-input" id="inline-radio1" type="radio"
                                                value="option1" name="inline-radios">
                                            <label class="form-check-label" for="inline-radio1">ปกติ</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2" type="radio"
                                                value="option2" name="inline-radios">
                                            <label class="form-check-label" for="inline-radio2">ด่วน</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio3" type="radio"
                                                value="option3" name="inline-radios">
                                            <label class="form-check-label" for="inline-radio3"> ด่วนมาก </label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio4" type="radio"
                                                value="option4" name="inline-radios">
                                            <label class="form-check-label" for="inline-radio4"> ด่วนที่สุด </label>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="card-footer" align="center">
                            <input type="submit" class="btn btn-primary" name="submit" value="ยืนยัน">
                            <a href="javascript:history.back(1)" class="btn btn-danger">ยกเลิก</a>
                            {{-- <button class="btn btn-sm btn-primary" type="submit">ส่ง</button>
            <button class="btn btn-sm btn-danger" type="reset"> ยกเลิก</button> --}}
                        </div>
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
