<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BC22MLW7ZY"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-BC22MLW7ZY');
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Get your Bid Bond Quote instantly.">
    <meta name="keywords" content="bid bond insurance, bid bond quote">
    <meta name="robots" content="index, follow" />


    <meta property="og:title" content="Bid Bond Quotation">
    <meta property="og:description" content="Get a bid bond quotation instantly in Kenya.">
    <meta property="og:url" content="https://www.imoth.co.ke/covers/bid-bond">
    <meta property="og:type" content="website">
    <title>Last Expense Quotation | Imoth Insurance Brokers, Nairobi, Kenya</title>

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

    <link rel="icon" type="image/png" href={{ asset('frontend/assets/images/favicon/favicon.ico') }} />
    <style>
        .error-danger {
            color: #EA5455;
            font-weight: bold;
        }
    </style>

    <script src={{ asset('frontend/assets/js/jquery.min.js') }}></script>

    <script>
        $(document).ready(function() {
            $('#hasSpouse').click(function() {
                if ($('#hasSpouse').is(':checked')) {
                    $('#spouse-age').show();
                } else {
                    $('#spouse-age').hide();
                }
            });
            $('#hasChildren').click(function() {
                if ($('#hasChildren').is(':checked')) {
                    $('#children-number').show();
                } else {
                    $('#children-number').hide();
                }
            });
            /**Removing Child One**/
            $('#remove-child-one').click(function() {
                $('#hasChildren').trigger('click');
            });

            //Add Child Two
            $('#add-child-two').click(function() {
                $('#child-two-div').show();
                //I have to Hide Buttons to Add Child Two
                $('#child-one-buttons').hide();
            });
            //Remove Child Two
            $('#remove-child-two').click(function() {
                $('#child-two-div').hide();
                $('#child-one-buttons').show();
            });

            //Add Child Three
            $('#add-child-three').click(function() {
                $('#child-three-div').show();
                //I have to Hide Buttons to Add Child Two
                $('#child-two-buttons').hide();
            });
            //Remove Child Three
            $('#remove-child-three').click(function() {
                $('#child-three-div').hide();
                $('#child-two-buttons').show();
            });

            //Add Child Four
            $('#add-child-four').click(function() {
                $('#child-four-div').show();
                //I have to Hide Buttons to Add Child Two
                $('#child-three-buttons').hide();
            });
            //Remove Child Four
            $('#remove-child-four').click(function() {
                $('#child-four-div').hide();
                $('#child-three-buttons').show();
            });

            //Add Child Five
            $('#add-child-five').click(function() {
                $('#child-five-div').show();
                //I have to Hide Buttons to Add Child Two
                $('#child-four-buttons').hide();
            });
            //Remove Child Five
            $('#remove-child-five').click(function() {
                $('#child-five-div').hide();
                $('#child-four-buttons').show();
            });

            //Add Child Six
            $('#add-child-six').click(function() {
                $('#child-six-div').show();
                //I have to Hide Buttons to Add Child Two
                $('#child-five-buttons').hide();
            });
            //Remove Child Five
            $('#remove-child-six').click(function() {
                $('#child-six-div').hide();
                $('#child-five-buttons').show();
            });

            //Has Parents Section
            $('#hasParents').click(function() {
                if ($('#hasParents').is(':checked')) {
                    $('#parents-div').show();
                } else {
                    $('#parents-div').hide();
                }
            });

            //Has Parent's In Law
            $('#hasParentsInLaws').click(function() {
                if ($('#hasParentsInLaws').is(':checked')) {
                    $('#parents-in-law-div').show();
                } else {
                    $('#parents-in-law-div').hide();
                }
            });

        });
    </script>
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


    <div class="page-banner-area blog-page-are">
        <div class="container">
            <div class="single-page-banner-content">
                <h1>Last Expense</h1>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Last Expense</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="contact-us-area pt-100">
        <div class="container">
            <div class="section-title">
                <span class="top-title">Generate Instant Quote</span>
                <h2>Provide Details below to get a Quote</h2>
            </div>
            <div class="row">
                {{--@include('partials.info')--}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="col-lg-6">
                    <div class="single-contact-img">
                        <div class="contact-main-img">
                            <img src={{ asset('frontend/assets/images/contact-us-img-5.webp') }} alt="contact-us">
                        </div>
                        <div class="contact-us-img1" data-cue="zoomIn">
                            <img src={{ asset('frontend/assets/images/contact-us-img-1.webp') }} alt="contact-us">
                        </div>
                        <div class="contact-us-img2" data-cue="rotateIn">
                            <img src={{ asset('frontend/assets/images/contact-us-img-2.webp') }} alt="contact-us">
                        </div>
                        <div class="contact-us-img3" data-cue="zoomIn" data-duration="2000">
                            <img src={{ asset('frontend/assets/images/contact-us-img-3.webp') }} alt="contact-us">
                        </div>
                        <div class="contact-us-img4" data-cue="slideInLeft">
                            <img src={{ asset('frontend/assets/images/contact-us-img-4.webp') }} alt="contact-us">
                        </div>
                        <div class="contact-main-image1s">
                            <img src={{ asset('frontend/assets/images/contact-main-bg-img.webp') }} alt="main">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <form method="post" action="{{ route('front.lastExpense.submit') }}">
                            @csrf
                            <div class="row">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8">
                                        <div class="form-group">
                                            <input type="text" id="principalName" name="principalName"
                                                value="{{ old('principalName') }}" class="form-control"
                                                placeholder="Principal Member Name" required
                                                data-error="Please enter Principal Name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <span class="error-danger">
                                            @error('principalName')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="form-group">
                                            <input type="text" id="principalAge" name="principalAge"
                                                value="{{ old('principalAge') }}" class="form-control"
                                                placeholder="Principal Age" required
                                                data-error="Please enter your Age">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <span class="error-danger">
                                            @error('principalAge')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12" style="padding: 20px">
                                        <div class="form-group">
                                            Do you have a Spouse? <input type="checkbox" id="hasSpouse"
                                                name="hasSpouse" value="yes"
                                                style="width: 20px; height: 20px; margin-left: 10px">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="display: none" id="spouse-age">
                                    <div class="col-lg-8 col-md-8">
                                        <div class="form-group">
                                            <input type="text" id="spouseName" name="spouseName"
                                                value="{{ old('spouseName') }}" class="form-control"
                                                placeholder="Spouse Name" data-error="Please Spouse Name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="form-group">
                                            <input type="text" id="spouseAge" class="form-control"
                                                placeholder="Spouse Age" name="spouseAge"
                                                value="{{ old('spouseAge') }}" data-error="Please enter Spouse Age">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <span class="error-danger">
                                            @error('spouseAge')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-lg-12 col-md-12" style="padding: 20px">
                                        <div class="form-group">
                                            Do you have Children?
                                            <input type="checkbox" id="hasChildren" name="hasChildren"
                                                value="yes" style="width: 20px; height: 20px; margin-left: 10px">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="display: none" id="children-number">
                                    <div class="col-lg-8 col-md-8">
                                        <div class="form-group">
                                            <input type="text" id="childOne" name="childOne"
                                                value="{{ old('childOne') }}" class="form-control"
                                                placeholder="Child One Name" data-error="Enter Child One Name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="form-group">
                                            <input type="text" id="childOneAge" class="form-control"
                                                placeholder="Child One Age" name="childOneAge"
                                                value="{{ old('childOneAge') }}"
                                                data-error="Please enter Child One Age">
                                            <div class="help-block with-errors">
                                                <span class="error-danger">
                                                    @error('childOneAge')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="row" id="child-one-buttons">
                                        <div class="col-lg-6 col-md-6">
                                            <button type="button" class="btn btn-success" id="add-child-two">Add
                                                Child Two</button>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <button type="button" class="btn btn-danger"
                                                id="remove-child-one">Remove Child One</button>
                                        </div>
                                    </div>

                                    {{-- CHILD TWO DIV SECTION --}}
                                    <div class="row" id="child-two-div" style="display: none">
                                        <div class="col-lg-8 col-md-8">
                                            <div class="form-group">
                                                <input type="text" id="childTwo" name="childTwo"
                                                    value="{{ old('childTwo') }}" class="form-control"
                                                    placeholder="Child Two Name" data-error="Enter Child Two Name">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <input type="text" id="childTwoAge" class="form-control"
                                                    placeholder="Child Two Age" name="childTwoAge"
                                                    value="{{ old('childTwoAge') }}"
                                                    data-error="Please enter Child Two Age">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <span class="error-danger">
                                                @error('childTwoAge')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="row" id="child-two-buttons">
                                            <div class="col-lg-6 col-md-6">
                                                <button type="button" class="btn btn-success"
                                                    id="add-child-three">Add Child Three</button>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <button type="button" class="btn btn-danger"
                                                    id="remove-child-two">Remove Child Two</button>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- CHILD THREE DIV SECTION --}}
                                    <div class="row" id="child-three-div" style="display: none">
                                        <div class="col-lg-8 col-md-8">
                                            <div class="form-group">
                                                <input type="text" id="childThree" name="childThree"
                                                    value="{{ old('childThree') }}" class="form-control"
                                                    placeholder="Child Three Name"
                                                    data-error="Enter Child Three Name">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <input type="text" id="childThreeAge" class="form-control"
                                                    placeholder="Child Three Age" name="childThreeAge"
                                                    value="{{ old('childThreeAge') }}"
                                                    data-error="Please enter Child Three Age">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <span class="error-danger">
                                                @error('childThreeAge')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="row" id="child-three-buttons">
                                            <div class="col-lg-6 col-md-6">
                                                <button type="button" class="btn btn-success"
                                                    id="add-child-four">Add Child Four</button>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <button type="button" class="btn btn-danger"
                                                    id="remove-child-three">Remove Child Three</button>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- CHILD FOUR DIV SECTION --}}
                                    <div class="row" id="child-four-div" style="display: none">
                                        <div class="col-lg-8 col-md-8">
                                            <div class="form-group">
                                                <input type="text" id="childFour" name="childFour"
                                                    value="{{ old('childFour') }}" class="form-control"
                                                    placeholder="Child Four Name" data-error="Enter Child Four Name">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <input type="text" id="childFourAge" class="form-control"
                                                    placeholder="Child Four Age" name="childFourAge"
                                                    value="{{ old('childFourAge') }}"
                                                    data-error="Please enter Child Four Age">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <span class="error-danger">
                                                @error('childFourAge')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="row" id="child-four-buttons">
                                            <div class="col-lg-6 col-md-6">
                                                <button type="button" class="btn btn-success"
                                                    id="add-child-five">Add Child FIve</button>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <button type="button" class="btn btn-danger"
                                                    id="remove-child-four">Remove Child Four</button>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- CHILD FIVE DIV SECTION --}}
                                    <div class="row" id="child-five-div" style="display: none">
                                        <div class="col-lg-8 col-md-8">
                                            <div class="form-group">
                                                <input type="text" id="childFive" name="childFive"
                                                    value="{{ old('childFive') }}" class="form-control"
                                                    placeholder="Child Five Name" data-error="Enter Child Five Name">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <input type="text" id="childFiveAge" class="form-control"
                                                    placeholder="Child Five Age" name="childFiveAge"
                                                    value="{{ old('childFiveAge') }}"
                                                    data-error="Please enter Child Five Age">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <span class="error-danger">
                                                @error('childFiveAge')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="row" id="child-five-buttons">
                                            <div class="col-lg-6 col-md-6">
                                                <button type="button" class="btn btn-success" id="add-child-six">Add
                                                    Child Six</button>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <button type="button" class="btn btn-danger"
                                                    id="remove-child-five">Remove Child Five</button>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- CHILD SIX DIV SECTION --}}
                                    <div class="row" id="child-six-div" style="display: none">
                                        <div class="col-lg-8 col-md-8">
                                            <div class="form-group">
                                                <input type="text" id="childSix" name="childSix"
                                                    value="{{ old('childSix') }}" class="form-control"
                                                    placeholder="Child Six Name" data-error="Enter Child Six Name">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <input type="text" id="childSixAge" class="form-control"
                                                    placeholder="Child Five Age" name="childSixAge"
                                                    value="{{ old('childSixAge') }}"
                                                    data-error="Please enter Child Six Age">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <span class="error-danger">
                                                @error('childSixAge')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="row" id="child-six-buttons">
                                            <div class="col-lg-6 col-md-6">
                                                <button type="button" class="btn btn-danger"
                                                    id="remove-child-six">Remove Child Six</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12 col-md-12" style="padding: 20px">
                                        <div class="form-group">
                                            Do you have Parents?
                                            <input type="checkbox" id="hasParents" name="hasParents" value="yes"
                                                style="width: 20px; height: 20px; margin-left: 10px">
                                        </div>
                                    </div>
                                </div>

                                <div id="parents-div" style="display: none">
                                    {{-- Father's Details --}}
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8">
                                            <div class="form-group">
                                                <input type="text" id="fatherName" name="fatherName"
                                                    value="{{ old('fatherName') }}" class="form-control"
                                                    placeholder="Father's Name" data-error="Enter Father's Name">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <input type="text" id="fatherAge" class="form-control"
                                                    placeholder="Father Age" name="fatherAge"
                                                    value="{{ old('fatherAge') }}"
                                                    data-error="Please enter Father's Age">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <span class="error-danger">
                                                @error('fatherAge')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    {{-- Mother's Details --}}
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8">
                                            <div class="form-group">
                                                <input type="text" id="motherName" name="motherName"
                                                    value="{{ old('motherName') }}" class="form-control"
                                                    placeholder="Mother's Name" data-error="Enter Mother's Name">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <input type="text" id="motherAge" class="form-control"
                                                    placeholder="Mother Age" name="motherAge"
                                                    value="{{ old('motherAge') }}"
                                                    data-error="Please enter Mother's Age">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <span class="error-danger">
                                                @error('motherAge')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12 col-md-12" style="padding: 20px">
                                        <div class="form-group">
                                            Do you have Parent in laws?
                                            <input type="checkbox" id="hasParentsInLaws" name="hasParentsInLaws"
                                                value="yes" style="width: 20px; height: 20px; margin-left: 10px">
                                        </div>
                                    </div>
                                </div>

                                <div id="parents-in-law-div" style="display: none">
                                    {{-- Father's Details --}}
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8">
                                            <div class="form-group">
                                                <input type="text" id="fatherInLawName" name="fatherInLawName"
                                                    value="{{ old('fatherInLawName') }}" class="form-control"
                                                    placeholder="Father in Law Name"
                                                    data-error="Enter Father in Law Name">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <input type="text" id="fatherInLawAge" class="form-control"
                                                    placeholder="Father in Law Age" name="fatherInLawAge"
                                                    value="{{ old('fatherInLawAge') }}"
                                                    data-error="Please enter Father in Law Age">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <span class="error-danger">
                                                @error('fatherInLawAge')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    {{-- Mother's Details --}}
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8">
                                            <div class="form-group">
                                                <input type="text" id="motherInLawName" name="motherInLawName"
                                                    value="{{ old('motherInLawName') }}" class="form-control"
                                                    placeholder="Mother in Law Name"
                                                    data-error="Enter Mother in Law Name">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <input type="text" id="motherInLawAge" class="form-control"
                                                    placeholder="Mother in Law Age" name="motherInLawAge"
                                                    value="{{ old('motherInLawAge') }}"
                                                    data-error="Please enter Mother in Law Age">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <span class="error-danger">
                                                @error('motherInLawAge')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-floating mb-4">
                                            <input id="commencementDate" type="date" name="commencementDate"
                                                value="{{ old('commencementDate') }}" class="form-control" required>
                                            <label for="commencementDate">Commencement Date *</label>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input name="gridCheck" style="border:2px solid black;"
                                                    value="I agree to the terms and privacy policy."
                                                    class="form-check-input" type="checkbox" id="gridCheck" required>
                                                <label class="form-check-label" for="gridCheck">
                                                    Accept <a href="{{ asset('frontend/assets/last_expense.pdf') }}"
                                                        target="_blank">Terms Of Services</a> And<a
                                                        href="{{ asset('frontend/assets/Privacy.pdf') }}"
                                                        target="_blank">Privacy Policy</a>
                                                </label>
                                                <div class="help-block with-errors gridCheck-error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn">
                                            Submit Now
                                        </button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



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


</html>
