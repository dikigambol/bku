@extends('layouts.admin')
@section('v_kegiatan','active')

@section('content')
<section class="content" style="padding-top: 10px;">
    <div class="container-fluid">
        @if (Auth::user()->role != 3)
        <div class="card">
            <div class="card-body">
                <h5>Upload RKAK/L</h5>
                <div class="my-2">
                    <button class="btn-import btn btn-sm btn-warning" role="button" data-bs-toggle="modal" data-bs-target="#mdlImport" onclick="removeKdDokumen()">
                        <i class="fa fa-upload mr-1" aria-hidden="true"></i> Import
                    </button>
                </div>
            </div>
        </div>
        @endif

        @if ($import->isNotEmpty())
        @foreach ($import as $im)
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-xl-6 col-md-8 col-xs-12">
                        <div class="mx-2">
                            @php
                            $getsat = $cont->getSatker($im->kd_satker);
                            $nm_satker = isset($getsat['nm_satker']) ? '('.$getsat['nm_satker'].')' : '';
                            @endphp
                            <p class="my-0">Kode Satuan Kerja : {{$im->kd_satker}} <b>{{$nm_satker}}</b></p>
                            <p class="my-0">Tahun Anggaran : {{$im->thang}}</p>
                            <p class="my-0">Tanggal Upload : {{$im->created_at->format('d/m/Y H:i:s')}}</p>
                            <p class="my-0">Diupload Oleh : {{$im->fullname}}</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-4 col-xs-12 pb-3">
                        <div class="mx-2">
                            <div>
                                @if ($im->kd_dokumen_count == 7)
                                <button class="btn btn-secondary m-1" data-id="{{$im->id}}" data-act="show" id="btnShowRk">
                                    <i class="fa fa-eye mr-1"></i> Preview
                                </button>
                                @else
                                <p>
                                    Lengkapi hingga 7 files dengan jenis yang berbeda, untuk melakukan preview lengkap.
                                    Anda juga dapat melakukan update file dengan memilih jenis yang ingin di update, lalu
                                    masukkan file yang baru.
                                    <br>
                                    Jumlah File masuk saat ini dan jenisnya : <b>{{$im->kd_dokumen_count}} Files, ({{$im->jenis_files}})</b>
                                </p>
                                <button class="btn btn-warning" role="button" data-bs-toggle="modal" data-bs-target="#mdlImport" onclick="fillKdDokumen('{{$im->kd_dokumen}}', '{{$im->kd_satker}}', '{{$im->thang}}')">
                                    <i class="fa fa-plus mr-1"></i> Tambah File
                                </button>
                                @endif

                                @if (Auth::user()->role != 3)
                                <button class="btn btn-primary m-1 d-none" id="btnEditRk" data-id="{{$im->id}}" data-bs-toggle="modal" data-bs-target="#mdlUpdate"><i class="fa fa-pen mr-1"></i> Update</button>
                                @endif
                            </div>
                            <div class="d-none">
                                <a href="/download/{{ $im->id }}" target="_blank" class="btn btn-outline-primary m-1"><i class="fa fa-download mr-1"></i>Download</a>
                                <a href="/cetak/{{ $im->id }}" target="_blank" class="btn btn-outline-secondary m-1"><i class="fa fa-print mr-1"></i>Print</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $jumlah = $cont->getRkakl($im->id); ?>
            <?php $sebelum = $cont->getRkakl($im->id - 1);
            $selisih = $jumlah - $sebelum; ?>
        </div>
        @endforeach
        @endif
    </div>

    <div id="mdlImport" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="importData" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="importData">Import Data</h5>
                </div>
                <form action="{{ route('import') }}" id="form-import" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="kd_dokumen">
                        <div class="form-group">
                            <label for="">Jenis File</label>
                            <select class="form-select" name="jenis" id="jenis" required>
                                <option value="">- pilih -</option>
                                <option value="program">Program</option>
                                <option value="kegiatan">Kegiatan</option>
                                <option value="suboutput">Suboutput</option>
                                <option value="komponen">Komponen</option>
                                <option value="subkomponen">Sukomponen</option>
                                <option value="akun">Akun</option>
                                <option value="uraian">Uraian</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">File Excel Rkakl</label>
                            <br>
                            <input type="file" id="fileInput">
                        </div>
                        <div class="form-group">
                            <label for="">Satuan Kerja</label>
                            <select class="form-select" name="kd_satker" id="kd_satker" required>
                                @if (Auth::user()->role == 1)
                                <option value="" selected>--PILIH SATUAN KERJA--</option>
                                @foreach ($satker as $sk)
                                <option value="{{$sk->kd_satker}}">{{$sk->nm_satker}}</option>
                                @endforeach
                                @else
                                <option value="">--PILIH SATUAN KERJA--</option>
                                <option value="{{$auth->det_user->kd_satker}}">{{$auth->det_user->satker->nm_satker}}</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tahun Anggaran</label>
                            <div class="input-append input-group date" id="datepicker" style="width: 50%;">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control" name="thang" id="thang" required autocomplete="off" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px;">
                                <span class="add-on"><i class="icon-th"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"><i class="fa fa-times mr-1"></i>Cancel</button>
                        <button type="button" id="impSubmit" onclick="uploadFiles()" class="btn btn-outline-success"><i class="fa fa-paper-plane mr-1"></i>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="mdlUpdate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="updateData" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="updateData">Update Rkakl</h5>
                </div>
                <form action="{{ route('editRkakl') }}" id="form-edit" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" id="edtid_import" name="edtid_import">
                            <label for="">File Excel Rkakl</label>
                            <input type="file" class="form-control" name="edit-data" id="edit-data" aria-describedby="desInput" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"><i class="fa fa-times mr-1"></i>Cancel</button>
                        <button id="edtSubmit" type="submit" class="btn btn-outline-success"><i class="fa fa-paper-plane mr-1"></i>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
