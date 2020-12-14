<form role="form" id="introduction">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="survey_title">Event title</label>
                <input type="text" id="event_title" name="event_title" placeholder="Enter event title" required class="form-control event_title">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Start Date:</label>
                        <input class="form-control datepicker1" type="text" id="datepicker1" value="2020-03-11" name="strt_date">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>End Date:</label>
                        <input class="form-control datepicker2" type="text" id="datepicker2" value="2020-03-11" name="end_date">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="survey_language">Event link</label>
                <input type="text" id="event_link" name="event_link" placeholder="Link to your event..." required class="form-control event_link">
            </div>
        </div>
    </div>

    <div class="form-group">
        <input type="hidden" name="event_id" class="event_id" id="event_id" value="0">
        <label for="introduction">Event Description </label>
        <textarea name="description_text" id="introduction_text" class="form-control introduction_text" cols="3" rows="3"></textarea>

    </div>

    <button type="submit" id="submit_intro" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> Next: Questions <i class="fa fa-arrow-right"></i></button>
</form>