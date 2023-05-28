<!-- app/Views/users/index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script>
        function deleteArticle(id) {
            if (confirm('Are you sure you want to delete this article?')) {
                var xhr = new XMLHttpRequest();
                xhr.open('DELETE', 'delete/' + id, true);
                xhr.onload = function() {
                    if (xhr.status === 200) {

                        location.reload();
                    } else {
                        // Handle error response here
                        alert('Error deleting article: ' + xhr.responseText);
                    }
                };
                xhr.send();
            }
        }
    </script>
</head>
<body>
<div class="container">

    <h1 class="text-center">Articles List</h1>
    <a href="create" class="btn btn-success ">Thêm mới</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Created</th>
            <th scope="col">Sửa</th>
            <th scope="col">Xóa</th>

        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($articles as $article) {
            echo "<tr>";
            echo "<td>{$article->getId()}</td>";
            echo "<td>{$article->getTitle()}</td>";
            echo "<td>{$article->getContent()}</td>";
            echo "<td>{$article->getCreated()}</td>";
            echo '<td><a href="edit/' . $article->getId() . '"><i class="bi bi-pencil-square"></i></a></td>';
            echo '<td><a href="#" onclick="deleteArticle(' . $article->getId() . ')"><i class="bi bi-archive"></i></a></td>';
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

</div>
</body>
</html>