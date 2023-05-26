<!-- app/Views/users/index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
</head>
<body>
    <h1>User List</h1>
    <ul>
        <?php
        foreach($articles as $article){
            echo "<p>{$article->getTitle()}</p>";
        }

        ?>
    </ul>
</body>
</html>