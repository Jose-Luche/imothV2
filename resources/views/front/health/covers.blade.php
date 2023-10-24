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
                <span class="top-title">Available Health Insurance Covers</span>
                <h2>Select the cover of your choice</h2>
            </div>

            <div class="row">
                @foreach ($covers as $cover)
                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="single-features-card bg-color-2 my-available-limits-division">
                            <div class="features-icon">
                                <img style="width: 120px"
                                    src="{{ asset('upload/company/' . $cover['cover']->company->logo) ?? asset('frontend/assets/images/imoth.jpg') }}">
                            </div>
                            <h3>{{ $cover['cover']->company->name }}</h3>
                            <p>{{ $cover['cover']->type }} </p>
                            {!! $cover['html'] !!}<br>
                            <span class="btn btn-outline-info btn-sm d-lg-block col-md-6 text-center text-body selected-plan-limit">
                                Select Plan <i class="uil uil-location-arrow"></i>
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            /**Anytime a User Clicks the Select Plan option, we should be ready to go to the Database and change a few entries**/
            $('.selected-plan-limit').click(function (){
                let applicationId = {{$applicationDetails->id}};
                let limitId = $(this).closest('.my-available-limits-division').find('.limitId').val();

                let currentPrincipalInpatientPremium = $(this).closest('.my-available-limits-division').find('.principal-premium').val() || 0;
                let currentSpouseInpatientPremium = $(this).closest('.my-available-limits-division').find('.spouse-premium').val() || 0;
                let currentChildrenInpatientPremium = $(this).closest('.my-available-limits-division').find('.children-premium').val() || 0;

                let currentSelectedOutpatient = $(this).closest('.my-available-limits-division').find('.outpatient-premium').val() || 0;
                let currentSelectedDental = $(this).closest('.my-available-limits-division').find('.dental-premium').val() || 0;
                let currentSelectedOptical = $(this).closest('.my-available-limits-division').find('.optical-premium').val() || 0;
                let currentSelectedMaternity = $(this).closest('.my-available-limits-division').find('.maternity-premium').val() || 0;

                let inpatientBasicPremium = parseFloat(currentPrincipalInpatientPremium) + parseFloat(currentSpouseInpatientPremium) + parseFloat(currentChildrenInpatientPremium);
                let otherBenefitsBasicPremium = parseFloat(currentSelectedOutpatient) + parseFloat(currentSelectedDental) + parseFloat(currentSelectedOptical)  + parseFloat(currentSelectedMaternity);
                /**Since there is a change in OutPatient Premium, it means that the total Basic Premium will change in Value**/
                let totalBasic = inpatientBasicPremium + otherBenefitsBasicPremium;

                /**Now we need to get our Taxes as per what has been selected**/
                let PHCF = parseFloat($(this).closest('.my-available-limits-division').find('.PHCF-premium').val());
                let ITL = parseFloat($(this).closest('.my-available-limits-division').find('.ITL-premium').val());
                let stampDuty = parseFloat($(this).closest('.my-available-limits-division').find('.stamp-duty').val());

                /**We need to send to the Database the Above Premiums**/
                $.ajax({
                    method: 'GET',
                    url: '/covers/health/update-my-application/'+applicationId+'/'+limitId+'/'+inpatientBasicPremium+'/'+currentSelectedOutpatient+'/'+currentSelectedDental+'/'+currentSelectedOptical+'/'+currentSelectedMaternity,
                    success: function(res){
                        if(res == 'error'){
                            alert('There was an error trying to Select a Cover');
                        }else{
                            window.location = '/covers/health/details/'+res;
                        }
                    }
                });
            });

            $('.outpatient').click(function(){
                $(this).closest('.my-premiums-section').find('.show-outpatient-selector').hide();
                let opLimit = 0;
                let activateOp = 0;
                let pp_pf = "pf";
                let currentSelectedOutpatient = $(this).closest('.my-premiums-section').find('.outpatient-premium');

                if($(this).is(':checked')){
                    $(this).closest('.my-premiums-section').find('.show-outpatient-selector').show();

                    /**At this Point, we will make the current Radio Button checked for as a PP option**/
                    $(this).closest('.my-premiums-section').find('.pp').attr('checked', true);
                    /**Using AJAX, Update Different Sections depending on the selected Limit**/
                    $('.outpatient-plan-limits').change(function(){
                        let insurerId = $(this).closest('.other-optional-benefits').find('.insurerId').val(); //Pass this ID to the route for premium Computations

                        opLimit = $(this).val();
                        /**Check if PP/PF was selected**/
                        pp_pf = $("input[name='op-type']:checked").val();
                        if(opLimit != ""){
                            activateOp = 1;
                            $.ajax({
                                method: 'GET',
                                url: '/covers/health/update-outpatient-premium-details/{{$applicationDetails->id}}/'+activateOp+'/'+opLimit+'/'+pp_pf+'/'+insurerId,
                                success: function(res){
                                    /**I want this to return the Outpatient Premium Amount**/
                                    currentSelectedOutpatient.val(res).trigger('change');
                                }
                            });

                        }
                    });
                }else{
                    $.ajax({
                        method: 'GET',
                        url: '/covers/health/update-outpatient-premium-details/{{$applicationDetails->id}}/'+activateOp+'/'+opLimit+'/'+pp_pf,
                        success: function(res){
                            currentSelectedOutpatient.val(res).trigger('change');
                        }
                    });
                }
            });
            /**Anytime there is change on the Outpatient Entry, we need to update the Total Basic Premium **/
            $('.outpatient-premium').change(function (){
                let currentPrincipalInpatientPremium = $(this).closest('.my-premiums-section').find('.principal-premium').val() || 0;
                let currentSpouseInpatientPremium = $(this).closest('.my-premiums-section').find('.spouse-premium').val() || 0;
                let currentChildrenInpatientPremium = $(this).closest('.my-premiums-section').find('.children-premium').val() || 0;
                let inpatientBasicPremium = parseFloat(currentPrincipalInpatientPremium) + parseFloat(currentSpouseInpatientPremium) + parseFloat(currentChildrenInpatientPremium);
                let currentSelectedOutpatient = $(this).val(); //The Outpatient Value has changed
                /**Since there is a change in OutPatient Premium, it means that the total Basic Premium will change in Value**/
                let totalBasic = inpatientBasicPremium + parseFloat(currentSelectedOutpatient);

                /**Since We depend on other benefits Like Optical, Dental and Maternity, get their values**/
                let currentSelectedDental = $(this).closest('.my-premiums-section').find('.dental-premium').val() || 0;
                let currentSelectedOptical = $(this).closest('.my-premiums-section').find('.optical-premium').val() || 0;
                let currentSelectedMaternity = $(this).closest('.my-premiums-section').find('.maternity-premium').val() || 0;

                /**Update the Current Total Premium**/
                totalBasic = totalBasic + parseFloat(currentSelectedDental) + parseFloat(currentSelectedOptical) + parseFloat(currentSelectedMaternity);

                /**Update the Basic Premium Value**/
                $(this).closest('.my-premiums-section').find('.total-basic-premium').val(totalBasic).trigger('change');

                /**At the Same Time, since the Basic Premium Amount has changed, we can update the PHCF Premium for the Current DIV**/
                let CurrentTotalBasicPremium = $(this).closest('.my-premiums-section').find('.total-basic-premium').val();
                let PHCF = 0.25/100*CurrentTotalBasicPremium ;
                let ITL = 0.2/100*CurrentTotalBasicPremium;
                let stampDuty = $(this).closest('.my-premiums-section').find('.stamp-duty').val() || 0;

                /**Update Levies Section**/
                $(this).closest('.my-premiums-section').find('.PHCF-premium').val(round2Fixed(PHCF)).trigger('change');
                $(this).closest('.my-premiums-section').find('.ITL-premium').val(round2Fixed(ITL)).trigger('change');

                /**Once the above entries have been Updated, this automatically changes the Total Premium Payable Value**/
                let totalPremiumPayable = parseFloat(CurrentTotalBasicPremium) + PHCF + ITL + parseFloat(stampDuty);

                /**Display this New Premium adn the Premium Payable**/
                $(this).closest('.my-premiums-section').find('.total-premium').html(round2Fixed(totalPremiumPayable).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")).css('font-weight', 'bold');

            });

            $('.dental').click(function(){
                $(this).closest('.my-premiums-section').find('.show-dental-selector').hide();
                let dentalLimit = 0;
                let activateDental = 0;
                let currentSelectedDental = $(this).closest('.my-premiums-section').find('.dental-premium');

                if($(this).is(':checked')){
                    $(this).closest('.my-premiums-section').find('.show-dental-selector').show();
                    /**Using AJAX, Update Different Sections depending on the selected Limit**/
                    $('.dental-plan-limits').change(function(){
                        let insurerId = $(this).closest('.other-optional-benefits').find('.insurerId').val(); //Pass this ID to the route for premium Computations
                        dentalLimit = $(this).val();
                        if(dentalLimit != ""){
                            activateDental = 1;

                            $.ajax({
                                method: 'GET',
                                url: '/covers/health/update-dental-premium-details/{{$applicationDetails->id}}/'+activateDental+'/'+dentalLimit+'/'+insurerId,
                                success: function(res){
                                    currentSelectedDental.val(res).trigger('change');
                                }
                            });
                        }
                    });
                }else{
                    $.ajax({
                        method: 'GET',
                        url: '/covers/health/update-dental-premium-details/{{$applicationDetails->id}}/'+activateDental+'/'+dentalLimit,
                        success: function(res){
                            currentSelectedDental.val(res).trigger('change');
                        }
                    });
                }
            });

            /**Anytime there is change on the Dental Limit Entry, we need to update the Total Basic Premium **/
            $('.dental-premium').change(function (){
                let currentPrincipalInpatientPremium = $(this).closest('.my-premiums-section').find('.principal-premium').val() || 0;
                let currentSpouseInpatientPremium = $(this).closest('.my-premiums-section').find('.spouse-premium').val() || 0;
                let currentChildrenInpatientPremium = $(this).closest('.my-premiums-section').find('.children-premium').val() || 0;
                let inpatientBasicPremium = parseFloat(currentPrincipalInpatientPremium) + parseFloat(currentSpouseInpatientPremium) + parseFloat(currentChildrenInpatientPremium);
                let currentSelectedDental = $(this).val(); //The Dental Value has changed
                /**Since there is a change in Dental Premium, it means that the total Basic Premium will change in Value**/
                let totalBasic = inpatientBasicPremium + parseFloat(currentSelectedDental);

                /**Since We depend on other benefits Like Optical, Maternity and Outpatient, get their values**/
                let currentSelectedOutpatient = $(this).closest('.my-premiums-section').find('.outpatient-premium').val() || 0;
                let currentSelectedOptical = $(this).closest('.my-premiums-section').find('.optical-premium').val() || 0;
                let currentSelectedMaternity = $(this).closest('.my-premiums-section').find('.dmaternity-premium').val() || 0;

                /**Update the Current Total Premium**/
                totalBasic = totalBasic + parseFloat(currentSelectedOutpatient) + parseFloat(currentSelectedOptical) + parseFloat(currentSelectedMaternity);

                /**Update the Basic Premium Value**/
                $(this).closest('.my-premiums-section').find('.total-basic-premium').val(totalBasic).trigger('change');

                /**At the Same Time, since the Basic Premium Amount has changed, we can update the PHCF Premium for the Current DIV**/
                let CurrentTotalBasicPremium = $(this).closest('.my-premiums-section').find('.total-basic-premium').val();
                let PHCF = 0.25/100*CurrentTotalBasicPremium ;
                let ITL = 0.2/100*CurrentTotalBasicPremium;
                let stampDuty = $(this).closest('.my-premiums-section').find('.stamp-duty').val() || 0;

                /**Update Levies Section**/
                $(this).closest('.my-premiums-section').find('.PHCF-premium').val(round2Fixed(PHCF)).trigger('change');
                $(this).closest('.my-premiums-section').find('.ITL-premium').val(round2Fixed(ITL)).trigger('change');

                /**Once the above entries have been Updated, this automatically changes the Total Premium Payable Value**/
                let totalPremiumPayable = parseFloat(CurrentTotalBasicPremium) + PHCF + ITL + parseFloat(stampDuty);

                /**Display this New Premium adn the Premium Payable**/
                $(this).closest('.my-premiums-section').find('.total-premium').html(round2Fixed(totalPremiumPayable).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")).css('font-weight', 'bold');
            });

            $('.optical').click(function(){
                $(this).closest('.my-premiums-section').find('.show-optical-selector').hide();
                let opticalLimit = 0;
                let activateOptical = 0;
                let currentSelectedOptical = $(this).closest('.my-premiums-section').find('.optical-premium');

                if($(this).is(':checked')){
                    $(this).closest('.my-premiums-section').find('.show-optical-selector').show();
                    /**Using AJAX, Update Different Sections depending on the selected Limit**/
                    $('.optical-plan-limits').change(function(){
                        let insurerId = $(this).closest('.other-optional-benefits').find('.insurerId').val(); //Pass this ID to the route for premium Computations
                        opticalLimit = $(this).val();
                        if(opticalLimit != ""){
                            activateOptical = 1;

                            $.ajax({
                                method: 'GET',
                                url: '/covers/health/update-optical-premium-details/{{$applicationDetails->id}}/'+activateOptical+'/'+opticalLimit+'/'+insurerId,
                                success: function(res){
                                    currentSelectedOptical.val(res).trigger('change');
                                }
                         });

                        }
                    });
                }else{
                    $.ajax({
                        method: 'GET',
                        url: '/covers/health/update-optical-premium-details/{{$applicationDetails->id}}/'+activateOptical+'/'+opticalLimit,
                        success: function(res){
                            currentSelectedOptical.val(res).trigger('change');
                        }
                    });
                }
            });

            /**Anytime there is change on the Optical Limit Entry, we need to update the Total Basic Premium **/
            $('.optical-premium').change(function (){
                let currentPrincipalInpatientPremium = $(this).closest('.my-premiums-section').find('.principal-premium').val() || 0;
                let currentSpouseInpatientPremium = $(this).closest('.my-premiums-section').find('.spouse-premium').val() || 0;
                let currentChildrenInpatientPremium = $(this).closest('.my-premiums-section').find('.children-premium').val() || 0;
                let inpatientBasicPremium = parseFloat(currentPrincipalInpatientPremium) + parseFloat(currentSpouseInpatientPremium) + parseFloat(currentChildrenInpatientPremium);
                let currentSelectedOptical = $(this).val(); //The Dental Value has changed
                /**Since there is a change in Optical Premium, it means that the total Basic Premium will change in Value**/
                let totalBasic = inpatientBasicPremium + parseFloat(currentSelectedOptical);

                /**Since We depend on other benefits Like Maternity, Dental and Outpatient, get their values**/
                let currentSelectedOutpatient = $(this).closest('.my-premiums-section').find('.outpatient-premium').val() || 0;
                let currentSelectedDental = $(this).closest('.my-premiums-section').find('.dental-premium').val() || 0;
                let currentSelectedMaternity = $(this).closest('.my-premiums-section').find('.dmaternity-premium').val() || 0;

                /**Update the Current Total Premium**/
                totalBasic = totalBasic + parseFloat(currentSelectedOutpatient) + parseFloat(currentSelectedDental) + parseFloat(currentSelectedMaternity);

                /**Update the Basic Premium Value**/
                $(this).closest('.my-premiums-section').find('.total-basic-premium').val(totalBasic).trigger('change');

                /**At the Same Time, since the Basic Premium Amount has changed, we can update the PHCF Premium for the Current DIV**/
                let CurrentTotalBasicPremium = $(this).closest('.my-premiums-section').find('.total-basic-premium').val();
                let PHCF = 0.25/100*CurrentTotalBasicPremium ;
                let ITL = 0.2/100*CurrentTotalBasicPremium;
                let stampDuty = $(this).closest('.my-premiums-section').find('.stamp-duty').val() || 0;

                /**Update Levies Section**/
                $(this).closest('.my-premiums-section').find('.PHCF-premium').val(round2Fixed(PHCF)).trigger('change');
                $(this).closest('.my-premiums-section').find('.ITL-premium').val(round2Fixed(ITL)).trigger('change');

                /**Once the above entries have been Updated, this automatically changes the Total Premium Payable Value**/
                let totalPremiumPayable = parseFloat(CurrentTotalBasicPremium) + PHCF + ITL + parseFloat(stampDuty);

                /**Display this New Premium adn the Premium Payable**/
                $(this).closest('.my-premiums-section').find('.total-premium').html(round2Fixed(totalPremiumPayable).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")).css('font-weight', 'bold');
            });

            $('.maternity').click(function(){
                $(this).closest('.my-premiums-section').find('.show-maternity-selector').hide();
                let maternityLimit = 0;
                let activateMaternity = 0;
                let currentSelectedMaternity = $(this).closest('.my-premiums-section').find('.maternity-premium');

                if($(this).is(':checked')){
                    $(this).closest('.my-premiums-section').find('.show-maternity-selector').show();
                    /**Using AJAX, Update Different Sections depending on the selected Limit**/
                    $('.maternity-plan-limits').change(function(){
                        let insurerId = $(this).closest('.other-optional-benefits').find('.insurerId').val(); //Pass this ID to the route for premium Computations
                        maternityLimit = $(this).val();
                        if(maternityLimit != ""){
                            activateMaternity = 1;

                            $.ajax({
                                method: 'GET',
                                url: '/covers/health/update-maternity-premium-details/{{$applicationDetails->id}}/'+activateMaternity+'/'+maternityLimit+'/'+insurerId,
                                success: function(res){
                                    currentSelectedMaternity.val(res).trigger('change');
                                }
                            });
                        }
                    });
                }else{
                    $.ajax({
                        method: 'GET',
                        url: '/covers/health/update-maternity-premium-details/{{$applicationDetails->id}}/'+activateMaternity+'/'+maternityLimit,
                        success: function(res){
                            currentSelectedMaternity.val(res).trigger('change');
                        }
                    });
                }
            });
            /**Anytime there is change on the Maternity Limit Entry, we need to update the Total Basic Premium **/
            $('.maternity-premium').change(function (){
                let currentPrincipalInpatientPremium = $(this).closest('.my-premiums-section').find('.principal-premium').val() || 0;
                let currentSpouseInpatientPremium = $(this).closest('.my-premiums-section').find('.spouse-premium').val() || 0;
                let currentChildrenInpatientPremium = $(this).closest('.my-premiums-section').find('.children-premium').val() || 0;
                let inpatientBasicPremium = parseFloat(currentPrincipalInpatientPremium) + parseFloat(currentSpouseInpatientPremium) + parseFloat(currentChildrenInpatientPremium);
                let currentSelectedMaternity = $(this).val(); //The Maternity Value has changed
                /**Since there is a change in Maternity Premium, it means that the total Basic Premium will change in Value**/
                let totalBasic = inpatientBasicPremium + parseFloat(currentSelectedMaternity);

                /**Since We depend on other benefits Like Optical, Dental and Outpatient, get their values**/
                let currentSelectedOutpatient = $(this).closest('.my-premiums-section').find('.outpatient-premium').val() || 0;
                let currentSelectedDental = $(this).closest('.my-premiums-section').find('.dental-premium').val() || 0;
                let currentSelectedOptical = $(this).closest('.my-premiums-section').find('.dmaternity-premium').val() || 0;

                /**Update the Current Total Premium**/
                totalBasic = totalBasic + parseFloat(currentSelectedOutpatient) + parseFloat(currentSelectedDental) + parseFloat(currentSelectedOptical);

                /**Update the Basic Premium Value**/
                $(this).closest('.my-premiums-section').find('.total-basic-premium').val(totalBasic).trigger('change');

                /**At the Same Time, since the Basic Premium Amount has changed, we can update the PHCF Premium for the Current DIV**/
                let CurrentTotalBasicPremium = $(this).closest('.my-premiums-section').find('.total-basic-premium').val();
                let PHCF = 0.25/100*CurrentTotalBasicPremium ;
                let ITL = 0.2/100*CurrentTotalBasicPremium;
                let stampDuty = $(this).closest('.my-premiums-section').find('.stamp-duty').val() || 0;

                /**Update Levies Section**/
                $(this).closest('.my-premiums-section').find('.PHCF-premium').val(round2Fixed(PHCF)).trigger('change');
                $(this).closest('.my-premiums-section').find('.ITL-premium').val(round2Fixed(ITL)).trigger('change');

                /**Once the above entries have been Updated, this automatically changes the Total Premium Payable Value**/
                let totalPremiumPayable = parseFloat(CurrentTotalBasicPremium) + PHCF + ITL + parseFloat(stampDuty);

                /**Display this New Premium adn the Premium Payable**/
                $(this).closest('.my-premiums-section').find('.total-premium').html(round2Fixed(totalPremiumPayable).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")).css('font-weight', 'bold');
            });
        });



        /**Create a Function to Update the Basic Premium Amount for Inpatient**/
        function updateInpatientBasicPremium(){
            let currentPrincipalInpatientPremium = $(this).closest('.my-premiums-section').find('.principal-premium').val() || 0;
            let currentSpouseInpatientPremium = $(this).closest('.my-premiums-section').find('.spouse-premium').val() || 0;
            let currentChildrenInpatientPremium = $(this).closest('.my-premiums-section').find('.children-premium').val() || 0;
            let inpatientBasicPremium = parseFloat(currentPrincipalInpatientPremium) + parseFloat(currentSpouseInpatientPremium) + parseFloat(currentChildrenInpatientPremium);

        }

        /**Changing Outpatient Premium**/
        function changeOutpatientPremium(){
            var premium = 0;
            var basicPremium = $('.total-basic-premium').val();
            $('.outpatient-premium').on('change', function (){
                premium = $(this).val() || 0;

                /**Get the Basic Premium AMount Value**/
                var totalBasic = parseFloat(basicPremium) + parseFloat(premium);

                /**Update the Basic Premium Value**/
                $('.total-basic-premium').val(totalBasic);
            });
        }

        /**Create a Function that will be called whenever the Total Basic premium is changed**/
        function changeTotalBasicPremium(){
            $('.total-basic-premium').change(function (){
                var basic = $(this).val();


            });
        }

        /**Create a Function that will be used to get the Total Levies Amount**/
        function totalLevies(){


        }

        //ROUND OFF VALUE TO 2 DP
        function round2Fixed(value) {
            value = +value;
            if (isNaN(value)){
                return NaN;
            }else{
                // Shift
                value = value.toString().split('e');
                value = Math.round(+(value[0] + 'e' + (value[1] ? (+value[1] + 2) : 2)));
                // Shift back
                value = value.toString().split('e');
                return (+(value[0] + 'e' + (value[1] ? (+value[1] - 2) : -2))).toFixed(2);
            }
        }

        /**Create a FUnction to Detect when the Sum Insured Amount Changes **/
        function changeSumInsured(){
            $('#sum-insured').on("change", function(){
                var sumInsured = $(this).val() || 0;
                var rate = $('#premium-rate').val();
                var premium = 0;

                if(sumInsured != ""){
                    $('#sum-insured-label').removeClass('error');
                }else{
                    $('#sum-insured-label').addClass('error');
                }
                //var sumInsured = parseFloat(sumInsureds.replace(/,/g, ''));
                if(!isNaN(sumInsured)){
                    $('#applicable-taxes-div').show();
                    $('#total-premium-div').show();
                    $('#warning').hide();

                    if(rate < 20 ){
                        premium = round2Fixed((rate/100) * sumInsured);
                    }else{
                        premium = round2Fixed(rate);
                    }

                    $('#basic-premium').html(premium.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));

                }else{
                    $('#applicable-taxes-div').hide();
                    $('#total-premium-div').hide();
                    $('#warning').show();
                    $('#basic-premium').html(premium.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
                }
                //TOTAL PREMIUM SECTION
                getTheBenefitPremiumPayable();
                totalBasicPremium()
                totalPremium();
            });
        }

        /**Show StampDuty Levies**/
        function showDutyLevies(){
            $(".stamp-duty").val();


                //$('#duty'+tax_id).html(tax_rate.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
                totalPremium();
        }
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
