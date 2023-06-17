<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4"><?php echo $data['subtitulo']; ?></h6>
                <form action='<?php echo $data['action']; ?>' method='POST'>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="exampleInputName" name="name" value="<?php echo $data['name']; ?>" <?php echo $data['disabled']; ?>>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Localização</label>
                        <input type="text" class="form-control" id="exampleInputLocation" name="location" value="<?php echo $data['location']; ?>" <?php echo $data['disabled']; ?>>
                    </div>
                    <input name="id" type="hidden" value="<?php echo $data['id']; ?>" />
                    <button type="submit" class="btn btn-primary" style="text-transform: capitalize;"><?php echo $data['acao']; ?></button>
                </form>
            </div>
        </div>

    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>