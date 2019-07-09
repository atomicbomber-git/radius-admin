@extends('shared.layout')
@section('title', 'Sunting Admin')
@section('content')
<div class="container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"> {{ config("app.name") }} </a></li>
            <li class="breadcrumb-item">
                <a href="{{ route('user.index') }}">
                    Manajemen Admin
                </a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('user.edit', $user) }}"> Ubah Admin </a>
            </li>
        </ol>
    </nav>

    <h1 class='mb-5'>
        <i class='fa fa-pencil'></i>
        Sunting Admin
    </h1>

    @include("shared.messages")

    <div class="card">
        <div class="card-header">
            <i class="fa fa-pencil"></i>
            Sunting Admin
        </div>
        <div class="card-body">
            <form method='POST' action='{{ route('user.update', $user) }}'>
                @csrf

                <div class='form-group'>
                    <label for='name'> Nama Asli: </label>

                    <input
                        id='name' name='name' type='text'
                        placeholder='Nama Asli'
                        value='{{ old('name', $user->name) }}'
                        class='form-control {{ !$errors->has('name') ?: 'is-invalid' }}'>

                    <div class='invalid-feedback'>
                        {{ $errors->first('name') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='username'> Nama Pengguna: </label>

                    <input
                        id='username' name='username' type='text'
                        placeholder='Nama Pengguna'
                        value='{{ old('username', $user->username) }}'
                        class='form-control {{ !$errors->has('username') ?: 'is-invalid' }}'>

                    <div class='invalid-feedback'>
                        {{ $errors->first('username') }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="level"> Level: </label>
                    <select class="custom-select {{ !$errors->has('level') ?: 'is-invalid' }}" name="level" id="level">
                        @foreach (\App\Enums\UserLevel::LEVELS as $key => $value)
                        <option
                            {{ old('level', $user->level) === $key ? "selected" : "" }}
                            value="{{ $key }}">
                            {{ $value }}
                        </option>
                        @endforeach
                    </select>
                    <div class='invalid-feedback'>
                        {{ $errors->first('level') }}
                    </div>
                </div>

                <div class="alert alert-info">
                    <i class="fa fa-info"></i>
                    Kosongkan kolom kata sandi jika Anda tidak ingin mengubah data tersebut.
                </div>

                <div class='form-group'>
                    <label for='password'> Kata Sandi: </label>

                    <input
                        id='password' name='password' type='text'
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
                        id='password_confirmation' name='password_confirmation' type='text'
                        placeholder='Ulangi Kata Sandi'
                        value='{{ old('password_confirmation') }}'
                        class='form-control {{ !$errors->has('password_confirmation') ?: 'is-invalid' }}'>

                    <div class='invalid-feedback'>
                        {{ $errors->first('password_confirmation') }}
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary btn-sm">
                        Ubah Admin
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
