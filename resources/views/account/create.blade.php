@extends('shared.layout')
@section('title', 'Tambah Akun')
@section('content')
<div class="container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"> {{ config("app.name") }} </a></li>
            <li class="breadcrumb-item"><a href="{{ route('account.index') }}"> Manajemen Akun </a></li>
            <li class="breadcrumb-item active">
                <a href="{{ route('account.create') }}"> Tambah Akun </a>
            </li>
        </ol>
    </nav>

    <h1 class='mb-5'>
        <i class='fa fa-plus'></i>
        Tambah Akun
    </h1>

    <div class="card">
        <div class="card-header">
            <i class="fa fa-plus"></i>
            Tambah Akun
        </div>
        <div class="card-body">
            <form action="{{ route('account.store') }}" method="post">
                @csrf

                <div class='form-group'>
                    <label for='username'> Nama Pengguna: </label>
                
                    <input
                        id='username' name='username' type='text'
                        placeholder='Nama Pengguna'
                        value='{{ old('username') }}'
                        class='form-control {{ !$errors->has('username') ?: 'is-invalid' }}'>
                
                    <div class='invalid-feedback'>
                        {{ $errors->first('username') }}
                    </div>
                </div>
    
                <div class='form-group'>
                    <label for='password'> Kata Sandi: </label>
                
                    <input
                        id='password' name='password' type='password'
                        placeholder='Kata Sandi'
                        value='{{ old('password') }}'
                        class='form-control {{ !$errors->has('password') ?: 'is-invalid' }}'>
                
                    <div class='invalid-feedback'>
                        {{ $errors->first('password') }}
                    </div>
                </div>
    
                <div class='form-group'>
                    <label for='password_confirmation'> Ulangi Kata Sandi: </label>
                
                    <input
                        id='password_confirmation' name='password_confirmation' type='password'
                        placeholder='Ulangi Kata Sandi'
                        value='{{ old('password_confirmation') }}'
                        class='form-control {{ !$errors->has('password_confirmation') ?: 'is-invalid' }}'>
                
                    <div class='invalid-feedback'>
                        {{ $errors->first('password_confirmation') }}
                    </div>
                </div>
    
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary btn-sm">
                        Tambah Akun
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection