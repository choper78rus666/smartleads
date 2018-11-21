<?php
/**
 * Created by PhpStorm.
 * User: Choper
 * Date: 17.11.2018
 * Time: 17:42
 */
class Controller_Task2 extends Controller
{

    function __construct()
    {
        $this->model = new Model_Task2();
        $this->view = new View();
    }

    function action_index()
    {
        $this->view->generate('task2_view.php', 'template_view.php');
    }

    function action_send()
    {
        $result = null;
        if($_POST && $_POST['send_data']){
            $post = json_decode($_POST['send_data'], true);
            $result = $this->model->send_message($post);
        }

        $data = $result ? "1" : "0";
        echo $data;
    }

    function action_ok(){
        $data = "Сообщение отправлено";
        $this->view->generate('task2_send_view.php', 'template_view.php', $data);
    }

    function action_err(){
        $data = "Ошибка! Повторите отправку";
        $this->view->generate('task2_send_view.php', 'template_view.php', $data);
    }
}