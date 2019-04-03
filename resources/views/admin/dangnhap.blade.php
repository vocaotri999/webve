

<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <base href="{{asset('')}}">
    <!--Made with love by Mutiullah Samim -->

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>My Admin</h3>
                <div class="d-flex justify-content-end social_icon">
                    <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>
                    <span><i class="fab fa-twitter-square"></i></span>
                </div>
            </div>
            <div class="card-body">
                    @if(session('thongbao'))
                    <div class="alert alert-danger">
                        {{session('thongbao')}}
                    </div>
                    @endif
                <form action="admin/dangnhap"  method="post">
                    <input hidden name="_token" value="{{csrf_token()}}">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="name" class="form-control" placeholder="username" required>

                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="pass" class="form-control" placeholder="password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <img  @if(session('thongbao'))
                     {{"hidden"}}
                     @endif class="img-responsive" width="350px" height="130px" class="entry-thumb td-animation-stack-type0-2"
                     src="http://powerofsuccess.net/wp-content/uploads/2014/06/Key-to-success.png"
                     srcset="http://powerofsuccess.net/wp-content/uploads/2014/06/Key-to-success.png 600w,
                      http://powerofsuccess.net/wp-content/uploads/2014/06/Key-to-success-300x162.png 300w,
                       http://powerofsuccess.net/wp-content/uploads/2014/06/Key-to-success-387x211.png 387w"
                     sizes="(max-width: 600px) 100vw, 600px" alt="key to success" title="Key-to-success">
            </div>
        </div>
    </div>
</div>
</body>
</html>