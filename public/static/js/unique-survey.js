var surveyQuestion = '';
var survey_id = null;
var question_length = null;

$(document).ready(function() {
  $('#endPage').hide();
  var url_id = $(location).attr('href');

  var mainId = url_id.split('participate/');
  survey_id = mainId[1];

  id_array = {
    id: survey_id
  };

  $('.questions_form').hide();
  // var surv_title = $('#title-' + survey_id).html();
  // // alert(surv_title);
  // $('#survey_title').html(surv_title);

  $.ajax({
    url: '/survey/unique_survey',
    type: 'POST',
    data: id_array,
    success: function(response) {
      var data = JSON.parse(response);
      // console.log(data.success.data.questions[0].survey_title);
      //  enableBtn("<i class=\"fas fa-plus-circle\"></i> Post", "dynamicBtnSubmitForm");
      $('#survey_title').html(data.success.data.questions[0].survey_title);

      if (data.success) {
        if (data.success.data.status == true) {
          $('#surv-strt').trigger('click');

          surveyQuestion = data.success.data.questions;
          var stage = data.success.data.questions[0].current_stage;

          question_length = surveyQuestion.length;
          
          $('#allQuestions').html(question_length);

          if (stage == null) {
            $('#active-question').html('0');
            $('#startPage').show();
            console.log(stage);
          } else {
            // survey_data_type
            
          
            if (stage >= question_length) {
              $('#active-question').html(parseFloat(stage));
              $('.questions_form').hide();
              $('#startPage').hide();
              $('#endPage').show();
              console.log(stage);
              
            } else {
              $('.questions_form').show();
              $('#endPage').hide();
              
              $('#active-question').html(parseFloat(stage) + 1);
              var auto_stage = stage;
              var uniq_question = data.success.data.questions[auto_stage];
              var questions_id = uniq_question.questions_id;

              var question_type = uniq_question.survey_question_type;
              var data_type = uniq_question.survey_data_type;
              // console.log(auto_stage);
              if ((parseFloat(stage) + 1) == 1) {
                $('#prev_q').hide();
                
              } 

              $('.inputType').val(question_type);
              $('.questionId').val(questions_id);
              $('.dataType').val(data_type);
              $('#startPage').hide();
              $('.questions_form').show();
              App.formartSingleQuestion(data.success.data.questions, auto_stage);

            }
          }
        } else {
        }
      } else if (data.error) {
        if (data.error.msg == 'Expired token') {
          window.location.replace('/user');
        }
      }
    },
    error: function(jqXHR, textStatus, errorThrown) {}
  });
});

$('#survey-start').click(function() {
  id_array = {
    id: survey_id,
    question_length: question_length
  };
  console.log(id_array);
  $.ajax({
    url: '/survey/start_survey',
    type: 'POST',
    data: id_array,
    success: function(response) {
      var data = JSON.parse(response);
      console.log(data);
      //  enableBtn("<i class=\"fas fa-plus-circle\"></i> Post", "dynamicBtnSubmitForm");
      if (data.success) {
        if (data.success.data.status == true) {
          surveyQuestion = data.success.data.questions;

          var stage2 = 0;
          var uniq_question = surveyQuestion[stage2];
          var questions_id = uniq_question.questions_id;

          // console.log(data.success.data.questions);

          var question_type = uniq_question.survey_question_type;
          var data_type = uniq_question.survey_data_type;
          // alert(question_type);
          $('#active-question').html('1');

          $('.inputType').val(question_type);
          $('.questionId').val(questions_id);
          $('.dataType').val(data_type);

          $('#startPage').hide();
          $('#prev_q').hide();
          $('.questions_form').show();
          // console.log(data.success.data.questions);
          App.formartSingleQuestion(data.success.data.questions, stage2);
        } else {
        }
      } else if (data.error) {
        if (data.error.msg == 'Expired token') {
          window.location.replace('/user');
        }
      }
    },
    error: function(jqXHR, textStatus, errorThrown) {}
  });
});

$('#answer_q').click(function(event) {
  event.preventDefault();
  App.disableButton(
    '#answer_q',
    '<i class="fas fa-cog fa-spin"></i> Saving...'
  );

  // var values = $("#questions_form").serialize();
  var inputType = $('.inputType').val();
  var questionId = $('.questionId').val();
  var dataType = $('.dataType').val();
  // alert(inputType);
  if (inputType == 'radio') {
    if ($('#other').length > 0) {
      var other = $('#other').val();
    } else {
      var other = '';
    }

    if (!$('input[name="answer"]:checked').val() && other == '') {
      var errorMsg = 'Please provide an answer to the question';
      App.alert(errorMsg, '#msg-div', 'danger');
      App.enableButton(
        '#answer_q',
        'NEXT QUESTION <i class="fa fa-arrow-right"></i>'
      );
      function explode() {
        $('.alert-danger').fadeOut('slow');
      }
      setTimeout(explode, 2000);
    } else {
      var radio = $('input[name="answer"]:checked').val();

      // console.log(radio);
      if (other == '') {
        final_answer = radio;
      } else {
        final_answer = other;
      }
    }
  } else if (inputType == 'string') {
    if (dataType == 'free') {
      if ($('#texts').val() == '') {
        var errorMsg = 'Please provide an answer to the question';
        App.alert(errorMsg, '#msg-div', 'danger');
        App.enableButton(
          '#answer_q',
          'NEXT QUESTION <i class="fa fa-arrow-right"></i>'
        );
        function explode() {
          $('.alert-danger').fadeOut('slow');
        }
        setTimeout(explode, 2000);
      } else {
        var final_answer = $('#texts').val();
      }
    } else {
      if ($('#textarea').val() == '') {
        var errorMsg = 'Please provide an answer to the question';
        App.alert(errorMsg, '#msg-div', 'danger');
        App.enableButton(
          '#answer_q',
          'NEXT QUESTION <i class="fa fa-arrow-right"></i>'
        );
        function explode() {
          $('.alert-danger').fadeOut('slow');
        }
        setTimeout(explode, 2000);
      } else {
        var final_answer = $('#textarea').val();
      }
    }
  } else if (inputType == 'checkbox') {
    if ($('#other').length > 0) {
      var other = $('#other').val();
    } else {
      var other = '';
    }

    if (!$('input[type="checkbox"]:checked').val() && other == '') {
      var errorMsg = 'Please provide an answer to the question';
      App.alert(errorMsg, '#msg-div', 'danger');
      App.enableButton(
        '#answer_q',
        'NEXT QUESTION <i class="fa fa-arrow-right"></i>'
      );
      function explode() {
        $('.alert-danger').fadeOut('slow');
      }
      setTimeout(explode, 2000);
    } else {
      var radio = [];
      $("input[type='checkbox']:checked").each(function() {
        radio.push($(this).val());
      });
      // console.log(radio);

      if (other == '') {
        final_answer = radio;
      } else {
        final_answer = other;
      }
    }
  }

  // console.log(other);
  

  var answer = {
    answer: final_answer,
    questions_id: questionId,
    question_type: inputType,
    survey_id: survey_id
  };
  // alert(final_stage);
  console.log(answer);

  $.ajax({
    url: '/survey/answer_question',
    type: 'POST',
    data: answer,
    success: function(response) {
      console.log(response);

      App.enableButton(
        '#answer_q',
        'NEXT QUESTION <i class="fa fa-arrow-right"></i>'
      );

      var data = JSON.parse(response);
      // //  enableBtn("<i class=\"fas fa-plus-circle\"></i> Post", "dynamicBtnSubmitForm");

      if (data.success) {
        var question_length = surveyQuestion.length;
        var currentStage = data.success.data.question_stage.current_stage;

        console.log(currentStage);
        console.log(question_length);

        if (currentStage >= question_length) {
          $('#active-question').html(currentStage);
          $('#questions_form').fadeOut();
          $('#endPage').show();
        } else {
          var dd = parseFloat(currentStage)+1;
          console.log(dd);
          
          $('#active-question').html(dd);
          var next_q = currentStage;
          var uniq_question = surveyQuestion[next_q];
          var question_type = uniq_question.survey_question_type;
          var questions_id = uniq_question.questions_id;
          var data_type = uniq_question.survey_data_type;

          $('.inputType').val(question_type);
          $('.questionId').val(questions_id);
          $('.dataType').val(data_type);

          App.formartSingleQuestion(surveyQuestion, next_q);
          if (dd !== 1) {
            $('#prev_q').show();
            console.log('ok');
            
          } else {
            console.log('not ok');
          }
        }
      } else if (data.error) {
        // App.alert(data.error.msg, "#msg-div", "danger");
      }
    },
    error: function(jqXHR, textStatus, errorThrown) {
      // console.log(textStatus, errorThrown);
      // App.enableButton(
      //     "#submit_intro",
      //     ' Next: Questions  <i class="fa fa-arrow-right"></i>'
      // );
    }
  });
  return false;
});




$('#prev_q').click(function(event) {
  event.preventDefault();
  App.disableButton(
    '#prev_q',
    '<i class="fas fa-cog fa-spin"></i> Saving...'
  );

  id_array = {
    id: survey_id
  };
  // // alert(final_stage);
  console.log(id_array);

  $.ajax({
    url: '/survey/question_answer',
    type: 'POST',
    data: id_array,
    success: function(response) {
      // console.log(response);

      App.enableButton(
        '#prev_q',
        '<i class="fa fa-arrow-left"></i> PREV QUESTION'
      );

      var data = JSON.parse(response);
      // //  enableBtn("<i class=\"fas fa-plus-circle\"></i> Post", "dynamicBtnSubmitForm");
      var act_stage = $('#active-question').html();
        // console.log(act_stage);
        

      if (data.success) {
        // var question_length = surveyQuestion.length;
        var currege = data.success.data.prev_questions;
        var prev_stage = parseFloat(act_stage) - 1;
        var act_stage = $('#active-question').html(prev_stage);
        // console.log(prev_stage);
        
        var uniq_question = surveyQuestion[parseFloat(prev_stage)-1];
        var questionAns = currege[parseFloat(prev_stage)-1];

        var questions_id = uniq_question.questions_id;
        var question_type = uniq_question.survey_question_type;
        var data_type = uniq_question.survey_data_type;
        var survey_question_answers = questionAns.survey_question_answers;
        var answer_no_space = survey_question_answers.replace(" ", "_");
        console.log(survey_question_answers);
        var answer_no_quote = answer_no_space.replace(/\"/g, "");
        var label = "#label_";
        
        
        // alert(question_type);

        $('.inputType').val(question_type);
        $('.questionId').val(questions_id);
        $('.dataType').val(data_type);


        App.formartSinglePrevQuestion(currege, prev_stage);
        console.log(question_type);
        
        if (questionAns.survey_question_type == "radio") {
          if(questionAns.survey_question_options.includes("Participant answer")) {

            $('#other').val(survey_question_answers.replace(/\"/g, ""));
          } else {
              $(label+''+questionAns.questions_id + '_' + answer_no_quote).trigger("click");
          } 

        } else if (questionAns.survey_question_type == "checkbox") {
          
          if(questionAns.survey_question_options.includes("Participant answer")) {

            $('#other').val(survey_question_answers.replace(/\"/g, ""));
          } else {
            JSON.parse(answer_no_space).forEach(function(item) {
              var labelId = item.replace(" ", "_");
              $(label+''+questionAns.questions_id + '_' + labelId).trigger("click");
              console.log(labelId);
              
            });
          } 
       
          
        }

        // console.log(act_stage);
        if (prev_stage == '1') {
          $('#prev_q').hide();
          
        }

        // if (currentStage >= question_length) {
        //   $('#active-question').html(currentStage);
        //   $('#questions_form').fadeOut();
        //   $('#endPage').show();
        // } else {
        //   $('#active-question').html(currentStage);
        //   var next_q = currentStage - 1;
        //   var uniq_question = surveyQuestion[next_q];
        //   var question_type = uniq_question.survey_question_type;
        //   var questions_id = uniq_question.questions_id;
        //   var data_type = uniq_question.survey_data_type;

        //   $('.inputType').val(question_type);
        //   $('.questionId').val(questions_id);
        //   $('.dataType').val(data_type);

        //   App.formartSingleQuestion(surveyQuestion, next_q);
        // }
      } else if (data.error) {
        // App.alert(data.error.msg, "#msg-div", "danger");
      }
    },
    error: function(jqXHR, textStatus, errorThrown) {
      // console.log(textStatus, errorThrown);
      // App.enableButton(
      //     "#submit_intro",
      //     ' Next: Questions  <i class="fa fa-arrow-right"></i>'
      // );
    }
  });
  return false;
});


// $(document).ready(function() {
//   $(document).on('keyup', '#other', function() {
//     $('input[name="answer"]').prop('checked', false);
//   });
//   // $('input[name="answer"]').change(function() {
//   //     if ($(this).is(':checked') && $(this).val() == 'Yes') {
//   //         alert('ok');
//   //     }
//   // });
// });
