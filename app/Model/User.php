<?php
    App::uses('AppModel', 'Model');
    App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

    class user extends AppModel {
        public $name = 'User';
        public $validate = array(
            'username' => array(
                'required' => array(
                    'rule' => 'notBlank',
                    'message' => 'Digite o usuario'
                )
                ),
            'password' => array(
                'required' => array(
                    'rule' => 'notBlank',
                    'message' => 'Digite a senha'
                )
            ),
            'role' => array(
                'valid' => array(
                    'rule' => array('inList', array('Administrador', 'Usuario')),
                    'message' => 'Digite um perfil válido',
                    'allowEmpty' => false
                )
            )
        );

        public function beforeSave($options = array())
        {
            if (isset($this->data[$this->alias]['password'])) {
                $passwordHasher = new BlowfishPasswordHasher();
                $this->data[$this->alias]['password'] = $passwordHasher->hash(
                    $this->data[$this->alias]['password']
                );
            }
            return true;
        }
    }