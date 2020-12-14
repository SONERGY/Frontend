$("#add-question-form").on('submit', (function (event) {
    event.preventDefault();

    App.disableButton(
        "#save_question",
        '<i class="fas fa-cog fa-spin"></i> Saving...'
    );
    var values = $("#add-question-form").serialize();
    var formData = new FormData(this)

    $.ajax({
        url: "/event/add_poster",
        type: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            console.log(response);

            App.enableButton(
                "#save_question",
                ' Upload  <i class="fa fa-arrow-right"></i>'
            );

            var data = JSON.parse(response);
            globalData = data;
            //  enableBtn("<i class=\"fas fa-plus-circle\"></i> Post", "dynamicBtnSubmitForm");
            if (data.success) {

                if (data.success.data.status == true) {
                    // App.formatQuestion(data.success.data.questions);

                    var poster = data.success.data.event.poster;
                    $(".event_title").html(data.success.data.event.event_title);
                    $(".event_link").html(data.success.data.event.event_link);
                    $(".datepicker1").html(data.success.data.event.start_date);
                    $(".datepicker2").html(data.success.data.event.end_date);
                    $(".introduction_text").html(data.success.data.event.event_description);
                    $(".cause_id").val(data.success.data.event.id);

                    // $("#empty-preview").remove();
                    // $("#view-preview").show();
                    // $("#makepayment").html("<h5>Complete the payment process to be able to publish.</h5> <div class=\"form-group\"> <input type=\"hidden\" id=\"email1\" value=\"\"> <input type=\"hidden\" id=\"amount\" value=\"4500\"> <input type=\"hidden\" id=\"paymenttype\" value=\"event\"> <input type=\"hidden\" name=\"event_id\" class=\"event_id cause_id\" id=\"event_id\" value=\"0\"> <button type=\"button\" id=\"payWithPaystack\" onclick=\"payWithPaystack()\" class=\"btn btn-success roundy shadow-sm\">Make payment <i class=\"fa fa-arrow-right\"></i></button> </div>");
                    // $("#publishDiv").html("<h5 class=\"mb-2\">You can now go on to publish your event.</h5> <div class=\"form-group\"> <input type=\"hidden\" name=\"event_id\" class=\"event_id cause_id\" id=\"event_id\" value=\"0\"> <button type=\"button\" id=\"publish-event\" class=\"btn btn-success roundy shadow-sm\">Publish event <i class=\"fa fa-arrow-right\"></i></button> </div>");
                    creation_stage = "2";

                    App.setStep(creation_stage);
                    // console.log(data.success.data.event.is_event_published);


                    var msrc = "/public/static/posters/" + poster;


                    $('.imageResult').attr('src', msrc);

                    App.setStep(data.success.data.event.event_creation_stage);

                    $("#event_title").val(data.success.data.event.event_title);

                    if (data.success.data.event.has_paid_for_event == 1) {
                        $("#makepayment").remove();
                        $("#makepublish").show();
                    } else {
                        $("#publishDiv").hide();
                        var html_varm = "<div class=\"text-center p-3 my-3\"><h5>You will have to complete the payment process to be able to publish this event</h5></div>";
                        $("#notPublish").html(html_varm);
                    }


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
}));

$("#publish-event").on('click', (function (event) {
    event.preventDefault();
    var event_id = $("#event_id").val();

    var array_id = {
        "idx": event_id
    }

    App.disableButton(
        "#publish-event",
        '<i class="fas fa-cog fa-spin"></i> Saving...'
    );

    $.ajax({
        url: "/event/publish",
        type: "POST",
        data: array_id,


        success: function (response) {

            var data = JSON.parse(response);
            globalData = data;
            if (data.success) {


                $(".event_id").val(data.success.id);

                var html_var = "<div><p>This event has been published successfully</p><a class=\"btn btn-primary btn-sm\" href=\"/event/new\">Add new event</a></div>";
                App.alertCustom("success", "Published", html_var, "#publish-dailog");
                $("#trigbtn").trigger("click");
                $(".survey_id").val(data.success.id);

                App.alert(data.success.msg, "#msg-div", "success");
                // alert('ok');
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



    $.ajax({
        url: "/event/introduction",
        type: "POST",

        data: values,
        success: function (response) {
            App.enableButton(
                "#submit_intro",
                ' Next: Questions  <i class="fa fa-arrow-right"></i>'
            );

            var data = JSON.parse(response);
            //  enableBtn("<i class=\"fas fa-plus-circle\"></i> Post", "dynamicBtnSubmitForm");
            globalData = data;

            if (data.success) {
                creation_stage = "1";
                $(".event_id").val(data.success.id);
                App.alert(data.success.msg, "#msg-div", "success");
                App.setStep(creation_stage);

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
        url: "/event/check",
        type: "POST",
        success: function (response) {
            console.log(response);
            var data = JSON.parse(response);
            globalData = data;
            //  enableBtn("<i class=\"fas fa-plus-circle\"></i> Post", "dynamicBtnSubmitForm");
            if (data.success) {
                if (data.success.data.status == true) {
                    // App.formatQuestion(data.success.data.questions);

                    var poster = data.success.data.event.poster;
                    $(".event_title").val(data.success.data.event.event_title);
                    $(".event_title").html(data.success.data.event.event_title);
                    $(".event_link").val(data.success.data.event.event_link);
                    $(".event_link").html(data.success.data.event.event_link);
                    $(".datepicker1").val(data.success.data.event.start_date);
                    $(".datepicker1").html(data.success.data.event.start_date);
                    $(".datepicker2").val(data.success.data.event.end_date);
                    $(".datepicker2").html(data.success.data.event.end_date);
                    $(".introduction_text").val(data.success.data.event.event_description);
                    $(".introduction_text").html(data.success.data.event.event_description);
                    $(".event_id").val(data.success.data.event.id);
                    $(".cause_id").val(data.success.data.event.id);

                    // console.log(data.success.data.event.is_event_published);


                    var msrc = "/public/static/posters/" + poster;

                    creation_stage = data.success.data.event.event_creation_stage;

                    $('.imageResult').attr('src', msrc);

                    App.setStep(data.success.data.event.event_creation_stage);

                    $("#event_title").val(data.success.data.event.event_title);

                    if (data.success.data.event.has_paid_for_event == 1) {
                        $("#makepayment").remove();
                        $("#makepublish").show();
                    } else {
                        $("#publishDiv").hide();
                        var html_varm = "<div class=\"text-center p-3 my-3\"><h5>You will have to complete the payment process to be able to publish this event</h5></div>";
                        $("#notPublish").append(html_varm);
                    }


                } else {
                    // $("#proceed-payment").remove();
                    // $("#makepayment").html("<div class=\"p-3 my-3\"><h5>Sorry you have not created an event. Go over to configuration to start up.</h5></div>");
                    // var html_var = "<div class=\"text-center p-3 my-3\"><h5 class=\"text-muted\">Nothing to preview</h5></div>";
                    // $("#empty-preview").html(html_var);
                    // $("#view-preview").hide();
                    // $("#publishDiv").html("<div class=\"p-3 my-3\"><h5>Sorry there is no event to publish. Go over to configuration to start up.</h5></div>");

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

$("#mainTabs a").click(function (e) {
    e.preventDefault();
    console.log(globalData);

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
        case "#nav-tab-preview":
            if (parseInt(creation_stage) > 1) {
                return true;
            } else {
                return false;
            }
            break;

        case "#nav-tab-payment":
            if (parseInt(creation_stage) >= 2) {
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