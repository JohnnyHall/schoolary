@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-calendar2-week"></i> Take Attendance
                    </h1>

                    @include('session-messages')

                    <h3><i class="bi bi-compass"></i>
                        Class #{{request()->query('class_name')}}, 
                        @if ($academic_setting->attendance_type == 'course')
                            Course: {{request()->query('course_name')}}
                        @else
                            Section #{{request()->query('section_name')}}
                        @endif
                    </h3>
                    <div class="mt-4">Current Date and Time: {{ date('Y-m-d H:i:s') }}</div>
                    <div class="row mt-4">
                        <div class="col-10 bg-white border p-3 shadow-sm">
                            <form action="{{route('attendances.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                                <input type="hidden" name="class_id" value="{{request()->query('class_id')}}">
                                @if ($academic_setting->attendance_type == 'course')
                                    <input type="hidden" name="course_id" value="{{request()->query('course_id')}}">
                                    <input type="hidden" name="section_id" value="0">
                                @else
                                    <input type="hidden" name="course_id" value="0">
                                    <input type="hidden" name="section_id" value="{{request()->query('section_id')}}">
                                @endif
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col"># RA</th>
                                            <th scope="col">aluno Name</th>
                                            <th scope="col">Present</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($aluno_list as $aluno)
                                        <input type="hidden" name="aluno_ids[]" value="{{$aluno->aluno_id}}">
                                        <tr>
                                            <th scope="row">{{$aluno->RA}}</th>
                                            <td>{{$aluno->aluno->primeiro_nome}} {{$aluno->aluno->sobrenome}}</td>
                                            <td>
                                                <input class="form-check-input" type="checkbox" name="status[{{$aluno->aluno_id}}]" checked>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if(count($aluno_list) > 0 && $attendance_count < 1)
                                <div class="mb-4">
                                    <button type="submit" class="btn btn-outline-primary"><i class="bi bi-check2"></i> Submit</button>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
