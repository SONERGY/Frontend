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
            <div id="empty-preview">
                
            </div>
            <div id="view-preview">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Uploaded image area-->
                        <h4 class="text-center">Event Poster</h4>
                        <div class="image-area"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block imageResult"></div>
                        <input type="hidden" name="event_id" class="event_id" id="event_id" value="0">
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="d-block mt-2">
                                <div class="">
                                    <h5 class="s1">Event title:</h5>
                                </div>
                                <div class="">
                                    <span class="s1 event_title"></span>
                                </div>
                            </div>
                            <div class="d-block mt-2">
                                <div class="">
                                    <h5 class="s1">Event link:</h5>
                                </div>
                                <div class="">
                                    <span class="s1 event_link"></span>
                                </div>
                            </div>
                            <div class="d-block mt-2">
                                <div class="">
                                    <h5 class="s1">Event start date:</h5>
                                </div>
                                <div class="">
                                    <span class="s1 datepicker1"></span>
                                </div>
                            </div>
                            <div class="d-block mt-2">
                                <div class="">
                                    <h5 class="s1">Event end date:</h5>
                                </div>
                                <div class="">
                                    <span class="s1 datepicker2"></span>
                                </div>
                            </div>
                            <div class="d-block mt-2">
                                <div class="">
                                    <h5 class="s1">Event description:</h5>
                                </div>
                                <div class="">
                                    <span class="s1 introduction_text"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <button type="button" id="proceed-payment" onclick="trigaPay(this.id);" class="btn btn-success btn-block rounded-pill shadow-sm"> Proceed to payment <i class="fa fa-arrow-right"></i></button>
    </div>
<script>
function trigaPay(id) {
    App.setStep("3");
}
</script>
