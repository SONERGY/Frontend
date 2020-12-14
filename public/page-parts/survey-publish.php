<div class="row">
    <div class="col-md-8 offset-md-2">

        <div id="notPublish">

        </div>
        <div id="publishDiv" class="text-center">
            <h5 class="mb-2">You can now go on to publish your survey.</h5>
            <div class="form-group">
                <input type="hidden" name="survey_id" class="survey_id cause_id" id="survey_id" value="0">
                <button type="button" id="publish-survey" class="btn btn-success roundy shadow-sm">Publish survey <i class="fa fa-arrow-right"></i></button>
            </div>
        </div>

    </div>
</div>
<script>
    function trigaPublish(id) {
        App.setStep("4");
    }
</script>