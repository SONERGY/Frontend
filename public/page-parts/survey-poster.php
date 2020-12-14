<style>
#upload {
    opacity: 0;
}

#upload-label {
    position: absolute;
    top: 50%;
    left: 1rem;
    transform: translateY(-50%);
}

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

<!-- <form class="question_preview_form">

</form> -->
<form role="form" id="add-poster" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-8 offset-md-2">

            <!-- Upload image input-->
            <div style="border: 1px solid #eaeaea;" class="input-group px-2 py-2 roundy bg-white shadow-sm">
                <input id="upload" type="file" name="file1" onchange="readURL(this);" class="form-control border-0">
                <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                <div class="input-group-append">
                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                </div>
            </div>

            <!-- Uploaded image area-->
            <!-- <p class="font-italic text-white text-center">The image uploaded will be rendered inside the box below.</p> -->
            <div class="image-area mt-4">
                <img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto imageResult d-block">
            </div>
            <input type="hidden" name="survey_id" class="survey_id" id="survey_id" value="0">
        </div>
    </div>
    <div class="form-group">
    <button type="button" id="btn-question" class="navigate btn btn-warning  rounded-pill shadow-sm"> <i class="fa fa-arrow-left"></i> Previous </button>
    <button type="button" id="btn-preview" class="navigate btn btn-primary  rounded-pill shadow-sm"> <i class="fa fa-arrow-right"></i> Next </button>

    <button type="submit" id="save_poster" class="btn btn-success  rounded-pill shadow-sm"> Upload <i class="fa fa-upload"></i></button>
    </div>
</form>

