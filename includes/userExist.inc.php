<?php
session_start();
if(isset($_SESSION['userId'])){
    echo 'true';
} else{
    echo 'false';
}
