<div class="content-wrapper">
    <form name="form" method="post" enctype="multipart/form-data">
        <div class="content-header">
            <div class="col-lg-6">
                <div class="card card-warning card-outline">
                    <div class="card-header">
                        <h5 class="m-0">Consulta CNPJ</h5>
                    </div>
                    <div class="card-body">
                        <div class="input-group mb-4" style='width: 70%;'>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">CNPJ</span>
                            </div>
                            <input type="text" id="cnpj" name="cnpj" class="form-control"  aria-label="cnpj" aria-describedby="basic-addon1">
                        </div>
                        <button type="submit" name="buscaCnpj" class="btn btn-warning">Consultar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="content">
        <div class="container-fluid">
            <div class="row">        
                <table class="table table-striped table-sm" <?php if($hide == true) echo 'style="display:none"' ?>>
                    <thead class="table-info">
                        <tr>
                            <th>CNPJ</th>
                            <th>Empresa</th>
                            <th>Funcionários</th>
                            <th>Exportar</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php if(isset($empresas) && $empresas[0]['empresa']['cnpj'] != NULL) { 
                            foreach($empresas as $empresa) {?>
                                <tr>
                                    <td><?php echo $empresa['empresa']['cnpj']; ?></td> 
                                    <td><?php echo $empresa['empresa']['nomeEmpresa']; ?></td>
                                    <td><?php echo $empresa[0]['total'] ?></td>
                                    <form action="Empresas/export" method="post">
                                        <td><button class="btn exportBtn <?php //echo $consulta['creditos'] < $row['total'] ? 'btn-secondary' : 'btn-success'; ?>" name="id" value="<?php echo $empresa['empresa']['id'] ?>" type="<?php //echo $consulta['creditos'] < $row['total'] ? 'button' : 'submit'; ?>"><i class="dwn"></i>Exportar</button></td>
                                    </form>
                                </tr> 
                            <?php } 
                        }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>