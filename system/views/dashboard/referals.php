<?php require_once "public/page-parts/site-header-dashbord.php" ?>

<style>
.dataTables_wrapper {
    width: 100% !important;
}
</style>

<!-- <script src="https://js.paystack.co/v1/inline.js"></script> -->


<section class="py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="bg-white shadow p-4 h-100 d-flex align-items-center justify-content-between">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        
                        <?php
                        foreach ($data as $key => $value) {
                            $user_name = $value['user_name'];
                            $email = $value['email'];
                            // echo $user_name;
                        ?>
                        <tr>
                        <td><?php echo $user_name ?></td>
                        <td><?php echo $email ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                        
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
</section>

<?php require_once "public/page-parts/footer.php" ?>

