@extends('layouts.default')

@section('content')

    <div class="row">
        <h3 class="page-title">{{ $event->event_title}}</h3>

        <div class="col-md-6 front-content">
                <div class="col-md-6">
                    <h4><a href="{{{ URL::to('events/event/'.$event->id) }}}">{{ $event->event_title}}</a></h4>

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
