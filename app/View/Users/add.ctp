<div class="row container-fluid">
    <?php 
        echo $this->Form->create();
        echo $this->Form->input('username');
        echo $this->Form->input('creditos');
        echo $this->Form->input('email');
        echo $this->Form->input('role');
        echo $this->Form->input('password');
        echo $this->Form->input('cpf');
        echo $this->Form->end('Cadastrar');
    ?>
</div>