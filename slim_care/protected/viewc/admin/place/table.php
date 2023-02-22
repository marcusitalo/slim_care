<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <a href='<?php echo $data['base']; ?>locais/cadastro'><button type="button" class="btn btn-primary m-2">Criar novo local</button></a>
    </div>
    <div class="row g-4">

        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4"><?php echo $data['titulo']; ?></h6>
                <div class="table-responsive">
                    <?php echo $data['table']; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->

</div>
<!-- Content End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>