<html>
    <header>
        <title>New Scripture Entry</title>
        <script type="text/javascript" src="/scripture_database/javascript/frameworks/jquery-3.2.1.min.js"></script>
    </header>
    </body>
        <?php include(__DIR__ . '/php_generate/navbar.php'); ?>
        <h1>Enter New Scripture to the Database</h1>
        <form action="server_script/newrow.php" method="post" target="_self">
            <label for="book">Book:</label>
            <input type="text" name="book">
            <br>

            <label for="chapter">Chapter:</label>
            <input type="text" name="chapter">
            <br>

            <label for="verse">Verse:</label>
            <input type="text" name="verse">
            <br>

            <label for="tags">Tags:</label>
            <input type="text" name="tags">
            <br>

            <label for="comments">Comments:</label>
            <input type="text" name="comments">
            <br>

            <label for="explanation">Explanation:</label>
            <input type="text" name="explanation">
            <br>

            <label for="referenced">Referenced In:</label>
            <input type="text" name="referenced_in">
            <br>

            <p>Included in First Principles?:</p>
            <label for="in_FP">True or False?:</label>
            <p>True <input type="radio" name="in_FP" value="1"></p>
            <p>False <input type="radio" name="in_FP" value="0"></p>
            <br><br>

            <input type="submit" value="Save">
        </form>
    </body>
</html>