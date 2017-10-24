<?php
    $user = 'root';
    $pass = '';
    $conn = new PDO('mysql:host=127.0.0.1;dbname=bible', $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Returns an array of the the results with their attributes
    // Must get each tag individaully into an array and then check if one or more tags match with each entry
    // Not the most effecient because I'm reading all the data from the database processing it in PHP instead of the SQL code
    function getResults($tags, $conn){
        $queryResults = array();
        $show = array();
        $tag = explode(', ', $tags);

        $setRes = $conn->query('SELECT * FROM `scripture`;');
        $getRes = $setRes->fetchAll(PDO::FETCH_ASSOC);

        foreach ($getRes as $res){
            $resTags = explode($res['tags']);
            $pass = false;
            for ($i = 0; $i < sizeof($resTags); $i++){
                for($i2 = 0; $i2 < sizeof($tag); $i2++){
                    if ($resTags[$i] == $tag[$i2]){
                        $pass = true;
                    }
                }
            }
            ($pass) ? array_push($show, true) : array_push($show, false);
        }
        for ($i = 0; $i sizeof($show); $i++){
            if ($show[$i]){
                array_push($queryResults, array('book' => $getRes[$i]['book'], 'chapter' => $getRes[$i]['chapter'], 'verse' => $getRes[$i]['verse'], 'comments' => $getRes[$i]['comments'], 'explanation' => $getRes[$i]['explanation'], 'fp' => $getRes[$i]['in_first_principles'], 'referenced' => $getRes[$i]['referenced_in'], 'tags' => $getRes[$i]['tags']));
            }
        }
    }