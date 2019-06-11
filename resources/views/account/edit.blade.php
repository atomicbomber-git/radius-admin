@extends('shared.layout')
@section('title', 'Sunting Akun')
@section('content')
<div class="container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"> {{ config("app.name") }} </a></li>
            <li class="breadcrumb-item"><a href="{{ route('account.index') }}"> Manajemen Akun </a></li>
            <li class="breadcrumb-item active">
                <a href="{{ route('account.edit', $account) }}"> Sunting Akun </a>
            </li>
        </ol>
    </nav>

    <h1 class='mb-5'>
        <i class='fa fa-pencil'></i>
        Sunting Akun
    </h1>

    @include("shared.messages")

    <div class="card">
        <div class="card-header">
            <i class="fa fa-pencil"></i>
            Sunting Akun
        </div>
        <div class="card-body">
            <form action="{{ route('account.update', $account) }}" method="post">
                @csrf

                <div class='form-group'>
                    <label for='username'> Nama Pengguna: </label>
                
                    <input
                        id='username' name='username' type='text'
                        placeholder='Nama Pengguna'
                        value='{{ old('username', $account->username) }}'
                        class='form-control {{ !$errors->has('username') ?: 'is-invalid' }}'>
                
                    <div class='invalid-feedback'>
                        {{ $errors->first('username') }}
                    </div>
                </div>
    
                <div class='form-group'>
                    <label for='password'> Kata Sandi: </label>
                
                    <input
                        id='password' name='password' type='text'
                        placeholder='Kata Sandi'
                        value='{{ old('password', $account->value) }}'
                        class='form-control {{ !$errors->has('password') ?: 'is-invalid' }}'>
                
                    <div class='invalid-feedback'>
                        {{ $errors->first('password') }}
                    </div>
                </div>

    
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary btn-sm">
                        Perbarui Akun
                        <i class="fa fa-check"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection