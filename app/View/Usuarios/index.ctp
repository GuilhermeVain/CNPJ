<div class="content-wrapper">
    <div class="content-header">
        <div class="col-sm-6">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cadModal">
            <i class="nav-icon fas fa-user-plus" ></i>&nbsp Cadastrar Usuário</button> 
        </div>
    </div>
    <?php
        echo $this->Form->create('consulta_usuario', array(
            'url' => array(
                'controller' => 'usuarios', 
                'action' => 'index'
            )
        )); 
    ?>
        <div class="content">
            <div class="row container-fluid">
                <div class="col-lg-12">
                    <div class="card card-warning card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Consulta Usuário</h5>
                        </div>
                        <div class="card-body row">
                            <div class="col-sm-4 input-group mb-4">
                                <div class="input-group-prepend" >
                                    <span class="input-group-text" id="basic-addon1">CPF</span>
                                </div>
                                <input type="text" name="cpf" class="form-control"  aria-label="cpf" aria-describedby="basic-addon1">
                            </div>
                            <div class="col-sm-4 input-group mb-4">
                                <div class="input-group-prepend" >
                                    <span class="input-group-text" id="basic-addon1">Nome</span>
                                </div>
                                <input type="text" name="nome"class="form-control"  aria-label="nome" aria-describedby="basic-addon1">  
                            </div> 
                            <div class="m-0">
                                <button type="submit" name="busca" class="btn btn-warning" >Buscar</button>
                            </div>
                        </div>
                        <table class="table table-striped table-sm">
                            <thead  class="table-secondary">
                                <tr>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>e-mail</th>
                                    <th>Perfil</th>
                                    <th>Créditos</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($usuarios as $usuario): ?>
                                <tr>
                                    <td><?php echo $usuario['Usuario']['nome']; ?></td>
                                    <td><?php echo $usuario['Usuario']['cpf']; ?></td>
                                    <td><?php echo $usuario['Usuario']['email']; ?></td>
                                    <td><?php echo $usuario['Usuario']['perfilID']; ?></td>
                                    <td><?php echo $usuario['Usuario']['creditos']; ?></td>
                                    <td></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>