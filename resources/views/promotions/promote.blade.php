@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi-person-circle"></i> Promote alunos
                    </h1>
                    @include('session-messages')
                    <p class="text-danger">
                        <small><i class="bi bi-exclamation-diamond-fill me-2"></i> alunos must be promoted only once to a new Session. Ususally, secretaria will create a New Session once Academic activity ends for the Current Session.</small>
                    </p>
                    <div class="mb-4 mt-4">
                        <form action="{{route('promotions.store')}}" method="POST">
                            @csrf
                            <table class="table mt-4">
                                <thead>
                                    <tr>
                                        <th scope="col">#RA</th>
                                        <th scope="col">Primeiro nome</th>
                                        <th scope="col">Sobrenome</th>
                                        <th scope="col">Previous Class</th>
                                        <th scope="col">Previous Section</th>
                                        <th scope="col">Promoting to Class</th>
                                        <th scope="col">Promoting to Section</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($alunos)
                                        @foreach ($alunos as $index => $aluno)
                                        <tr>
                                            <th scope="row">
                                                <input type="text" class="form-control" name="RA[{{$aluno->aluno->id}}]" value="{{$aluno->RA}}">
                                            </th>
                                            <td>{{$aluno->aluno->primeiro_nome}}</td>
                                            <td>{{$aluno->aluno->sobrenome}}</td>
                                            <td>{{$schoolClass->class_name}}</td>
                                            <td>{{$section->section_name}}</td>
                                            <td>
                                                <select onchange="getSections(this, {{$index}});" class="form-select form-select-sm" id="inputAssignToClass{{$index}}" name="class_id[{{$index}}]" required>
                                                    @isset($school_classes)
                                                        <option selected disabled>Favor selecionar uma materia</option>
                                                        @foreach ($school_classes as $school_class)
                                                            <option value="{{$school_class->id}}">{{$school_class->class_name}}</option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-select form-select-sm" aria-label="Section" id="inputAssignToSection{{$index}}" name="section_id[{{$index}}]" required>
                                                </select>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-outline-primary mb-3"><i class="bi bi-sort-numeric-up-alt"></i> Promote</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<script>
    function getSections(obj, index) {
        var class_id = obj.options[obj.selectedIndex].value;

        var url = "{{route('get.sections.courses.by.classId')}}?class_id=" + class_id 

        fetch(url)
        .then((resp) => resp.json())
        .then(function(data) {
            var sectionSelect = document.getElementById('inputAssignToSection'+index);
            sectionSelect.options.length = 0;
            data.sections.unshift({'id': 0,'section_name': 'Favor selecionar uma turma'})
            data.sections.forEach(function(section, key) {
                sectionSelect[key] = new Option(section.section_name, section.id);
            });
        })
        .catch(function(error) {
            console.log(error);
        });
    }
</script>
@endsection
