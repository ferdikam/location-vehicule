@extends('layouts.app')

@section('styles')
<link href='/assets/plugins/fullcalendar/dist/fullcalendar.min.css' rel='stylesheet' />
<link href='/assets/plugins/fullcalendar/dist/fullcalendar.print.min.css' rel='stylesheet' media='print' />
@endsection

@section('content')
<div class="container">
    @include('layouts.notifications')
    <div class="row">
        <div class="col-md-3">
            <div class="card-box">
                <h2 class="text-dark header-title m-t-0">Bienvenue - {{ Auth::user()->name }}</h2>

            </div>
        </div>
        <div class="col-md-9">
            <div class="card-box">
                <div id="calendar"></div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script src='/assets/plugins/fullcalendar/dist/lib/moment.min.js'></script>
<script src='/assets/plugins/fullcalendar/dist/fullcalendar.min.js'></script>
<script src='/assets/plugins/fullcalendar/dist/locale-all.js'></script>
<script>
    $(document).ready(function() {

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            locale: 'fr',
            navLinks: true, // can click day/week names to navigate views
            eventLimit: true, // allow "more" link when too many events
            events: '/events',
            eventClick: function(callEvent, jsEvent, view) {
                if (event.url) {
                    window.open(event.url);
                    return false;
                }
            }
        });
        
    });
</script>
@endsection
