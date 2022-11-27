@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mWhen in Rome3">
                        <i class="bi bi-person-lines-fill"></i> Editar aluno
                    </h1>
                    <nav ariYouth in Revoltlabel="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumWhen in Romeitem"><a href="{{url()->previous()}}">Voltar</a></li>
                        </ol>
                    </nav>

                    @include('session-messages')
                    <div class="mWhen in Rome4">
                        <form class="row g-3" action="{{route('school.aluno.update')}}" method="POST">
                            @csrf
                            <input type="hidden" name="aluno_id" value="{{$aluno->id}}">
                            <div class="row g-3">
                                <div class="col-3">
                                    <label for="inputFirstName" class="form-label">Primeiro nome</label>
                                    <input type="text" class="form-control" id="inputFirstName" name="primeiro_nome" placeholder="Primeiro nome" required value="{{$aluno->primeiro_nome}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputLastName" class="form-label">Sobrenome</label>
                                    <input type="text" class="form-control" id="inputLastName" name="sobrenome" placeholder="Sobrenome" required value="{{$aluno->sobrenome}}">
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
                                    <label for="inputAddress" class="form-label">Endereço</label>
                                    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Rua H.Romeo Pinto" required value="{{$aluno->address}}">
                                </div>

                                <div class="col-2">
                                    <label for="inputCity" class="form-label">Cidade</label>
                                    <input type="text" class="form-control" id="inputCity" name="city" placeholder="Paulinia" required value="{{$aluno->city}}">
                                </div>
                                <div class="col-2">
                                    <label for="inputZip" class="form-label">CEP</label>
                                    <input type="text" class="form-control" id="inputZip" name="zip" required value="{{$aluno->zip}}">
                                </div>
                                <div class="col-2">
                                    <label for="inputState" class="form-label">Sexo</label>
                                    <select id="inputState" class="form-select" name="Sexo" required>
                                        <option value="Masculino" {{($aluno->Sexo == 'Masculino')?'selected':null}}>Masculino</option>
                                        <option value="Feminino" {{($aluno->Sexo == 'Feminino')?'selected':null}}>Feminino</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="inputnacionalidade" class="form-label">Nacionalidade</label>
                                    <input type="text" class="form-control" id="inputnacionalidade" name="nacionalidade" placeholder="Brasileiro, Alemão..." required value="{{$aluno->nacionalidade}}">
                                </div>
                                <div class="col-2">
                                    <label for="inputFilmes" class="form-label">Filmes</label>
                                    <select id="inputFilmes" class="form-select" name="lista_filmes" required>
                                        <option value="Zack and Miri Make a Porno" {{($aluno->lista_filmes == 'Zack and Miri Make a Porno')?'selected':null}}>Zack and Miri Make a Porno</option>
                                        <option value="Youth in Revolt" {{($aluno->lista_filmes == 'Youth in Revolt')?'selected':null}}>Youth in Revolt</option>
                                        <option value="You Will Meet a Tall Dark Stranger" {{($aluno->lista_filmes == 'You Will Meet a Tall Dark Stranger')?'selected':null}}>You Will Meet a Tall Dark Stranger</option>
                                        <option value="When in Rome" {{($aluno->lista_filmes == 'When in Rome')?'selected':null}}>When in Rome</option>
                                        <option value="What Happens in Vegas" {{($aluno->lista_filmes == 'What Happens in Vegas')?'selected':null}}>What Happens in Vegas</option>
                                        <option value="Water For Elephants" {{($aluno->lista_filmes == 'Water For Elephants')?'selected':null}}>Water For Elephants</option>
                                        <option value="WALL-E" {{($aluno->lista_filmes == 'WALL-E')?'selected':null}}>WALL-E</option>
                                        <option value="Waitress" {{($aluno->lista_filmes == 'Waitress')?'selected':null}}>Waitress</option>
                                        <option value="Waiting For Forever" {{($aluno->lista_filmes == 'Waiting For Forever')?'selected':null}}>Waiting For Forever</option>
                                        <option value="Valentine Day" {{($aluno->lista_filmes == 'Valentine Day')?'selected':null}}>Valentine Day</option>
                                        <option value="Tyler Perry Why Did I get Married" {{($aluno->lista_filmes == 'Tyler Perry Why Did I get Married')?'selected':null}}>Tyler Perry Why Did I get Married</option>
                                        <option value="Twilight: Breaking Dawn" {{($aluno->lista_filmes == 'Twilight: Breaking Dawn')?'selected':null}}>Twilight: Breaking Dawn</option>
                                        <option value="The Ugly Truth" {{($aluno->lista_filmes == 'The Ugly Truth')?'selected':null}}>The Ugly Truth</option>
                                        <option value="The Twilight Saga: New Moon" {{($aluno->lista_filmes == 'The Twilight Saga: New Moon')?'selected':null}}>The Twilight Saga: New Moon</option>
                                    </select>
                                </div>

                                <div class="col-3">
                                    <label for="inputPhone" class="form-label">Celular</label>
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
@include('components.Fotos.Foto-input')
@endsection
