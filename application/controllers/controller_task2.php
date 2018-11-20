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
        if($_POST){
            $post = $_POST;
            $data = "Сообщение отправлено";
        }

        $this->view->generate('task2_send_view.php', 'template_view.php', $data);
    }
}