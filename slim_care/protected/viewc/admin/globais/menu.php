<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"></i>Slim Care</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="<?php echo $data['globais']; ?>img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $data['usuario']; ?></h6>
                        <span><?php echo $data['group']; ?></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="<?php echo $data['base']; ?>admin/dashboard" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="<?php echo $data['base']; ?>admin/usuarios" class="nav-item nav-link"><i class="fa fa-user me-2"></i>Usuários</a>
                    <a href="<?php echo $data['base']; ?>admin/locais" class="nav-item nav-link"><i class="fa fa-home me-2"></i>Locais</a>
                    <a href="<?php echo $data['base']; ?>admin/agenda/disponivel" class="nav-item nav-link"><i class="fa fa-calendar me-2"></i>Disponiveis</a>
                    <a href="<?php echo $data['base']; ?>admin/agenda" class="nav-item nav-link"><i class="fa fa-calendar-check me-2"></i>Agendados</a>
                    <a href="<?php echo $data['base']; ?>admin/custos" class="nav-item nav-link"><i class="fa fa-credit-card me-2"></i>Despesas</a>
                    <a href="<?php echo $data['base']; ?>admin/relatorios" class="nav-item nav-link"><i class="fa fa-book me-2"></i>Relatório</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0">S.C.</h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="<?php echo $data['globais']; ?>img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $data['usuario']; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="<?php echo $data['base']; ?>usuarios/editar/<?php echo $data['identificador']; ?>" class="dropdown-item">Meus Dados</a>
                            <a href="<?php echo $data['base']; ?>logout" class="dropdown-item">Sair</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->