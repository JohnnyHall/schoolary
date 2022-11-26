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
                                    <input type="text" class="form-control" id="inputFirstName" name="first_name" placeholder="Primeiro nome" required>
                                </div>
                                <div class="col-3">
                                    <label for="inputLastName" class="form-label">Sobrenome</label>
                                    <input type="text" class="form-control" id="inputLastName" name="last_name" placeholder="Sobrenome" required>
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
                                    <label for="formFile" class="form-label">Photo</label>
                                    <input class="form-control" type="file" id="formFile" onchange="previewFile()">
                                    <div id="previewPhoto"></div>
                                    <input type="hidden" id="photoHiddenInput" name="photo" value="">
                                </div>
                                -->

                                <div class="col-3">
                                    <label for="inputAniversario" class="form-label">Aniversario</label>
                                    <input type="date" class="form-control" id="inputAniversario" name="Aniversario" placeholder="Aniversario" required>
                                </div>
                                <div class="col-3">
                                    <label for="inputAddress" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="634 Main St" required>
                                </div>
                                <div class="col-2">
                                    <label for="inputCity" class="form-label">City</label>
                                    <input type="text" class="form-control" id="inputCity" name="city" placeholder="Dhaka..." required>
                                </div>
                                <div class="col-2">
                                    <label for="inputZip" class="form-label">Zip</label>
                                    <input type="text" class="form-control" id="inputZip" name="zip" required>
                                </div>
                                <div class="col-2">
                                    <label for="inputState" class="form-label">Gender</label>
                                    <select id="inputState" class="form-select" name="gender" required>
                                        <option value="Male" selected>Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="inputNationality" class="form-label">Nationality</label>
                                    <input type="text" class="form-control" id="inputNationality" name="nationality" placeholder="e.g. Bangladeshi, German, ..." required>
                                </div>
                                <div class="col-2">
                                    <label for="inputFilmes" class="form-label">Filmes</label>
                                    <select id="inputFilmes" class="form-select" name="blood_type" required>
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
                                <div class="col-2">
                                    <label for="inputReligion" class="form-label">Religion</label>
                                    <select id="inputReligion" class="form-select" name="religion" required>
                                        <option selected>Islam</option>
                                        <option>Hinduism</option>
                                        <option>Christianity</option>
                                        <option>Buddhism</option>
                                        <option>Judaism</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="inputPhone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="+880 01......" required>
                                </div>
                                <div class="col-5">
                                    <label for="inputIdCardNumber" class="form-label">Id Card Number</label>
                                    <input type="text" class="form-control" id="inputIdCardNumber" name="id_card_number" placeholder="e.g. 2021-03-01-02-01 (Year Semester Class Section Roll)" required>
                                </div>
                            </div>
                            <div class="row mt-4 g-3">
                                <h6>Parents' Information</h6>
                                <div class="col-3">
                                    <label for="inputFatherName" class="form-label">Father Name</label>
                                    <input type="text" class="form-control" id="inputFatherName" name="father_name" placeholder="Father Name" required>
                                </div>
                                <div class="col-3">
                                    <label for="inputFatherPhone" class="form-label">Father's Phone</label>
                                    <input type="text" class="form-control" id="inputFatherPhone" name="father_phone" placeholder="+880 01......" required>
                                </div>
                                <div class="col-3">
                                    <label for="inputMotherName" class="form-label">Mother Name</label>
                                    <input type="text" class="form-control" id="inputMotherName" name="mother_name" placeholder="Mother Name" required>
                                </div>
                                <div class="col-3">
                                    <label for="inputMotherPhone" class="form-label">Mother's Phone</label>
                                    <input type="text" class="form-control" id="inputMotherPhone" name="mother_phone" placeholder="+880 01......" required>
                                </div>
                                <div class="col-4">
                                    <label for="inputParentAddress" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="inputParentAddress" name="parent_address" placeholder="634 Main St" required>
                                </div>
                            </div>
                            <div class="row mt-4 g-3">
                                <h6>Academic Information</h6>
                                <div class="col-3">
                                    <label for="inputAssignToClass" class="form-label">Assign to class:</label>
                                    <select onchange="getSections(this);" class="form-select" id="inputAssignToClass" name="class_id" required>
                                        @isset($school_classes)
                                            <option selected disabled>Please select a class</option>
                                            @foreach ($school_classes as $school_class)
                                                <option value="{{$school_class->id}}">{{$school_class->class_name}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="inputAssignToSection" class="form-label">Assign to section:</label>
                                    <select class="form-select" id="inputAssignToSection" name="section_id" required>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="inputBoardRegistrationNumber" class="form-label">Board registration No.</label>
                                    <input type="text" class="form-control" id="inputBoardRegistrationNumber" name="board_reg_no" placeholder="Registration No.">
                                </div>
                                <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi bi-person-plus"></i> Add</button>
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
@include('components.photos.photo-input')
@endsection
