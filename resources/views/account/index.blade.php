@extends('shared.layout')
@section('title', 'Manajemen Akun')
@section('content')
<div class="container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"> {{ config("app.name") }} </a></li>
            <li class="breadcrumb-item active">
                <a href="{{ route('account.index') }}"> Manajemen Akun </a>
            </li>
        </ol>
    </nav>

    <h1 class='mb-5'>
        <i class='fa fa-users'></i>
        Manajemen Akun
    </h1>

    @include("shared.messages")

    <div class="d-flex justify-content-end my-3">
        <a href="{{ route('account.create') }}" class="btn btn-info btn-sm">
            Tambah Akun
            <i class="fa fa-plus"></i>
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <i class="fa fa-users"></i>
            Daftar Akun
        </div>
        <div class="card-body">
            <div class='table-responsive'>
                <table class='table table-sm table-bordered table-striped'>
                   <thead class='thead thead-light'>
                        <tr>
                            <th> # </th>
                            <th> Nama Pengguna </th>
                            <th> Kata Sandi </th>
                            <th class="text-center"> Kendali </th>
                        </tr>
                   </thead>
                   <tbody>
                       @foreach ($accounts as $account)
                        <tr>
                            <td> {{ $loop->iteration }}. </td>
                            <td> {{ $account->username }} </td>
                            <td> {{ $account->value }} </td>
                            <td class="text-center">
                                <a class="btn btn-info btn-sm" href="{{ route('account.edit', $account) }}">
                                    Sunting
                                    <i class="fa fa-pencil"></i>
                                </a>

                                <form action='{{ route('account.delete', $account) }}' method='POST' class='d-inline-block confirmed'>
                                    @csrf
                                    <button type='submit' class='btn btn-danger btn-sm'>
                                        Hapus
                                        <i class='fa fa-trash'></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                       @endforeach
                   </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-scripts')
<script>
    $(document).ready(function() {
        $(".table").DataTable(window.datatables_config)
    })
</script>
@endsection