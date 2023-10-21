{{--PRINCIPAL SECTION--}}
@if($limit->benefit_type != 'inpatient' && $limit->pp_pf == 'pf')
    <input type="hidden" name="family_based" value="yes">
    @if(count($family))
        <div class="row" id="premiums-section">
            <div id="family-members">
                @foreach($family as $fam)
                    <input type="hidden" name="family_id[{{$fam->id}}]" value="{{$fam->id}}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ageFrom">Age From:</label>
                                <input type="text"  name="fm_age_from[{{$fam->id}}]" class="form-control" placeholder="Age From" value="{{ $fam->fm_age_from }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ageFrom">Age To:</label>
                                <input type="text"   name="fm_age_to[{{$fam->id}}]" class="form-control" placeholder="Age To" value="{{ $fam->fm_age_to }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="ageFrom">M:</label>
                                <input type="text"  name="m[{{$fam->id}}]" class="form-control" placeholder="M" value="{{ $fam->m }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="ageFrom">M+1:</label>
                                <input type="text"  name="m_plus_one[{{$fam->id}}]" class="form-control" placeholder="M+1" value="{{ $fam->m_plus_one }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="ageFrom">M+2:</label>
                                <input type="text"  name="m_plus_two[{{$fam->id}}]" class="form-control" placeholder="M+2" value="{{ $fam->m_plus_two }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="ageFrom">M+3:</label>
                                <input type="text"  name="m_plus_three[{{$fam->id}}]" class="form-control" placeholder="M+3" value="{{ $fam->m_plus_three }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="ageFrom">M+4:</label>
                                <input type="text"  name="m_plus_four[{{$fam->id}}]" class="form-control" placeholder="M+4" value="{{ $fam->m_plus_four }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="ageFrom">M+5:</label>
                                <input type="text"  name="m_plus_five[{{$fam->id}}]" class="form-control" placeholder="M+5" value="{{ $fam->m_plus_five }}">
                            </div>
                        </div>
                    </div><hr>
                @endforeach
            </div>
            <div style="padding-top: 10px" class="form-group mb-0">
                <button type="button" name="add-family-range" id="add-family-range" class="btn btn-success"> <i class="fa fa-plus-circle"></i>  Add Another Range</button>
            </div>
        </div>
    @else
        <div class="row" id="premiums-section">
            <div id="family-members">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ageFrom">Age From:</label>
                            <input type="text"  name="fm_age_from[]" class="form-control" placeholder="M" value="{{ old('fm_age_from') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ageFrom">Age To:</label>
                            <input type="text" name="fm_age_to[]" class="form-control" placeholder="M" value="{{ old('fm_age_to') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="ageFrom">M:</label>
                            <input type="text"  name="m[]" class="form-control" placeholder="M" value="{{ old('m') }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="ageFrom">M+1:</label>
                            <input type="text"  name="m_plus_one[]" class="form-control" placeholder="M+1" value="{{ old('m_plus_one') }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="ageFrom">M+2:</label>
                            <input type="text"  name="m_plus_two[]" class="form-control" placeholder="M+2" value="{{ old('m_plus_two') }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="ageFrom">M+3:</label>
                            <input type="text"  name="m_plus_three[]" class="form-control" placeholder="M+3" value="{{ old('m_plus_three') }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="ageFrom">M+4:</label>
                            <input type="text"  name="m_plus_four[]" class="form-control" placeholder="M+4" value="{{ old('m_plus_four') }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="ageFrom">M+5:</label>
                            <input type="text"  name="m_plus_five[]" class="form-control" placeholder="M+5" value="{{ old('m_plus_five') }}">
                        </div>
                    </div>
                </div>
            </div><hr>
            <div style="padding-top: 10px" class="form-group mb-0">
                <button type="button" name="add-family-range" id="add-family-range" class="btn btn-success"> <i class="fa fa-plus-circle"></i>  Add Another Range</button>
            </div>

        </div>
    @endif

@else
    @if(count($principal) > 0)
        <div class="row" id="premiums-section">
            <div id="principal-member">
                <p style="color: red">1. Principal Member Details</p>
                @foreach($principal as $pr)
                    <div class="row">
                        <input type="hidden" name="principalPremiumId[{{$pr->id}}]" value="{{$pr->id}}">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="ageFrom">Age:</label>
                                <input type="text"  name="age_from[{{$pr->id}}]" class="form-control" placeholder="Age From" value="{{ $pr->age_from }}">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="ageTo">Age To:</label>
                                <input type="text"  name="age_to[{{$pr->id}}]" class="form-control" placeholder="Age To" value="{{ $pr->age_to }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="principalPremium">IP Premium:</label>
                                <input type="text"  name="princ_premium[{{$pr->id}}]" class="form-control" placeholder="Premium Amount" value="{{ $pr->princ_premium }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="childPremium">Child Premium:</label>
                                <input type="text"  name="child_premium[{{$pr->id}}]" class="form-control" placeholder="Child Premium" value="{{ $pr->child_premium }}">
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
            <div style="padding-top: 10px" class="form-group mb-0">
                <button type="button" name="add-principal-range" id="add-principal-range" class="btn btn-success"> <i class="fa fa-plus-circle"></i>  Add Range</button>
            </div>
        </div><hr>
    @else
        <div class="row" id="premiums-section">
            <div id="principal-member">
                <p style="color: red">1. Principal Member Details</p>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="ageFrom">Age:</label>
                            <input type="text"  name="age_from[]" class="form-control" placeholder="Age From" value="{{ old('age_from') }}">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="ageTo">Age To:</label>
                            <input type="text"  name="age_to[]" class="form-control" placeholder="Age To" value="{{ old('age_to') }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="principalPremium">IP Premium:</label>
                            <input type="text"  name="princ_premium[]" class="form-control" placeholder="Premium Amount" value="{{ old('princ_premium') }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="childPremium">Child Premium:</label>
                            <input type="text"  name="child_premium[]" class="form-control" placeholder="Child Premium" value="{{ old('child_premium') }}">
                        </div>
                    </div>

                </div>
            </div>
            <div style="padding-top: 10px" class="form-group mb-0">
                <button type="button" name="add-principal-range" id="add-principal-range" class="btn btn-success"> <i class="fa fa-plus-circle"></i>  Add Range</button>
            </div>
        </div><hr>
    @endif
    {{--SPOUSE SECTION--}}
    @if(count($spouse) > 0)
        <div class="row" id="premiums-section-spouse">
            <div id="spouse-member">
                <p style="color: red">2. Spouse Premium Details</p>

                @foreach($spouse as $sp)
                    <div class="row">
                        <input type="hidden" name="spousePremiumId[{{$sp->id}}]" value="{{$sp->id}}">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ageFrom">Spouse Age From:</label>
                                <input type="text"  name="sp_age_from[{{$sp->id}}]" class="form-control" placeholder="Age From" value="{{ $sp->sp_age_from }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ageTo">Spouse Age To:</label>
                                <input type="text"  name="sp_age_to[{{$sp->id}}]" class="form-control" placeholder="Age To" value="{{ $sp->sp_age_to }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="principalPremium">Spouse Premium:</label>
                                <input type="text"  name="sp_premium[{{$sp->id}}]" class="form-control" placeholder="Spouse Premium Amount" value="{{ $sp->sp_premium }}">
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div style="padding-top: 10px" class="form-group mb-0">
                <button type="button" name="add-spouse-range" id="add-spouse-range" class="btn btn-success"> <i class="fa fa-plus-circle"></i>  Add Spouse Range</button>
            </div>
        </div>
    @else
        <div class="row" id="premiums-section-spouse">
            <div id="spouse-member">
                <p style="color: red">2. Spouse Premium Details</p>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ageFrom">Spouse Age From:</label>
                            <input type="text"  name="sp_age_from[]" class="form-control" placeholder="Age From" value="{{ old('sp_age_from') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ageTo">Spouse Age To:</label>
                            <input type="text"  name="sp_age_to[]" class="form-control" placeholder="Age To" value="{{ old('sp_age_to') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="principalPremium">Spouse Premium:</label>
                            <input type="text"  name="sp_premium[]" class="form-control" placeholder="Spouse Premium Amount" value="{{ old('sp_premium') }}">
                        </div>
                    </div>
                </div>
            </div>
            <div style="padding-top: 10px" class="form-group mb-0">
                <button type="button" name="add-spouse-range" id="add-spouse-range" class="btn btn-success"> <i class="fa fa-plus-circle"></i>  Add Spouse Range</button>
            </div>
        </div>
    @endif
@endif


