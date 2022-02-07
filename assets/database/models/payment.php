<?php
require('data_provider.php');
class Payment extends DataProvider {
    public function getPayments(){
        $db = $this->connect();
        if($db == null){
            return;
        }
        $query = $db->query('SELECT * FROM payments');
        $data = $query->fetchAll(PDO::FETCH_OBJ);
        $query = null;
        $db = null;
        return $data;
    }
}