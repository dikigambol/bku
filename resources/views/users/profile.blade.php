@extends('users.index')

@section('body')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-xl-6 col-md-6 col-sm-12">
                        <label class="form-label">NIP</label>
                        <input type="text" value="{{ $auth->det_user->nip }}" class="form-control form-control" readonly>
                    </div>
                    <div class="form-group col-xl-6 col-md-6 col-sm-12">
                        <label class="form-label">Username</label>
                        <input type="text" value="{{ $auth->name }}" class="form-control form-control" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xl-6 col-md-6 col-sm-12">
                        <label class="form-label">Fullname</label>
                        <input type="text" value="{{ $auth->fullname }}" class="form-control form-control" readonly>
                    </div>
                    <div class="form-group col-xl-6 col-md-6 col-sm-12">
                        <label class="form-label">Email</label>
                        <input type="text" value="{{ $auth->email }}" class="form-control form-control" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xl-6 col-md-12 col-sm-12">
                        <label class="form-label">Satuan Kerja</label>
                        <input type="text" value="{{ $cont->get_satker($auth->det_user->kd_satker)['nm_satker'] }}" class="form-control form-control" readonly>
                    </div>
                    <div class="form-group col-xl-6 col-md-12 col-sm-12">
                        <label class="form-label">Unit Organisasi</label>
                        <input type="text" value="{{ $cont->get_unor($auth->det_user->unor)['name'] }}" class="form-control form-control" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xl-6 col-md-6 col-sm-12">
                        <label class="form-label">No. Telp</label>
                        <input type="text" value="{{ $auth->det_user->telp }}" class="form-control form-control" readonly>
                    </div>
                    <div class="form-group col-xl-6 col-md-6 col-sm-12">
                        <label class="form-label">Role</label>
                        <input type="text" value="{{ $cont->getRole($auth->role) }}" class="form-control form-control text-uppercase" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Alamat</label>
                    <textarea type="text" class="form-control form-control" required rows="3" readonly>{{ $auth->det_user->alamat }}</textarea>
                </div>
                <div>
                    <a href="{{ route('user.show', $auth->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pen mr-1"></i> Edit Profile</a>
                </div>
            </div>
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
</script>
@endsection