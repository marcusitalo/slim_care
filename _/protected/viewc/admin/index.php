


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Receita no mês</p>
                                <h6 class="mb-0">
                                    <?php foreach($data['dados'] as $k1=>$v1): ?>
                                        R$ <?php echo $v1['receita']; ?>
                                    <?php endforeach; ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Despesas no mês</p>
                                <h6 class="mb-0">
                                    <?php foreach($data['dados'] as $k1=>$v1): ?>
                                        R$ <?php echo $v1['despesas']; ?>
                                    <?php endforeach; ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-couch fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Disponiveis Hoje</p>
                                <h6 class="mb-0">
                                     <?php foreach($data['dados'] as $k1=>$v1): ?>
                                     <?php echo $v1['disponivel']; ?>
                                     <?php endforeach; ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chair fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Ocupados Hoje</p>
                                <h6 class="mb-0">
                                    <?php foreach($data['dados'] as $k1=>$v1): ?>
                                        <?php echo $v1['ocupado']; ?>
                                    <?php endforeach; ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->

             <!-- Recent Sales Start -->
             <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Agenda dos próximos 7 dias</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <?php echo $data['table']; ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

            <!-- Sales Chart Start -->
            <!-- <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Worldwide Sales</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Salse & Revenue</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="salse-revenue"></canvas>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Sales Chart End -->

        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
