$(document).ready(function (){
    $('.survey_box').on('click','.step_give_tab a', function (){
        $('.step_give_tab').hide();
    })

    $('.survey_box').on('click','.btn-step-survey', function (){
         $('.step_survey').addClass('step-hide');
        $('.step_give').removeClass('step-hide');
    })
    $('.survey_box').on('click','.btn-step-give', function (){
        $('.step_give').addClass('step-hide');
        $('.step_date').removeClass('step-hide');
    })
    $('.survey_box').on('click','.btn-step-date', function (){
        $('.step_date').addClass('step-hide');
        $('.step_email').removeClass('step-hide');

    });

    // change date survey
    $('.survey_box').on('click', '.obj_survey_click', function (){
           var dataObj = $(this).data('obj');
           $('input[name="obj_survey"]').val(dataObj);
    });
    $('.btn-run-now').on('click', function (){
        $('input[name="status"]').val(1);
    })

})
