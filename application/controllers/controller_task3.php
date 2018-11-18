<?php
/**
 * Created by PhpStorm.
 * User: Choper
 * Date: 17.11.2018
 * Time: 17:43
 */
class Controller_Task3 extends Controller
{

    function action_index()
    {
        $this->view->generate('task3_view.php', 'template_view.php');
    }
}