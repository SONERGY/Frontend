$("#add_more").click(function () {
    $("#add_more_btn").hide();

    $("#add-question-form").show();

});

$("#q_next").click(function () {
    App.setStepSurvey("2")
});

$("#save_poster_next").click(function () {
    App.setStepSurvey("3")
});
$("#add-question-form").submit(function (event) {
    event.preventDefault();

    App.disableButton(
        "#save_question",
        '<i class="fas fa-cog fa-spin"></i> Saving...'
    );
    var values = $("#add-question-form").serialize();

    $.ajax({
        url: "/survey/add_question",
        type: "POST",
        data: values,
        success: function (response) {


            App.enableButton(
                "#save_question",
                ' Next: Questions  <i class="fa fa-arrow-right"></i>'
            );

            var data = JSON.parse(response);
            //  enableBtn("<i class=\"fas fa-plus-circle\"></i> Post", "dynamicBtnSubmitForm");
            localStorage.setItem("duration",  parseInt(data.success.data.survey.duration));
            localStorage.setItem("amount", parseFloat(data.success.data.survey.amount));
            localStorage.setItem("tax", parseFloat(data.success.data.survey.tax));
            localStorage.setItem("id", parseFloat(data.success.data.survey.id));

            if (data.success) {

                if (typeof (data.success.data.questions) != "undefined" && typeof data.success.data.questions != 'undefined' && data.success.data.questions[0].survey_question_title !== null) {
                    App.formatQuestion(data.success.data.questions);
                    $("#add_more_btn").show();

                    $("#add-question-form").hide();
                    creation_stage = "2";
                }
                $(".event_id").val(data.success.id);
                App.alert(data.success.msg, "#msg-div", "success");
                // alert('ok');
            } else if (data.error) {
                App.alert(data.error.msg, "#msg-div", "danger");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // console.log(textStatus, errorThrown);
            App.enableButton(
                "#submit_intro",
                ' Next: Questions  <i class="fa fa-arrow-right"></i>'
            );
        }
    });
    return false;
});

$("#add-poster").on('submit', (function (event) {
    event.preventDefault();

    App.disableButton(
        "#save_poster",
        '<i class="fas fa-cog fa-spin"></i> Saving...'
    );
    var values = $("#add-poster").serialize();
    var formData = new FormData(this)

    $.ajax({
        url: "/survey/add_poster",
        type: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            console.log(response);

            App.enableButton(
                "#save_poster",
                ' Upload  <i class="fa fa-arrow-right"></i>'
            );

            var data = JSON.parse(response);
            localStorage.setItem("duration",  parseInt(data.success.data.survey.duration));
            localStorage.setItem("amount", parseFloat(data.success.data.survey.amount));
            localStorage.setItem("tax", parseFloat(data.success.data.survey.tax));
            localStorage.setItem("id", parseFloat(data.success.data.survey.id));
            //  enableBtn("<i class=\"fas fa-plus-circle\"></i> Post", "dynamicBtnSubmitForm");
            if (data.success) {

                if (data.success.data.status == true) {
                    // App.formatQuestion(data.success.data.questions);
                    $(".cause_id").val(data.success.data.id);
                    creation_stage = "3";
                    App.setStepSurvey("2");


                    $("#makepayment").html("<h5>Complete the payment process to be able to publish.</h5> <div class=\"form-group\"> <input type=\"hidden\" id=\"email1\" value=\"\"> <input type=\"hidden\" id=\"amount\" value=\"6000\"> <input type=\"hidden\" id=\"paymenttype\" value=\"survey\"> <input type=\"hidden\" name=\"event_id\" class=\"event_id cause_id\" id=\"event_id\" value=\"" + data.success.data.id + "\"> <button type=\"button\" id=\"payWithPaystack\" onclick=\"payWithPaystack()\" class=\"btn btn-success roundy shadow-sm\">Make payment <i class=\"fa fa-arrow-right\"></i></button> </div>");
                    // $("#publishDiv").html("<h5 class=\"mb-2\">You can now go on to publish your survey.</h5> <div class=\"form-group\"> <input type=\"hidden\" name=\"event_id\" class=\"event_id cause_id\" id=\"event_id\" value=\"" + data.success.data.id + "\"> <button type=\"button\" id=\"publish-event\" class=\"btn btn-success roundy shadow-sm\">Publish survey <i class=\"fa fa-arrow-right\"></i></button> </div>");

                    var poster = data.success.data.survey.poster;
                    var msrc = "/public/static/posters/" + poster;


                    $('.imageResult').attr('src', msrc);

                    App.setStepSurvey(data.success.data.survey.survey_creation_stage);

                }

                $(".event_id").val(data.success.id);


                App.alert(data.success.msg, "#msg-div", "success");
                // alert('ok');
            } else if (data.error) {
                App.alert(data.error.msg, "#msg-div", "danger");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            App.enableButton(
                "#submit_intro",
                ' Next: Questions  <i class="fa fa-arrow-right"></i>'
            );
        }
    });
    return false;
}));

$("#publish-survey").on('click', (function (event) {
    event.preventDefault();

    var survey_id = $("#survey_id").val();

    var array_id = {
        "idx": survey_id
    }

    App.disableButton(
        "#publish-survey",
        '<i class="fas fa-cog fa-spin"></i> Saving...'
    );

    $.ajax({
        url: "/survey/publish",
        type: "POST",
        data: array_id,


        success: function (response) {
            var data = JSON.parse(response);

            if (data.success) {
                // alert('ok;');
                var html_var = "<div><p>This survey has been published successfully</p><a class=\"btn btn-primary btn-sm\" href=\"/survey/new\">Add new survey</a></div>";
                App.alertCustom("success", "Published", html_var, "#publish-dailog");
                $("#trigbtn").trigger("click");
                $(".survey_id").val(data.success.id);
                $(".cause_id").val(data.success.data.id);

                App.alert(data.success.msg, "#msg-div", "success");
            } else if (data.error) {
                App.alert(data.error.msg, "#msg-div", "danger");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {

        }
    });
    return false;
}));

$("#introduction").submit(function (event) {
    event.preventDefault();

    App.disableButton(
        "#submit_intro",
        '<i class="fas fa-cog fa-spin"></i> Proccessing...'
    );
    var values = $("#introduction").serialize();
console.log(values);
    $.ajax({
        url: "/survey/introduction",
        type: "POST",

        data: values,
        success: function (response) {
            App.enableButton(
                "#submit_intro",
                ' Next: Questions  <i class="fa fa-arrow-right"></i>'
            );
            console.log(response, "the Response");
            var data = JSON.parse(response);
            //  enableBtn("<i class=\"fas fa-plus-circle\"></i> Post", "dynamicBtnSubmitForm");

            
            if (data.success) {
               
                // console.log(data.success.data.survey);
                
                
                $(".event_id").val(data.success.id);
                if (typeof data.success.data.questions != 'undefined') {
                  
                    App.formatQuestion(data.success.data.questions);
                }
                console.log(data.success.data.id, "the success ID");
                // console.log(data.success.data.survey.survey_creation_stage, "survey_creation_stage");
                $(".survey_id").val(data.success.data.id);

                App.alert(data.success.msg, "#msg-div", "success");
                // alert('ok');
                // console.log(, "checking for current stage");
                if(typeof data.success.data.survey != 'undefined'){
                    // localStorage.setItem("duration",  parseInt(data.success.data.survey.duration));
                // localStorage.setItem("amount", parseFloat(data.success.data.survey.amount));
                // localStorage.setItem("tax", parseFloat(data.success.data.survey.tax));
                // localStorage.setItem("id", parseFloat(data.success.data.survey.id));
                    creation_stage = data.success.data.survey.survey_creation_stage;
                    App.setStepSurvey(data.success.data.survey.survey_creation_stage);
                }else{
                    creation_stage = "1";
                    App.setStepSurvey('1');
                    console.log('ok 2');
                    
                }
               
            } else if (data.error) {
               
                App.alert(data.error.msg, "#msg-div", "danger");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // console.log(textStatus, errorThrown);
           
            App.enableButton(
                "#submit_intro",
                ' Next: Questions  <i class="fa fa-arrow-right"></i>'
            );
        }
    });
    return false;
});

function isIncompleteSurvey() {
    $.ajax({
        url: "/survey/check",
        type: "POST",
        success: function (response) {
            var data = JSON.parse(response);
            console.log(response);
            //  enableBtn("<i class=\"fas fa-plus-circle\"></i> Post", "dynamicBtnSubmitForm");
            
            if (data.success) {
               

                if (data.success.data.status == true) {
                    localStorage.setItem("duration",  parseInt(data.success.data.survey.duration));
                    localStorage.setItem("amount", parseFloat(data.success.data.survey.amount));
                    localStorage.setItem("tax", parseFloat(data.success.data.survey.tax));
                    localStorage.setItem("id", parseFloat(data.success.data.survey.id));
                    // console.log(data.success.data.survey.survey_title);

                    $(".survey_title").append(data.success.data.survey.survey_title);
                    console.log(data.success.data.survey.duration, "The Duration");
                    //$("#radio3030")
                    let text = data.success.data.survey.start_date.replace('-', '/'); 
                    let text2 = text.replace('-', '/'); 
                    $("#label"+data.success.data.survey.duration+"").trigger("click");
                    $("#input-calc-start_date").val(text2);
                    if (typeof data.success.data.questions != 'undefined' && data.success.data.questions[0].survey_question_title !== null) {
                        $("#add_more_btn").show();
                        $("#suv_title").html(data.success.data.survey.survey_title);
                        $("#add-question-form").hide();
                        console.log(data.success.data.questions);

                        App.formatQuestion(data.success.data.questions);
                    }

                    $("#survey_title").val(data.success.data.survey.survey_title);
                    $("#introduction_text").val(
                        data.success.data.survey.survey_introduction
                    );
                    $(".survey_id").val(data.success.data.survey.id);
                    $(".cause_id").val(data.success.data.survey.id);
                    //$("#survey_title").val(data.success.data.survey.survey_title);
                    var lang = data.success.data.survey.survey_language;
                    var lang_text = App.getCountryName(lang);

                    var poster = data.success.data.survey.poster;
                    var msrc = "/public/static/posters/" + poster;


                    $('.imageResult').attr('src', msrc);

                    $("#survey_language").append(
                        '<option selected="selected" value=\'' +
                        lang +
                        "'>" +
                        lang_text +
                        "</option>"
                    );
                    creation_stage = data.success.data.survey.survey_creation_stage;


                    App.setStepSurvey(data.success.data.survey.survey_creation_stage);

                    if (data.success.data.survey.has_paid_for_survey == 1) {
                        $("#makepayment").remove();
                        $("#makepublish").show();
                    } else {
                        $("#publishDiv").hide();
                        var html_varm = "<div class=\"text-center p-3 my-3\"><h5>You will have to complete the payment process to be able to publish this survey</h5></div>";
                        $("#notPublish").append(html_varm);
                    }

                } else {
                    //     $("#proceed-payment").remove();
                    //     $("#makepayment").html("<div class=\"p-3 my-3\"><h5>Sorry you have not created a survey. Go over to configuration to start up.</h5></div>");
                    //     var html_var = "<div class=\"text-center p-3 my-3\"><h5 class=\"text-muted\">Nothing to preview</h5></div>";
                    //     $("#empty-preview").html(html_var);
                    //     $("#publishDiv").html("<div class=\"p-3 my-3\"><h5>Sorry there is no survey to publish. Go over to configuration to start up.</h5></div>");
                }
                $("#loaderDiv").remove();
                $("#form-wrapper").slideDown("slow");
                // alert('ok');
            } else if (data.error) {
                if (data.error.msg == "Expired token") {
                    window.location.replace("/user");
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) { }
    });
}

$(document).ready(function () {
    isIncompleteSurvey();
});
let check_or_radio =
    '<label for="options"><b>Options</b> </label>' +
    '<div id="form-group-input-wrapper">' +
    '<div class="input-group mb-3" id="textbox-1">' +
    '<input type="text" class="form-control" name="options[]">' +
    '<div class="input-group-append">' +
    '<button class="btn btn-outline-danger" id="-1" onclick="remove_text_box(this.id)" type="button"><i class="fas fa-times"></i></button>' +
    "</div>" +
    "</div>" +
    '<div class="input-group mb-3" id="textbox-2">' +
    '<input type="text" class="form-control" name="options[]">' +
    '<div class="input-group-append">' +
    '<button class="btn btn-outline-danger" id="-2" onclick="remove_text_box(this.id)" type="button"><i class="fas fa-times"></i></button>' +
    "</div>" +
    "</div>" +
    "</div>" +
    ' <div id="form-group-input-other-wrapper"></div>' +
    '<div class="add-links">' +
    '<button id="add-option-link" type="button" onclick="dynamic_field(this.id)" class="btn btn-success btn-sm" ">Add Option</button>' +
    '<div class="add-other" style="display: inline;">' +
    '<span class="or">or</span>' +
    '<button type="button" id="add-other-link" onclick="dynamic_field(this.id)" class="btn btn-warning btn-sm">Add "Other"</button>' +
    "</div>" +
    "</div>";
let string =
    '<label class=""><b>Data type</b></label>' +
    '<select tabindex="-1" name="data_type" class="form-control"><option value="free">Free text on a single line</option>' +
    '<option value = "comment" > Free text on multiple lines </option>' +
    '<option value = "email" > Email address </option>' +
    '<option value = "first_name" > First name </option>' +
    '<option value = "last_name" > Last name </option>' +
    '<option value = "numeric" > Number </option>' +
    '<option value = "date" > Date </option>' +
    "</select>";

$(document).ready(function () {
    $("#question_type").selectpicker();

    $("#question_type").change(function () {
        // Check input( $( this ).val() ) for validity here
        let selected = $(this).val();
        switch (selected) {
            case "checkbox":
            case "radio":
                $("#form-group-options-wrapper").html(check_or_radio);
                break;
            case "string":
                $("#form-group-options-wrapper").html(string);
            default:
                break;
        }
    });
});
var inputCount = 2;

function dynamic_field(id) {
    inputCount++;
    var dynamic_field_add =
        '<div class="input-group mb-3" id="textbox-' +
        inputCount +
        '">' +
        '<input type="text" class="form-control" name="options[]">' +
        '<div class="input-group-append">' +
        '<button class="btn btn-outline-danger" id="-' +
        inputCount +
        '" onclick="remove_text_box(this.id)" type="button"><i class="fas fa-times"></i></button>' +
        "</div>" +
        "</div>";
    var dynamic_field_add_other =
        '<div class="input-group mb-3" id="textbox-' +
        inputCount +
        '">' +
        '<input type="text" readonly  name="options[]" class="form-control" value="Participant answer">' +
        '<div class="input-group-append">' +
        '<button class="btn btn-outline-danger" id="-' +
        inputCount +
        '" onclick="remove_text_box(this.id)" type="button"><i class="fas fa-times"></i></button>' +
        "</div>" +
        "</div>";
    switch (id) {
        case "add-option-link":
            $("#form-group-input-wrapper").append(dynamic_field_add);
            break;
        case "add-other-link":
            $("#form-group-input-other-wrapper").html(dynamic_field_add_other);

        default:
            break;
    }
}

function remove_text_box(id) {
    $("#textbox" + id).remove();
}


$("#mainTabs a").click(function (e) {
    e.preventDefault();
    //console.log(globalData);

    switch (e.currentTarget.hash) {
        case "#nav-tab-card":
            return true;
            break;
        case "#nav-tab-question":
            if (parseInt(creation_stage) >= 1) {
                return true;
            } else {
                return false;
            }
            break;

        case "#nav-tab-cover":

            if (parseInt(creation_stage) > 1) {
                return true;
            } else {
                return false;
            }
            break;
        case "#nav-tab-preview":
            if (parseInt(creation_stage) > 2) {
                return true;
            } else {
                return false;
            }
            break;

        case "#nav-tab-payment":
            if (parseInt(creation_stage) >= 3) {
                return true;
            } else {
                return false;
            }
            break;

        case "#nav-tab-publish":
            if (parseInt(creation_stage) >= 10) {
                return true;
            } else {
                return false;
            }
            break;
        default:
            return false;
            break;
    }

});