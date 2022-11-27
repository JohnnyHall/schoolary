@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-3">
                <div class="col ps-4">
                    <div class="row Central">

                        <div class="col">
                            <div class="card rounded-pill">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold"><i class="bi bi-person-lines-fill me-3"></i> Numero de estudantes</div>
                                        </div>
                                        <span class="badge bg-dark rounded-pill">{{$alunoCount}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card rounded-pill">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold"><i class="bi bi-person-lines-fill me-3"></i> Numero de professores</div>
                                        </div>
                                        <span class="badge bg-dark rounded-pill">{{$teacherCount}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card rounded-pill">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold"><i class="bi bi-book-fill"></i> Numero de matérias</div>
                                        </div>
                                        <span class="badge bg-dark rounded-pill">{{ $classCount }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @if(Auth::user()->role == "secretaria")
                    <div class="row align-items-md-stretch mt-4">
                        <div style="text-align:center;">
                            <div class="col">
                                <div class="p-3 text-white bg-dark rounded-3">
                                    <h3> Seja bem vindo a area logada da secretaria!</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif  
                    
                    @if(Auth::user()->role == "teacher")
                    <div class="row align-items-md-stretch mt-4">
                        <div style="text-align:center;">
                            <div class="col">
                                <div class="p-3 text-white bg-dark rounded-3">
                                    <h3> Seja bem vindo a area logada do professor! </h3>
                                    <p>teacher</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    @if(Auth::user()->role == "aluno")
                    <div class="row align-items-md-stretch mt-4">
                        <div style="text-align:center;">
                            <div class="col">
                                <div class="p-3 text-white bg-dark rounded-3">
                                    <h3> Seja bem vindo a area logada do aluno! </h3>
                                    <p>aluno</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    @if($alunoCount > 0)
                    <div class="mt-3 d-flex align-items-center">
                        {{-- <div class="col-9 d-flex flex-row" style="height: 10px;">
                            <div class="bg-dark border text-white" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px; width: {{($MasculinoalunosBySession/$alunoCount) * 100}}%"> </div>
                            <div class="bg-white border text-dark" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px; width: {{(($alunoCount - $MasculinoalunosBySession)/$alunoCount) * 100}}%"> </div>
                        </div> --}}
                        <div class="col-3">
                            <span class="badge rounded-pill border" style="background-color: #fc053e;">Masculino</span>
                            <span class="badge rounded-pill border" style="background-color: #49a4fe;">Feminino</span>
                        </div>
                        <div class="col-9 progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="background-color: #0678c8; width: {{round(($MasculinoalunosBySession/$alunoCount), 2) * 100}}%" aria-valuenow="{{round(($MasculinoalunosBySession/$alunoCount), 2) * 100}}" aria-valuemin="0" aria-valuemax="100">{{round(($MasculinoalunosBySession/$alunoCount), 2) * 100}}%</div>
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="background-color: #49a4fe; width: {{round((($alunoCount - $MasculinoalunosBySession)/$alunoCount), 2) * 100}}%" aria-valuenow="{{round((($alunoCount - $MasculinoalunosBySession)/$alunoCount), 2) * 100}}" aria-valuemin="0" aria-valuemax="100">{{round((($alunoCount - $MasculinoalunosBySession)/$alunoCount), 2) * 100}}%</div>
                        </div>
                    </div>
                    @endif

                    <div class="row row-cols-2 mt-4">
                        <div class="col">
                            <div class="card mb-3">
                                <div class="card-header bg-transparent"><i class="bi bi-calendar-event me-2"></i> Calendario acadêmico</div>
                                <div class="card-body text-dark">
                                    @include('components.events.event-calendar', ['editable' => 'false', 'selectable' => 'false'])
                                    {{-- <div class="overflow-auto" style="height: 250px;">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1">List group item heading</h5>
                                                    <small>3 days ago</small>
                                                </div>
                                                <p class="mb-1">Some placeholder content in a paragraph.</p>
                                                <small>And some small print.</small>
                                            </a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mb-3">
                                <div class="card-header bg-transparent d-flex justify-content-between"><span><i class="bi bi-megaphone me-2"></i> Avisos</span> {{ $notices->links() }}</div>
                                <div class="card-body p-0 text-dark">
                                    <div>
                                        @isset($notices)
                                        <div class="accordion accordion-flush" id="noticeAccordion">
                                            @foreach ($notices as $notice)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-heading{{$notice->id}}">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$notice->id}}" aria-expanded={{($loop->first)?"true":"false"}} aria-controls="flush-collapse{{$notice->id}}">
                                                        Published at: {{$notice->created_at}}
                                                    </button>
                                                </h2>
                                                <div id="flush-collapse{{$notice->id}}" class="accordion-collapse collapse {{($loop->first)?"show":"hide"}}" aria-labelledby="flush-heading{{$notice->id}}" data-bs-parent="#noticeAccordion">
                                                    <div class="accordion-body overflow-auto">{!!Purify::clean($notice->notice)!!}</div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endisset
                                            @if(count($notices) < 1)
                                                <div class="p-3">Sem avisos por enquanto.</div>
                                            @endif
                                        </div>
                                    </div>
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