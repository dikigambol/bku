@extends('users.index')

@section('subtitle','Edit User')
{{-- @section('sidemenu', 'sidebar-collapse') --}}
@section('body')
<form action="{{ route('user.update',$data->iduser) }}" id="formEditUser" method="post">
    @method('PUT')
    @csrf
    <div class="row p-3 align-items-center">
        <div class="col-8">
            <div class="form-group">
                <label for="nip" class="form-label nip">NIP</label>
                <input id="nip" type="text" name="nip" class="form-control form-control-sm @error('nip')is-invalid @enderror" placeholder="Masukan NIP" value="{{ old('nip')?old('nip'):$data->nip }}" required>
                <div class="nip invalid-feedback">
                    @error('nip')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Full Name</label>
                <input type="text" name="fullname" class="form-control form-control-sm" placeholder="Masukan Nama Lengkap" value="{{ old('fullname')?old('fullname'):$data->fullname }}" required>
                <div class="nama invalid-feedback">
                    message
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control form-control-sm @error('username')is-invalid @enderror" placeholder="Masukan Username" value="{{ old('username')?old('username'):$data->name }}" required>
                <div class="username invalid-feedback">
                    @error('username')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="satker" class="form-label satker">Satuan Kerja</label>
                <select class="form-select form-select-sm" name="satker" id="satker" required>
                    @foreach ($satker as $sk)
                    <option value="{{$sk->kd_satker}}" <?= (old("satker") ? old("satker") : $data->kd_satker) == $sk->kd_satker ? 'selected' : '' ?>>{{$sk->nm_satker}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="unor" class="form-label unor">Unit Organisasi</label>
                <select class="form-select form-select-sm" name="unor" id="unor" required>
                    @foreach ($unor as $un)
                    <option value="{{$un->id}}" <?= (old("unor") ? old("unor") : $data->unor) == $un->id ? 'selected' : '' ?>>{{$un->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="email" class="form-label email">Email</label>
                <input type="text" id="email" name="email" class="form-control form-control-sm @error('email')is-invalid @enderror" placeholder="email@gmail.com" value="{{ old('email')?old('email'):$data->email }}" required>
                <div class="email invalid-feedback">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="telp" class="form-label telp">No. Telp</label>
                    <input type="text" id="telp" name="telp" class="form-control form-control-sm" placeholder="+62***********" value="{{ old('telp')?old('telp'):$data->telp }}" required>
                    <div class="telp invalid-feedback">
                        message
                    </div>
                </div>
                <div class="col-6 form-group">
                    <label for="peran" class="form-label peran">Role</label>
                    <select class="form-select form-select-sm" name="peran" id="peran" value="{{ old('peran')?old('peran'):$data->role }}" required>
                        <option value="1" <?= (old("peran") ? old("peran") : $data->role) == 1 ? 'selected' : '' ?>>ADMIN</option>
                        <option value="2" <?= (old("peran") ? old("peran") : $data->role) == 2 ? 'selected' : '' ?>>BP</option>
                        <option value="3" <?= (old("peran") ? old("peran") : $data->role) == 3 ? 'selected' : '' ?>>BPP</option>
                    </select>
                    <div class="peran invalid-feedback">
                        message
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat" class="form-label alamat">Alamat</label>
                <textarea id="alamat" type="text" name="alamat" class=" alamat form-control form-control-sm" placeholder="Masukan Alamat" required rows="3">{{ old('alamat')?old('alamat'):$data->alamat }}</textarea>
                <div class="alamat invalid-feedback">
                    message
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="my-2">
                <div class="pass">
                    <div class="form-check">
                        <input class="form-check-input" name="checkEditPass" type="checkbox" id="checkPass" @if (old('checkEditPass')=='on' )checked @endif>
                        <label class="form-check-label" for="checkPass">
                            Change Password(optional)
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="password" class="passw-check form-label text-black-50">Password</label>
                        <input id="password" type="password" name="password" value="{{ old('password') }}" class="passw-check form-control form-control-sm @error('password')is-invalid @enderror" placeholder="Masukan password" disabled>
                        <div class="password invalid-feedback">
                            @error('password')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirmPass" class="passw-check form-label text-black-50">Confirm Password</label>
                        <input id="confirmPass" type="password" name="confirmPass" value="" class="passw-check form-control form-control-sm @error('confirmPass')is-invalid @enderror" placeholder="Masukan ulang password" disabled>
                        <div class="password invalid-feedback">
                            @error('confirmPass')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <center>
                    <a type="button" href="{{ route('user.index') }}" class="btn btn-outline-secondary mx-1" id="createUser" role="button"><i class="fa fa-reply mr-1" aria-hidden="true"></i>Back</a>
                    <button type="button" class="btn btn-info mx-1" id="submitedituser" role="button" data-bs-toggle="modal"><i class="fas fa-paper-plane mr-1"></i>Submit</button>
                </center>
            </div>
        </div>
    </div>
    {{-- modal --}}
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="modalAddLabel">Edit User</h5>
                    <button type="button " class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-light">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah data sudah benar?
                </div>

                <div class="modal-footer">
                    <button type="submit" data-bs-dismiss="modal" class="btn btn-info">Iya</button>
                    <button type="button" data-bs-dismiss="modal" class="btn btn-outline-secondary">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>

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
    $("#submitedituser").click(function(e) {
        var allok = true;
        var firstInput = null;
        $("input[type!=checkbox]").each(function() {
            if (!$(this).val()) {
                if ($("#checkPass").is(":checked")) {
                    if (firstInput == null) {
                        firstInput = $(this);
                    }
                    $(this).addClass("is-invalid");
                    $("div." + $(this).attr("name")).text("Form tidak boleh kosong");
                    allok = false;
                } else {
                    if ($(this).attr("name") != "password" && $(this).attr("name") != "confirmPass") {
                        if (firstInput == null) {
                            firstInput = $(this);
                        }
                        $(this).addClass("is-invalid");
                        $("div." + $(this).attr("name")).text("Form tidak boleh kosong");
                        allok = false;
                    } else {
                        $(this).removeClass("is-invalid");
                    }
                }
            } else {
                $(this).removeClass("is-invalid");
            }
        });

        if (!$("textarea.alamat").val()) {
            if (firstInput == null) {
                firstInput = $("textarea.alamat");
            }
            $("textarea.alamat").addClass("is-invalid");
            $("div.alamat").text("Form tidak boleh kosong");
            allok = false;
        } else {
            $("textarea.alamat").removeClass("is-invalid");
        };
        if (allok) {
            var myModal = new bootstrap.Modal($("#modal"), {
                keyboard: true
            });
            myModal.show();
        } else {
            firstInput.focus();
        }
    })
    checkEditPass($("#checkPass"));
    $("#checkPass").change(function() {
        checkEditPass($(this))
    });

    function checkEditPass(_this) {
        if (_this.is(":checked")) {
            $("label.passw-check").removeClass("text-black-50");
            $("input.passw-check").prop("disabled", false);
            $("input.passw-check").prop("required", true);
        } else {
            $("label.passw-check").addClass("text-black-50");
            $("input.passw-check").prop("disabled", true).val("");
            $("input.passw-check").prop("required", false);
        }
    }
</script>
@endsection