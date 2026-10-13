<?php

$conn = mysqli_connect('localhost', 'root', '', 'win1');

if(!$conn) {
    echo 'Error : ' . mysqli_connect_error();
}