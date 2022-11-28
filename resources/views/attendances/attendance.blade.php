@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/fullcalendar5.9.0.min.css') }}">
<script src="{{ asset('js/fullcalendar5.9.0.main.min.js') }}"></script>
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-calendar-week"></i> Ver frequencia
                    </h1>

                    <h5><i class="bi bi-person"></i> Nome: {{$aluno->primeiro_nome}} {{$aluno->sobrenome}}</h5>
                    <div class="row mt-3">
                        <div class="col bg-white p-3 border shadow-sm">
                            <div id="attendanceCalendar"></div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col bg-white border shadow-sm p-3">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Situação</th>
                                        <th scope="col">Data</th>
                                        <th scope="col">Turma</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendances as $attendance)
                                        <tr>
                                            <td>
                                                @if ($attendance->status == "on")
                                                    <span class="badge bg-success">Presente</span>
                                                @else
                                                    <span class="badge bg-danger">Faltante</span>
                                                @endif
                                                
                                            </td>
                                            <td>{{$attendance->created_at}}</td>
                                            <td>{{($attendance->section == null)?$attendance->course->course_name:$attendance->section->section_name}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@php
$events = array();
if(count($attendances) > 0){
    foreach ($attendances as $attendance){
        if($attendance->status == "on"){
            $events[] = ['title'=> "Presente", 'start' => $attendance->created_at, 'color'=>'green'];
        } else {
            $events[] = ['title'=> "Faltante", 'start' => $attendance->created_at, 'color'=>'red'];
        }
    }
}
@endphp
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('attendanceCalendar');
    var attEvents = @json($events);
                            
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: 350,
        events: attEvents,
    });
    calendar.render();
});
</script>
@endsection
