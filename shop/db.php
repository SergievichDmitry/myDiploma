<?php

require "libs/rb.php";
R::setup( 'mysql:host=localhost;dbname=autorisation',
        'root', '' ); //for both mysql or mariaDBoth mysql or mariaDB
session_start();