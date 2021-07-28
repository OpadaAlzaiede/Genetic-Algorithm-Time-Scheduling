<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/admin.css" >
    <title>Admin</title>
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-light mb-5">
    <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#navbarResponsive">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <div class="container-fluid">
          <div class="row">
              <div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top ">
                  <a href="#" class="navbar-brand text-white d-block
                   mx-auto text-center py-3 mb-2 bottom-border">Admin Menu</a>
                   <div class="bottom-border pb-1">
                      <img src="{{ $user ->img}}" width="50" class="rounded-circle mr-1" alt="">
                      <a href="#" class="text-white">{{ $user ->username}}</a>
                   </div>
                   <ul class="navbar-nav flex-column mt-2">
                      <li class="nav-item"><a href="doctor" class="nav-link text-white p-3 mb-1 ">
                      <i class="fa fa-home text-light fa-lg mr-3"></i>home</a></li>
                      <li class="nav-item"><a href="admin_profile" class="nav-link text-white p-3 mb-1 sidebar-link">
                      <i class="fa fa-user text-light fa-lg mr-3"></i>Profile</a></li>
                      <li class="nav-item"><a href="createpost" class="nav-link text-white p-3 mb-1 sidebar-link current">
                      <i class="fa fa-envelope text-light fa-lg mr-3"></i>create post</a></li>
                      <li class="nav-item"><a href="doctor_students" class="nav-link text-white p-3 mb-1 sidebar-link ">
                      <i class="fa fa-shopping-cart text-light fa-lg mr-3"></i>Students</a></li>
                      <li class="nav-item"><a href="teacher_doctor" class="nav-link text-white p-3 mb-1 sidebar-link">
                      <i class="fa fa-line-chart text-light fa-lg mr-3"></i>teachers</a></li>
                   </ul>
              </div>
              <div class="col-xl-10 col-lg-9 col-md-8 ml-auto bg-dark fixed-top py-2 top-navbar">
                  <div class="row align-items-center">
                      <div class="col-md-4">
                          <h4 class="text-light text-uppercase mb-0">IT_ONLINE</h4>
                      </div>
                      <div class="col-md-5">
                          <form >
                              <div class="input-group">
                              </div>
                          </form>
                      </div>
                      <div class="col-md-3">
                          <ul class="navbar-nav">
                            <!-- Authentication Links -->
                                <li class="nav-item"><a class="nav-link" href="{{'/'}}">Home</a></li>
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->username }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </nav>


<div class="modal fade" id="sign-out">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Want to Leave?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                Press log-out to leave
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Stay Here</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Log out</button>

            </div>
        </div>

    </div>
</div>


<hr>
<div class="container-fluid">

    <div class="col-xl-10 col-lg-9 col-md-8  ml-auto">
        <h1 class="text-center text-primary">Create Post</h1>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-7 mt-5">
            <form action="/addPost/{id}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                        <span class="text-danger font-weight-bold  label-input100">Tilte</span>
                        <input class="input100" type="text" name="title" placeholder="Enter tilte">
                        <span class="focus-input100"></span>
                    </div>
                </div>
                <div class="form-group mt-5">
                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                        <span class="text-danger font-weight-bold label-input100">Body</span>
                        <textarea class="form-control input100" id="summary-ckeditor" name="summary-ckeditor"></textarea>                        <span class="focus-input100"></span>
                    </div>
                </div>
                <div>
                    <input type="file" name="inpFile" id="inpFile">
                    <div class="image-preview" id="imagePreview">
                        <img src="" alt="Image" class="image-preview__image">
                        <span class="image-preview__default-text">Image preview</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9"></div>
                    <div class="col-md-3 mt-2">
                        <div class="container-login100-form-btn">
                                <div class="container-login100-form-btn ml-5">
                                    <input type="submit" name = "logbtn" class="btn btn-primary" >
                                </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.2.0.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="http://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    const inpFile = document.getElementById("inpFile");
    const previewContainer = document.getElementById("imagePreview");
    const previewImage = previewContainer.querySelector(".image-preview__image");
    const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");
    inpFile.addEventListener("change", function(){
        const file = this.files[0];
        if(file) {
            const reader = new FileReader();
            previewDefaultText.style.display = "none";
            previewImage.style.display = "block";
            reader.addEventListener("load", function(){
                previewImage.setAttribute("src", this.result);
            });
            reader.readAsDataURL(file);
        }else {
            previewDefaultText.style.display = null;
            previewImage.style.display = null;
            previewImage.setAttribute("src", "");
        }
    });
</script>
<script>
    CKEDITOR.replace('summary-ckeditor');
</script>
</body>
</html>
