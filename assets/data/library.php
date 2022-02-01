<?php
    $file = 'data/data.json';
    $json = file_get_contents($file);
    $data = json_decode($json, true);

    function get_students(){
        global $data;
        return $data['students'];
    }

    function get_payments(){
        global $data;
        return $data['payments'];
    }

    function add_student($new){
        global $data;
        global $file;
        $data = [
            "payments" => $data['payments'],
            "students" => [
                ...$data['students'], $new
            ]
        ];
        $new_json = json_encode($data);
        file_put_contents($file,$new_json);
    }
?>