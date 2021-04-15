
    <p class="btn-edit-quiz" data-id="{{ $quiz['id'] }}" data-toggle="modal" data-target="#popupQuiz">Sửa câu hỏi</p>
    <h3>{{ $quiz['quiz_name'] }}</h3>
    @if($quiz['type'] == 1)
        <div class="quiz-box-anser">
            Mặt cười
        </div>
    @elseif($quiz['type'] == 2)
        <div class="quiz-box-anser">
            Slider
        </div>
    @elseif($quiz['type'] == 3)
        <div class="quiz-box-anser">
            Trắc nghiệm
        </div>
    @else
        <div class="quiz-box-anser">
            @if(isset($quiz['anwser']))
            @foreach($quiz['anwser'] as $key=>$anwser)
                <p>{{ $key+1 .$anwser }}</p>
            @endforeach
                @endif
        </div>
    @endif
