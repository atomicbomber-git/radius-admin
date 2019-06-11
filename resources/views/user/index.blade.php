@extends('shared.layout')
@section('title', 'Manajemen Admin')
@section('content')
<div class="container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"> {{ config("app.name") }} </a></li>
            <li class="breadcrumb-item active">
                <a href="{{ route('user.index') }}"> Manajemen Admin </a>
            </li>
        </ol>
    </nav>

    <h1 class='mb-5'>
        <i class='fa fa-wrench'></i>
        Manajemen Admin
    </h1>

    @include("shared.messages")

    <div class="d-flex justify-content-end my-3">
        <a href="{{ route('user.create') }}" class="btn btn-info btn-sm">
            Tambah Admin
            <i class="fa fa-plus"></i>
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <i class="fa fa-wrench"></i>
            Manajemen Admin
        </div>
        <div class="card-body">
            <div class='table-responsive'>
                <table class='table table-sm table-bordered table-striped'>
                   <thead class='thead thead-light'>
                        <tr>
                            <th> # </th>
                            <th> Nama Asli </th>
                            <th> Nama Pengguna </th>
                            <th class="text-center"> Kendali </th>
                        </tr>
                   </thead>
                   <tbody>
                       @foreach ($users as $user)
                        <tr>
                            <td> {{ $loop->iteration }}. </td>
                            <td> {{ $user->name }} </td>
                            <td> {{ $user->username }} </td>
                            <td class="text-center">
                                <a href="{{ route('user.edit', $user) }}" class="btn btn-info btn-sm">
                                    Sunting
                                    <i class="fa fa-pencil"></i>
                                </a>

                                <form action='{{ route('user.delete', $user->id) }}' method='POST' class='d-inline-block confirmed'>
                                    @csrf
                                    <button
                                        @cannot("delete", $user) disabled @endcan
                                        type='submit' class='btn btn-danger btn-sm'>
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