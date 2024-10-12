
<!doctype html>
<html lang="en">
  <head>
    <title>JobBoard &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link rel="stylesheet" href="{{asset('css/custom-bs.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/line-icons/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/quill.snow.css')}}">
    

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">    
  </head>
  <body id="top">

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
    

<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    

    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6"><a href="index.html">JobBoard</a></div>

          <nav class="mx-auto site-navigation">
            <div class="ml-auto">
              <a href="{{url('post-job')}}" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span
                  class="mr-2 icon-add"></span>Post a Job</a>
              <a href="{{url('index')}}" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                  class="mr-2 icon-lock_outline"></span>Jobs</a>
            </div>
          </nav>


        </div>
      </div>
    </header>





       

    

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        
      </div>
      <div class="col-md-5">
        <div class="bg-white p-4 rounded">
          <h3 class="text-black mb-4">Start a post</h3>
          <form action="{{url('post/store')}}" method="POST" enctype="multipart/form-data">
          @csrf

          <input type="hidden" name="user_id" value="{{ Auth::id()}}">

              @if(session('success'))
              <p class="alert alert-success">
                {{session('success')}}
              </p>
              @endif
              @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                            </ul>
                          </div>
                          @endif
            <div class="form-group">
              <label for="description">Description</label>
              <input type="text" id="description" name="description" class="form-control" required>
            </div>
            
            <div class="form-group">
              <label for="image">Upload Image</label>
              <input type="file" id="image" name="featured_image" class="form-control-file" accept="image/*">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">post</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="site-section d-flex justify-content-center align-items-center" style="min-height: 100vh;">
@foreach ($users as $user)
@foreach ($user->posts as $post)
  <div class="container">
    <div class="row mb-5 justify-content-center">
      <div class="col-md-6 col-lg-4 mb-5 text-center">
        <a href="blog-single.html"><img src="{{asset('images/sq_img_1.jpg')}}" alt="Image" class="img-fluid rounded mb-4"></a>
        <div>April 15, 2019 <span class="mx-2">|</span> <a href="#">{{$user->name}}</a></div>
        <h3><a href="blog-single.html" class="text-black">{{$post->description}}</a></h3>
        <div>April 15, 2019 <span class="mx-2">|</span> <a href="#">2 Comments</a></div>
      </div>
    </div>
  </div>
  @endforeach
  @endforeach
</section>





    
    <footer class="site-footer">

      <a href="#top" class="smoothscroll scroll-top">
        <span class="icon-keyboard_arrow_up"></span>
      </a>

      
    </footer>
  
  </div>

    <!-- SCRIPTS -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('js/stickyfill.min.js')}}"></script>
    <script src="{{asset('js/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
    
    <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/quill.min.js')}}"></script>
    
    
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    
    <script src="{{asset('js/custom.js')}}"></script>
   
   
     
  </body>
</html>