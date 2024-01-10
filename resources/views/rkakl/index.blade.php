@extends('layouts.admin')
@section('rkakl','active')

@section('content')
<section class="content" style="padding-top: 10px;">
    <div class="container-fluid">
        @if (Session::has('message'))
        <div class="alert alert-success alert-block mt-2">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ session('message') }}</strong>
        </div>
        @endif

        @if ($import->isNotEmpty())
        @foreach ($import as $im)
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-xl-6 col-md-12">
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
                    <div class="col-xl-6 col-md-12">
                        <div class="mx-2">
                            @if (Auth::user()->role == 2)
                            <div class="btn-group mr-2">
                                <button type="button" class="btn btn-secondary dropdown-toggle my-1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-lock-open mr-1"></i> Buka/Tutup TUP
                                </button>
                                <div class="dropdown-menu">
                                    @php
                                    $tup = $cont->getAvail($im->kd_satker, 3);
                                    @endphp
                                    @foreach ($tup['opened'] as $open)
                                    <form action="{{route('closeTup')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_cart" value="{{$open->id_cart}}">
                                        <button class="dropdown-item text-danger" type="submit">Tutup TUP {{$open->kd_cart}}</button>
                                    </form>
                                    @endforeach
                                    <form action="{{route('addTup')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="satker" value="{{$im->kd_satker}}">
                                        <input type="hidden" name="jenis" value="3">
                                        <input type="hidden" name="kd_cart" value="{{$tup['avail']['TUP']}}">
                                        <button class="dropdown-item" type="submit">Buka TUP {{$tup['avail']['TUP']}}</button>
                                    </form>
                                </div>
                            </div>
                            @endif
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle my-1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-plus-square mr-1"></i> Tambah Pengajuan
                                </button>
                                <div class="dropdown-menu">
                                    @php
                                    $availTup = $cont->availTup($im->kd_satker);
                                    @endphp
                                    @foreach ($jenis as $jn)
                                    @if ($jn->id_jenis != 3)
                                    <button class="dropdown-item" data-id="{{$im->id}}" data-jenis="{{$jn->id_jenis}}" id="btnShowRk">{{$jn->nm_jenis}}</button>
                                    @endif
                                    @endforeach
                                    @foreach ($availTup as $avt)
                                    <button class="dropdown-item" data-id="{{$im->id}}" data-jenis="{{$avt->jenis}}" data-kd_cart="{{$avt->kd_cart}}" id="btnShowRk">{{$avt->nm_jenis}} {{$avt->kd_cart}}</button>
                                    @endforeach
                                </div>
                            </div>
                            <!-- <button class="btn btn-primary d-block my-2" data-id="{{$im->id}}" data-act="show" id="btnShowRk"><i class="fas fa-plus-square mr-1"></i> Tambah Pengajuan</button> -->
                            <!-- <button class="btn btn-danger" data-id="{{$im->id}}" data-act="del" id="btnDelRk">Hapus Data</button> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="card-body">
                <p>Detail Perubahan</p>
                <?php $jumlah = $cont->getRkakl($im->id); ?>
                <p class="my-0">Jumlah Data : {{$jumlah}}</p>
                @if ($im->id != 1)
                <?php $sebelum = $cont->getRkakl($im->id - 1);
                $selisih = $jumlah - $sebelum; ?>
                @if (isset($sebelum) && $selisih > 0)
                <p class="my-0">Penambahan Data : {{$selisih}}</p>
                @endif
                @endif
            </div> -->
        </div>
        @endforeach
        @else
        <div class="text-center">
            <div style="margin: 0;position: absolute;top: 50%;-ms-transform: translateY(-50%);transform: translateY(-50%);">
                <img src="{{asset('img/empty.svg')}}" alt="" width="40%">
                <h3 class="mt-3">Belum ada rkakl diupload</h3>
            </div>
        </div>
        @endif
    </div>

    <div id="mdlImport" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="importData" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title" id="importData">Import Data</h5>
                </div>
                <form action="{{ route('import') }}" id="form-import" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">File Excel Rkakl</label>
                            <input type="file" class="form-control" name="import-data" id="import-data" aria-describedby="desInput" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                        </div>
                        <div class="form-group">
                            <label for="">Satuan Kerja</label>
                            <select class="form-select" name="kd_satker" id="kd_satker" required>
                                <option value="" selected>--PILIH SATUAN KERJA--</option>
                                @foreach ($satker as $sk)
                                <option value="{{$sk->kd_satker}}">{{$sk->nm_satker}}</option>
                                @endforeach
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
                        <button id="impSubmit" type="submit" class="btn btn-outline-success"><i class="fa fa-paper-plane mr-1"></i>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
@endsection

@section('script')
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')

    $("#datepicker").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
        autoclose: true //to close picker once year is selected
    });

    $('#form-import').submit(function() {
        var pusher = new Pusher('feb9a7b06648d74f897a', {
            cluster: 'ap1'
        });
        var channel = pusher.subscribe('tukin-555');
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

    $(document).on('click', '#btnShowRk', function() {
        var id = $(this).data('id')
        var jenis = $(this).data('jenis')
        var kd_cart = $(this).data('kd_cart')
        $.ajax({
            type: 'POST',
            url: '{{ route("getRkakl") }}',
            data: {
                _token: CSRF_TOKEN,
                'id_import': id,
                'preview': false,
                'jenis': jenis,
                'kd_cart': kd_cart,
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
</script>
@endsection