</div>
<footer class="footer bg-white shadow align-self-end py-3 px-xl-5 w-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 text-center text-md-left text-primary">
                <p class="mb-2 mb-md-0">© <?php echo date("Y"); ?>, Sonergy all right reserved.</p>
            </div>

        </div>
    </div>
</footer>
</div>
</div>

<!-- JavaScript files-->
<?php

require_once "public/page-parts/init.js.php"
?>

<script src="/public/static/js/app.js?v=<?php echo STATIC_VERSION ?>"></script>
<script src="/public/static/node_modules/clipboard/dist/clipboard.min.js?v=<?php echo STATIC_VERSION ?>"></script>
<script src="/public/static/js/localstorage.js?v=<?php echo STATIC_VERSION ?>"></script>
<script src="/public/static/js/cookie.js?v=<?php echo STATIC_VERSION ?>"></script>
<script src="/public/static/custom/js/bootstrap-datepicker.js?v=<?php echo STATIC_VERSION ?>"></script>

<script src="/public/static/js/userInfo.js?v=<?php echo STATIC_VERSION ?>"></script>
<script src="/public/static/js/count-referal.js?v=<?php echo STATIC_VERSION ?>"></script>
<script src="/public/static/js/view-referals.js?v=<?php echo STATIC_VERSION ?>"></script>


<script>
    $(function() {
        $('.sidebar-toggler').on('click', function() {
            $('.sidebar').toggleClass('shrink show');
        });
    });

    var clipboard = new ClipboardJS('.btn');


    clipboard.on('success', function(e) {
        console.info('Action:', e.action);
        console.info('Text:', e.text);
        console.info('Trigger:', e.trigger);
        $("#" + e.trigger.id).html('<i class="fa fa-check mx-1"></i> Copied ')

        e.clearSelection();
    });

    clipboard.on('error', function(e) {
        console.error('Action:', e.action);
        console.error('Trigger:', e.trigger);
    });
</script>

<script type="text/javascript">
    $('#datepicker1').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#datepicker2').datepicker({
        format: 'yyyy-mm-dd'
    });

    $('#datepicker-element').on('dateChanged.bs.datepicker', function(e) {
        console.log('The user just selected date: ' + e.date);
    });

    $('.numbersOnly').keyup(function() {
        if (this.value != this.value.replace(/[^0-9\.]/g, '')) {
            this.value = this.value.replace(/[^0-9\.]/g, '');
        }
    });
</script>

<script>
    /*  ==========================================
    SHOW UPLOADED IMAGE
* ========================================== */
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#imageResult')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(function() {
        $('#upload').on('change', function() {
            readURL(input);
        });
    });

    /*  ==========================================
        SHOW UPLOADED IMAGE NAME
    * ========================================== */
    var input = document.getElementById('upload');
    var infoArea = document.getElementById('upload-label');

    input.addEventListener('change', showFileName);

    function showFileName(event) {
        var input = event.srcElement;
        var fileName = input.files[0].name;
        infoArea.textContent = 'File name: ' + fileName;
        //   console.log(fileName);

    }
</script>



</body>

</html>