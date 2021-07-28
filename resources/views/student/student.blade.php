<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/admin.css" >
    <link rel="stylesheet" href="css/student.css" >
    <title>student</title>
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
                   mx-auto text-center py-3 mb-2 bottom-border">Admin Menu</a>
                   <div class="bottom-border pb-1">
                      <img src="{{ $user ->img}}" width="50" class="rounded-circle mr-1" alt="">
                      <a href="#" class="text-white">{{ $user ->username}}</a>
                   </div>
                   <ul class="navbar-nav flex-column mt-2">
                      <li class="nav-item"><a href="student" class="nav-link text-white p-3 mb-1 current">
                      <i class="fa fa-home text-light fa-lg mr-3"></i>Dashboard</a></li>
                      <li class="nav-item"><a href="student_profile" class="nav-link text-white p-3 mb-1 sidebar-link">
                      <i class="fa fa-user text-light fa-lg mr-3"></i>Profile</a></li>
                      <li class="nav-item"><a href="lectuers" class="nav-link text-white p-3 mb-1 sidebar-link ">
                      <i class="fa fa-shopping-cart text-light fa-lg mr-3"></i>Lectures</a></li>
                      
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




        <div class="container">
          <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-9 combine">
                  <div class="container">
                    <div class="row mt-5">
                      <div class="col-md-3">
                            
                      </div>
                      <div class="col-md-3">
                        <span style="font-size: 30px; font-weight:10px; color: blue;">
                          Posts
                      </span>
                      </div>
                      <div class="col-md-3">
      
                      </div>
                      <div class="col-md-3 mt-2">
                        <span>
                          <select name="author" id="author">
                            <option value="all">Show All Posts</option>
                            <?php foreach ($doctor_year as $key => $value): ?>
                              <option value={{$value->name}}>{{$value->name}}</option>
                            <?php endforeach; ?>
                          </select>
                       </span>
                       @csrf
                      </div>
                    </div>
                  </div>
                 
                
              </div>
              <div class="col-md-3">
             
              </div>
          </div>

          <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 sm-4 single-blog" id="post-controller">
                  <?php foreach ($post as $key => $value): ?>
                      
                            <div class="single-blog mt-3" id="single-blog">
                
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
                          
              <?php endforeach; ?>       
                </div>
                <div class="col-md-3"></div>
          </div>
           
      </div>
  
    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
      $('#author').change(function(){
        var author = $(this).val();
        console.log(author);
        $.ajax({
          type: "POST",
          url: '/filterPosts',
          data: {"_token": "{{ csrf_token() }}",author: author},
          success: function(data){
            
            let output = "";
            data = $.parseJSON(data);
            console.log(data.length);
            for(let i = 0; i < data.length; i++) {
              output += "<span>";
              output += "<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> </a>";
              output += "<div class='dropdown-menu' aria-labelledby='navbarDropdown'>";
              output += "<form class='' action='/deletepost/" + data[i].id+" method='post'>";
              //output += @csrf;
              output += "<input type='submit' name='Delete' class='dropdown-item' value='Delete'>";
              output += "</form>";
              output += "<form class='' action='/showeditpost/" + data[i].id + " method='post'>";
              //output += @csrf;
              output += "<input type='submit' name='Edit' class='dropdown-item' value='edit'>";
              output += "</form>";
              output += "</div>";
              output += "</span>";
              output += "<p class='blog-meta '>"+ data[i].by + "<span>" + data[i].created_at +"</span> </p>";
              output += "<div class='img-container'>";
              output += "<img  src=" + data[i].img + " alt='server error'>";
              output += "</div>";
              output += "<h2>" + data[i].title+"</h2>";
              output += "<p class='blog-text'>"+data[i].description+"</p>";
            }

            $('#post-controller').html(output);
          },
          error: function(error) {
            alert("error");
          }
        });
      });
    });
</script>
</body>
</html>





