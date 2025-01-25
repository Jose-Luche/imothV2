<script>
    $(document).ready(function (){
        /**At this point, we check if the user changes the Limits, then go into the Database to see if any premiums exist**/
        $('#limitId').change(function (){
            let limitId = $(this).val();
            if(limitId != ''){
                /**Since we have the ID with us, we can go into the Database and search for available premiums on the specified limit**/
                $.ajax({
                    method: 'GET',
                    url: '/admin/seniors/premiums/'+limitId,
                    success: function (res){
                        if(res != ""){
                            $('#append-limits-div').html(res);
                        }
                    }
                });
            }
        });

    });
</script>
@if(count($limits) > 0)
    <div class="form-group">
        <label for="inpatientLimit">Available Limits:</label>
        <select name="limitId" id="limitId"  class="form-control @error('name') is-invalid @enderror" >
            <option value="">--Select Option--</option>
            @foreach($limits as $limit)
                <option value="{{$limit->id}}">{{ number_format($limit->limit) }}</option>
            @endforeach
        </select>
        @if ($errors->has('limitId'))
            <span class="help-block">
                <strong>{{ $errors->first('limitId') }}</strong>
            </span>
        @endif
    </div>
@else
    <div class="row">
        <div class="form-group">
            <label for="inpatientLimit">Response from Database:</label>
            <p style="color: red">NO LIMITS HAVE BEEN SETUP,<br> CLICK HERE TO ADD</p>

        </div>
        <div class="row mb-2">
            <div class="col-sm-12">
                <div class="text-sm-left">
                    <a href="{{ route('admin.seniors.create') }}" target="_blank" class="btn btn-success waves-effect waves-light">
                        Add Medical Limits <i data-feather="plus-circle"></i>
                    </a>
                </div>
            </div><!-- end col-->
        </div>
    </div>

@endif
