@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-person-lines-fill"></i> Add Teacher
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Teacher</li>
                        </ol>
                    </nav>

                    @include('session-messages')

                    <div class="mb-4">
                        <form class="row g-3" action="{{route('school.teacher.create')}}" method="POST">
                            @csrf
                            <div class="col-3">
                                <label for="inputFirstName" class="form-label">Primeiro nome</label>
                                <input type="text" class="form-control" id="inputFirstName" name="first_name" placeholder="Primeiro nome" required>
                            </div>
                            <div class="col-3">
                                <label for="inputLastName" class="form-label">Sobrenome</label>
                                <input type="text" class="form-control" id="inputLastName" name="last_name" placeholder="Sobrenome" required>
                            </div>
                            <div class="col-3">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail" name="email" required>
                            </div>
                            <div class="col-3">
                                <label for="inputPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="inputPassword" name="password" required>
                            </div>
                            <div class="col-3">
                                <label for="formFile" class="form-label">Photo</label>
                                <input class="form-control" type="file" id="formFile" onchange="previewFile()">
                                <div id="previewPhoto"></div>
                                <input type="hidden" id="photoHiddenInput" name="photo" value="">
                            </div>
                            <div class="col-4">
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
                            <div class="col-3">
                                <label for="inputPhone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="+880 01......" required>
                            </div>
                            <div class="col-2">
                                <label for="inputGender" class="form-label">Gender</label>
                                <select id="inputGender" class="form-select" name="gender" required>
                                    <option selected>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="inputNationality" class="form-label">Nationality</label>
                                <input type="text" class="form-control" id="inputNationality" name="nationality" placeholder="e.g. Bangladeshi, German, ..." required>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi bi-person-plus"></i> Add</button>
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
