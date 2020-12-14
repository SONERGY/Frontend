var creation_stage = '';
var globalData = null;
App = {
  disableButton: function(button_id, button_text) {
    $(button_id).attr('disabled', true);
    $(button_id).html(button_text);
  },
  enableButton: function(button_id, button_text) {
    $(button_id).removeAttr('disabled');
    $(button_id).html(button_text);
  },
  alert: function(text, display_in_id, type) {
    var alert =
      '<div class="alert alert-' +
      type +
      ' alert-dismissible fade show" role="alert">' +
      text +
      '<button type="button" class="close mt-2" style="height: unset !important;" data-dismiss="alert" aria-label="Close">' +
      '<span aria-hidden="true">&times;</span>' +
      '</button>' +
      '</div>';

    $(display_in_id).html(alert);
  },
  alertCustom: function(type, header, msg, display_in_id) {
    let fa;
    switch (type) {
      case 'success':
        fa = 'check-circle';
        break;

      default:
        break;
    }
    var alert =
      '<div class="text-center custom-alert ' +
      type +
      '">' +
      '<h2><i class="fas fa-' +
      fa +
      ' fa-3x"></i><br>' +
      header +
      '</h2>' +
      '<p>' +
      msg +
      '</p>' +
      '</div>';
    $(display_in_id).html(alert);
  },
  formartSingleQuestion: function(questions, current) {
    var data = '';
    console.log(questions);
    

    var question = questions[current];
    var index = 0;
    data +=
      '<h3 class="mt-4 text-uppercase q-text"> ' +
      question.survey_question_title +
      ' </h3><hr/>';
    switch (question.survey_question_type) {
      case 'radio':
        JSON.parse(question.survey_question_options).forEach(function(item) {
          console.log(item);
          index++;
          if (item == 'Participant answer') {
            data +=
              '<div class="form-group">' +
              '<label for=""><b>Other? <small>Please specify</small></b></label>' +
              '<input type="text" class="form-control" name="other" id="other" placeholder="">' +
              '</div>';
          } else {
            data +=
              '<div class=" custom-control custom-radio">' +
              '<input class="custom-control-input check-box" type="radio" name="answer" id="radios_' +
              question.questions_id +
              '_' +
              index +
              '" value="' +
              item +
              '">' +
              '<label class="custom-control-label" for="radios_' +
              question.questions_id +
              '_' +
              index +
              '">' +
              item +
              '</label>' +
              '</div>';
          }
        });

        break;

      case 'checkbox':
        JSON.parse(question.survey_question_options).forEach(function(item) {
          console.log(item);
          index++;
          if (item == 'Participant answer') {
            data +=
              '<div class="form-group">' +
              '<label for=""><b>Other? <small>Please specify</small></b></label>' +
              '<input type="text" class="form-control" name="other" id="other" placeholder="">' +
              '</div>';
          } else {
            data +=
              '<div class=" custom-control custom-checkbox">' +
              '<input class="custom-control-input" type="checkbox" name="options[]" id="radios_' +
              question.questions_id +
              '_' +
              index +
              '" value="' +
              item +
              '">' +
              '<label class="custom-control-label" for="radios_' +
              question.questions_id +
              '_' +
              index +
              '">' +
              item +
              '</label>' +
              '</div>';
          }
        });
        break;

      case 'string':
        if (question.survey_data_type == 'comment') {
          data +=
            ' <div class="form-group">' +
            '<textarea class="form-control" name="textarea" id="textarea" rows="3"></textarea>' +
            '</div>';
        } else {
          data +=
            '<div class="form-group">' +
            '<input type="text" class="form-control" name="texts" id="texts" placeholder="">' +
            '</div>';
        }
        break;

      default:
        break;
    }
    console.log(data);
    $('.question_preview_form').html(data);
    return data;
  },
  formartSinglePrevQuestion: function(questions, current) {
    var data = '';

    console.log(current);
    console.log(parseFloat(current)-1);
    var question = questions[parseFloat(current)-1];
    console.log(question);
    
    var index = 0;
    data +=
      '<h3 class="mt-4 text-uppercase q-text"> ' +
      question.survey_question_title +
      ' </h3><hr/>';
    switch (question.survey_question_type) {
      case 'radio':
        JSON.parse(question.survey_question_options).forEach(function(item) {
          console.log(item);
          index++;
          // console.log("#label_"+question.questions_id + '_' + index+"");
          
          if (item == 'Participant answer') {
            data +=
              '<div class="form-group">' +
              '<label for=""><b>Other? <small>Please specify</small></b></label>' +
              '<input type="text" class="form-control" name="other" id="other" placeholder="">' +
              '</div>';
          } else {
            var id_item = item.replace(" ", "_");
            data +=
              '<div class=" custom-control custom-radio">' +
              '<input class="custom-control-input check-box" type="radio" name="answer" id="radios_' +
              question.questions_id +
              '_' +
              index +
              '" value="' +
              item +
              '">' +
              '<label class="custom-control-label" id="label_' +
              question.questions_id +
              '_' +
              id_item +
              '" for="radios_' +
              question.questions_id +
              '_' +
              index +
              '">' +
              item +
              '</label>' +
              '</div>';

              
          }
        });

        break;

      case 'checkbox':
        JSON.parse(question.survey_question_options).forEach(function(item) {
          console.log(item);
          index++;
          if (item == 'Participant answer') {
            data +=
              '<div class="form-group">' +
              '<label for=""><b>Other? <small>Please specify</small></b></label>' +
              '<input type="text" class="form-control" name="other" id="other" placeholder="">' +
              '</div>';
          } else {
            var id_item = item.replace(" ", "_");
            data +=
              '<div class=" custom-control custom-checkbox">' +
              '<input class="custom-control-input" type="checkbox" name="options[]" id="radios_' +
              question.questions_id +
              '_' +
              index +
              '" value="' +
              item +
              '">' +
              '<label class="custom-control-label" id="label_' +
              question.questions_id +
              '_' +
              id_item +
              '" for="radios_' +
              question.questions_id +
              '_' +
              index +
              '">' +
              item +
              '</label>' +
              '</div>';
          }
        });
        break;

      case 'string':
        if (question.survey_data_type == 'comment') {
          data +=
            ' <div class="form-group">' +
            '<textarea class="form-control" name="textarea" id="textarea" value='+question.survey_question_answers+' rows="3"></textarea>' +
            '</div>';
        } else {
          data +=
            '<div class="form-group">' +
            '<input type="text" class="form-control" name="texts" id="texts" value='+question.survey_question_answers+' placeholder="">' +
            '</div>';
        }
        break;

      default:
        break;
    }
    console.log(data);
    $('.question_preview_form').html(data);
    return data;
  },
  formatQuestion: function(questions) {
    var data = '';
    for (var i = 0; i < questions.length; i++) {
      var question = questions[i];
      var index = 0;
      data +=
        '<h3 class="mt-4 text-uppercase q-text"> ' +
        question.survey_question_title +
        ' </h3><hr/>';
      switch (question.survey_question_type) {
        case 'radio':
          JSON.parse(question.survey_question_options).forEach(function(item) {
            console.log(item);
            index++;
            if (item == 'Participant answer') {
              data +=
                '<div class="form-group">' +
                '<label for=""><b>Other? <small>Please specify</small></b></label>' +
                '<input type="text" class="form-control" name="Radios_' +
                question.questions_id +
                '" id="" placeholder="">' +
                '</div>';
            } else {
              data +=
                '<div class=" custom-control custom-radio">' +
                '<input class="custom-control-input" type="radio" name="Radios_' +
                question.questions_id +
                '" id="radios_' +
                question.questions_id +
                '_' +
                index +
                '" value="' +
                item +
                '">' +
                '<label class="custom-control-label" for="radios_' +
                question.questions_id +
                '_' +
                index +
                '">' +
                item +
                '</label>' +
                '</div>';
            }
          });

          break;

        case 'checkbox':
          JSON.parse(question.survey_question_options).forEach(function(item) {
            console.log(item);
            index++;
            if (item == 'Participant answer') {
              data +=
                '<div class="form-group">' +
                '<label for=""><b>Other? <small>Please specify</small></b></label>' +
                '<input type="text" class="form-control" name="Radios_' +
                question.questions_id +
                '" id="" placeholder="">' +
                '</div>';
            } else {
              data +=
                '<div class=" custom-control custom-checkbox">' +
                '<input class="custom-control-input" type="checkbox" name="options[]" id="radios_' +
                question.questions_id +
                '_' +
                index +
                '" value="' +
                item +
                '">' +
                '<label class="custom-control-label" for="radios_' +
                question.questions_id +
                '_' +
                index +
                '">' +
                item +
                '</label>' +
                '</div>';
            }
          });
          break;

        case 'string':
          if (question.survey_data_type == 'comment') {
            data +=
              ' <div class="form-group">' +
              '<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>' +
              '</div>';
          } else {
            data +=
              '<div class="form-group">' +
              '<input type="text" class="form-control" name="" id="" placeholder="">' +
              '</div>';
          }
          break;

        default:
          break;
      }
      console.log(question.survey_question_title);
    }

    console.log(data);
    $('.question_preview_form').html(data);
    return data;
  },
  getCountryName: function(code) {
    switch (code) {
      case 'ar':
        return 'Arabic (&rlm;العربية&rlm;)';
        break;
      case 'hy':
        return 'Armenian (հայերեն)';
        break;
      case 'bg':
        return 'Bulgarian (Български)';
        break;
      case 'my':
        return 'Burmese (မြန်မာစာာ)';
        break;
      case 'zh-HK':
        return 'Chinese Hong Kong (中文 - 香港 )';
        break;
      case 'hr':
        return 'Croatian (Hrvatski)';
        break;
      case 'cs':
        return 'Czech (Čeština)';
        break;
      case 'da':
        return 'Danish (Dansk)';
        break;
      case 'de':
        return 'Deutsch';
        break;
      case 'nl':
        return 'Dutch (Nederlands)';
        break;
      case 'et':
        return 'Estonian (Eesti keel)';
        break;
      case 'en':
        return 'English';
        break;
      case 'es':
        return 'Español';
        break;

      case 'fi':
        return 'Finnish (Suomi)';
        break;
      case 'fr':
        return 'Français';
        break;
      case 'ka':
        return 'Georgian (ქართული)';
        break;
      case 'el':
        return 'Greek (Ελληνικά)';
        break;
      case 'he':
        return 'Hebrew (עברית&rlm;)';
        break;
      case 'hi':
        return 'Hindi (हिन्दी)';
        break;
      case 'hu':
        return 'Hungarian (Magyar)';
        break;
      case 'it':
        return 'Italian (Italiano)';
        break;
      case 'id':
        return 'Indonesian (Bahasa Indonesia)';
        break;
      case 'ja':
        return 'Japanese(日本語)';
        break;
      case 'lv':
        return 'Latvian (Latviešu valoda)';
        break;
      case 'lt':
        return 'Lithuanian (Lietuvių)';
        break;
      case 'ms':
        return 'Malay';
        break;
      case 'mt':
        return 'Maltese';
        break;
      case 'nb':
        return 'Norwegian (Norsk bokmål)';
        break;
      case 'pl':
        return 'Polish(Polski)';
        break;
      case 'pt':
        return 'Português';
        break;
      case 'ro':
        return 'Romanian (Română)';
        break;

      case 'ru':
        return 'Russian (Русский)';
        break;
      case 'sk':
        return 'Slovak (Slovenčina)';
        break;
      case 'sl':
        return 'Slovenian (Slovenščina)';
        break;

      case 'sv':
        return 'Swedish (Svenska)';
        break;
      case 'tr':
        return 'Turkish (Türkçe)';
        break;
      case 'uk':
        return 'Ukrainian (Українська)';
        break;

      case 'th':
        return 'Thai (ภาษาไทย)';
        break;

      default:
        return 'English';
        break;
    }
  },
  setStepSurvey: function(int) {
    switch (int) {
      case '1':
        $('#btn-question').trigger('click');
        break;

      case '2':
        console.log("we got here");
        $('#btn-cover').trigger('click');
        break;
      case '3':
        $('#btn-preview').trigger('click');
        break;
      case '4':
        $('#btn-payment').trigger('click');
        break;

      case '5':
        $('#btn-publish').trigger('click');
        break;

      default:
        $('#nav-home-tab').trigger('click');
    }
  },
  setStep: function(int) {
    switch (int) {
      //  case "1":
      //    $("#btn-tabcard").trigger("click");
      //      break;

      case '1':
        $('#btn-question').trigger('click');
        break;

      case '2':
        $('#btn-preview').trigger('click');
        break;

      case '3':
        $('#btn-payment').trigger('click');
        break;

      case '4':
        $('#btn-publish').trigger('click');
        break;

      default:
        $('#nav-home-tab').trigger('click');
    }
  }
};
