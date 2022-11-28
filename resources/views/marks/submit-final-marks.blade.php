@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-code-slash"></i> Entragar as notas finais!
                    </h1>
                    @include('session-messages')
                    <h4>Materia: {{$class_name}}, Turma: {{$section_name}}</h4>
                    <h4>Curso: {{$course_name}}</h4>
                    <form action="{{route('course.final.mark.submit.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                        <div class="row mt-3">
                            <div class="col">
                                <div class="table-responsive">
                                    
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nome do aluno</th>
                                                <th scope="col">Nota calculada</th>
                                                <th scope="col">Nota final</th>
                                                <th scope="col">Anotação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @isset($alunos_with_marks)
                                                    @foreach ($alunos_with_marks as $id => $alunos_with_mark)
                                                    <tr>
                                                        <td>{{$alunos_with_mark[0]->aluno->primeiro_nome}} {{$alunos_with_mark[0]->aluno->sobrenome}}</td>
                                                        @php
                                                            $calculated_marks = 0;
                                                        @endphp
                                                        @foreach ($alunos_with_mark as $st)
                                                            @php
                                                                $calculated_marks += $st->marks;
                                                            @endphp
                                                        @endforeach
                                                        <td><input type="number" step="0.01" class="form-control" name="calculated_mark[{{$alunos_with_mark[0]->aluno->id}}]" value="{{$calculated_marks}}" readonly></td>
                                                        <td><input type="number" step="0.01" class="form-control" name="final_mark[{{$alunos_with_mark[0]->aluno->id}}]" required></td>
                                                        <td><textarea type="text" class="form-control" rows="1" name="note[{{$alunos_with_mark[0]->aluno->id}}]" placeholder="Esqueceu de responder..."></textarea></td>
                                                    </tr>
                                                    @endforeach
                                                @endisset
                                            <input type="hidden" name="semester_id" value="{{$semester_id}}">
                                            <input type="hidden" name="class_id" value="{{$class_id}}">
                                            <input type="hidden" name="section_id" value="{{$section_id}}">
                                            <input type="hidden" name="course_id" value="{{$course_id}}">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-outline-primary"><i class="bi bi-check2"></i> Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
