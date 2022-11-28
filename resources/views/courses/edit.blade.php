@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3"><i class="bi bi-journal-medical"></i> Editar curso</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url()->previous()}}">Voltar</a></li>
                        </ol>
                    </nav>
                    @include('session-messages')
                    <div class="row">
                        <form class="col-6" action="{{route('school.course.update')}}" method="POST">
                            @csrf
                            <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                            <input type="hidden" name="course_id" value="{{$course_id}}">
                            <div class="mb-3">
                                <label for="course_name" class="form-label">Nome do curso</label>
                                <input class="form-control" id="course_name" name="course_name" type="text" value="{{$course->course_name}}">
                            </div>
                            <div class="mb-3">
                                <label for="course_type" class="form-label">Tipo de curso</label>
                                <select class="form-select" id="course_type" name="course_type" aria-label="Tipo de curso">
                                    <option value="Bacharelado" {{($course->course_type == 'Bacharelado')? 'selected' : ''}}>Bacharelado</option>
                                    <option value="Licenciatura" {{($course->course_type == 'Licenciatura')? 'selected' : ''}}>Licenciatura</option>
                                    <option value="Tecnólogo" {{($course->course_type == 'Tecnólogo')? 'selected' : ''}}>Tecnólogo</option>
                                    <option value="Mestrado" {{($course->course_type == 'Mestrado')? 'selected' : ''}}>Mestrado</option>
                                    <option value="Doutorado" {{($course->course_type == 'Doutorado')? 'selected' : ''}}>Doutorado</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-outline-primary"><i class="bi bi-check2"></i> Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection