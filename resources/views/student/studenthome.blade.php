<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/admin.css" >
    <link rel="stylesheet" href="css/student.css" >
    <title>Student</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light">
  <button class="navbar-toggler ml-auto mb-2 bg-blu pt-3" type="button" data-toggle="collapse" data-target="#navbarResponsive">
  <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top mr-5">
                <a href="#" class="navbar-brand text-white d-block
                 mx-auto text-center py-3 mb-2 bottom-border">Student Menu</a>
                 <div class="bottom-border pb-1">
                    <img src="Admin.png" width="50" class="rounded-circle mr-1" alt="">
                    <a href="#" class="text-white">Obada Al-Zaiede</a>
                 </div>
                 <ul class="navbar-nav flex-column mt-2">
                    <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-1 current">
                    <i class="fa fa-home text-light fa-lg mr-3"></i>Main</a></li>
                    <li class="nav-item"><a href="student_profile" class="nav-link text-white p-3 mb-1 sidebar-link">
                    <i class="fa fa-user text-light fa-lg mr-3"></i>Profile</a></li>
                    <li class="nav-item"><a href="student_year" class="nav-link text-white p-3 mb-1 sidebar-link">
                    <i class="fa fa-info-circle text-light fa-lg mr-3"></i>Year Info</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-1 sidebar-link">
                    <i class="fa fa-book text-light fa-lg mr-3"></i>Lectures</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-1 sidebar-link">
                    <i class="fa fa-star text-light fa-lg mr-3"></i>My Marks</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-1 sidebar-link">
                    <i class="fa fa-calendar text-light fa-lg mr-3"></i>Schedule</a></li>
                </ul>
            </div>
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto bg-dark fixed-top py-2 top-navbar ">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <h4 class="text-light text-uppercase mb-0">Dashboard</h4>
                    </div>
                    <div class="col-md-5">
                        <form >
                            <div class="input-group">
                                <input type="text" class="form-control search-input" placeholder="search..">
                                <button type="button" class="btn btn-white search-button"><i class="fa fa-search text-danger"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <ul class="navbar-nav">
                            <li class="nav-item icon-parent"><a href="#" class="nav-link icon-bullet"><i class="fa fa-comments text-muted fa-lg"></i></a></li>
                            <li class="nav-item icon-parent"><a href="#" class="nav-link icon-bullet"><i class="fa fa-bell text-muted fa-lg"></i></a></li>
                            <li class="nav-item ml-md-auto" ><a href="#" class="nav-link " data-toggle="modal" data-target="#sign-out"><i class="fa fa-sign-out text-danger fa-lg"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</nav>

<div class="row" style="width:100%; height:20px"></div>
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

<div class="container">

    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-4">
            <h1 class="text-center mt-5 ">Posts</h1><hr>
        </div>
        <div class="col-md-3"></div>

    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-6">
            <div class="single-blog mt-3" style="">
                    <p class="blog-meta ">By Admin <span>Septemper 24,2,2018</span> </p>
                    <img src="se.jpg" alt="">
                    <h2>About Search Algorithms</h2>
                    <p class="blog-text">Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print,
                    graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is
                    thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.</p>
                    <p><a href="" class="read-more-btn">Read More</a>
                        <span><i class="fa fa-thumbs-o-up"></i>7 people liked this, <i class="fa fa-comment-o"></i>3..</span>
                    </p>
            </div>
        </div>
    </div>
</div>








<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