@endsection

@section('script')
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
    var pusher = new Pusher('429be9f050ac27715a71', {
        cluster: 'ap1'
    });
    var channel = pusher.subscribe('tukin-555');

    $("#datepicker").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
        autoclose: true
    });

    $('#form-import').submit(function() {
        $('#impSubmit').attr('disabled', true)
        Swal.fire({
            title: 'Proses!',
            html: '<b></b><p></p>',
            timerProgressBar: true,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                const p = Swal.getHtmlContainer().querySelector('p')
                b.textContent = 'Mengolah file Excel'
                setTimeout(function() {
                    b.textContent = 'Menyimpan data rkakl'
                }, 2000)
                channel.bind('pesan-tukin', function(data) {
                    p.textContent = 'Progress ' + JSON.stringify(data['pres']) + '%'
                }, function(error) {
                    console.log('Error binding to event:', error);
                    Swal.fire({
                        title: 'Connection lost',
                        text: 'There was an error binding to the event. Please try again.',
                        icon: 'error'
                    });
                });
            }
        })
    })

    $(document).on('click', '#btnEditRk', function() {
        var id_import = $(this).data('id')
        $('#edtSubmit').attr('disabled', true)
        $('#mdlUpdate').on('shown.bs.modal', function() {
            $('#edtid_import').val(id_import)
            $('#edtSubmit').attr('disabled', false)
        })
    })

    $('#form-edit').submit(function() {
        $('#edtSubmit').attr('disabled', true)
        Swal.fire({
            title: 'Proses!',
            html: '<b></b><p></p>',
            timerProgressBar: true,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                const p = Swal.getHtmlContainer().querySelector('p')
                b.textContent = 'Mengolah file Excel'
                setTimeout(function() {
                    b.textContent = 'Menyunting data rkakl'
                }, 2000)
                channel.bind('pesan-tukin', function(data) {
                    p.textContent = 'Progress ' + JSON.stringify(data['pres']) + '%'
                }, function(error) {
                    console.log('Error binding to event:', error);
                    Swal.fire({
                        title: 'Connection lost',
                        text: 'There was an error binding to the event. Please try again.',
                        icon: 'error'
                    });
                });
            }
        })
    })

    $(document).on('click', '#btnShowRk', function() {
        var id = $(this).data('id')
        $.ajax({
            type: 'POST',
            url: '{{ route("getRkakl") }}',
            data: {
                _token: CSRF_TOKEN,
                'id_import': id,
                'preview': true
            },
            dataType: 'json',
            success: function(result) {
                if (result.success) {
                    window.location.href = '{{ route("idxRkakl") }}'
                }
            }
        })
    })

    $(document).ready(function() {
        "@if(session()->get('stsImport'))"
        swal.fire({
            title: 'Selamat',
            text: '{{ session()->get("msg") }}',
            icon: 'success',
            showConfirmButton: true
        });
        "@endif"
        "@if(session()->get('stsImport') === false)"
        swal.fire({
            title: 'Error',
            text: '{{ session()->get("msg") }}',
            icon: 'error',
            showConfirmButton: false,
            timer: 1500
        });
        "@endif"
    })

    function fillKdDokumen(kd_dokumen, kd_satker, tahun) {
        var kdDokumenInput = document.getElementById('kd_dokumen');
        var kdSatkerInput = document.getElementById('kd_satker');
        var thangInput = document.getElementById('thang');

        kdDokumenInput.value = kd_dokumen;
        kdSatkerInput.value = kd_satker;
        thangInput.value = tahun;

        kdSatkerInput.disabled = true;
        thangInput.disabled = true;
    }

    function removeKdDokumen() {
        var kdDokumenInput = document.getElementById('kd_dokumen');
        var kdSatkerInput = document.getElementById('kd_satker');
        var thangInput = document.getElementById('thang');

        kdDokumenInput.value = "";
        kdSatkerInput.value = "";
        thangInput.value = "";

        kdSatkerInput.disabled = false;
        thangInput.disabled = false;
    }

    // handle execution import csv 
    function uploadFiles() {
        const fileInput = document.getElementById('fileInput');
        const kdSatkerInput = document.getElementById('kd_satker');
        const thangInput = document.getElementById('thang');
        const jenisInput = document.getElementById('jenis');
        const kdDokumenInput = document.getElementById('kd_dokumen');

        if (fileInput.value !== "" && thangInput.value !== "" && kdSatkerInput.value !== "" && jenisInput.value !== "") {
            const formData = new FormData();
            formData.append('import-data', fileInput.files[0]);
            formData.append('thang', thangInput.value);
            formData.append('kd_satker', kdSatkerInput.value);
            formData.append('jenis', jenisInput.value);

            if (kdDokumenInput.value !== "") {
                formData.append('kd_dokumen', kdDokumenInput.value);
            }

            const headers = new Headers({
                'X-CSRF-TOKEN': CSRF_TOKEN,
            });

            $('#impSubmit').attr('disabled', true)
            $('#impSubmit').text('Loading...');
            fetch('/rkakl/import', {
                    method: 'POST',
                    body: formData,
                    headers: headers,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status == "Imported") {
                        const result = confirm("Data berhasil di import!");
                        if (result) {
                            location.reload();
                        }
                    } else if (data.status == "Updated") {
                        const result = confirm("Data berhasil di update!");
                        if (result) {
                            location.reload();
                        }
                    } else if (data.status == "Invalid file type") {
                        const result = confirm("Format file tidak valid!");
                        if (result) {
                            location.reload();
                        }
                    }
                })
                .catch(error => console.error('Error:', error));
        } else {
            alert("Pastikan mengisi semua form!");
        }
    }
</script>
@endsection