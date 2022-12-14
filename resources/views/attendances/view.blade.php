@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-calendar2-week-fill"></i> Ver frequencia
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url()->previous()}}">Voltar</a></li>
                        </ol>
                    </nav>
                    @if(request()->query('course_name'))
                        <h3><i class="bi bi-compass"></i> Course: {{request()->query('course_name')}} </h3>
                    @elseif(request()->query('section_name'))
                        <h3><i class="bi bi-book-fill"></i> Section: {{request()->query('section_name')}} </h3>
                    @endif
                    <div class="row mt-4">
                        <div class="col bg-white border shadow-sm pt-2">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome do aluno</th>
                                        <th scope="col">Aula do dia</th>
                                        <th scope="col">Total de aulas presentes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendances as $attendance)
                                        @php
                                            $total_attended = \App\Models\Attendance::where('aluno_id', $attendance->aluno_id)->where('session_id', $attendance->session_id)->count();
                                        @endphp
                                        <tr>
                                            <td>{{$attendance->aluno->primeiro_nome}} {{$attendance->aluno->sobrenome}}</td>
                                            <td>
                                                @if ($attendance->status == "on")
                                                    <span class="badge bg-success">Presente</span>
                                                @else
                                                    <span class="badge bg-danger">Faltante</span>
                                                @endif
                                                
                                            </td>
                                            <td>{{$total_attended}}</td>
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
@endsection
