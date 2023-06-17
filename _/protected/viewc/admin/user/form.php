<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
  <div class="row g-4">
    <div class="col-sm-12 col-xl-6">
      <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4"><?php echo $data['subtitulo']; ?></h6>
        <form action="<?php echo $data['action']; ?>" method="POST">
          <div class="mb-3">
            <label for="exampleInputName" class="form-label">Nome</label>
            <input
              type="text"
              class="form-control"
              id="exampleInputName"
              name="name"
              value="<?php echo $data['name']; ?>"
              <?php echo $data['disabled']; ?>
            />
          </div>
          <div class="mb-3">
            <label for="exampleInputLogin" class="form-label">Login</label>
            <input
              type="text"
              class="form-control"
              id="exampleInputLogin"
              aria-describedby="loginHelp"
              name="login"
              value="<?php echo $data['login']; ?>"
              <?php echo $data['disabled']; ?>
            />
            <div id="loginHelp" class="form-text">
              Nome utilizado para logar no sistema
            </div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"
              >Password</label
            >
            <input
              type="password"
              class="form-control"
              id="exampleInputPassword1"
              name="senha"
              value="<?php echo $data['senha']; ?>"
              <?php echo $data['disabled']; ?>
            />
          </div>
          <div class="mb-3">
            <label for="selectPerfil" class="form-label">Perfil</label>
            <select id="selectPerfil" class="form-control" name="group_user">
                <option value="Administrador" 
                    <?php if( $data['group_user'] == "Administrador" ): ?> 
                        selected="selected" 
                    <?php endif; ?>
                >Administrador</option>
                <option value="Visualizador" 
                    <?php if( $data['group_user'] == 'Visualizador' ): ?> 
                        selected="selected" 
                    <?php endif; ?>
                >Vizualizador</option>
            </select>
          </div>
          <input name="id" type="hidden" value="<?php echo $data['id']; ?>" />
          <button
            type="submit"
            class="btn btn-primary"
            style="text-transform: capitalize"
          >
            <?php echo $data['acao']; ?>
          </button>
        </form>
      </div>
    </div>
  </div>
  <!-- Content End -->

  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"
    ><i class="bi bi-arrow-up"></i
  ></a>
</div>
