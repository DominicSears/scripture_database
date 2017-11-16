<?php
    
    function getConnection(){
        $user = 'root';
        $pass = '';
        $conn = new PDO('mysql:host=127.0.0.1;dbname=bible', $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }

    // Returns an array of the the results with their attributes
    function getResults($tags, $conn){
        $queryResults = null;
        $hasMatches = false;
        $show = array();
        $tag = explode(', ', $tags);

        for ($i = 0; $i < sizeof($tag); $i++) { $tag[$i] = strtolower($tag[$i]); }

        $setRes = $conn->query('SELECT * FROM `scripture`;');
        $getRes = $setRes->fetchAll(PDO::FETCH_ASSOC);

        foreach ($getRes as $res){
            $resTags = explode(', ', $res['tags']);
            $pass = false;
            for ($i = 0; $i < sizeof($resTags); $i++){
                for($i2 = 0; $i2 < sizeof($tag); $i2++){
                    if ($resTags[$i] == $tag[$i2]){
                        $pass = true;
                        (!$hasMatches) ? $hasMatches = true : null; 
                    }
                }
            }
            ($pass) ? array_push($show, true) : array_push($show, false);
        }
        for ($i = 0; $i < sizeof($show); $i++){
            if ($show[$i]){
                array_push($queryResults, array('book' => $getRes[$i]['book'], 'chapter' => $getRes[$i]['chapter'], 'verse' => $getRes[$i]['verse'], 'comments' => $getRes[$i]['comments'], 'explanation' => $getRes[$i]['explanation'], 'fp' => $getRes[$i]['included_in_FP'], 'referenced' => $getRes[$i]['referenced_in'], 'tags' => $getRes[$i]['tags']));
            }
        }

        return ($hasMatches) ? $queryResults : false;
    }