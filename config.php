<?php

$config = array(
    'title' => 'Blog project',
    'db' => array(
        'server' => 'localhost',
        'username' => 'root',
        'password' => '',
        'name' => 'blog_project',
        )

);

$connection = mysqli_connect(
    $config['db']['server'],
    $config['db']['username'],
    $config['db']['password'],
    $config['db']['name'],
);
if( $connection == false )
{
    echo 'Не удалось подключится к базе данных!<br>';
    echo mysqli_connect_error();
    exit();
}