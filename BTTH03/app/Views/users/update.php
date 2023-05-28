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

    <h1 class="text-center">Edit Articles </h1>
    <form class="row g-3 needs-validation" novalidate method="POST" >
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Title</label>
            <input type="text" class="form-control" id="validationCustom01" name="title" value="<?php echo $articles[0]->getTitle(); ?>" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Summary</label>
            <input type="text" class="form-control" id="validationCustom02" name="summary" value="<?php echo $articles[0]->getSummary(); ?>" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">Content</label>
            <div class="input-group has-validation">
                <input type="text" class="form-control" id="validationCustomUsername" name="content"  value="<?php echo $articles[0]->getContent(); ?>" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                    Please choose a username.
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationCustom03" class="form-label">	Category id</label>
            <select class="form-select" id="validationCustom04"  name="category_id" required>
                <option value="1" <?php if ( $articles[0]->getCategoryId() == 1) echo "selected"; ?>>1</option>
                <option value="2" <?php if ( $articles[0]->getCategoryId() == 2) echo "selected"; ?>>2</option>
                <option value="3" <?php if ( $articles[0]->getCategoryId() == 3) echo "selected"; ?>>3</option>

            </select>
            <div class="invalid-feedback">
                Please provide a valid city.
            </div>
        </div>
        <div class="col-md-3">
            <label for="validationCustom04" class="form-label">	Member id</label>
            <select class="form-select" id="validationCustom04"   name="member_id" required>
                <option value="1" <?php if ( $articles[0]->getMemberId() == 1) echo "selected"; ?>>1</option>
                <option value="2" <?php if ( $articles[0]->getMemberId() == 2) echo "selected"; ?>>2</option>
                <option value="3" <?php if ( $articles[0]->getMemberId() == 3) echo "selected"; ?>>3</option>
            </select>
            <div class="invalid-feedback">
                Please select a valid state.
            </div>
        </div>
        <div class="col-md-3">
            <label for="validationCustom05" class="form-label">Published</label>
            <select class="form-select" id="validationCustom04"   name="published" required>
                <option value="1" <?php if ( $articles[0]->getPublished() == 1) echo "selected"; ?>>1</option>
                <option value="0" <?php if ( $articles[0]->getPublished() == 0) echo "selected"; ?>>0</option>

            </select>
            <div class="invalid-feedback">
                Please provide a valid zip.
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" name="btnAdd" type="submit">Edit</button>
            <a href="users" class="btn btn-primary">Quay lại</a>

        </div>
    </form>

</div>
</body>
</html>