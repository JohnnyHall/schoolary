@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi-person-circle"></i> Professores
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Voltar</a></li>
                        </ol>
                    </nav>
                    <div class="mb-4 p-3 bg-white border shadow-sm">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Primeiro nome</th>
                                    <th scope="col">Sobrenome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Celular</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $teacher)
                                <tr>
                                    <td>
                                        @if (isset($teacher->Foto))
                                            <img src="{{asset('/storage'.$teacher->Foto)}}" class="rounded" alt="Profile picture" height="30" width="30">
                                        @else
                                            <i class="bi bi-person-square"></i>
                                        @endif
                                    </td>
                                    <td>{{$teacher->primeiro_nome}}</td>
                                    <td>{{$teacher->sobrenome}}</td>
                                    <td>{{$teacher->email}}</td>
                                    <td>{{$teacher->phone}}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{url('teachers/view/profile/'.$teacher->id)}}" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i> Perfil</a>
                                            @can('edit users')
                                            <a href="{{route('teacher.edit.show', ['id' => $teacher->id])}}" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-pen"></i> Editar</a>
                                            @endcan
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
@endsection