<script type="text/javascript">
    $(document).ready(function(){
        var i=1;
        var j=1;
        var k=1;
        $('#add-principal-range').click(function(){
            i++;
            $('#principal-member').append(' <div class="container" id="contain'+i+'">\n' +
                '                                            <div class="row">\n' +
                '                                                <div class="col-md-2">\n' +
                '                                                    <div class="form-group">\n' +
                '                                                        <label for="ageFrom">Age From:</label>\n' +
                '                                                        <input type="text"  name="age_from[]" class="form-control" placeholder="Age From" value="">\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                                <div class="col-md-2">\n' +
                '                                                    <div class="form-group">\n' +
                '                                                        <label for="ageFrom">Age To:</label>\n' +
                '                                                        <input type="text"  name="age_to[]" class="form-control" placeholder="Age To" value="">\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                                <div class="col-md-3">\n' +
                '                                                    <div class="form-group">\n' +
                '                                                        <label for="ageFrom">Premium:</label>\n' +
                '                                                        <input type="text"  name="princ_premium[]" class="form-control" placeholder="Prinicpal Premium" value="">\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                                <div class="col-md-3">\n' +
                '                                                    <div class="form-group">\n' +
                '                                                        <label for="ageFrom">Child Premium:</label>\n' +
                '                                                        <input type="text"  name="child_premium[]" class="form-control" placeholder="Child Premium" value="">\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                                <div class="col-md-2">\n' +
                '                                                    <div class="form-group">\n' +
                '                                                        <div class="form-group"  style="padding-top: 25px;">\n' +
                '                                                            <button type="button" name="add" id="'+i+'"\n' +
                '                                                                    class="btn btn-outline-danger btn_remove">Remove <i class="fa fa-trash-alt"></i></button>\n' +
                '                                                        </div>\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                            </div>\n'+
                '                                        </div>');
        });
        $('#add-spouse-range').click(function(){
            j++;
            $('#spouse-member').append(' <div class="container" id="contain2'+j+'">\n' +
                '                                            <div class="row">\n' +
                '                                                <div class="col-md-3">\n' +
                '                                                    <div class="form-group">\n' +
                '                                                        <label for="ageFrom">Age From:</label>\n' +
                '                                                        <input type="text"  name="sp_age_from[]" class="form-control" placeholder="Spouse Age From" value="">\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                                <div class="col-md-3">\n' +
                '                                                    <div class="form-group">\n' +
                '                                                        <label for="ageFrom">Age To:</label>\n' +
                '                                                        <input type="text"  name="sp_age_to[]" class="form-control" placeholder="Spouse Age To" value="">\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                                <div class="col-md-3">\n' +
                '                                                    <div class="form-group">\n' +
                '                                                        <label for="ageFrom">Premium:</label>\n' +
                '                                                        <input type="text"  name="sp_premium[]" class="form-control" placeholder="Spouse Premium" value="">\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                                <div class="col-md-3">\n' +
                '                                                    <div class="form-group">\n' +
                '                                                        <div class="form-group"  style="padding-top: 25px;">\n' +
                '                                                            <button type="button" name="add" id="'+j+'"\n' +
                '                                                                    class="btn btn-outline-danger btn_remove2">Remove <i class="fa fa-trash-alt"></i></button>\n' +
                '                                                        </div>\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                            </div>\n'+
                '                                            </div>\n' +
                '                                        </div><hr>');
        });
        $('#add-family-range').click(function(){
            k++;
            $('#family-members').append(' <div class="container" id="contain3'+k+'">\n' +
                '                                            <div class="row">\n' +
                '                                                <div class="col-md-6">\n' +
                '                                                    <div class="form-group">\n' +
                '                                                        <label for="ageFrom">Age From:</label>\n' +
                '                                                        <input type="text"  name="fm_age_from[]" class="form-control" placeholder="Age From" value="">\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                                <div class="col-md-6">\n' +
                '                                                    <div class="form-group">\n' +
                '                                                        <label for="ageFrom">Age To:</label>\n' +
                '                                                        <input type="text"  name="fm_age_to[]" class="form-control" placeholder="Age To" value="">\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                            <div class="row">' +
                '                                                <div class="col-md-2">\n' +
                '                                                    <div class="form-group">\n' +
                '                                                        <label for="ageFrom">M:</label>\n' +
                '                                                        <input type="text"  name="m[]" class="form-control" placeholder="M" value="">\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                                <div class="col-md-2">\n' +
                '                                                    <div class="form-group">\n' +
                '                                                        <label for="ageFrom">M+1:</label>\n' +
                '                                                        <input type="text"  name="m_plus_one[]" class="form-control" placeholder="M+1" value="">\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                                <div class="col-md-2">\n' +
                '                                                    <div class="form-group">\n' +
                '                                                        <label for="ageFrom">M+2:</label>\n' +
                '                                                        <input type="text"  name="m_plus_two[]" class="form-control" placeholder="M+2" value="">\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                                <div class="col-md-2">\n' +
                '                                                    <div class="form-group">\n' +
                '                                                        <label for="ageFrom">M+3:</label>\n' +
                '                                                        <input type="text"  name="m_plus_three[]" class="form-control" placeholder="M+3" value="">\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                                <div class="col-md-2">\n' +
                '                                                    <div class="form-group">\n' +
                '                                                        <label for="ageFrom">M+4:</label>\n' +
                '                                                        <input type="text"  name="m_plus_four[]" class="form-control" placeholder="M+4" value="">\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                                <div class="col-md-2">\n' +
                '                                                    <div class="form-group">\n' +
                '                                                        <label for="ageFrom">M+5:</label>\n' +
                '                                                        <input type="text"  name="m_plus_five[]" class="form-control" placeholder="M+5" value="">\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                            </div>'+
                '                                                <div class="col-md-3">\n' +
                '                                                    <div class="form-group">\n' +
                '                                                        <div class="form-group"  style="padding-top: 25px;">\n' +
                '                                                            <button type="button" name="add" id="'+k+'"\n' +
                '                                                                    class="btn btn-outline-danger btn_remove3">Remove <i class="fa fa-trash-alt"></i></button>\n' +
                '                                                        </div>\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                        </div><hr>');
        });
        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#contain'+button_id+'').remove();
        });
        $(document).on('click', '.btn_remove2', function(){
            var button_id = $(this).attr("id");
            $('#contain2'+button_id+'').remove();
        });
        $(document).on('click', '.btn_remove3', function(){
            var button_id = $(this).attr("id");
            $('#contain3'+button_id+'').remove();
        });



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click', '#remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });


        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $(".print-success-msg").css('display','none');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    });
</script>
