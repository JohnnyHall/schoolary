@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-person-lines-fill"></i> aluno List
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">aluno List</li>
                        </ol>
                    </nav>
                    @include('session-messages')
                    <h6>Filter list by:</h6>
                    <div class="mb-4 mt-4">
                        <form class="row" action="{{route('aluno.list.show')}}" method="GET">
                            <div class="col">
                                <select onchange="getSections(this);" class="form-select" aria-label="Class" name="class_id" required>
                                    @isset($school_classes)
                                        <option selected disabled>Please select a class</option>
                                        @foreach ($school_classes as $school_class)
                                            <option value="{{$school_class->id}}" {{($school_class->id == request()->query('class_id'))?'selected="selected"':''}}>{{$school_class->class_name}}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select" id="section-select" aria-label="Section" name="section_id" required>
                                    <option value="{{request()->query('section_id')}}">{{request()->query('section_name')}}</option>
                                </select>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Load List</button>
                            </div>
                        </form>
                        @foreach ($alunoList as $aluno)
                            @if ($loop->first)
                                <p class="mt-3"><b>Section:</b> {{$aluno->section->section_name}}</p>
                                @break
                            @endif
                        @endforeach
                        <div class="bg-white border shadow-sm p-3 mt-4">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">RA</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Primeiro nome</th>
                                        <th scope="col">Sobrenome</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alunoList as $aluno)
                                    <tr>
                                        <th scope="row">{{$aluno->RA}}</th>
                                        <td>
                                            @if (isset($aluno->aluno->photo))
                                                <img src="{{asset('/storage'.$aluno->aluno->photo)}}" class="rounded" alt="Profile picture" height="30" width="30">
                                            @else
                                                <i class="bi bi-person-square"></i>
                                            @endif
                                        </td>
                                        <td>{{$aluno->aluno->first_name}}</td>
                                        <td>{{$aluno->aluno->last_name}}</td>
                                        <td>{{$aluno->aluno->email}}</td>
                                        <td>{{$aluno->aluno->phone}}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{route('aluno.attendance.show', ['id' => $aluno->aluno->id])}}" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i> Attendance</a>
                                                <a href="{{url('alunos/view/profile/'.$aluno->aluno->id)}}" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i> Profile</a>
                                                @can('edit users')
                                                <a href="{{route('aluno.edit.show', ['id' => $aluno->aluno->id])}}" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-pen"></i> Edit</a>
                                                @endcan
                                                {{-- <button type="button" class="btn btn-sm btn-primary"><i class="bi bi-trash2"></i> Delete</button> --}}
                                            </div>
                                        </td>
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
<script>
    function getSections(obj) {
        var class_id = obj.options[obj.selectedIndex].value;

        var url = "{{route('get.sections.courses.by.classId')}}?class_id=" + class_id 

        fetch(url)
        .then((resp) => resp.json())
        .then(function(data) {
            var sectionSelect = document.getElementById('section-select');
            sectionSelect.options.length = 0;
            data.sections.unshift({'id': 0,'section_name': 'Please select a section'})
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