<?php

include_once "db.php";

// dd($_POST);
$table=$_POST['table'];
$DB=${ucfirst($table)};
$row=$DB->find($_POST['id']);
// dd($row);


if (isset($_POST['text'])) {
    $row['text'] = $_POST['text'];
}

if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],'../img/'.$_FILES['img']['name']);
    $row['img']=$_FILES['img']['name'];
}

$DB->save($row);
// echo dd($DB->save($row));

to("../back.php?do=$table");