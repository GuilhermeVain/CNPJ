<div class="modal fade" id="altModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title">Alterar Usuário</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php 
                    echo $this->Form->create(); ?>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <?php  
                            echo $this->Form->input('nome', array(
                                'label' => 'Nome',
                                'class' => 'form-control form-control-border',
                                'placeholder' => 'Nome'
                            )); 
                        ?>
                    </div>
                </div>
                <?php echo $this->Form->input('creditos', array (
                        'label' => 'Número de créditos'
                    ));
                    echo $this->Form->input('email');
                    echo $this->Form->input('perfil_id');
                    echo $this->Form->input('password');
                    echo $this->Form->input('cpf');
                    echo $this->Form->end('Cadastrar');
                ?>
            </div>