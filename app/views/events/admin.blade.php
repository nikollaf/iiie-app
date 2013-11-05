@extends('layouts.default')

@section('content')

<div class="row">
    <h3 class="page-title"></h3>

    <form role="form" method="post" action="">
        <input type="hidden" name="csrf_token" id="csrf_token" value="{{{ Session::getToken() }}}" />

        <label class="checkbox-inline">
            <input type="radio" name="event_status" id="inlineCheckbox1" value="APPROVED">
            <span class="btn-lg btn-success">APPROVE</span>
        </label>
        <label class="checkbox-inline">
            <input type="radio" name="event_status" id="inlineCheckbox2" value="DENY">
            <span class="btn-danger btn-lg">DENY</span>
        </label>

        <input type="hidden" name="event_id" value="{{ $event->id }}">
        <button type="submit" class="btn btn-success">Post</button>
    </form>

</div>

<div class="row">
    <h3 class="page-title">{{ $event->event_title}}</h3>

    <div class="col-md-6 front-content">
        <div class="col-md-6">


            <p>{{ $event->event_info}}</p>
            <address>
                <strong>Address</strong><br>
                {{ $event->address }}<br>
                {{ $event->city . ', ' . $event->state .' '. $event->zipcode}}<br>
            </address>
            <address>
                <strong>Time</strong>
                {{ $event->start_time . ' - ' . $event->end_time}}<br>
                <strong>Date</strong>
                {{{ $event->start_date . ' - ' . $event->end_date }}}<br>
            </address>
        </div>
        <div class="col-md-4">
            <p>Social Link</p>
            <a href="{{{ $event->event_url }}}">{{{ $event->event_url }}}</a>
        </div>

    </div>
</div>

@stop
