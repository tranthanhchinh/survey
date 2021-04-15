@extends('master')
@section('content')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="survey_box" action="{{ route('postAddSurvey') }}" method="POST">
                        @csrf
                        <div class="step_survey">
                            <div class="form-group">
                                <label>Tên khảo sát</label>
                                <input type="text" name="name_survey" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Giới thiệu</label>
                                <textarea id="editor_survey" class="form-control" name="introduce_survey" rows="5"></textarea>
                            </div>

                            <div data-repeater-list="group" >
                                <div data-repeater-item class="box_group_quiz">
                                    <div class="form-group">
                                        <label>Nhóm câu hỏi</label>
                                        <input type="text" name="group_quiz" class="form-control">
                                    </div>
                                    <div class="inner-repeater">
                                        <div data-repeater-list="quiz" >
                                            <div data-repeater-item class="box_quiz">
                                                <div class="form-group">
                                                    <label>Câu hỏi</label>
                                                    <input type="text" name="quiz_name" class="form-control">
                                                </div>
                                                <div class="form-group type_option_box">
                                                    <label for="exampleFormControlSelect2">Lựa chọn dạng câu hỏi</label>
                                                    <select class="form-control sl_type_quiz" id="exampleFormControlSelect2" name="type">
                                                        <option hidden>-- Chọn --</option>
                                                        <option value="1">Mặt cười</option>
                                                        <option value="2">Slider</option>
                                                        <option value="3">Trắc nghiệm</option>
                                                        <option value="4" >Tùy chọn</option>
                                                    </select>

                                                    <div class="dp_quiz_anwser_1 anwser_option">Mặt cưởi</div>
                                                    <div class="dp_quiz_anwser_2 anwser_option">
                                                        <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                                                    </div>
                                                    <div class="dp_quiz_anwser_3 anwser_option">Trắc nghiệm</div>
                                                    <div class="dp_quiz_anwser_4 anwser_option">
                                                        <div class="deep-inner-repeater">
                                                            <div data-repeater-list="anser">
                                                                <div data-repeater-item  style="background: #f9f9f9">
                                                                    <div class="form-group">
                                                                        <input type="text" name="anwser_opt" class="form-control">

                                                                    </div>

                                                                    <div data-repeater-delete>Xóa</div>
                                                                </div>
                                                            </div>
                                                            <div data-repeater-create>Thêm</div>
                                                        </div>


                                                    </div>

                                                </div>

                                                <div data-repeater-delete>Xóa</div>
                                            </div>

                                        </div>
                                        <div data-repeater-create>Thêm câu hỏi</div>
                                    </div>
                                    <div data-repeater-delete>Xóa</div>
                                </div>

                            </div>
                            <div data-repeater-create>Thêm nhóm</div>
                            <button type="button" class="btn btn-primary btn-step btn-step-survey">Tạo khảo sát</button>
                        </div>
                        <div class="step_give step-hide">

                            <h3>Chọn đối tượng khảo sát</h3>
                            <input type="hidden" name="obj_survey" value="">

                            <nav class="step_give_tab">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#all" role="tab" aria-controls="nav-home" aria-selected="true">Tất cả</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#department" role="tab" aria-controls="nav-profile" aria-selected="false">Phòng ban</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#staff" role="tab" aria-controls="nav-contact" aria-selected="false">Nhân viên</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#email_list" role="tab" aria-controls="nav-contact" aria-selected="false">Địa chỉ email</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="nav-home-tab">

                                </div>
                                <div class="tab-pane fade" id="department" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <ul class="list-data">
                                            <li class="">
                                                <div class="input-check">
                                                    <input type="checkbox" name="allcheck[]" value="" id="checked">
                                                </div>
                                                <div class="list-data-info">
                                                    <p class="list-data-info-name">Phòng nhân sự</p>
                                                </div>

                                            </li>
                                        <li class="">
                                            <div class="input-check">
                                                <input type="checkbox" name="allcheck[]" value="" id="checked">
                                            </div>
                                            <div class="list-data-info">
                                                <p class="list-data-info-name">Phòng giám đốc</p>
                                            </div>

                                        </li>


                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="staff" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <ul class="list-data">
                                        <li class="">
                                            <div class="input-check">
                                                <input type="checkbox" name="allcheck[]" value="" id="checked">
                                            </div>
                                            <div class="list-data-info">
                                                <p class="list-data-info-name">Phòng nhân sự</p>
                                            </div>

                                        </li>
                                        <li class="">
                                            <div class="input-check">
                                                <input type="checkbox" name="allcheck[]" value="" id="checked">
                                            </div>
                                            <div class="list-data-info">
                                                <p class="list-data-info-name">Phòng giám đốc</p>
                                            </div>

                                        </li>


                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="email_list" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Example file input</label>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-step btn-step-give">Tạo khảo sát</button>
                        </div>
                        <div class="step_date step-hide">
                            <h3>Chọn thời gian khảo sát</h3>
                            <div class="form-group">
                                <select name="time_repeat" class="select_time_repeat">
                                    <option hidden>Chọn</option>
                                    <option value="1">Lặp lại theo tuần</option>
                                    <option value="2">Lặp lại theo tháng</option>
                                    <option value="3">Lặp lại theo quý</option>
                                    <option value="4">Tùy chọn khác</option>
                                </select>
                               <div class="box_show_date">
                                   <p>Ngày bắt đầu</p>
                                   <input type="date" name="start_date" id="start_date" min="{{ date("Y-m-d") }}" value="{{ date("Y-m-d") }}">
                                   <p>Ngày kết thúc</p>
                                   <input type="date" name="end_date" id="end_date" min="{{ date("Y-m-d") }}" value="{{ date("Y-m-d") }}">
                               </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-step btn-step-date">Tạo khảo sát</button>
                        </div>
                        <div class="step_email step-hide">
                             <h3>Lời mời khảo sát qua email</h3>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Example textarea</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                            </div>
                            <button type="button" class="btn btn-primary btn-step btn-step-email">Khởi chạy ngay</button>
                            <button type="button" class="btn btn-primary btn-step btn-step-email">Lưu khảo sát</button>
                        </div>


{{--                        <button type="submit" class="btn btn-primary" >Tạo khảo sát</button>--}}
                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection

