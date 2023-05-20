<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <link rel="stylesheet" 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container mt-5 ">
      <div class="row justify-content-center">
        <div class="col-md-6 col-sm-12">
          <div class="card shadow-lg ">
            <div class="card-header bg-primary text-white ">
              <h3 class="card-title mb-0 text-center">Login</h3>
            </div>
            <div class="card-body mt-5">
              <form >
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" placeholder="Enter username">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Enter password">
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
