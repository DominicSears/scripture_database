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

        if (isset($conn)){            
            $setSearch = $conn->query('SELECT * FROM `scripture`;');
            $getRes = $setSearch->fetchAll(PDO::FETCH_ASSOC);

            $tag = explode(', ', $tags);
            $resTags = array();

            foreach ($getRes as $res){
                for ($i = 0; $i < sizeof($tag); $i++){
                    array_push($resTags, explode(', ', $res['tags']));
                    for ($i2 = 0; $i2 < sizeof($resTags[$i]); $i2++){
                        if ($tag[$i] == $resTags[$i][$i2]){
                            if (!isset($show[$i])){
                                array_push($show, true);
                            }
                        }
                    }
                }
                for ($i = 0; $i < sizeof($show); $i++){
                    if ($show[$i]){
                        array_push($queryResults, array('book' => $res['book'], 'chapter' => $res['chapter'], 'verse' => $res['verse'], 'tags' => $res['tags'], 'comments' => $res['comments'], 'explain' => $res['explanation']));
                    }
                }
            }
            
            return $queryResults;

        } else {
            return false;
        }
    }