@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/admin.css" >
<link rel="stylesheet" href="css/student.css" >
<nav class="navbar navbar-expand-md navbar-light p-3">
    <button class="navbar-toggler ml-auto mb-2 bg-blue pt-3" type="button" data-toggle="collapse" data-target="#navbarResponsive">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse bg-secondary" id="navbarResponsive">
      <div class="container">
          <div class="row">
            <div class="col-3">

            </div>
            <div class="col-xl-2 col-lg-3 col-md-4  pl-1 ">
                   <ul class="navbar-nav   mt-1  pt-3  ">
                      <li class="nav-item pr-3"><a href="student" class="nav-link text-white d-flex p-3 mb-1 ">
                      <i class="fa fa-home text-light fa-lg mr-3"></i>Main</a></li>
                      <li class="nav-item pr-3"><a href="student_profile" class="nav-link text-white d-flex p-3 mb-1 sidebar-link current">
                      <i class="fa fa-user text-light fa-lg mr-3"></i>Profile</a></li>
                      <li class="nav-item pr-3"><a href="student_year" class="nav-link text-white d-flex p-3 mb-1 sidebar-link">
                      <i class="fa fa-info-circle text-light fa-lg mr-3"></i><span>YearInfo</span></a></li>
                      <li class="nav-item pr-3"><a href="#" class="nav-link text-white d-flex p-3 mb-1 sidebar-link">
                      <i class="fa fa-book text-light fa-lg mr-3"></i>Lectures</a></li>
                      <li class="nav-item pr-3"><a href="#" class="nav-link text-white d-flex p-3 mb-1 sidebar-link">
                      <i class="fa fa-star text-light fa-lg mr-3"></i>MyMarks</a></li>
                      <li class="nav-item pr-3"><a href="#" class="nav-link text-white d-flex p-3 mb-1 sidebar-link">
                      <i class="fa fa-calendar text-light fa-lg mr-3"></i>Schedule</a></li>
                  </ul>
          </div>
          </div>
      </div>
    </div>
  </nav>

<div class="container">
  <div class="row">
    <div class="col-md-3 ">   </div>
    <div class="col-md-3  p-5">
      <div class=" ">
        <img src="{{ $user ->img}}"  style="width:150px; hight:150px; border-radius:50%;" class="rounded-circle ">
        <form action="/editphoto/{{$user -> id}}" method="post" enctype="multipart/form-data">
            @csrf
            <h5 style="color:black;" class="mt-2">Update Profile Photo:</h5>
          <input type="file" name="uploadimage" class="mt-2">
          <input type="submit" name="sub" class="btn btn-sm btn-primary mt-2 ml-5">
        </form>
      </div>
    </div>
    <div class="col-md-6 p-5 ">
      <div class="">    <h1>{{ $user ->username}}</h1>  </div>
      <div class="">
        <div> <span> email: {{ $user ->email}}</span>  </div>
        <div> <span> address: {{ $user ->address}}</span>  </div>
        <div> <span> phone-number: {{ $user ->phonenumber}}</span>  </div>
        <div> <span> year: {{ $user ->year}}</span>  </div>
      </div>
    </div>

  </div>

</div>
<hr>
<div class="container">
  <div class="row">
    <div class="col-md-5">

    </div>
    <div class="col-md-7">
        <button type="button" name="edit" class="btn btn-primary" data-toggle="modal" data-target="#editmodal{{$user ->id}}">edit profile info</button>

        <div class="modal fade" id="editmodal{{$user ->id}}" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <form action="/editprofile/{{ $user ->id }}" method="POST" >
                    @csrf

                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">username</label>
                        <input type="text" name="username"  class="form-control" value="{{$user ->username}}">
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" name="email"  class="form-control" value="{{$user ->email}}">
                    </div>
                    <div class="form-group">
                        <label for="address">adress</label>
                        <input type="text" name="address"  class="form-control" value="{{$user ->address}}">
                    </div>
                    <div class="form-group">
                        <label for="phonenumber">phonenumber</label>
                        <input type="text" name="phonenumber"  class="form-control" value="{{$user ->phonenumber}}">
                    </div>

                </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
                </form>
            </div>
          </div>
          <!-- end update modal -->

    </div>

  </div>


</div>

@endsection
