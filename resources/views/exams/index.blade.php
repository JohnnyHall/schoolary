@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-calculator-fill"></i> Provas
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Voltar</a></li>
                        </ol>
                    </nav>
                    <div class="mb-4 mt-4">
                        <form action="{{route('exam.list.show')}}" method="GET">
                            <div class="row">
                                <div class="col-3">
                                    <select class="form-select" aria-label="Class" name="class_id">
                                        @isset($classes)
                                            @foreach ($classes as $school_class)
                                                <option value="{{$school_class->id}}">{{$school_class->class_name}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="col-3">
                                    <select class="form-select" aria-label="Status" name="semester_id">
                                        @isset($semesters)
                                            @foreach ($semesters as $semester)
                                                <option value="{{$semester->id}}">{{$semester->semester_name}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Recarregar</button>
                                </div>
                            </div>
                        </form>
                        <div class="bg-white mt-4 p-3 border shadow-sm">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Curso</th>
                                        <th scope="col">Criado</th>
                                        <th scope="col">Data de inicio</th>
                                        <th scope="col">Data de termino</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($exams as $exam)
                                        @if (Auth::user()->role == "admin")
                                        <tr>
                                            <td>{{$exam->exam_name}}</td>
                                            <td>{{$exam->course->course_name}}</td>
                                            <td>{{$exam->created_at}}</td>
                                            <td>{{$exam->start_date}}</td>
                                            <td>{{$exam->end_date}}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{route('exam.rule.create', ['exam_id' => $exam->id])}}" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-arrow-repeat"></i> Adicionar Regra</a>
                                                    <a href="{{route('exam.rule.show', ['exam_id' => $exam->id])}}" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i> Ver Regra</a>
                                                    {{-- <a href="{{route('exam.edit', ['exam_id' => $exam->id])}}" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-pen"></i> Editar</a> --}}
                                                    {{-- <a href="{{route('exam.delete')}}" role="button" class="btn btn-sm btn-primary" onclick="event.preventDefault();
                                                        document.getElementById('exam-delete-form-{{$exam->id}}').submit();"><i class="bi bi-trash2"></i> Delete</a>
                                                    <form id="exam-delete-form-{{$exam->id}}" action="{{ route('exam.delete') }}" method="POST" class="d-none">
                                                        @csrf
                                                        <input type="hidden" name="exam_id" value="{{$exam->id}}">
                                                    </form> --}}
                                                </div>
                                            </td>
                                        </tr>
                                        @elseif(Auth::user()->role == "teacher")
                                            @foreach ($teacher_courses as $teacher_course)
                                                @if ($exam->course->id != $teacher_course->course_id)
                                                    @continue
                                                @else
                                                <tr>
                                                    <td>{{$exam->exam_name}}</td>
                                                    <td>{{$exam->course->course_name}}</td>
                                                    <td>{{$exam->created_at}}</td>
                                                    <td>{{$exam->start_date}}</td>
                                                    <td>{{$exam->end_date}}</td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <a href="{{route('exam.rule.create', ['exam_id' => $exam->id])}}" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-arrow-repeat"></i> Adicionar regra</a>
                                                            <a href="{{route('exam.rule.show', ['exam_id' => $exam->id])}}" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i> Ver regra</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        @endif
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
