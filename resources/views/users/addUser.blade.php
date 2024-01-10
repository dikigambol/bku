@extends('layouts.admin')
@section('users','active')

@section('content')
<section class="container">
    <div class="container-fluid pt-3">
        <div class="card">
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-right bg-light">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
                <h3>Tambah User</h3>
                <table class="table table-search table-striped table-inverse">
                    <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Peran</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($data)
                        @foreach ($data as $user)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                {{ $user->peran }}
                            </td>
                            <td>
                                <button name="editUser" class="btn btn-info editUser" role="button" data-href="{{ route('user.update',$user->id) }}" role="button" data-toggle="modal" data-id="{{ $idUser =$user->id }}" data-target="#modalAddUser"><i class="fas fa-pencil-alt"></i></button>

                                <button name="hapusUser" class="btn btn-danger hapusUser" role="button" data-href="{{ route('user.destroy',$user->id) }}" role="button" data-toggle="modal" data-id="{{ $idUser =$user->id }}" data-target="#modalAddUser"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

{{-- Modal --}}
<div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="modalAddLabel">Tambah User</h5>
                <button type="button " class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-light">&times;</span>
                </button>
            </div>
            <form action="#" id="formAddUser" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required>
                    </div>
                    <div class="form-group">
                        <label class="email">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="email@gmail.com" required>
                        <div class="email invalid-feedback">
                            The password confirmation does not match.
                        </div>
                        <div class="email valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" value="" class="form-control" placeholder="" required>
                        <div class="password invalid-feedback">
                            The password confirmation does not match.
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirmPass" value="" class="form-control" placeholder="" required>
                        <div class="invalid-feedback">
                            The password confirmation does not match.
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select class="custom-select" name="level" required>
                            <option name="" value="" disabled selected>--PILIH--</option>
                            <option value="1">Administrator</option>
                            <option value="0">Visitor</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle pr-1" aria-hidden="true"></i>Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection