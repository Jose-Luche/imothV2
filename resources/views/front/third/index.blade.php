@extends('front.third.base')
@section('form')
    <h6 class="mb-4">Enter vehicle details</h6>
    <form class="contact-form " method="post" action="{{ route('front.third.vehicle.submit') }}" novalidate>
        @include('partials.info')
        @csrf
        <div class="row gx-4">
            <!-- /column -->
            <div class="col-md-12">
                <div class="form-select-wrapper mb-4">
                    <select class="form-select"   id="form-select"  name="vehicleUse" required>
                        <option selected disabled value="">Vehicle use *</option>
                        <option value="Personal/Private Use">Personal/Private Use</option>
                    </select>
                    @if ($errors->has('vehicleUse'))
                        <div class="invalid-feedback">{{ $errors->first('vehicleUse') }} </div>
                    @endif
                    <div class="valid-feedback"> Looks good! </div>

                </div>
            </div>
            <div class="col-md-12">
                <div class="form-select-wrapper mb-4">
                    <select  name="carMake" class="form-select" id="form-select"  required>
                        <option selected disabled value="">What car do you drive? *</option>
                        <option value="Toyota"   >Toyota</option>
                        <option value="Nissan"  >Nissan</option>
                        <option value="Mitsubishi"  >Mitsubishi</option>
                        <option value="Mazda"  >Mazda</option>
                        <option value="Subaru"  >Subaru</option>
                        <option value="Honda"  >Honda</option>
                        <option value="Isuzu"  >Isuzu</option>
                        <option value="Volkswagen"  >Volkswagen</option>
                        <option value="Mercedes-Benz"  >Mercedes-Benz</option>
                        <option value="Land Rover"  >Land Rover</option>
                        <option value="Acmat"  >Acmat</option>
                        <option value="Alfa Romeo"  >Alfa Romeo</option>
                        <option value="AMW"  >AMW</option>
                        <option value="Aprilia"  >Aprilia</option>
                        <option value="Asia"  >Asia </option>
                        <option value="Aston Martin"  >Aston Martin</option>
                        <option value="Atul"  >Atul</option>
                        <option value="Audi"  >Audi</option>
                        <option value="Bajaj"  >Bajaj</option>
                        <option value="Bedford"  >Bedford</option>
                        <option value="Beifang Benchi"  >Beifang Benchi</option>
                        <option value="Bell"  >Bell</option>
                        <option value="Bentley"  >Bentley</option>
                        <option value="BMW"  >BMW</option>
                        <option value="Cadillac"  >Cadillac</option>
                        <option value="Car Trailer"  >Car Trailer</option>
                        <option value="Chery"  >Chery</option>
                        <option value="Chevrolet"  >Chevrolet</option>
                        <option value="Chrysler"  >Chrysler</option>
                        <option value="Citroen"  >Citroen</option>
                        <option value="Claas Ceres"  >Claas Ceres</option>
                        <option value="Daewoo"  >Daewoo</option>
                        <option value="DAF"  >DAF</option>
                        <option value="Daihatsu"  >Daihatsu</option>
                        <option value="Daimler"  >Daimler</option>
                        <option value="Datsun"  >Datsun</option>
                        <option value="Dodge"  >Dodge</option>
                        <option value="Dongfeng"  >Dongfeng</option>
                        <option value="Ducati"  >Ducati</option>
                        <option value="Eicher"  >Eicher</option>
                        <option value="Equipment &amp; Machinery"  >Equipment &amp; Machinery</option>
                        <option value="FAW"  >FAW</option>
                        <option value="Ferrari"  >Ferrari</option>
                        <option value="Fiat"  >Fiat</option>
                        <option value="Ford"  >Ford</option>
                        <option value="Foton"  >Foton</option>
                        <option value="Geely"  >Geely</option>
                        <option value="Great Wall"  >Great Wall</option>
                        <option value="Harley-Davidson"  >Harley-Davidson</option>
                        <option value="Hero"  >Hero</option>
                        <option value="Hino"  >Hino</option>
                        <option value="Hitachi"  >Hitachi</option>
                        <option value="Holden"  >Holden</option>
                        <option value="Honda"  >Honda</option>
                        <option value="Hummer"  >Hummer</option>
                        <option value="Husaberg"  >Husaberg</option>
                        <option value="Husqvarna"  >Husqvarna</option>
                        <option value="Hyundai"  >Hyundai</option>
                        <option value="Infinity"  >Infinity</option>
                        <option value="Isuzu"  >Isuzu</option>
                        <option value="Iveco"  >Iveco</option>
                        <option value="Jaguar"  >Jaguar</option>
                        <option value="Jeep"  >Jeep</option>
                        <option value="JMC"  >JMC</option>
                        <option value="John Deere"  >John Deere</option>
                        <option value="Kawasaki"  >Kawasaki</option>
                        <option value="Kia"  >Kia</option>
                        <option value="KTM"  >KTM</option>
                        <option value="Lada"  >Lada</option>
                        <option value="Lamborghini"  >Lamborghini</option>
                        <option value="Lancia"  >Lancia</option>
                        <option value="Land Rover"  >Land Rover</option>
                        <option value="Landini"  >Landini</option>
                        <option value="Lexus"  >Lexus</option>
                        <option value="Leyland"  >Leyland</option>
                        <option value="Lifan"  >Lifan</option>
                        <option value="Locally Assembled"  >Locally Assembled</option>
                        <option value="Lotus"  >Lotus</option>
                        <option value="Mahindra"  >Mahindra</option>
                        <option value="Man"  >Man</option>
                        <option value="Maserati"  >Maserati</option>
                        <option value="Massey-Ferguson"  >Massey-Ferguson</option>
                        <option value="Mazda"  >Mazda</option>
                        <option value="Mercedes-Benz"  >Mercedes-Benz</option>
                        <option value="MG"  >MG</option>
                        <option value="Mini"  >Mini</option>
                        <option value="Mitsubishi"  >Mitsubishi</option>
                        <option value="Morris"  >Morris</option>
                        <option value="New Holland"  >New Holland</option>
                        <option value="Nissan"  >Nissan</option>
                        <option value="Oldsmobile"  >Oldsmobile</option>
                        <option value="Opel"  >Opel</option>
                        <option value="Peugeot"  >Peugeot</option>
                        <option value="Piaggio"  >Piaggio</option>
                        <option value="Porsche"  >Porsche</option>
                        <option value="Proton"  >Proton</option>
                        <option value="Racer"  >Racer</option>
                        <option value="Renault"  >Renault</option>
                        <option value="Rolls-Royce"  >Rolls-Royce</option>
                        <option value="Rover"  >Rover</option>
                        <option value="Saab"  >Saab</option>
                        <option value="Samsung"  >Samsung</option>
                        <option value="Scania"  >Scania</option>
                        <option value="Seat"  >Seat</option>
                        <option value="Senke"  >Senke</option>
                        <option value="Shacman"  >Shacman</option>
                        <option value="Shineray"  >Shineray</option>
                        <option value="Sinotruk"  >Sinotruk</option>
                        <option value="Skoda"  >Skoda</option>
                        <option value="Smart"  >Smart</option>
                        <option value="Sonalika"  >Sonalika</option>
                        <option value="SsangYong"  >SsangYong</option>
                        <option value="Steyr"  >Steyr</option>
                        <option value="Subaru"  >Subaru</option>
                        <option value="Suzuki"  >Suzuki</option>
                        <option value="Tata"  >Tata</option>
                        <option value="TCM"  >TCM</option>
                        <option value="Terex"  >Terex</option>
                        <option value="Thunder"  >Thunder</option>
                        <option value="Toyota"  >Toyota</option>
                        <option value="Trailer"  >Trailer</option>
                        <option value="Triumph"  >Triumph</option>
                        <option value="Truck Trailer"  >Truck Trailer</option>
                        <option value="TVS"  >TVS</option>
                        <option value="Vector"  >Vector</option>
                        <option value="Venturi"  >Venturi</option>
                        <option value="Viper"  >Viper</option>
                        <option value="Volkswagen"  >Volkswagen</option>
                        <option value="Volvo"  >Volvo</option>
                        <option value="Xiamen"  >Xiamen</option>
                        <option value="Yamaha"  >Yamaha</option>
                        <option value="Zonda"  >Zonda</option>
                        <option value="Zontes"  >Zontes</option>
                        <option value="ZX Auto"  >ZX Auto</option>
                    </select>
                    @if ($errors->has('carMake'))
                        <div class="invalid-feedback"> {{ $errors->first('carMake') }} </div>
                    @endif
                </div>
            </div>
            <!-- /column -->
            <div class="col-md-12">
                <div class="form-select-wrapper mb-4">
                    <select name="policy" class="form-control">
                        <option selected disabled value="">Policy Duration *</option>
                        <option {{  Session::get('policy') == 'Annually'?"selected":"" }} value="Annually">Annually</option>
                        <option {{  Session::get('policy') == 'Monthly'?"selected":"" }} value="Monthly">Monthly</option>
                    </select>
                    @if ($errors->has('policy'))
                        <div class="invalid-feedback">{{ $errors->first('policy') }} </div>
                    @endif
                </div>
            </div>
            <input type="hidden" class="form-control vehicleAmount" value="0" id="staticEmail" name="value">
            <div class="col-md-12">
                <div class="form-floating mb-4">
                    <input id="form_name" type="date" name="date" class="form-control"  required>
                    <label for="form_name">When do you want your cover to start?*</label>
                    @if ($errors->has('date'))
                        <div class="invalid-feedback"> {{ $errors->first('date') }} </div>
                    @endif
                </div>
            </div>
            <!-- /column -->
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary rounded-pill btn-send mb-3" value="Send message">View covers <i class="fa fa-arrow-alt-circle-right"></i> </button>
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
    </form>
@endsection
