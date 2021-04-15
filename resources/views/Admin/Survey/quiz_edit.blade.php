<div class="inner-repeater">
    <div class="form-group">
        <label>Câu hỏi</label>
        <input type="text" name="quiz_name" class="form-control" value="{{ $quizs->title }}">
    </div>
    <div class="form-group type_option_box">
        <label for="exampleFormControlSelect2">Lựa chọn dạng câu hỏi</label>
        <select class="form-control sl_type_quiz" id="exampleFormControlSelect2" name="type">
            <option hidden>-- Chọn --</option>
            <option value="1" @if($quizs->type == 1) ? selected @else '' @endif>Mặt cười</option>
            <option value="2" @if($quizs->type == 2) ? selected @else '' @endif>Slider</option>
            <option value="3" @if($quizs->type == 3) ? selected @else '' @endif>Trắc nghiệm</option>
            <option value="4" @if($quizs->type == 4) ? selected @else '' @endif>Tùy chọn</option>
        </select>

        <div class="dp_quiz_anwser_1 anwser_option @if($quizs->type == 1) active_anser @else '' @endif">Mặt cưởi</div>
        <div class="dp_quiz_anwser_2 anwser_option @if($quizs->type == 2) active_anser @else '' @endif">
            <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
        </div>
        <div class="dp_quiz_anwser_3 anwser_option @if($quizs->type == 3) active_anser @else '' @endif">Trắc nghiệm</div>
        <div class="dp_quiz_anwser_4 anwser_option @if($quizs->type == 4) active_anser @else '' @endif">

               @if($quizs->type == 4)
                @foreach($quizs->anwsers as $key=>$anwser)
                    <div id="quiz{{ $key+1 }}">
                        <input type="text" name="anwser_opt[{{ $key+1 }}]" class="form-control" value="{{ $anwser->answer }}"/>
                        <p id="delete-anwser">Xóa</p>
                    </div>

                @endforeach
                @else
                <div id="quiz1">
                    <input type="text" name="anwser_opt[1]" class="form-control" />
                    <p id="delete-anwser">Xóa</p>
                </div>

                   @endif
                   <p id="add-anwser">Thêm</p>



        </div>

    </div>
</div>
<div class="btn btn-primary update-quiz" data-quiz="{{ $quizs->id }}">Cập nhật</div>
<div class="box-mesager">

</div>
