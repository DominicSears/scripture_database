<html>
    <header>
        <title>Home</title>
        <script type="text/javascript" src="/scripture_database/javascript/frameworks/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="/scripture_database/javascript/search.js"></script>
        <link rel="stylesheet" type="text/css" href="/scripture_database/css/index.css">
    </header>
    <body>
        <?php include(__DIR__ . '/php_generate/navbar.php'); ?>
        <h1 id="indexTitle" class="title">Search Tags</h1>
        <div class="search">
            <input type="text" class="searchTools" id="field">
            <input type="button" class="searchTools" id="searchBtn" value="Search">
        </div>
        <br>
        <div id="results"></div>
    </body>
</html>