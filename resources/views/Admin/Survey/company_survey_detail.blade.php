<form action="{{ route('updateSurvey') }}" method="POST">

    @csrf
    <input type="hidden" name="id" value="{{ $details['id_survey'] }}">
    <div class="form-group">
        <label>Tên khảo sát</label>
        <input type="text" name="name_survey" value="{{ $details['name'] }}" class="form-control">
    </div>
    <div class="form-group">
        <label>Giới thiệu</label>
        <textarea id="editor_survey" class="form-control" name="introduce_survey" rows="5">{{ $details['description'] }}</textarea>
    </div>

    <div data-repeater-list="group" >
        @foreach($details['group'] as $key=>$group)
        <div data-repeater-item class="box_group_quiz">
            <div class="form-group">
                <label>Nhóm câu hỏi</label>
                <input type="text" name="group_quiz" class="form-control" value="{{ $group['group_name'] }}">
            </div>
            <div class="inner-repeater">

                <div data-repeater-list="quiz" >
                    @if(isset($group['quiz']))
                    @foreach($group['quiz'] as $quiz)
                    <div data-repeater-item class="box_quiz">
                        <div class="form-group">
                            <label>Câu hỏi</label>
                            <input type="text" name="quiz_name" value="{{ $quiz['quiz_name'] }}" class="form-control">
                        </div>
                        <div class="form-group type_option_box">
                            <label for="exampleFormControlSelect2">Lựa chọn dạng câu hỏi</label>
                            <select class="form-control sl_type_quiz" id="exampleFormControlSelect2" name="type">
                                <option hidden>-- Chọn --</option>
                                <option value="1" @if($quiz['type'] == 1) ? selected @else '' @endif>Mặt cười</option>
                                <option value="2" @if($quiz['type'] == 2) ? selected @else '' @endif>Slider</option>
                                <option value="3" @if($quiz['type'] == 3) ? selected @else '' @endif>Trắc nghiệm</option>
                                <option value="4" @if($quiz['type'] == 4) ? selected @else '' @endif>Tùy chọn</option>
                            </select>

                            <div class="dp_quiz_anwser_1 anwser_option @if($quiz['type'] == 1) active_anser @else '' @endif" >Mặt cưởi</div>
                            <div class="dp_quiz_anwser_2 anwser_option @if($quiz['type'] == 2) active_anser @else '' @endif">
                                <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                            </div>
                            <div class="dp_quiz_anwser_3 anwser_option @if($quiz['type'] == 3) active_anser @else '' @endif">Trắc nghiệm</div>
                            <div class="dp_quiz_anwser_4 anwser_option @if($quiz['type'] == 4) active_anser @else '' @endif">
                                <div class="deep-inner-repeater">
                                    <div data-repeater-list="anser">
                                        @if($quiz['type'] == 4 && isset($quiz['anwser']))

                                            @foreach($quiz['anwser'] as $anwser)
                                        <div data-repeater-item  style="background: #f9f9f9">
                                            <div class="form-group">
                                                <input type="text" name="anwser_opt" value="{{ $anwser['anwser_opt'] }}" class="form-control">
                                            </div>
                                            <div data-repeater-delete>Xóa</div>
                                        </div>
                                            @endforeach
                                            @else
                                            <div data-repeater-item  style="background: #f9f9f9">
                                                <div class="form-group">
                                                    <input type="text" name="anwser_opt"  class="form-control">
                                                </div>
                                                <div data-repeater-delete>Xóa</div>
                                            </div>
                                        @endif
                                    </div>
                                    <div data-repeater-create>Thêm</div>
                                </div>
                            </div>
                        </div>
                        <div data-repeater-delete>Xóa</div>
                    </div>
                    @endforeach
                        @endif
                </div>
                <div data-repeater-create>Thêm câu hỏi</div>
            </div>
            <div data-repeater-delete>Xóa</div>
        </div>
        @endforeach
    </div>

    <div data-repeater-create>Thêm nhóm</div>

    <button type="submit" class="btn btn-primary" >Cập nhật</button>
</form>

