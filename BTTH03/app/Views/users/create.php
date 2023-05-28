<!-- app/Views/users/index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<body>
<div class="container">

    <h1 class="text-center">Add Articles </h1>
    <form class="row g-3 needs-validation" novalidate method="POST" action="create">
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Title</label>

            <input type="text" class="form-control" id="validationCustom01" name="title"  required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Summary</label>
            <input type="text" class="form-control" id="validationCustom02" name="summary" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">Content</label>
            <div class="input-group has-validation">
                <input type="text" class="form-control" id="validationCustomUsername" name="content" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                    Please choose a username.
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationCustom03" class="form-label">	Category id</label>
            <select class="form-select" id="validationCustom04"  name="category_id"required>
                <option selected  value=1>1</option>
                <option value=2>2</option>
            </select>
            <div class="invalid-feedback">
                Please provide a valid city.
            </div>
        </div>
        <div class="col-md-3">
            <label for="validationCustom04" class="form-label">	Member id</label>
            <select class="form-select" id="validationCustom04"   name="member_id" required>
                <option selected  value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
            </select>
            <div class="invalid-feedback">
                Please select a valid state.
            </div>
        </div>
        <div class="col-md-3">
            <label for="validationCustom05" class="form-label">Published</label>
            <select class="form-select" id="validationCustom04"   name="published" required>
                <option selected  value=1>1</option>
                <option value=0>0</option>

            </select>
            <div class="invalid-feedback">
                Please provide a valid zip.
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" name="btnAdd" type="submit">Submit form</button>
            <a href="users" class="btn btn-primary">Quay lại</a>

        </div>
    </form>

</div>
</body>
</html>