@extends('layouts.app')
@section('page_css')

@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Calendar</h3>
        </div>
        <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">

                  <div class="card-body">


                    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

                    <div id='calendar'></div>


                </div>
                </div>
              </div>
            </div>
          </div>
    </section>
@endsection
@section('page_js')
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
    $(document).ready(function () {

            events={!! json_encode($events) !!};
            $('#calendar').fullCalendar({

                events: events,
            })
        });
</script>
@endsection

