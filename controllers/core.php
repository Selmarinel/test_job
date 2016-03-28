<?php
include 'data.php';

function display(&$varArray = array(),$_layout_name='_layouts/default'){
    $_layout_name = "views/{$_layout_name}.low.php";
    $data = $varArray;
    ob_start();
    include $_layout_name;
}

function index(){
    $data = new data();
    if ($data->createBase())
    {
        $data->insertData();
    };

    if($_GET['id']){
        $ds = DIRECTORY_SEPARATOR;
        $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
        require_once ("{$base_dir}models{$ds}model.php");

        $model = new model();
        if ($_GET['id']) {
            $data = $model->select($_GET['id']);
            return display($data);
        }
    }
    return;
}