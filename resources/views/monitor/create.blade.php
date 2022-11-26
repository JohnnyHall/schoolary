@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col-6 ps-4">
                    <h1 class="display-6 mb-3"><i class="bi bi-journal-text"></i> Criar monitoria</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Voltar</a></li>
                        </ol>
                    </nav>
                    @include('session-messages')
                    <div class="p-3 border bg-light shadow-sm">
                        <form action="{{route('monitoria.store')}}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                            <div class="mb-3">
                                <p>Add monitoria to class:</p>
                                <select onchange="getCourses(this);" class="form-select" name="class_id" required>
                                    @isset($school_classes)
                                        <option selected disabled>Favor selecionar uma materia</option>
                                        @foreach ($school_classes as $school_class)
                                        <option value="{{$school_class->id}}">{{$school_class->class_name}}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                            <div class="mb-3">
                                <p class="mb-2">Select course:</p>
                                <select class="form-select" id="course-select" name="course_id">
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="monitoria-name" class="form-label">Email do monitor responsavel</label>
                                <input type="text" class="form-control" id="monitoria-name" name="monitoria_name" placeholder="Email do monitor responsavel" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="monitoria-file" class="form-label">Materia complementar</label>
                                <input type="file" name="file" class="form-control" id="monitoria-file" accept=".jpg,.jpeg,.bmp,.png,.gif,.doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip" required>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-outline-primary"><i class="bi bi-check2"></i> Criar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<script>
    function getCourses(obj) {
        var class_id = obj.options[obj.selectedIndex].value;

        var url = "{{route('get.sections.courses.by.classId')}}?class_id=" + class_id 

        fetch(url)
        .then((resp) => resp.json())
        .then(function(data) {

            var courseSelect = document.getElementById('course-select');
            courseSelect.options.length = 0;
            data.courses.unshift({'id': 0,'course_name': 'Favor selecionar um curso'})
            data.courses.forEach(function(course, key) {
                courseSelect[key] = new Option(course.course_name, course.id);
            });
        })
        .catch(function(error) {
            console.log(error);
        });
    }
</script>
@endsection