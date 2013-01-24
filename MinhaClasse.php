<?php
require_once 'Zend/Loader.php';
Zend_Loader::registerAutoload();

class MinhaClasse implements Zend_Auth_Storage_Interface {

    public function __construct(){

        $auth  = Zend_Auth::getInstance();

        try {
            $adapter = new Zend_Auth_Adapter_DbTable(new Zend_Db_Adapter_Pdo_Mysql(array('host' => '127.0.0.1'
                                                                                         ,'username' => 'root'
                                                                                         ,'dbname' => 'certification'
                                                                                         ,'password' => '')),
                                                        'tb_usuario','no_usuario','no_password','md5(?)');




            //Colocando os dados de autenticacao
            $adapter->setIdentity("nataniel")->setCredential("12");

            $result = $auth->authenticate($adapter);

            //Recupera o objeto do usuário, sem a senha
            #obs pode colocar um array, caso queira excluir mais campos além da senha
            $info = $adapter->getResultRowObject(null, array('no_password'));


             $storage = $auth->getStorage();
             $storage->write($info);
            //$auth = Zend_Auth::getInstance();
            //$auth->clearIdentity();
            echo  "<pre>";
            Zend_Debug::dump(Zend_Auth::getInstance()->getIdentity());
             echo "</pre>";exit;

           // Zend_Debug::dump($result);

        } catch (Exception $e) {
            print_r($e);
        }

    }

    public function isEmpty();

    public function read();

    public function write($contents);

    public function clear();

}

?>