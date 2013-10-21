@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
:: Account Signup
@stop

{{-- Content --}}
@section('content')

<div class="row">
    <h3 class="page-title">Add Event</h3>
    <div class="col-md-8">
        <form role="form" method="post">
            <!-- CSRF Token -->
            <input type="hidden" name="csrf_token" id="csrf_token" value="{{{ Session::getToken() }}}" />

            <!-- name of Event -->
            <div class="form-group">
                <label for="exampleInputEmail1">Name of Event</label>
                <input name="event_title" class="form-control" placeholder="Enter name" value="{{{ Request::old('event_title') }}}">
            </div>
    </div>
</div>

<div class="row">

    <!-- address -->
    <div class="col-lg-8">
        <div class="form-group">
            <label for="exampleInputPassword1">Address</label>

            <input class="form-control" name="address" placeholder="Address" type="text" value="{{{ Request::old('address') }}}">
            <span class="text-danger">{{{ $errors->first('address') }}}</span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
            <!-- city -->
            <div class="form-group">
                <label for="exampleInputPassword1">City</label>
                <div class="date" data-date-format="dd-mm-yyyy">
                    <input class="form-control" name="city" placeholder="City" type="text" value="{{{ Request::old('city') }}}">
                    <span class="text-danger">{{{ $errors->first('city') }}}</span>
                </div>
            </div>
    </div>

    <!-- state -->
    <div class="col-md-3">
        <div class="form-group">
            <label for="exampleInputPassword1">State</label>
            <div class="date" data-date-format="dd-mm-yyyy">
                <input class="form-control" name="state" placeholder="State" type="text" value="{{{ Request::old('state') }}}">
                <span class="text-danger">{{{ $errors->first('state') }}}</span>
            </div>
        </div>
    </div>

        <!-- zip -->
    <div class="col-md-2">
        <div class="form-group">
            <label for="exampleInputPassword1">Zip Code</label>

                <input class="form-control" placeholder="Zip Code" name="zipcode" type="text" value="{{{ Request::old('zipcode') }}}">
                 <span class="text-danger">{{{ $errors->first('zipcode') }}}</span>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-2">
        <!-- start date -->
        <div class="form-group">
            <label for="exampleInputPassword1">Start Date</label>
            <div class="date" data-date-format="dd-mm-yyyy">
                <input class="datepicker" size="16" name="start_date" type="text" value="{{{ date("n/j/Y")  }}}">
                <span class="add-on"><i class="icon-th"></i></span>
            </div>
        </div>
    </div>
    <!-- end date -->
    <div class="col-md-3">
        <div class="form-group">
            <label for="exampleInputPassword1">End Date</label>
            <div class="date" data-date-format="dd-mm-yyyy">
                <input class="datepicker" size="16" name="end_date" type="text" value="{{{ date("n/j/Y")  }}}">
                <span class="add-on"><i class="icon-th"></i></span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <!-- start date -->
        <div class="form-group">
            <label for="exampleInputPassword1">Start Time</label>

                <input class="form-control" size="16" name="start_time" type="text" placeholder="5:00" value="{{{ Request::old('start_time') }}}">
                 <span class="text-danger">{{{ $errors->first('start_time') }}}</span>
        </div>
    </div>
    <!-- end date -->
    <div class="col-md-2">
        <div class="form-group">
            <label for="exampleInputPassword1">End Time</label>
                <input class="form-control" size="16" name="end_time" type="text" placeholder="6:00" value="{{{ Request::old('end_time') }}}">
            <span class="text-danger">{{{ $errors->first('end_time') }}}</span>
        </div>
    </div>
</div>

    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="exampleInputPassword1">Social Link for Event</label>
                <input class="form-control" name="event_url" type="url" placeholder="Copy and paste URL here" value="{{{ Request::old('social_link') }}}">
                <span class="text-danger">{{{ $errors->first('event_url') }}}</span>
            </div>

                <label>Description</label>
                    <textarea class="form-control" placeholder="Enter short description (optional)" name="event_info" rows="3" value="{{{ Request::old('event_info') }}}"></textarea>
                <br>

            <!-- user id -->
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                <button type="submit" class="btn btn-default">Submit</button>
         </div>
    </div>
        </form>

    </div>
</div>
@stop
