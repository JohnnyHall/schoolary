@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-calculator-fill"></i> Ver grades
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Voltar</a></li>
                        </ol>
                    </nav>
                    <div class="mb-4 p-3 bg-white border shadow-sm">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nome da grade</th>
                                    <th scope="col">Materia</th>
                                    <th scope="col">Semestre</th>
                                    <th scope="col">Data de criação</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($gradingSystems)
                                    @foreach ($gradingSystems as $gradingSystem)
                                    <tr>
                                        <td>{{$gradingSystem->system_name}}</td>
                                        <td>{{$gradingSystem->schoolClass->class_name}}</td>
                                        <td>{{$gradingSystem->semester->semester_name}}</td>
                                        <td>{{$gradingSystem->created_at}}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{route('exam.grade.system.rule.create', ['grading_system_id' => $gradingSystem->id])}}" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-arrow-repeat"></i> Adicionar regra</a>
                                                <a href="{{route('exam.grade.system.rule.show', ['grading_system_id' => $gradingSystem->id])}}" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i> Ver regras</a>
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
@endsection
