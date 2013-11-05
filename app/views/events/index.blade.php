@extends('layouts.default')

@section('content')

    <div class="row">
        <h3 class="page-title"></h3>


        <a class="btn btn-add-event" href="{{{ URL::to('events/add') }}}"><span class="glyphicon glyphicon-plus"></span> Add An Event</a>

    </div>

    <div class="row">
        <h3 class="page-title"></h3>
        @foreach($events as $event)
            <div class="col-md-4">
                <div class="front-content margin-event event-color">
                    <h4><a href="{{{ URL::to('events/event/'.$event->id) }}}">{{ $event->event_title}}</a></h4>

                    <p>{{ Str::limit($event->event_info, 90)}}</p>
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
            </div>
        @endforeach
    </div>

        <div class="row">
            <div class="col-md-offset-4">
                <ul class="pagination">
                    <li>{{ $events->links() }}</li>
                </ul>
            </div>
        </div>


@stop
