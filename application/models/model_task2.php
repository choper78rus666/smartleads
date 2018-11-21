<?php
/**
 * Created by PhpStorm.
 * User: Choper
 * Date: 17.11.2018
 * Time: 18:12
 */
class Model_Task2 extends Model
{
    private function get_validate($text){
        $text = addslashes($text);
        $text = htmlspecialchars(trim($text));
        $text = preg_replace("/'/", "", $text);
        $text = preg_replace("/&quot;/", "", $text);
        $text = stripslashes($text);
        return $text;
    }

    public function send_message($post){

        $name = $this->get_validate($post['user']);
        $email = $this->get_validate($post['email']);
        $text = $this->get_validate($post['text']);
        $sanitized_a = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (!filter_var($sanitized_a, FILTER_VALIDATE_EMAIL) || $name == '' || $text == ''){
            return false;
        }

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