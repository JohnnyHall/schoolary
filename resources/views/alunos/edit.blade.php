@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-person-lines-fill"></i> Editar aluno
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url()->previous()}}">Voltar</a></li>
                        </ol>
                    </nav>

                    @include('session-messages')
                    <div class="mb-4">
                        <form class="row g-3" action="{{route('school.aluno.update')}}" method="POST">
                            @csrf
                            <input type="hidden" name="aluno_id" value="{{$aluno->id}}">
                            <div class="row g-3">
                                <div class="col-3">
                                    <label for="inputFirstName" class="form-label">Primeiro nome</label>
                                    <input type="text" class="form-control" id="inputFirstName" name="first_name" placeholder="Primeiro nome" required value="{{$aluno->first_name}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputLastName" class="form-label">Sobrenome</label>
                                    <input type="text" class="form-control" id="inputLastName" name="last_name" placeholder="Sobrenome" required value="{{$aluno->last_name}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputEmail4" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4" name="email" required value="{{$aluno->email}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputAniversario" class="form-label">Aniversario</label>
                                    <input type="date" class="form-control" id="inputAniversario" name="Aniversario" placeholder="Aniversario" required value="{{$aluno->Aniversario}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputAddress" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="634 Main St" required value="{{$aluno->address}}">
                                </div>

                                <div class="col-2">
                                    <label for="inputCity" class="form-label">City</label>
                                    <input type="text" class="form-control" id="inputCity" name="city" placeholder="Dhaka..." required value="{{$aluno->city}}">
                                </div>
                                <div class="col-2">
                                    <label for="inputZip" class="form-label">Zip</label>
                                    <input type="text" class="form-control" id="inputZip" name="zip" required value="{{$aluno->zip}}">
                                </div>
                                <div class="col-2">
                                    <label for="inputState" class="form-label">Gender</label>
                                    <select id="inputState" class="form-select" name="gender" required>
                                        <option value="Male" {{($aluno->gender == 'Male')?'selected':null}}>Male</option>
                                        <option value="Female" {{($aluno->gender == 'Female')?'selected':null}}>Female</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="inputNationality" class="form-label">Nationality</label>
                                    <input type="text" class="form-control" id="inputNationality" name="nationality" placeholder="e.g. Bangladeshi, German, ..." required value="{{$aluno->nationality}}">
                                </div>
                                <div class="col-2">
                                    <label for="inputFilmes" class="form-label">Filmes</label>
                                    <select id="inputFilmes" class="form-select" name="lista_filmes" required>
                                        <option value="A+" {{($aluno->lista_filmes == 'A+')?'selected':null}}>A+</option>
                                        <option value="A-" {{($aluno->lista_filmes == 'A-')?'selected':null}}>A-</option>
                                        <option value="B+" {{($aluno->lista_filmes == 'B+')?'selected':null}}>B+</option>
                                        <option value="B-" {{($aluno->lista_filmes == 'B-')?'selected':null}}>B-</option>
                                        <option value="O+" {{($aluno->lista_filmes == 'O+')?'selected':null}}>O+</option>
                                        <option value="O-" {{($aluno->lista_filmes == 'O-')?'selected':null}}>O-</option>
                                        <option value="AB+" {{($aluno->lista_filmes == 'AB+')?'selected':null}}>AB+</option>
                                        <option value="AB-" {{($aluno->lista_filmes == 'AB-')?'selected':null}}>AB-</option>
                                        <option value="Other" {{($aluno->lista_filmes == 'Other')?'selected':null}}>Other</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="inputReligion" class="form-label">Religion</label>
                                    <select id="inputReligion" class="form-select" name="religion" required>
                                        <option {{($aluno->religion == 'Islam')?'selected':null}}>Islam</option>
                                        <option {{($aluno->religion == 'Hinduism')?'selected':null}}>Hinduism</option>
                                        <option {{($aluno->religion == 'Christianity')?'selected':null}}>Christianity</option>
                                        <option {{($aluno->religion == 'Buddhism')?'selected':null}}>Buddhism</option>
                                        <option {{($aluno->religion == 'Judaism')?'selected':null}}>Judaism</option>
                                        <option {{($aluno->religion == 'Other')?'selected':null}}>Other</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="inputPhone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="+880 01......" required value="{{$aluno->phone}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputRA" class="form-label">RA</label>
                                    <input type="text" class="form-control" id="inputRA" name="RA" placeholder="e.g. 2021-03-01-02-01 (Year Semester Class Section Roll)" required value="{{$promotion_info->RA}}">
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi bi-person-check"></i> Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@include('components.photos.photo-input')
@endsection
