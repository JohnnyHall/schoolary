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
                        <i class="bi bi-person-lines-fill"></i> professor
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('professor.list.show')}}">Voltar</a></li>                        </ol>
                        </ol>
                    </nav>
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-sm-4 col-md-3">
                                <div class="card bg-light">
                                    <div class="px-5 pt-2">
                                        @if (isset($professor->Foto))
                                            <img src="{{asset('/storage'.$professor->Foto)}}" class="rounded-3 card-img-top" alt="Profile Foto">
                                        @else
                                            <img src="{{asset('imgs/no-nothing-480.png')}}" class="rounded-3 card-img-top" alt="Profile Foto">
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$professor->primeiro_nome}} {{$professor->sobrenome}}</h5>
                                    </div>
                
                                </div>
                            </div>
                            <div class="col-sm-8 col-md-9">
                                <div class="p-3 mb-3 border rounded bg-white">
                                    <h4>Informações do professor</h4>
                                    <table class="table table-responsive mt-3">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Primeiro nome:</th>
                                                <td>{{$professor->primeiro_nome}}</td>
                                                <th>Sobrenome:</th>
                                                <td>{{$professor->sobrenome}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email:</th>
                                                <td>{{$professor->email}}</td>
                                                <th scope="row">Nacionalidade:</th>
                                                <td>{{$professor->nacionalidade}}</td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr>
                                                <th scope="row">Endereço:</th>
                                                <td>{{$professor->address}}</td>
                                                <th>Sexo:</th>
                                                <td>{{$professor->Sexo}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Cidade:</th>
                                                <td>{{$professor->city}}</td>
                                                <th>CEP:</th>
                                                <td>{{$professor->zip}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Celular:</th>
                                                <td>{{$professor->phone}}</td>
                                            </tr>
                                            <tr>
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
