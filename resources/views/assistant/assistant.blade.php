<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/admin.css" >
    <link rel="stylesheet" href="css/student.css" >
    <title>Assistant</title>
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-light mb-5 ">
    <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#navbarResponsive">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <div class="container-fluid">
          <div class="row">
              <div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top ">
                  <a href="#" class="navbar-brand text-white d-block
                   mx-auto text-center py-3 mb-2 bottom-border">Assistant Menu</a>
                   <div class="bottom-border pb-1">
                      <img src="{{ $user ->img}}" width="50" class="rounded-circle mr-1" alt="">
                      <a href="#" class="text-white">{{ $user ->username}}</a>
                   </div>
                   <ul class="navbar-nav flex-column mt-2">
                      <li class="nav-item"><a href="admin" class="nav-link text-white p-3 mb-1 current">
                      <i class="fa fa-home text-light fa-lg mr-3"></i>Home</a></li>
                      <li class="nav-item"><a href="admin_profile" class="nav-link text-white p-3 mb-1 sidebar-link">
                      <i class="fa fa-user text-light fa-lg mr-3"></i>Profile</a></li>
                      <li class="nav-item"><a href="createpost" class="nav-link text-white p-3 mb-1 sidebar-link">
                      <i class="fa fa-envelope text-light fa-lg mr-3"></i>create post</a></li>
                      <li class="nav-item"><a href="admin_students" class="nav-link text-white p-3 mb-1 sidebar-link ">
                      <i class="fa fa-shopping-cart text-light fa-lg mr-3"></i>Students</a></li>
                      <li class="nav-item"><a href="lec" class="nav-link text-white p-3 mb-1 sidebar-link">
                      <i class="fa fa-line-chart text-light fa-lg mr-3"></i>lecture</a></li>
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
                                    <a style="color: white;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->username }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out">&nbsp;&nbsp;&nbsp; Sign Out</i>
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



  <div class="container">
      <div class="row">
          <div class="col-md-6"></div>
          <div class="col-md-3">
              <h1 class="text-center text-primary mt-5 ">Posts</h1><hr>
          </div>
          <div class="col-md-3"></div>
      </div>
        <?php foreach ($post as $key => $value): ?>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-7">
              <div class="single-blog mt-3">

                      <span><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <form class="" action="/deletepost/{{$value->id}}" method="post">
                              @csrf
                              <input type="submit" name="Delete" class="dropdown-item" value="Delete">

                            </form>
                            <form class="" action="/showeditpost/{{$value ->id}}" method="post">
                              @csrf
                              <input type="submit" name="Edit" class="dropdown-item" value="edit">

                            </form>

                          </div>
                      </span>
                      <p class="blog-meta "> {{ $value -> by}}<span>{{  $value  -> created_at}}</span> </p>
                      <div class="img-container">
                        <img   src="{{ $value->img}}" alt="server error">
                      </div>
                      <h2>{{  $value  -> title}}</h2>
                      <p class="blog-text"> {{ $value  ->description}} .</p>

              </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
  </div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
