<?php
    class UsersController extends AppController {
        public $helpers = array('Html', 'Form');

        public function index()
        {
            $this->set('Users', $this->User->find('all'));
        }

        public function view($name = null)
        {
            $this->User->username = $name;
            if (!$this->User->exists())
                throw new NotFoundException(__('Nenhum usuário encontrado'));
        }
        
        public function add()
        {
            if ($this->request->is('post')) {
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $this->Flash->success(__('Usuário cadastrado com sucesso.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Flash->error(__('Problema ao cadastrar o usuário'));
            }
        }

        public function edit($id = null)
        {
            if (!$id)
                throw new NotFoundException(__('Usuário inválido'));

            $User = $this->User->findById($id);

            if(!$User)
                throw new NotFoundException(__("Usuário inválido"));

            if ($this->request->is(array('post','put', 'patch'))) {
                $this->User->id = $id;
                if ($this->User->save($this->request->data)) {
                  $this->Flash->success(__('O usuário foi atualizado'));
                  return $this->redirect(array('action' => 'index'));  
                }
                $this->Flash->error(__('Não foi possível atualizar o usuário'));
            }
            if (!$this->request->data) 
                $this->request->data = $User;
        }

        public function delete($id = null) {
            $this->request->allowMethod('post');
            $this->User->id = $id;

            if (!$this->User->exists()) 
                throw new NotFoundException(__('Usuário invalido'));
            if ($this->User->delete()) {
                $this->Flash->success(__('Usuário deletado'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('O usuário não foi deletado'));
            return $this->redirect(array('action' => 'index'));
        }

        public function beforeFilter()
        {
            parent::beforeFilter();
            $this->Auth->allow('add','logout');
        }

        public function login()
        {
            if ($this->request->is('post')) {
                if ($this->Auth->login()) {
                    return $this->redirect($this->Auth->redirectUrl());
                }
                $this->Flash->error(__('Nome de usuário ou senha invalidos, tente novamente'));
            }
        }

        public function logout() 
        {
            return $this->redirect($this->Auth->logout());
        }

    }