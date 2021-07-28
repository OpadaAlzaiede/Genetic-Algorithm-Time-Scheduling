

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="css/admin.css" >

<section>
  <nav class="navbar navbar-expand-md navbar-light">
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
                      <img src="{{$user->img}}" width="50" class="rounded-circle mr-1" alt="">
                      <a href="#" class="text-white">{{$user -> username}}</a>
                   </div>
                   <ul class="navbar-nav flex-column mt-2">
                      <li class="nav-item"><a href="/admin" class="nav-link text-white p-3 mb-1  ">
                      <i class="fa fa-home text-light fa-lg mr-3"></i>Dashboard</a></li>
                      <li class="nav-item"><a href="admin_profile" class="nav-link text-white p-3 mb-1 sidebar-link">
                      <i class="fa fa-user text-light fa-lg mr-3"></i>Profile</a></li>
                      <li class="nav-item"><a href="createpost" class="nav-link text-white p-3 mb-1 sidebar-link">
                      <i class="fa fa-envelope text-light fa-lg mr-3"></i>createpost</a></li>
                      <li class="nav-item"><a href="admin_students" class="nav-link text-white p-3 mb-1 sidebar-link  current">
                      <i class="fa fa-shopping-cart text-light fa-lg mr-3"></i>Students</a></li>
                      <li class="nav-item"><a href="admin_doctors" class="nav-link text-white p-3 mb-1 sidebar-link ">
                      <i class="fa fa-line-chart text-light fa-lg mr-3"></i>Doctors</a></li>
                   </ul>
              </div>
              @extends('layouts.app')

              @section('content')
              </nav>
</section>
</div>
<div class="container mt-5">
  <div class="row">
    <div class=" col-md-3"></div>
    <div class=" col-md-9">
      <h3 class="text-muted text-center mb-2 mt-3S">Student Table</h3>
    </div>
  </div>
</div>
 <hr>
 <div class="container">
   <div class="row">
     <div class="col-2">
     </div>
     <div class="col-10">
     <?php if (count($errors) > 0): ?>
       <div class="alert alert-danger">
         <ul>
           <?php foreach ($errors->all() as $error): ?>
             <li> {{$error}}</li>
           <?php endforeach; ?>
         </ul>
       </div>
     <?php endif; ?>

     <?php if (\Session::has('success')): ?>
       <div class="alert alert-success" style="height: 40px;">
       <ul style="list-style: none;">
        <li>{{ \session ::get('success')}}</li>
       </ul>
       </div>
     <?php endif; ?>
       </div>
     </div>
   </div>
<section>
    <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-10  ">
                        <table class="table  table-striped bg-light text-center" id="myTable">
                            <thead>
                                <tr class="text-muted">
                                    <th >#</th>
                                    <th>img</th>
                                    <th >username</th>
                                    <th >Name</th>
                                    <th >Year</th>
                                    <th >Section</th>
                                    <th >address</th>
                                    <th >college_num</th>
                                    <th >Email</th>
                                    <th >Edit</th>
                                    <th >Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($student as $key => $value) : ?>

                                <tr>
                                    <th scope="row">{{$value->id}}</th>
                                    <th> <img src="{{$value->img}}"style="width:50px ; height:50px;" ></th>
                                    <td>{{$value->username}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->year}}</td>
                                    <td>{{$value->section}}</td>
                                    <td>{{$value->address}}</td>
                                    <td>{{$value->college_num}}</td>
                                    <td>{{$value->email}}</td>
                                    <td><button type="button" class="btn-info btn-sm edit">Edit</button></td>
                                    <td><button href="" type="button" class="btn-danger btn-sm delete">Delete</button>
                                      <!-- start delete modal -->

                                    <div class="modal fade"  id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">delete Student</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">Are you sure !?  </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form action="/deletestudent" method="post" id="deleteform">
                                    @csrf
                                    <input type="submit" value="Confirm" name="btndelete" class="btn btn-danger" />
                                    </form>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                      <!-- end delete modal -->
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
</section>

<div class="container">
    <div class="row mt-2">
        <div class="col-md-6"></div>
        <div class="col-md-2">
          <button type="button"class="btn btn-primary add" data-toggle="modal" data-target="#addmodal" >Add student</button>
          <!-- start add modal -->
          <div class="modal fade" id="addmodal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Add Student</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <form action="/addstudent" method="POST" id="addform">
                      @csrf

                  <div class="modal-body">
                      <div class="form-group">
                          <label for="name">name</label>
                          <input type="text" name="name"  class="form-control" required placeholder="Enter your name">
                      </div>
                      <div class="form-group">
                          <label for="email">email:</label>
                          <input type="email" name="email"  class="form-control" required placeholder="Enter Email">
                      </div>
                      <div class="form-group">
                          <label for="password">password</label>
                          <input type="password" name="password"  class="form-control" required placeholder="Enter password">
                      </div>
                      <div class="form-group">
                          <label for="year">year</label>
                          <input type="text" name="year"  class="form-control" required placeholder="Enter year">
                      </div>
                      <div class="form-group">
                          <label for="section">section</label>
                          <input type="text" name="section"  class="form-control" required placeholder="Enter section">
                      </div>
                      <div class="form-group">
                          <label for="section">college_number</label>
                          <input type="text" name="college_num"  class="form-control" required placeholder="Enter college number">
                      </div>
                  </div>


                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Add Student</button>
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

<!-- start update modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="/editstudent" method="POST" id="editform">
            @csrf

        <div class="modal-body">
            <div class="form-group">
                <label for="username">name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder=" name">
            </div>
            <div class="form-group">
                <label for="year">year</label>
                <input type="text" name="year" id="ye" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label for="section">section</label>
                <input type="text" name="section" id="sec" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label for="section">college_number</label>
                <input type="text" name="college_num" id="num" class="form-control" placeholder="">
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


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready( function () {
$('#myTable').DataTable();
} );
</script>
<script>
    var table = $('#myTable').DataTable();

    table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');
        if($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
                $('#name').val(data[3]);
                $('#ye').val(data[4]);
                $('#sec').val(data[5]);
                $('#num').val(data[7]);

        $('#editform').attr('action', '/editstudent/'+data[0]);
        $('#editmodal').modal('show');
    });


    table.on('click', '.delete', function() {
        $tr = $(this).closest('tr');
        if($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();

        $('#deleteform').attr('action', '/deletestudent/'+data[0]);
        $('#deletemodal').modal('show');
    });


</script>

@stop
