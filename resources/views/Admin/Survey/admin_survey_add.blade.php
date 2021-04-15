

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="survey_box" action="{{ route('Admin.postAddSurvey') }}" method="POST">
                        @csrf
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

                        <button type="submit" class="btn btn-primary" >Tạo khảo sát</button>
                    </form>

                </div>

            </div>
        </div>
    </div>



