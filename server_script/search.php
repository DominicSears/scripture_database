<?php
    require(realpath(__DIR__ . '/../php_generate/dependencies.php'));

    $conn = getConnection();

    if (isset($_POST['query'])){
        if (is_bool(getResults($_POST['query'], $conn))){
            echo json_encode(array('error' => true, 'alert' => 'getResults returned false, which means connection was null'));
        } else {
            echo json_encode(array('error' => false, 'result' => getResults($_POST['query'], $conn), 'alert' => 'success'));
        }
    } else {
        echo json_encode(array('error' => true, 'alert' => 'query was not set'));
    }

    unset($conn);