<?php      
    require(realpath(__DIR__ . '/../php_generate/dependencies.php'));
        
    $conn = getConnection();
    $setS = $conn->prepare("INSERT INTO `scripture` (`book`, `chapter`, `verse`, `tags`, `comments`, `explanation`, `referenced_in`, `included_in_FP`) VALUES ('?', '?', '?', '?', '?', '?', '?', '?'");
    
    try{
        $setS->execute(array($_POST['book'], $_POST['chapter'], $_POST['verse'], $_POST['tags'], $_POST['comments'], $_POST['explanation'], $_POST['referenced_in'], $_POST['in_FP']));
    } catch (PDOException $e){
        echo 'Error: ' . $e->getMessage() . "<br>Line" . $e->getLine() . "<br>Code: " . $e->getCode();
    }

    unset($conn);