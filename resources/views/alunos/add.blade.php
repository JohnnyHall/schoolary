@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-person-lines-fill"></i> Adicionar aluno
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Voltar</a></li>
                        </ol>
                    </nav>

                    @include('session-messages')

                    <p class="text-primary">
                        <small><i class="bi bi-exclamation-diamond-fill me-2"></i> Lembre-se de criar "Turma" e "Seção" relacionadas antes de adicionar aluno</small>
                    </p>
                    <div class="mb-4">
                        <form class="row g-3" action="{{route('school.aluno.create')}}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-3">
                                    <label for="inputFirstName" class="form-label">Primeiro nome</label>
                                    <input type="text" class="form-control" id="inputFirstName" name="primeiro_nome" required>
                                </div>
                                <div class="col-3">
                                    <label for="inputLastName" class="form-label">Sobrenome</label>
                                    <input type="text" class="form-control" id="inputLastName" name="sobrenome" required>
                                </div>
                                <div class="col-3">
                                    <label for="inputEmail4" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4" name="email" required>
                                </div>
                                <div class="col-3">
                                    <label for="inputPassword4" class="form-label">Senha</label>
                                    <input type="password" class="form-control" id="inputPassword4" name="password" required>
                                </div>
                                <!-- descomente aqui em baixo caso aluno possa usar foto -->

                                <!-- 
                                <div class="col-3">
                                    <label for="formFile" class="form-label">Foto</label>
                                    <input class="form-control" type="file" id="formFile" onchange="previewFile()">
                                    <div id="previewFoto"></div>
                                    <input type="hidden" id="FotoHiddenInput" name="Foto" value="">
                                </div>
                                -->

                                <div class="col-3">
                                    <label for="inputAniversario" class="form-label">Aniversario</label>
                                    <input type="date" class="form-control" id="inputAniversario" name="Aniversario" placeholder="Aniversario" required>
                                </div>
                                <div class="col-3">
                                    <label for="inputAddress" class="form-label">Endereço</label>
                                    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Rua H.Romeo Pinto" required>
                                </div>
                                <div class="col-2">
                                    <label for="inputCity" class="form-label">Cidade</label>
                                    <input type="text" class="form-control" id="inputCity" name="city" placeholder="Paulinia" required>
                                </div>
                                <div class="col-2">
                                    <label for="inputZip" class="form-label">CEP</label>
                                    <input type="text" class="form-control" id="inputZip" name="zip" required>
                                </div>
                                <div class="col-2">
                                    <label for="inputState" class="form-label">Sexo</label>
                                    <select id="inputState" class="form-select" name="gender" required>
                                        <option value="Masculino" selected>Masculino</option>
                                        <option value="Feminino">Feminino</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="inputnacionalidade" class="form-label">Nacionalidade</label>
                                    <input type="text" class="form-control" id="inputnacionalidade" name="nacionalidade" placeholder="Brasileiro, Alemão..." required>
                                </div>
                                <div class="col-2">
                                    <label for="inputFilmes" class="form-label">Filmes</label>
                                    <select id="inputFilmes" class="form-select" name="lista_filmes" required>
                                        <option>Zack and Miri Make a Porno-</option>
                                        <option>Youth in Revolt<option>
                                        <option>You Will Meet a Tall Dark Stranger</option>
                                        <option>When in Rome</option>
                                        <option>What Happens in Vegas</option>
                                        <option>Water For Elephants</option>
                                        <option>WALL-E</option>
                                        <option>Waitress</option>
                                        <option>Waiting For Forever</option>
                                        <option>Valentine's Day</option>
                                        <option>Tyler Perry's Why Did I get Married</option>
                                        <option>Twilight: Breaking Dawn</option>
                                        <option>The Ugly Truth</option>
                                        <option>The Twilight Saga: New Moon</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="inputPhone" class="form-label">Celular</label>
                                    <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="+19 998......" required>
                                </div>
                                <div class="col-5">
                                    <label for="inputRA" class="form-label">RA</label>
                                    <input type="text" class="form-control" id="inputRA" name="RA" placeholder="22003236" required>
                                </div>
                            </div>
                            
                            <div class="row mt-4 g-3">
                                <h6>Informações Acadêmicas</h6>
                                <div class="col-3">
                                    <label for="inputAssignToClass" class="form-label">Materia:</label>
                                    <select onchange="getSections(this);" class="form-select" id="inputAssignToClass" name="class_id" required>
                                        @isset($school_classes)
                                            <option selected disabled>Favor selecionar uma materia.</option>
                                            @foreach ($school_classes as $school_class)
                                                <option value="{{$school_class->id}}">{{$school_class->class_name}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="inputAssignToSection" class="form-label">Turma:</label>
                                    <select class="form-select" id="inputAssignToSection" name="section_id" required>
                                    </select>
                                </div>

                                <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi bi-person-plus"></i> Adicionar</button>
                                </div>
                            </div>
                        </form>
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
            var sectionSelect = document.getElementById('inputAssignToSection');
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
@include('components.Fotos.Foto-input')
@endsection
