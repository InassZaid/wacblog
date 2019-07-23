<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Admin Panel</title>
  <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
  <link rel="stylesheet" href="node_modules/flag-icon-css/css/flag-icon.min.css" />
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class=" container-scroller">
    
    <!-- partial -->
    <div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_sidebar.html -->
        <nav class="bg-white sidebar sidebar-offcanvas" id="sidebar">
          <div class="user-info">
            <img src="{{asset('storage/'.Auth::user()->avatar)}}" alt="" width=100px height=100px>
            <p class="name">{{Auth::user()->name}} {{Auth::user()->lastname}}</p>
            <p class="designation">{{Auth::user()->username}}</p>
            <span class="online"></span> 
            <div>
              <a href="{{route('admin.logout')}}" class="btn btn-outline-danger btn-sm" style="margin : 10px 0px 4px 75px;" > Logout</a>      
            </div>
          </div>
          <ul class="nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('admin.posts.index')}}">
                <img src="{{asset('assets/images/icons/1.png')}}" alt="">
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.posts.views')}}">
                <img src="{{asset('assets/images/icons/2.png')}}" alt="">
                <span class="menu-title">Posts</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('categories')}}">
                <img src="{{asset('assets/images/icons/5.png')}}" alt="">
                <span class="menu-title">Category</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('tags')}}">
                <img src="{{asset('assets/images/icons/4.png')}}" alt="">
                <span class="menu-title">Tag</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.downloads')}}">
                <img src="{{asset('assets/images/icons/005-forms.png')}}" alt="">
                <span class="menu-title">Download</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="{{route('admin.posts.index')}}" aria-expanded="false" aria-controls="sample-pages">
                <img src="{{asset('assets/images/icons/9.png')}}" alt="">
                <span class="menu-title">User Permission<i class="fa fa-sort-down"></i></span>
              </a>
              
                <ul class="collapse nav flex-column sub-menu"  id="sample-pages">
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('admin.user.index')}}">
                        All Admin
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('admin.user.add')}}">
                        Add Admin
                      </a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="{{route('admin.permission')}}">
                        Add Permission
                      </a>
                    </li>
                </ul>
              
            </li>

           
         
        </nav>

        <!-- partial -->
        <!-- <div class="content-wrapper">
          <h3 class="page-heading mb-4">Dashboard</h3>
          <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-danger">
                        <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Visitors</p>
                      <h4 class="bold-text">65,650</h4>
                    </div>
                  </div>
                  <p class="text-muted">
                    <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> 65% lower growth
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-warning">
                        <i class="fa fa-shopping-cart highlight-icon" aria-hidden="true"></i>
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Orders</p>
                      <h4 class="bold-text">656</h4>
                    </div>
                  </div>
                  <p class="text-muted">
                    <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> Product-wise sales
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-success">
                        <i class="fa fa-dollar highlight-icon" aria-hidden="true"></i>
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Revenue</p>
                      <h4 class="bold-text">$65656</h4>
                    </div>
                  </div>
                  <p class="text-muted">
                    <i class="fa fa-calendar mr-1" aria-hidden="true"></i> Weekly Sales
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-primary">
                        <i class="fa fa-twitter highlight-icon" aria-hidden="true"></i>
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Followers</p>
                      <h4 class="bold-text">+62,500</h4>
                    </div>
                  </div>
                  <p class="text-muted">
                    <i class="fa fa-repeat mr-1" aria-hidden="true"></i> Just Updated
                  </p>
                </div>
              </div>
            </div>
          </div> -->
          
                @yield('content')
          
          <!-- <div class="card-deck">
            <div class="card col-lg-12 px-0 mb-4">
              <div class="card-body">
                <h5 class="card-title">Last Billings</h5>
                <div class="table-responsive">
                  <table class="table center-aligned-table">
                    <thead>
                      <tr class="text-primary">
                        <th>Order No</th>
                        <th>Product Name</th>
                        <th>Purchased On</th>
                        <th>Shipping Status</th>
                        <th>Payment Method</th>
                        <th>Payment Status</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="">
                        <td>034</td>
                        <td>Iphone 7</td>
                        <td>12 May 2017</td>
                        <td>Dispatched</td>
                        <td>Credit card</td>
                        <td><label class="badge badge-success">Approved</label></td>
                        <td><a href="#" class="btn btn-outline-success btn-sm">View Order</a></td>
                        <td><a href="#" class="btn btn-outline-warning btn-sm">Cancel</a></td>
                      </tr>
                      <tr class="">
                        <td>035</td>
                        <td>Galaxy S8</td>
                        <td>15 May 2017</td>
                        <td>Dispatched</td>
                        <td>Internet banking</td>
                        <td><label class="badge badge-warning">Pending</label></td>
                        <td><a href="#" class="btn btn-outline-success btn-sm">View Order</a></td>
                        <td><a href="#" class="btn btn-outline-warning btn-sm">Cancel</a></td>
                      </tr>
                      <tr class="">
                        <td>036</td>
                        <td>Amazon Echo</td>
                        <td>17 May 2017</td>
                        <td>Dispatched</td>
                        <td>Credit card</td>
                        <td><label class="badge badge-success">Approved</label></td>
                        <td><a href="#" class="btn btn-outline-success btn-sm">View Order</a></td>
                        <td><a href="#" class="btn btn-outline-warning btn-sm">Cancel</a></td>
                      </tr>
                      <tr class="">
                        <td>037</td>
                        <td>Google Pixel</td>
                        <td>17 May 2017</td>
                        <td>Dispatched</td>
                        <td>Cash on delivery</td>
                        <td><label class="badge badge-danger">Rejected</label></td>
                        <td><a href="#" class="btn btn-outline-success btn-sm">View Order</a></td>
                        <td><a href="#" class="btn btn-outline-warning btn-sm">Cancel</a></td>
                      </tr>
                      <tr class="">
                        <td>038</td>
                        <td>Mac Mini</td>
                        <td>19 May 2017</td>
                        <td>Dispatched</td>
                        <td>Debit card</td>
                        <td><label class="badge badge-success">Approved</label></td>
                        <td><a href="#" class="btn btn-outline-success btn-sm">View Order</a></td>
                        <td><a href="#" class="btn btn-outline-warning btn-sm">Cancel</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div> -->
        </div>
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="float-right">
                <a href="#">Star Admin</a> &copy; 2017
            </span>
          </div>
        </footer>

        <!-- partial -->
      </div>
    </div>

  </div>

  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5NXz9eVnyJOA81wimI8WYE08kW_JMe8g&callback=initMap" async defer></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/chart.js"></script>
  <script src="js/maps.js"></script>
</body>

</html>
