
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
                <div class="site-logo col-6"><a href="{{url('index')}}">JobBoard</a></div>

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
    <section class="section-hero overlay inner-page bg-image" style="background-image: {{url('images/hero_1.jpg')}};" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">{{$job->title}}</h1>

                </div>
            </div>
        </div>
    </section>


    <section class="site-section">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="border p-2 d-inline-block mr-3 rounded">
                            <img src="images/job_logo_5.jpg" alt="Image">
                        </div>
                        <div>
                            <h2>{{$job->title}}</h2>
                            <div>
                                <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span>Puma</span>
                                <span class="m-2"><span class="icon-room mr-2"></span>{{$job->location}}</span>
                                <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary">Full Time</span></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <figure class="mb-5"><img src="images/job_single_img_1.jpg" alt="Image" class="img-fluid rounded"></figure>
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Job Description</h3>
                        <p>
                            {{$job->description}}
                        </p>

                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="bg-light p-3 border rounded mb-4">
                        <h3 class="text-primary mt-3 h5 pl-3 mb-3">Job Application</h3>
                        <form action="{{url('application')}}" method="POST">

                            @csrf

                            <input type="hidden" name="job_id" value="{{ $job->id }}">
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
                                <label for="Name"><strong class="text-black">Name </strong></label>
                                <input name='name' type="text" class="form-control" id="Name" name="Name" >
                            </div>
                            <div class="form-group">
                                <label for="Email"><strong class="text-black">Email </strong></label>
                                <input name='email' type="text" class="form-control" id="Email" name="Email" >
                            </div>

                            <div class="form-group">
                                <label for="experience"><strong class="text-black">Experience </strong></label>
                                <input name='experince' type="text" class="form-control" id="experience" name="experience" >
                            </div>
                            <div class="form-group">
                                <label for="phonenumber"><strong class="text-black">Phone Number </strong></label>
                                <input name='phone_number' type="text" class="form-control" id="phonenumber" name="phone_number" >
                            </div>

                            <div class="form-group">
                                <label for="gender"><strong class="text-black">Gender </strong></label>
                                <input name='gender' type="text" class="form-control" id="gender" name="gender" >
                            </div>

                            <button type="submit" class="btn btn-primary">Apply</button>
                        </form>
                    </div>
                </div>



            </div>

        </div>
</div>
</div>
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

<script src="{{asset('js/bootstrap-select.min.js')}}"></script>

<script src="{{asset('js/custom.js')}}"></script>


</body>
</html>
