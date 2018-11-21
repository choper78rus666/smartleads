<?php
/**
 * Created by PhpStorm.
 * User: Choper
 * Date: 17.11.2018
 * Time: 18:12
 */
class Model_Task2 extends Model
{
    private function get_validate($str){
        return $str;
    }

    public function send_message($post){

        $name = $this->get_validate($post['user']);
        $email = $this->get_validate($post['email']);
        $text = $this->get_validate($post['text']);

        $params = [
            'name' => $name,
            'email' => $email,
            'text' => $text
        ];
        $sql = "INSERT INTO messages (name, email, text) VALUES (:name, :email, :text);";
        $result = $this->db->addSQL($params, $sql);

        return $result;
    }


}