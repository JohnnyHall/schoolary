@extends('layouts.app')

@section('content')
<style>
    .card {
        border: 1px solid #000;
        border-radius: 0px;
    }
</style>
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-person-lines-fill"></i> Perfil do aluno
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{route('aluno.list.show')}}">Voltar</a></li>
                        </ol>
                    </nav>
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-sm-4 col-md-3">
                                <div class="card bg-light">
                                    <div class="px-5 pt-2">
                                        @if (isset($aluno->photo))
                                            <img src="{{asset('/storage'.$aluno->photo)}}" class="rounded-3 card-img-top" alt="Profile photo">
                                        @else
                                            <img src="{{asset('imgs/no-nothing-480.png')}}" class="rounded-3 card-img-top" alt="Profile photo">
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$aluno->primeiro_nome}} {{$aluno->sobrenome}}</h5>
                                        <p class="card-text">RA: {{$promotion_info->RA}}</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Sexo: {{$aluno->gender}}</li>
                                        <li class="list-group-item">Celular: {{$aluno->phone}}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-8 col-md-9">
                                <div class="p-3 mb-3 border rounded bg-white">
                                    <h4>Informações do aluno</h4>
                                    <table class="table table-responsive mt-3">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Primeiro nome:</th>
                                                <td>{{$aluno->primeiro_nome}}</td>
                                                <th>Sobrenome:</th>
                                                <td>{{$aluno->sobrenome}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email:</th>
                                                <td>{{$aluno->email}}</td>
                                                <th>Aniversario:</th>
                                                <td>{{$aluno->Aniversario}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Nacionalidade:</th>
                                                <td>{{$aluno->nacionalidade}}</td>
                                                <th scope="row">Endereço:</th>
                                                <td>{{$aluno->address}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Cidade:</th>
                                                <td>{{$aluno->city}}</td>
                                                <th>CEP:</th>
                                                <td>{{$aluno->zip}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Filme:</th>
                                                <td>{{$aluno->lista_filmes}}</td>
                                                <th>Phone:</th>
                                                <td>{{$aluno->phone}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Sexo:</th>
                                                <td colspan="3">{{$aluno->gender}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
  
                                <div class="p-3 mb-3 border rounded bg-white">
                                    <h4>Informações Acadêmicas</h4>
                                    <table class="table table-responsive mt-3">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Materia:</th>
                                                <td>{{$promotion_info->section->schoolClass->class_name}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Turma:</th>
                                                <td colspan="3">{{$promotion_info->section->section_name}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
