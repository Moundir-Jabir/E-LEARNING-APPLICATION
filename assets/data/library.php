<?php
    $file = 'data/data.json';
    $json = file_get_contents($file);
    $data = json_decode($json, true);

    function get_students(){
        global $data;
        return $data['students'];
    }

    function get_student_by_id($id){
        $students = get_students();
        foreach($students as $student){
            if($student['enroll_number'] == $id){
                return $student;
            }
        }
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
        header("Location: students.php");
    }

    function update_student($student){
        global $data;
        global $file;
        for($i=0 ; $i<count($data['students']) ; $i++){
            if($data['students'][$i]['enroll_number'] == $student['enroll_number']){
                $data['students'][$i] = $student;
            }
        }
        $new_json = json_encode($data);
        file_put_contents($file,$new_json);
        header("Location: students.php");
    }

    function delete_student($id){
        global $data;
        global $file;
        $new_data = [];
        foreach($data['students'] as $student){
            if($student['enroll_number'] != $id){
                $new_data = [...$new_data, $student];
            }
        }
        $data = [
            "payments" => $data['payments'],
            "students" => $new_data
        ];
        $new_json = json_encode($data);
        echo $new_json;
        file_put_contents($file,$new_json);
        header("Location: students.php");
    }
?>