@if(count($limits) > 0)
    <div class="form-group">
        <label for="inpatientLimit">Inpatient Limit:</label>
        <select name="limitId"  class="form-control @error('name') is-invalid @enderror" >
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
    <div class="form-group">
        <label for="inpatientLimit">Response from Database:</label>
        <p style="color: red">NO LIMITS HAVE BEEN SETUP, CLICK HERE TO ADD</p>
        <div class="row mb-2">
            <div class="col-sm-12">
                <div class="text-sm-left">
                    <a href="{{ route('admin.health.create') }}" target="_blank" class="btn btn-success waves-effect waves-light">
                        Add Inpatient Limit <i data-feather="plus-circle"></i>
                    </a>
                </div>
            </div><!-- end col-->
        </div>
    </div>
@endif
