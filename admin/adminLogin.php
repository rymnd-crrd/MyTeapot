<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Template</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" href="img/login.ico"/>
        
    <meta name="author" content="Yuli Petrilli">
    <meta name="description" content="Free login template made with Bootstrap 5">
    
    <!-- / Bootstrap Core -->    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- / FontAwesome -->    
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- / Custom style -->    
    <link rel="stylesheet" type="text/css" href="teapotscss.css">
    <style>
    /* CSS for the login form */
    .form-wrapper {
        color: white; /* Set text color to white */
        height: 550px;  
        font-size: 100px;
    }
    .form-header {
        max-width: 400px; /* Set maximum width */
        margin: 0 auto; /* Center the form header horizontally */
        height: 50px;
    }
</style>
</head>
<body>
    
<main>
<div class="form-main-container">
    <div class="form-wrapper">
        <div class="form-header">
            <h3>Login</h3>
        </div>

        <form action="crud.php" method="POST" class="form-content" id="loginForm">
            <div class="input-wrapper">
                <input class="input-style" type="text" name="use    rname" id="username" placeholder="Username" required>
                <span class="input-style-focus"></span>
            </div>

            <div class="input-wrapper">
                <div class="input-group">
                    <input class="form-control" type="password" placeholder="Password" id="password" required>
                    <span class="form-control-focus"></span>
                    <div class="input-group-addon" onclick="passwordVisibility();">
                        <i class="fa fa-eye" id="showPass"></i>
                        <i class="fa fa-eye-slash d-none" id="hidePass"></i>
                    </div>
                </div>
            </div>
         
            <button class="button-style w-100">
                Login
            </button>

            <div class="checkbox-wrapper mt-4">
                <input type="checkbox" class="checkbox-style" id="rememberMe" name="remember-me">
            
                
            </div>
        
        </form>
    </div>
</div>

</main>



</body>
</html>
