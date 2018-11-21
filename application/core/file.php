<?php
/**
 * Created by PhpStorm.
 * User: kotofoto
 * Date: 21.11.2018
 * Time: 18:07
 */
class File {

    function get_lines_file($path){
        $cnt=0;
        $f=fopen($path ,'r') or die("Can't open file");
        while (!feof($f)) {
            $cnt ++;
            fgets($f);
        }
        fclose($f);
        return $cnt;
    }

    function read_file($arr_rand, $path){
        $cnt=0;
        $data ='';
        $f=fopen($path ,'r') or die("Can't open file");
        while (!feof($f)) {
            $cnt ++;
            $line = fgets($f);
            if(in_array($cnt, $arr_rand)){
                $data .= $line;
            }
        }
        fclose($f);
        return $data;
    }
}