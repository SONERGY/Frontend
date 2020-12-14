<style>
#makepublish {
    display: none;
}
</style>
    <div class="row">
        <div class="col-md-8 offset-md-2">

            <!-- Uploaded image area-->
            <!-- <h4 class="text-center">Event Poster</h4> -->
            <div id="makepayment" class="text-center">
                <h5>Complete the payment process to be able to publish.</h5>
                <div class="form-group">
                    <input type="hidden" id="email1" value="">
                    <input type="hidden" id="amount" value="4500">
                    <input type="hidden" id="paymenttype" value="event">
                    <input type="hidden" name="event_id" class="event_id cause_id" id="event_id" value="0">
                    <button type="button" id="payWithPaystack" onclick="payWithPaystack()" class="btn btn-success roundy shadow-sm">Make payment <i class="fa fa-arrow-right"></i></button>
                </div>
            </div>
            <div id="makepublish" class="text-center">
                <h3>Success</h3>
                <h5>You have successfully paid for this event. Click to proceed to publish</h5>
                <div class="form-group">
                    <button type="button" id="proceed-publish" onclick="trigaPublish(this.id);" class="btn btn-primary roundy shadow-sm">Proceed to publish <i class="fa fa-arrow-right"></i></button>
                </div>
            </div>


        </div>
    </div>
<script>
function trigaPublish(id) {
    App.setStep("4");
}
</script>


