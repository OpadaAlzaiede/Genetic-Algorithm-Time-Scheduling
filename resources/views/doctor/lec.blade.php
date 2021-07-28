<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/admin.css" >
    <link rel="stylesheet" href="css/student.css" >
    <title>doctor</title>
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
                   mx-auto text-center py-3 mb-2 bottom-border">doctor Menu</a>
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
                      <li class="nav-item"><a href="lecturs" class="nav-link text-white p-3 mb-1 sidebar-link">
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


  <section>
      <div class="container-fluid">
          <div class="row">
              <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                  <div class="row">
                   <div class="col-md-2"></div>
                      <div class="col-xl-12 col-md-8 mt-5">
                          <h3 class="text-muted text-center mb-3 ">Lecture Table</h3>
                          <table class="table table-dark table-hover text-center">
                              <thead>
                                  <tr class="text-muted">
                                      <th>#</th>
                                      <th>lecture_name</th>

                                      <th>lecture_year</th>
                                      <th>Section</th>
                                      <th>type</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($lec as $key => $value): ?>
                                  <tr>
                                      <th>{{$value ->id}}</th>
                                      <td>{{$value ->lecture}}</td>

                                      <td>{{ $value ->lecture_year}}</td>
                                      <td>{{ $value ->pdf}}</td>
                                      <td>{{ $value ->type}}</td>
                                      <td>
                                        <button type="button" class="btn-danger btn-lg"><i class="fa fa-trash"></i> </button>
                                        <button type="button" class="btn-success btn-lg"> <i class="fa fa-edit "></i> </button>
                                        <a href="{{route('download', $value->id)}}"><button type="button" class="btn-info btn-lg"> <i class="fa fa-download"></i> </button></a>
                                      </td>
                                  </tr>
                                <?php endforeach; ?>
                              </tbody>
                          </table>
                      </div>
                      <div class="col-md-2"></div>
                  </div>
              </div>
              

          </div>
      </div>
  </section>
  <div class="container">
      <div class="row">
          <div class="col-md-6"></div>
          <div class="col-md-3">
            {{ $lec->links() }}
          </div>
          <div class="col-md-3"></div>
      </div>
  </div>
  


  <div class="container">
      <div class="row mt-2">
          <div class="col-md-6"></div>
          <div class="col-md-2">
            <button type="button"class="btn btn-primary add" data-toggle="modal" data-target="#addmodal" >Add Lecture</button>
            <!-- start add modal -->
            <div class="modal fade" id="addmodal" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Add Lecture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <form action="/addpdf" method="POST" id="addform" enctype="multipart/form-data" >
                        @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="lecture_name">lecture_name</label>
                            <input type="text" name="lecture_name" class="form-control" required placeholder="Enter Lecture name">
                        </div>
                        <div class="form-group">
                            <label for="subjectName">subject name</label>
                            <input type="text" name="subjectName" class="form-control" required placeholder="Enter subject name">
                        </div>
                        <div class="form-group">
                            <label for="lecture_year">lecture_year:</label><br>
                              <select id="year" class="form-control" name="year">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                              </select>
                        </div>
                        <div class="form-group">
                            <label for="type">type</label>
                            <select id="type" class="form-control" name="type">
                              <option value="1">1</option>
                              <option value="2">2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="uploadfile">upload file</label>
                            <input type="file" name="uploadfile" class="form-control">
                        </div>
                    </div>



                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Lecture</button>
                  </div>
                    </form>
                </div>
              </div>
              <!-- end add modal -->
          </div>
          <div class="col-md-4"></div>
      </div>
  </div>
  </div>






<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
