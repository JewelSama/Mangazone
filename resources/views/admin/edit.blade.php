
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/manLogo.png')}}">
  <link rel="icon" type="image/png" href="{{asset('images/manLogo.png')}}">
  <title>
    Mangazone | Edit Manga
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid ps-2 pe-0">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="/">
              Mangazone
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="../pages/dashboard.html">
                    <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                    Dashboard
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="#">
                    <i class="fa fa-user opacity-6 text-dark me-1"></i>
                    Manga
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="#">
                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                    Users
                  </a>
                </li>
                
              </ul>
              <ul class="navbar-nav d-lg-block d-none">
                <li class="nav-item">
                  <a href="#" class="btn btn-sm mb-0 me-1 bg-gradient-dark">Mangazone</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('../assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Edit Manga</h4>
                </div>
                <div class="card-body">
                  <form role="form" method="POST" action="/manga-edit/{{$manga->id}}">
                    @csrf
                    @method('PUT')
                    <label class="form-label">Manga Name</label>
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" name="name" value="{{$manga->name}}" class="form-control">
                    </div>
                    <label class="form-label">Manga Category</label>
                    <div class="input-group input-group-outline mb-3">
                      <select class="form-select" name="category" value="{{$manga->category}}" aria-label="Default select example">
                        <option selected>Action</option>
                        <option value="Slice Of life">Slice Of life</option>
                        <option value="Ecchi">Ecchi</option>
                        <option value="Supernatural">Supernatural</option>
                      </select>
                    </div>
                    <label class="form-label">Price</label>
                    <div class="input-group input-group-outline mb-3">
                      <input type="number" name="price" value="{{$manga->price}}" class="form-control">
                    </div>
                    <label class="form-label">Manga File</label>
                    <div class="input-group input-group-outline mb-3">
                      <input type="file" name="manga_file" >
                      <small>{{$manga->manga_file}}</small>
                    </div>
                    <label class="form-label">Mangaka</label>
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" name="mangaka" value="{{$manga->mangaka}}" class="form-control">
                    </div>
                    <label class="form-label">Manga Cover</label>
                    <div class="input-group input-group-outline ">
                      <input type="file" name="manga_cover">
                      </div>
                      <div class="mb-3">
                        <img class="w-25 h-25 ml-5"
                          src="{{asset('storage/' . $manga->manga_cover)}}" alt="" 
                        />
                      </div>
                    
                    <label class="form-label">Description</label>
                    <div class="input-group input-group-outline mb-3">
                    <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{$manga->description}}</textarea>
                    </div>
                    
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Update</button>
                    </div>
                  </form>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>