<?php
    class UsuariosController extends AppController {
        public $helpers = array('Html', 'Form');

        public function index() {
            $this->set('usuarios', $this->Usuario->find('all'));
        }
    }