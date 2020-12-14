<h3 class="mt-4 text-uppercase text-center survey_title"> </h3>
<form class="question_preview_form mb-4" style="border-bottom: 2px solid #eee">

</form>
<form role="form" id="add-question-form">
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-primary rounded shadow-sm">
        <div class="lh-100">
            <h6 class="mb-0 text-white lh-100">Add Questions</h6>
            <small id="suv_title"></small>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="form-group">
                <label for="question_title"><b>Question</b></label>
                <input type="text" id="question_title" name="question_title" placeholder="Ask something..." required class="form-control">
                <input type="hidden" name="survey_id" class="survey_id" id="survey_id" value="0">
            </div>

            <div class="form-group">
                <label for="question_type"><b>Question Type</b></label>
                <!-- <select title="Select your spell" class="selectpicker">
                                                    <option>Select...</option>
                                                    <option data-icon="glyphicon glyphicon-eye-open" data-subtext="petrification">Eye of Medusa</option>
                                                    <option data-icon="glyphicon glyphicon-fire" data-subtext="area damage">Rain of Fire</option>
                                                    </select> -->
                <select name="question_type" id="question_type" data-show-content="true" class="form-control ">

                    <option data-icon="fa fa-align-left" value="string" data-subtext="Participants type in text in a text box">Text box</option>
                    <option data-icon="fas fa-check-circle" value="radio" selected="selected" data-subtext="Participants select one option from a list of choices">Multiple choice</option>
                    <option data-icon="fas fa-check-square" value="checkbox" data-subtext="Participants select multiple options from a list of choices">Checkboxes</option>
                    <!-- <option value="dropdown" data-help-text="Participants select one option from a dropdown list">Drop-down list</option>
                                            <option value="scale" data-help-text="Participants select a number on a scale of 1 to 5">Scale of 1 to 5</option>
                                            <option value="ranking" data-help-text="Participants rank options in order of preference">Ranking</option>
                                            <option value="upload" data-help-text="Participants upload and submit their own image or PDF">Image or PDF upload</option>
                                            <option value="like" data-help-text="Participants have the option to like your Facebook Page">Like button for your Page</option> -->
                </select>
            </div>
            <div class="form-group" id="form-group-options-wrapper">

                <label for="options"><b>Options</b> </label>
                <div id="form-group-input-wrapper">
                    <div class="input-group mb-3" id="textbox-1">

                        <input type="text" class="form-control" name="options[]">
                        <div class="input-group-append">
                            <button class="btn btn-outline-danger" id="-1" onclick="remove_text_box(this.id)" type="button"><i class="fas fa-times"></i></button>
                        </div>




                    </div>
                    <div class="input-group mb-3" id="textbox-2">

                        <input type="text" class="form-control" name="options[]">
                        <div class="input-group-append">
                            <button class="btn btn-outline-danger" id="-2" onclick="remove_text_box(this.id)" type="button"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div id="form-group-input-other-wrapper"></div>
                <div class="add-links">
                    <button id="add-option-link" type="button" class="btn btn-success btn-sm" onclick="dynamic_field(this.id)">Add Option</button>
                    <div class="add-other" style="display: inline;">
                        <span class="or">or</span>
                        <button type="button" id="add-other-link" onclick="dynamic_field(this.id)" class="btn btn-warning btn-sm">Add "Other"</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" id="save_question" class="btn btn-success btn-block rounded-pill shadow-sm"> Save <i class="fa fa-arrow-right"></i></button>
    </div>
</form>

<div class="form-group" style="display: none" id="add_more_btn">
<button type="button" id="btn-tabcard" class="navigate btn btn-warning  rounded-pill shadow-sm"> <i class="fa fa-arrow-left"></i> Previous </button>
    <button type="button" id="btn-cover" class="navigate btn btn-primary  rounded-pill shadow-sm"> <i class="fa fa-arrow-right"></i> Next </button>

    <button id="add_more" class="btn btn-info shadow-sm"> Add more <i class="fa fa-arrow-right"></i></button>
    
</div>