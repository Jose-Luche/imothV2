<!DOCTYPE html>
<html lang="en">


<head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BC22MLW7ZY"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-BC22MLW7ZY');
</script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href={{ asset('frontend/assets/css/bootstrap.min.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/animate.min.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/boxicons.min.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/magnific-popup.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/meanmenu.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/odometer.min.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/fancybox.min.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/owl.carousel.min.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/owl.theme.default.min.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/scrollCue.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/navbar.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/footer.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/portfolio-details.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/style.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/dark.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/responsive.css') }}>
    <title>Imoth Insurance Brokers</title>
    <link rel="icon" type="image/png" href={{ asset('frontend/assets/images/favicon/favicon.ico') }} />
    <script src={{ asset('frontend/assets/js/jquery.min.js') }}></script>
</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>


    @include('front.pages.master.header')


    <div class="search-area">
        <div class="container">
            <button type="button" class="close-searchbox">
                <i class='bx bx-x'></i>
            </button>
            <form action="#" class="search-form">
                <div class="form-group">
                    <input type="search" placeholder="Search Here">
                </div>
            </form>
        </div>
    </div>

    <div class="features-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <span class="top-title">Available Bond Covers</span>
                <h2>Select the cover of your choice</h2>
            </div>

            <div class="row">
                @foreach ($covers as $cover)
                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="single-features-card bg-color-2">
                            <div class="features-icon">
                                <img style="width: 120px"
                                    src="{{ asset('upload/company/' . $cover['cover']->company->logo) ?? asset('frontend/assets/images/imoth.jpeg') }}">
                            </div>
                            <h3>{{ $cover['cover']->company->name }}</h3>
                            <p>{{ $cover['cover']->type }} </p>
                            {!! $cover['html'] !!}<br>
                            <a
                            href="{{ route('front.health.details', ['applicationId' => $applicationDetails->id, 'id' => $cover['cover']->id]) }}">
                            <span class="btn btn-outline-info btn-sm d-lg-block col-md-6 text-center text-body">
                                Select Plan <i class="uil uil-location-arrow"></i>
                            </span>
                        </a>
                        </div>
                        
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('.outpatient').click(function(){                
                $('.show-outpatient-selector').hide();
                let opLimit = 0;
                let activateOp = 0;
                let pp_pf = "none";

                if($(this).is(':checked')){
                    $('.show-outpatient-selector').show();
                    /**Using AJAX, Update Different Sections depending on the selected Limit**/
                    $('.outpatient-plan-limits').change(function(){
                        opLimit = $(this).val();  
                        /**Check if PP/PF was selected**/
                        pp_pf = $("input[name='op-type']:checked").val();                   
                        
                        if(opLimit != ""){
                            activateOp = 1;

                            $.ajax({
                                method: 'GET',
                                url: '/covers/health/update-outpatient-premium-details/{{$applicationDetails->id}}/'+activateOp+'/'+opLimit+'/'+pp_pf,
                                success: function(res){                                   
                                    
                                }
                            });
                                                  
                        }                          
                    });                 
                }

                $.ajax({
                    method: 'GET',
                    url: '/covers/health/update-outpatient-premium-details/{{$applicationDetails->id}}/'+activateOp+'/'+opLimit,
                    success: function(res){                                   
                        
                    }
                });
            });

            $('.dental').click(function(){  
                $('.show-dental-selector').hide();   
                let dentalLimit = 0;
                let activateDental = 0;   
                
                if($(this).is(':checked')){
                    $('.show-dental-selector').show();
                    
                    /**Using AJAX, Update Different Sections depending on the selected Limit**/
                    $('.dental-plan-limits').change(function(){
                        dentalLimit = $(this).val();                        
                        if(dentalLimit != ""){
                            activateDental = 1; 
                            
                            $.ajax({
                                method: 'GET',
                                url: '/covers/health/update-dental-premium-details/{{$applicationDetails->id}}/'+activateDental+'/'+dentalLimit,
                                success: function(res){                                   
                                                                    }
                            });
                        }                           
                    });                 
                }

                $.ajax({
                    method: 'GET',
                    url: '/covers/health/update-dental-premium-details/{{$applicationDetails->id}}/'+activateDental+'/'+dentalLimit,
                    success: function(res){                                   
                        
                    }
                });
            });

            $('.optical').click(function(){
                $('.show-optical-selector').hide();
                let opticalLimit = 0;
                let activateOptical = 0;

                if($(this).is(':checked')){
                    $('.show-optical-selector').show();
                    /**Using AJAX, Update Different Sections depending on the selected Limit**/
                    $('.optical-plan-limits').change(function(){
                        opticalLimit = $(this).val();                    
                        if(opticalLimit != ""){
                            activateOptical = 1;

                            $.ajax({
                                method: 'GET',
                                url: '/covers/health/update-optical-premium-details/{{$applicationDetails->id}}/'+activateOptical+'/'+opticalLimit,
                                success: function(res){                                   
                                
                            }
                         });
                                                  
                        }                          
                    });                 
                }

                $.ajax({
                    method: 'GET',
                    url: '/covers/health/update-optical-premium-details/{{$applicationDetails->id}}/'+activateOptical+'/'+opticalLimit,
                    success: function(res){                                   
                        
                    }
                });
            });

            $('.maternity').click(function(){
                $('.show-maternity-selector').hide();
                let maternityLimit = 0;
                let activateMaternity = 0;

                if($(this).is(':checked')){
                    $('.show-maternity-selector').show();
                    /**Using AJAX, Update Different Sections depending on the selected Limit**/
                    $('.maternity-plan-limits').change(function(){
                        maternityLimit = $(this).val();                        
                        if(maternityLimit != ""){
                            activateMaternity = 1;
                            
                            $.ajax({
                                method: 'GET',
                                url: '/covers/health/update-maternity-premium-details/{{$applicationDetails->id}}/'+activateMaternity+'/'+maternityLimit,
                                success: function(res){                                   
                                    
                                }
                            });
                        }                            
                    });                 
                }

                $.ajax({
                    method: 'GET',
                    url: '/covers/health/update-maternity-premium-details/{{$applicationDetails->id}}/'+activateMaternity+'/'+maternityLimit,
                    success: function(res){                                   
                        
                    }
                });
            });

        });
    </script>


    @include('front.layout2.footer')
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src={{ asset('frontend/assets/js/jquery.min.js') }}></script>
    <script src={{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('frontend/assets/js/ajaxchimp.min.js') }}></script>
    <script src={{ asset('frontend/assets/js/form-validator.min.js') }}></script>
    <script src={{ asset('frontend/assets/js/contact-form-script.js') }}></script>
    <script src={{ asset('frontend/assets/js/appear.min.js') }}></script>
    <script src={{ asset('frontend/assets/js/odometer.min.js') }}></script>
    <script src={{ asset('frontend/assets/js/jquery.meanmenu.js') }}></script>
    <script src={{ asset('frontend/assets/js/magnific-popup.min.js') }}></script>
    <script src={{ asset('frontend/assets/js/fancybox.min.js') }}></script>
    <script src={{ asset('frontend/assets/js/owl.carousel.min.js') }}></script>
    <script src={{ asset('frontend/assets/js/scrollCue.min.js') }}></script>
    <script src={{ asset('frontend/assets/js/subscribe-custom.js') }}></script>
    <script src={{ asset('frontend/assets/js/main.js') }}></script>
</body>
@include('front.layout2.tawk-to')

</html>
