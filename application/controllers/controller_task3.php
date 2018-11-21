<?php
/**
 * Created by PhpStorm.
 * User: Choper
 * Date: 17.11.2018
 * Time: 17:43
 */
class Controller_Task3 extends Controller
{

    function __construct()
    {
        $this->model = new Model_Task3();
        $this->view = new View();
    }

    function action_index()
    {
        $data = $this->model->get_rand_lines('uploads/words.txt');
        $this->view->generate('task3_view.php', 'template_view.php', $data);
    }
}