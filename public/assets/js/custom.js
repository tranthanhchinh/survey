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

    })
})