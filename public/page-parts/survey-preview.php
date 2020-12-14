<style>

.image-area {
    border: 2px dashed rgba(255, 255, 255, 0.7);
    padding: 1rem;
    position: relative;
}

.image-area::before {
    content: 'Uploaded image result';
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 0.8rem;
    z-index: 1;
}

.image-area img {
    z-index: 2;
    position: relative;
}

</style>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3 class="mt-4 text-uppercase text-center survey_title"> </h3>
            <div class="mt-2">
                <!-- Uploaded image area-->
                <!-- <h4 class="text-center">Survey Cover</h4> -->
                <div class="image-area"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block imageResult"></div>
                <input type="hidden" name="survey_id" class="survey_id" id="survey_id" value="0">
            </div>
            <form class="question_preview_form">
                
            </form>
            <div id="empty-preview">
                
            </div>
        </div>
    </div>
    <div class="form-group col-md-8 offset-md-2">
    <button type="button" id="btn-cover" class="navigate btn btn-warning  rounded-pill shadow-sm"> <i class="fa fa-arrow-left"></i> Previous </button>
    <button type="button" id="btn-payment" class="navigate btn btn-primary  rounded-pill shadow-sm"> <i class="fa fa-arrow-right"></i> Next </button>

    <button type="button"  id="proceed-payment" onclick="trigaPay(this.id);" class="btn btn-success rounded-pill shadow-sm"> Proceed to payment <i class="fa fa-arrow-right"></i></button>
    </div>
<script>
function trigaPay(id) {
    App.setStep("3");
}
</script>
