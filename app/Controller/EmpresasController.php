<?php
    class EmpresasController extends AppController {
        public $helpers = array('Html', 'Form');

        public function index() 
        {
            $hide = true;
            if ($this->request->is('post')) {
            $cnpj = $this->request->data['cnpj'];
            $empresas = $this->Empresa->query("SELECT empresa.id, empresa.cnpj, empresa.nomeEmpresa, count(f.id) AS total FROM empresas AS empresa
                                              LEFT JOIN funcionarios AS f ON f.empresa_id = empresa.id WHERE cnpj = $cnpj"); 
            $this->set('empresas', $empresas);
            $hide = false;
            }
            $this->set('hide', $hide);
        }

        public function export()
        {  
            if (isset($this->request->data['id']) && $this->request->data['id'] != ""){
                $empresa_id = $this->request->data['id'];
                $query          = $this->Empresa->query("SELECT F.cpf, F.nome, E.nomeEmpresa FROM funcionarios AS F 
                                                        INNER JOIN empresas AS E ON E.id = F.empresa_id WHERE F.empresa_id = $empresa_id");
                $nomeEmpresa    = str_replace(' ', '_', $query[0]['E']['nomeEmpresa']);
                if(count($query)){
                    $delimiter      = ',';
                    $timestamp      =  date('d-m-Y') . date("h:i:sa");
                    $filename       = 'lista_CPF_' . $nomeEmpresa . "_" . date('d-m-Y') ."_". date("h:i:sa") . ".csv";
                    $filePointer    = fopen('php://memory','w');
                    $fields         = array('Nome','CPF');
                    fputcsv($filePointer, $fields, $delimiter);
                    foreach($query as $funcionario){ 
                        $lineData   = array($funcionario['F']['nome'],$funcionario['F']['cpf']);
                        fputcsv($filePointer, $lineData, $delimiter);
                    }
                    fseek($filePointer, 0);
                    header('Content-Type: text/csv');
                    header('Content-Disposition: attachment; filename="' . $filename . '";');
                    fpassthru($filePointer);
                    exit;
                }   
            }
        }

        public function reduceCredits()
        {
            $id         = $_SESSION['id'];
            $query      = $connection->prepare("SELECT creditos FROM user WHERE id=:id");
            $query->execute(['id' => $id]);
            $creditos   = $query->fetchColumn() - $result[0]['total'];
            $query      = $connection->prepare("UPDATE user SET creditos=:creditos WHERE id =:id");
            $query->execute(['creditos' => $creditos, 'id' => $id]);
            $query      = $connection->prepare("INSERT INTO logs (arquivo,user_id,empresa_nome,n_funcionarios, timestamp) 
                                                VALUES (:arquivo,:user_id,:empresa_nome, :n_funcionarios, NOW())");
            $query->execute(['arquivo' => $filename, 'user_id' => $id, 'empresa_nome' => $query[0]['nomeEmpresa'], 'n_funcionarios' => $query[0]['total']]);
            exit;
        }
    }