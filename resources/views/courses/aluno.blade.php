@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-journal-medical"></i> Meus Cursos
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Voltar</a></li>
                        </ol>
                    </nav>
                    <div class="mb-4 mt-4">
                        <div class="p-3 mt-3 bg-white border shadow-sm">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome do curso</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($courses)
                                        @foreach ($courses as $course)
                                        <tr>
                                            <td>{{$course->course_name}}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{route('course.mark.show', [
                                                        'course_id' => $course->id,
                                                        'course_name' => $course->course_name,
                                                        'semester_id' => $course->semester_id,
                                                        'class_id'  => $class_info->class_id,
                                                        'session_id' => $course->session_id,
                                                        'section_id' => $class_info->section_id,
                                                        'aluno_id' => Auth::user()->id
                                                        ])}}" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-code-slash"></i> Ver Notas</a>
                                                    <a href="{{route('course.monitoria.index', ['course_id'  => $course->id])}}" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-info-circle-fill"></i> Ver Monitoria</a>
                                                    <a href="{{route('assignment.list.show', ['course_id' => $course->id])}}" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-file-post"></i> Ver Comentarios</a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endisset
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
