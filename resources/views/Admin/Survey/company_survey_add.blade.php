
    <!-- Modal -->
    <div class="modal fade" id="btn_add_survey" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                    <a class="nav-item nav-link obj_survey_click btn-step-give" data-obj="1" id="nav-home-tab" data-toggle="tab" href="#all" role="tab" aria-controls="nav-home" aria-selected="true">Tất cả</a>
                                    <a class="nav-item nav-link obj_survey_click" data-obj="2" id="nav-profile-tab" data-toggle="tab" href="#department" role="tab" aria-controls="nav-profile" aria-selected="false">Phòng ban</a>
                                    <a class="nav-item nav-link obj_survey_click" data-obj="3" id="nav-contact-tab" data-toggle="tab" href="#staff" role="tab" aria-controls="nav-contact" aria-selected="false">Nhân viên</a>
                                    <a class="nav-item nav-link obj_survey_click" data-obj="4" id="nav-contact-tab" data-toggle="tab" href="#email_list" role="tab" aria-controls="nav-contact" aria-selected="false">Địa chỉ email</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">

                                <div class="tab-pane fade" id="department" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <ul class="list-data">
                                        @if($deparments)
                                            @foreach($deparments as $deparment)
                                                <li class="">
                                                    <div class="input-check">
                                                        <input type="checkbox" name="department[]" value="{{ $deparment->id }}">
                                                    </div>
                                                    <div class="list-data-info">
                                                        <p class="list-data-info-name">{{ $deparment->name }}</p>
                                                    </div>

                                                </li>

                                            @endforeach
                                        @endif
                                    </ul>
                                    <button type="button" class="btn btn-primary btn-step btn-step-give">Tạo khảo sát</button>
                                </div>
                                <div class="tab-pane fade" id="staff" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <ul class="list-data">
                                        @if($staffs)
                                            @foreach($staffs as $staff)
                                                <li class="">
                                                    <div class="input-check">

                                                        <input type="checkbox" name="staff[]" value="{{ $staff->email }}">

                                                    </div>
                                                    <div class="list-data-info">
                                                        <p class="list-data-info-name">{{ $staff->name.'('.$staff->email.')' }}</p>
                                                    </div>

                                                </li>

                                            @endforeach
                                        @endif

                                    </ul>
                                    <button type="button" class="btn btn-primary btn-step btn-step-give">Tạo khảo sát</button>
                                </div>
                                <div class="tab-pane fade" id="email_list" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Example file input</label>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                    <button type="button" class="btn btn-primary btn-step btn-step-give">Tạo khảo sát</button>
                                </div>


                            </div>

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
                                <label for="exampleInputEmail1">Tiêu đề</label>
                                <input type="text" name="title_email" class="form-control"  placeholder="Nhập tiêu đề">

                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Nội dung</label>
                                <textarea class="form-control" name="content_email" rows="5"></textarea>
                            </div>
                            <input type="hidden" name="status" value="0">
                            <button type="submit" class="btn btn-primary btn-run-now">Khởi chạy ngay</button>
                            <button type="submit" class="btn btn-primary">Lưu khảo sát</button>
                        </div>


                        {{--                        <button type="submit" class="btn btn-primary" >Tạo khảo sát</button>--}}
                    </form>

                </div>

            </div>
        </div>
    </div>


