<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/admin.css" >
    <link rel="stylesheet" href="css/student.css" >
    <title>admin</title>
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
                      <li class="nav-item"><a href="admin" class="nav-link text-white p-3 mb-1 ">
                      <i class="fa fa-home text-light fa-lg mr-3"></i>Dashboard</a></li>
                      <li class="nav-item"><a href="admin_profile" class="nav-link text-white p-3 mb-1 sidebar-link">
                      <i class="fa fa-user text-light fa-lg mr-3"></i>Profile</a></li>
                      <li class="nav-item"><a href="createpost" class="nav-link text-white p-3 mb-1 sidebar-link">
                      <i class="fa fa-pencil text-light fa-lg mr-3"></i>create post</a></li>
                      <li class="nav-item"><a href="admin_students" class="nav-link text-white p-3 mb-1 sidebar-link ">
                      <i class="fa fa-user text-light fa-lg mr-3"></i>Students</a></li>
                      <li class="nav-item"><a href="admin_doctors" class="nav-link text-white p-3 mb-1 sidebar-link">
                      <i class="fa fa-line-chart text-light fa-lg mr-3"></i>Doctors</a></li>
                      <li class="nav-item"><a href="time_tables" class="nav-link text-white p-3 mb-1 sidebar-link current">
                      <i class="fa fa-table  text-light fa-lg mr-3"></i>Time Tables</a></li>
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

<!-- holds courses -->
<input type="hidden" value="{{$course}}" id="course"> </input>
<!-- holds docCourse -->
<input type="hidden" value="{{$doc_course}}" id="docCourse"> </input>
<!-- holds doctors -->
<input type="hidden" value="{{$doctors}}" id="doctors"> </input>
<!-- holds rooms -->
<input type="hidden" value="{{$rooms}}" id="rooms"> </input>
<!-- holds libraries -->
<input type="hidden" value="{{$libraries}}" id="libraries"> </input>
<!-- holds meetingTimes -->
<input type="hidden" value="{{$meetingTimes}}" id="meetingTimes"> </input>
<!-- holds practicalMeetingTimes -->
<input type="hidden" value="{{$practicalmeetingTimes}}" id="practicalMeetingTimes"> </input>
<!-- holds Departments -->
<input type="hidden" value="{{$depts}}" id="depts"> </input>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 text-center">
            <button class="btn btn-primary" id="geneBtn">
                Generate Time Tables
            </button>
        </div>
        <div class="col-md-3" >
        
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-3"></div>
        <div class="col-md-6 text-center">
            <button class="btn btn-primary " id="loadData">
                Show Data
            </button>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9" id="data">

            </div>
    </div>
</div>


<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type="module" src="js/essential/Main.js"></script>
</body>
</html>
