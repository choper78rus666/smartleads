<?php
/**
 * Created by PhpStorm.
 * User: Choper
 * Date: 17.11.2018
 * Time: 18:12
 */

class Model_Task3 extends Model

{
    function get_rand_lines($path){

        $lines = $this->file->get_lines_file($path);
        $arr_line = range(1,$lines);
        $arr_rand = array_rand($arr_line, 10000);

        $data = $this->file->read_file($arr_rand, $path);

        return $data;
    }
}