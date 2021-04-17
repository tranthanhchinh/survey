
@if($details)
<div class="box_detail_template">
    <h3>{{ $details['name'] }}</h3>
    <p>Những câu hỏi được gửi theo thứ tự ngẫu nhiên</p>
    <div class="box_detail_template_quiz">
        @if($details['group'])
            @foreach($details['group'] as $group)
        <div class="box_detail_template_group">
            <p>{{ $group['group_name'] }}</p>
            @if($group['quiz'])
                @foreach($group['quiz'] as $quiz)
            <div class="tp_quiz-list" style="background: #f5f5f5 ; margin-bottom: 10px">
                <p>{{ $quiz['quiz_name'] }}</p>
                <div class="tp_quiz-list-content">

                     @if($quiz['type']==1)
                        Mặt cười
                    @elseif($quiz['type']==2)
                         Slider
                    @elseif($quiz['type']==3)
                         Trắc nghiệm
                    @else
                         @if($quiz['anwser'])
                             @foreach($quiz['anwser'] as $key=>$anwser)
                                <p>{{ $key+1 }} {{ $anwser['anwser_opt'] }}</p>
                            @endforeach
                             @endif
                    @endif
                </div>
            </div>
                @endforeach
                @endif
        </div>
            @endforeach
         @endif
    </div>
    <div class="act-survey" style="margin-top: 10px;"><span data-id="{{ $details['id_survey'] }}">Sử dụng mẫu này</span></div>
</div>
    @endif
