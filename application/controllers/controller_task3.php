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
        $cnt=0;
        $f=fopen('uploads/words.txt','r') or die("Can't open file");
        while (!feof($f)) {
            $cnt ++;
            fgets($f);
        }
        fclose($f);
        $data = 'последняя строка-'.$cnt;

        $this->view->generate('task3_view.php', 'template_view.php', $data);
    }
}