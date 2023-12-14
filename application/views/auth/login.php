<div class="container">
    <div class="row py-5">
        <div class="col-4 offset-4 py-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title py-2 text-center">Login</h5>
                    <form>
                        <div class="form-group" method="post" action="<?php echo site_url('auth/login'); ?>">
                            <label for="nick">Nombre de usuario</label>
                            <input type="text" class="form-control" id="nick" name="nick">
                        </div>
                        <div class="form-group">
                            <label for="clave">Clave</label>
                            <input type="password" class="form-control" id="clave" name="clave">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>