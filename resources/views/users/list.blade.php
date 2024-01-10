@extends('users.index')
@section('subtitle','List User')

@section('body')
<div class="card">
    <div class="card-header">
        <button class="btn btn-success d-flex" style="align-items: center;" id="createUser" role="button" data-bs-toggle="modal" data-bs-target="#modalTbh">
            <ion-icon name="person-add" class="mr-1" style="font-size: 20px;"></ion-icon>
            Tambah User
        </button>
    </div>
    <div class="card-body">
        <div class="box-body table-responsive">
            <table class="table table-search table-striped table-inverse">
                <thead class="thead-inverse">
                    <tr class="text-uppercase">
                        <th class="text-center">No</th>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Nip</th>
                        <th>Email</th>
                        <th>Satker</th>
                        <th>Unor</th>
                        <th>role</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @isset($data)
                    @foreach ($data as $user)
                    <tr>
                        <td width="80px">
                            <button class="btn btn-outline-info btn-sm mr-1" role="button" data-bs-toggle="modal" data-bs-target="#modalDet-<?= $user->id ?>">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </button>
                            {{ $loop->iteration }}
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->fullname }}</td>
                        <td>{{ $user->det_user->nip }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $cont->get_satker($user->det_user->kd_satker)['nm_satker'] }}</td>
                        <td>{{ $cont->get_unor($user->det_user->unor)['name'] }}</td>
                        <td class="text-uppercase">{{ $cont->getRole($user->role) }}</td>
                        <td>
                            <a name="detail" href="{{ route('user.show',$user->id) }}" class="btn btn-primary editUser m-1" role="button"><i class="fas fa-pencil-alt"></i></a>

                            <button name="hapusUser" class="btn btn-danger hapusUser m-1" role="button" data-href="{{ route('user.destroy',$user->id) }}" role="button" data-bs-toggle="modal" data-id="{{ $user->id }} " data-nama="{{ $user->name }}" data-nip="{{ $detuser->find($user->id_detuser)!=null?$detuser->find($user->id_detuser)->nip:'' }}" data-bs-target="#modalHps"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modal Detail--}}
@isset($data)
@foreach ($data as $user)
<div class="modal fade" id="modalDet-<?= $user->id ?>" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="modalAddLabel">
                    Detail User </h5>
                <button type="button " class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-light">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-6">
                        <label class="form-label">NIP</label>
                        <input type="text" value="{{ $user->det_user->nip }}" class="form-control form-control-sm" readonly>
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label">Username</label>
                        <input type="text" value="{{ $user->name }}" class="form-control form-control-sm" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label class="form-label">Fullname</label>
                        <input type="text" value="{{ $user->fullname }}" class="form-control form-control-sm" readonly>
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label">Email</label>
                        <input type="text" value="{{ $user->email }}" class="form-control form-control-sm" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label class="form-label">Satuan Kerja</label>
                        <input type="text" value="{{ $cont->get_satker($user->det_user->kd_satker)['nm_satker'] }}" class="form-control form-control-sm" readonly>
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label">Unit Organisasi</label>
                        <input type="text" value="{{ $cont->get_unor($user->det_user->unor)['name'] }}" class="form-control form-control-sm" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 form-group">
                        <label class="form-label">No. Telp</label>
                        <input type="text" value="{{ $user->det_user->telp }}" class="form-control form-control-sm" readonly>
                    </div>
                    <div class="col-6 form-group">
                        <label class="form-label">Role</label>
                        <input type="text" value="{{ $cont->getRole($user->role) }}" class="form-control form-control-sm text-uppercase" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Alamat</label>
                    <textarea type="text" class="form-control form-control-sm" required rows="3" readonly>{{ $user->det_user->alamat }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endisset

{{-- Modal Tambah--}}
<div class="modal fade" id="modalTbh" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="modalAddLabel">
                    Tambah User </h5>
                <button type="button " class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-light">&times;</span>
                </button>
            </div>
            <form action="{{ route('user.store') }}" id="formAddUser" method="post">
                @method('POST')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nip" class="form-label nip">NIP</label>
                        <input id="nip" type="text" name="nip" class="form-control form-control-sm @error('nip')is-invalid @enderror" placeholder="Masukan NIP" value="{{ old('nip') }}" required>
                        @error('nip')
                        <div class="email invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="fullname" class="form-control form-control-sm" placeholder="Masukan Nama Lengkap" value="{{ old('fullname') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control form-control-sm @error('username')is-invalid @enderror" placeholder="Masukan Username" value="{{ old('username') }}" required>
                        @error('username')
                        <div class="email invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="satker" class="form-label satker">Satuan Kerja</label>
                        <select class="form-select form-select-sm" name="satker" id="satker" required>
                            <option value="" selected>--PILIH SATKER--</option>
                            @foreach ($satker as $sk)
                            <option value="{{$sk->kd_satker}}" <?= old("satker") == $sk->kd_satker ? 'selected' : '' ?>>{{$sk->nm_satker}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="unor" class="form-label unor">Unit Organisasi</label>
                        <select class="form-select form-select-sm" name="unor" id="unor" required>
                            <option value="" selected>--PILIH UNOR--</option>
                            @foreach ($unor as $un)
                            <option value="{{$un->id}}" <?= old("unor") == $un->id ? 'selected' : '' ?>>{{$un->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label email">Email</label>
                        <input type="text" id="email" name="email" class="form-control form-control-sm @error('email')is-invalid @enderror" placeholder="email@gmail.com" value="{{ old('email') }}" required>
                        @error('email')
                        <div class="email invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6 form-group">
                            <label for="telp" class="form-label mr-1 telp">No. Telp</label><small><i>(Opsional)</i></small>
                            <input type="text" id="telp" name="telp" class="form-control form-control-sm" placeholder="+62***********" value="{{ old('telp') }}">
                        </div>
                        <div class="col-6 form-group">
                            <label for="peran" class="form-label peran">Role</label>
                            <select class="form-select form-select-sm" name="peran" id="peran" required>
                                <option value="" selected>--PILIH ROLE--</option>
                                <option value="1" <?= old("peran") == 1 ? 'selected' : '' ?>>ADMIN</option>
                                <option value="2" <?= old("peran") == 2 ? 'selected' : '' ?>>BP</option>
                                <option value="3" <?= old("peran") == 3 ? 'selected' : '' ?>>BPP</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="form-label mr-1 alamat">Alamat</label><small><i>(Opsional)</i></small>
                        <textarea id="alamat" type="text" name="alamat" class="form-control form-control-sm" placeholder="Masukan Alamat" required rows="3">{{ old('alamat') }}</textarea>
                    </div>
                    <div class="pass">
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" name="password" value="{{ old('password') }}" class="form-control form-control-sm @error('password')is-invalid @enderror" placeholder="Masukan password" required>
                            @error('password')
                            <div class="password invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="confirmPass" class="form-label">Confirm Password</label>
                            <input id="confirmPass" type="password" name="confirmPass" value="" class="form-control form-control-sm @error('confirmPass')is-invalid @enderror" placeholder="Masukan ulang password" required>
                            @error('confirmPass')
                            <div class="password invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="reset" data-bs-dismiss="modal" class="btn btn-danger"><i class="fa fa-times pr-1" aria-hidden="true"></i>Close</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle pr-1" aria-hidden="true"></i>Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Hapus --}}
<div class="modal fade" id="modalHps" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="modalAddLabel">Hapus User</h5>
                <button type="button " class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-light">&times;</span>
                </button>
            </div>
            <form action="{{ route('user.destroy',5) }}" method="post">
                @method('DELETE')
                @csrf
                <div class="modal-body">
                    NIP <b><span class="nip">19201299</span></b> dengan username <b><span class="nama">admin</span></b> akan dihapus, Anda yakin ingin melanjutkan?
                </div>

                <div class="modal-footer">
                    <button type="button" data-bs-dismiss="modal" class="btn btn-outline-secondary">Cancel</button>
                    <button type="submit" data-bs-dismiss="modal" class="btn btn-danger">lanjutkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scriptBody')
<script>
    "@if(session('stsAksi'))"
    showAlert(
        "{{ session('stsAksi') }}",
        "{{ session('iconAksi') }}",
        "{{ session('titleAksi') }}"
    );
    "@endif"

    "@if($errors->any())"
    var myModal = new bootstrap.Modal($("#modalTbh"), {
        keyboard: true
    });
    myModal.show();
    myModal.addEventListener("shown.bs.modal", function(e) {
        var button = e.relatedTarget;
        alert("Nip" + button.nip);
    });
    "@endif"

    $("#modalHps").on("show.bs.modal", function(e) {
        var button = $(e.relatedTarget);
        var nip = button.data("nip");
        var nama = button.data("nama");
        var href = button.data("href");
        var form = $(this).find("form");
        var bodyNama = $(this).find("span.nama");
        var bodyNip = $(this).find("span.nip");
        bodyNama.text(nama);
        bodyNip.text(nip);
        form.attr("action", href);
    });
</script>
@endsection