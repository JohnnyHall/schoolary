@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-person-lines-fill"></i> Editar professor
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url()->previous()}}">Voltar</a></li>
                        </ol>
                    </nav>

                    @include('session-messages')

                    <div class="mb-4">
                        <form class="row g-3" action="{{route('school.professor.update')}}" method="POST">
                            @csrf
                            <input type="hidden" name="professor_id" value="{{$professor->id}}">
                            <div class="col-3">
                                <label for="inputFirstName" class="form-label">Primeiro nome</label>
                                <input type="text" class="form-control" id="inputFirstName" name="primeiro_nome" placeholder="Primeiro nome" required value="{{$professor->primeiro_nome}}">
                            </div>
                            <div class="col-3">
                                <label for="inputLastName" class="form-label">Sobrenome</label>
                                <input type="text" class="form-control" id="inputLastName" name="sobrenome" placeholder="Sobrenome" required value="{{$professor->sobrenome}}">
                            </div>
                            <div class="col-3">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail" name="email" required value="{{$professor->email}}">
                            </div>
                            <div class="col-4">
                                <label for="inputAddress" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Rua H.Romeo Pinto" required value="{{$professor->address}}">
                            </div>

                            <div class="col-2">
                                <label for="inputCity" class="form-label">Cidade</label>
                                <input type="text" class="form-control" id="inputCity" name="city" placeholder="Paulinia" required value="{{$professor->city}}">
                            </div>
                            <div class="col-2">
                                <label for="inputZip" class="form-label">CEP</label>
                                <input type="text" class="form-control" id="inputZip" name="zip" required value="{{$professor->zip}}">
                            </div>
                            <div class="col-3">
                                <label for="inputPhone" class="form-label">Celular</label>
                                <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="+19 998......" required value="{{$professor->phone}}">
                            </div>
                            <div class="col-2">
                                <label for="inputState" class="form-label">Sexo</label>
                                <select id="inputState" class="form-select" name="Sexo" required>
                                    <option value="Masculino" {{($professor->Sexo == 'Masculino')?'selected':null}}>Masculino</option>
                                    <option value="Feminino" {{($professor->Sexo == 'Feminino')?'selected':null}}>Feminino</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="inputnacionalidade" class="form-label">Nacionalidade</label>
                                <input type="text" class="form-control" id="inputnacionalidade" name="nacionalidade" placeholder="Brasileiro, Alemão..." required value="{{$professor->nacionalidade}}">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi bi-person-check"></i> Atualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@include('components.Fotos.Foto-input')
@endsection
