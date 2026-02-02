<?php

    $_SESSION['name'] = 'SWE';

    view("index.view.php",[
        'heading' => "Home",
    ]);