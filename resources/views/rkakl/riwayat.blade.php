@extends('layouts.admin')
@section('riwayat','active')

@section('style')
<style>
    .cardPengajuan:hover {
        background-color: #edeef3;
        border: 1px solid #343A40;
    }

    .cardPengajuan .card-header:hover {
        cursor: pointer;
    }

    .listPengajuan .list-group-item:hover {
        border: 1px solid #343A40;
    }
</style>
@endsection

@section('content')
<section class="content" style="padding-top: 10px;">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col">
                <button class="btn btn-light shadow-sm m-1"><i class="fa fa-filter"></i></button>
                <div class="btn-group">
                    <button type="button" id="lblTanggal" class="btn <?= $filtgl != 0 ? 'btn-dark' : 'btn-outline-dark' ?> dropdown-toggle shadow-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php if ($filtgl && $filtgl2) {
                            $lbltgl = $cont->tgl_indo($filtgl) . ' - ' . $cont->tgl_indo($filtgl2);
                        } else if ($filtgl) {
                            $lbltgl = $cont->tgl_indo($filtgl);
                        } else {
                            $lbltgl = 'Tanggal';
                        } ?>
                        {{$lbltgl}}
                    </button>
                    <div class="d-none" id="cardDate" style="position: absolute; top: 40px; z-index: 1000;">
                        <wc-datepicker id="datepicker" range show-clear-button></wc-datepicker>
                    </div>
                </div>
                @if (Auth::user()->role == 1)
                <div class="btn-group">
                    <button type="button" id="lblSatker" class="btn <?= $filsatker != null ? 'btn-dark' : 'btn-outline-dark' ?> dropdown-toggle shadow-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $filsatker != null ? $cont->getSatker($filsatker)['nm_satker'] : 'Satker' ?>
                    </button>
                    <div class="dropdown-menu" style="height: 400px; overflow: auto;">
                        <button class="dropdown-item filSatker" data-nm_satker="Satker">Semua</button>
                        @foreach ($satker as $sk)
                        <button class="dropdown-item filSatker" data-kd_satker="{{$sk->kd_satker}}" data-nm_satker="{{$sk->nm_satker}}">{{$sk->nm_satker}}</button>
                        @endforeach
                    </div>
                </div>
                @endif
                <div class="btn-group">
                    <button type="button" id="lblUnor" class="btn <?= $filunor != null ? 'btn-dark' : 'btn-outline-dark' ?> dropdown-toggle shadow-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $filunor != null ? $filunor : 'Unor' ?>
                    </button>
                    <div class="dropdown-menu">
                        <button class="dropdown-item filUnor" data-nm_unor="Unor">Semua</button>
                        @foreach ($unor as $un)
                        <button class="dropdown-item filUnor" data-nm_unor="{{$un->name}}">{{$un->name}}</button>
                        @endforeach
                    </div>
                </div>
                <div class="btn-group">
                    <button type="button" id="lblUser" class="btn <?= $filuser != 0 ? 'btn-dark' : 'btn-outline-dark' ?> dropdown-toggle shadow-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $filuser != 0 ? $cont->getUser($filuser)->fullname : 'User' ?>
                    </button>
                    <div class="dropdown-menu">
                        <button class="dropdown-item filUser" data-nm_user="User">Semua</button>
                        @foreach ($user as $us)
                        <button class="dropdown-item filUser" data-id_user="{{$us->id}}" data-nm_user="{{$us->fullname}}">{{$us->fullname}}</button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @foreach ($list as $li)
        <?php $detail = $cont->getDetail($li->id_cart); ?>
        <div class="card cardPengajuan">
            <div class="card-header" onclick="showBody(<?= $li->id_cart ?>)">
                @php
                $satker = $cont->getSatker($li->satker);
                @endphp
                <div class="d-inline-block">
                    <b>{{isset($satker) ? $satker['nm_satker'] : $li->satker}} | {{$cont->getUnor($detail[0]->unor)['name']}} | {{$detail[0]->fullname}}</b>
                    @php
                    $nm_jenis = $cont->getJenis($li->jenis)['nm_jenis'] . ' (' . $li->kd_cart .') ';
                    @endphp
                    <small class="d-block"><b>{{$detail->count()}} Item | {{$nm_jenis}}</b></small>
                </div>
                <div class="d-inline-block float-right">
                    <p class="my-0 d-block text-right"><b>{{$cont->tgl_indo($li->created_at)}}</b></p>
                    <p class="my-0 d-block text-right"><b>{{date_format($li->created_at, 'H:i:s')}}</b></p>
                </div>
            </div>
            <div class="card-body cbody-{{$li->id_cart}} d-none">
                @foreach ($detail as $det)
                <ul class="list-group listPengajuan">
                    <li class="list-group-item p-2" style="border-radius: 0; position: relative;">
                        <div class="d-inline-block">
                            @if($det->desc != $cont->getItem($det->item)['desc'])
                            <p class="my-0" style="text-decoration: line-through;">{{$cont->getItem($det->item)['desc']}}</p>
                            <p class="my-0">{{$det->desc}}</p>
                            <p class="my-0">{{$det->harga}}</p>
                            @else
                            <p class="my-0">{{$cont->getItem($det->item)['desc']}}</p>
                            <p class="my-0">{{$det->harga}}</p>
                            @endif
                        </div>
                        <div class="d-inline-block float-right" style="position: absolute; bottom: 7px; right: 7px;">
                            <p class="my-0 text-right">{{'x'}} <b>{{$det->volume}}</b></p>
                            <p class="my-0 d-block text-right">{{number_format($det->jumlah, 0, ',', '.')}}</p>
                        </div>
                    </li>
                </ul>
                @endforeach
            </div>
            <div class="card-footer">
                <div>
                    <div class="d-inline-block">
                        <b>GRAND TOTAL : </b>
                    </div>
                    <div class="d-inline-block float-right">
                        <b class="text-right" style="margin-right: 10px;">{{number_format($detail->sum('jumlah'), 0, ',', '.')}}</b>
                    </div>
                </div>
                <div>
                    <div class="d-inline-block">
                        <b>Status : </b>
                        @if (Auth::user()->role != 2)
                        <p class="mt-0 ml-2 d-inline-flex {{$li->status != 1 ? 'text-primary' : 'text-success'}}"><b>{{$li->status != 1 ? 'Sedang diproses' : 'Sudah disetujui'}}</b></p>
                        @endif
                    </div>
                    <div class="d-inline-block float-right">
                        <a href="{{url('/detail/'.$li->id_cart)}}" class="mt-2 mr-2 btn btn-outline-dark">Detail Pengajuan</a>
                        @if (Auth::user()->role == 2)
                        @if($li->status == -1)
                        <button class="mt-2 btn btn-outline-danger">{{$nm_jenis}} Belum ditutup!</button>
                        @else
                        <button data-bs-toggle="modal" data-bs-target="#mdlApp-{{$li->id_cart}}" class="mt-2 btn {{$li->status == 0 ? 'btn-primary' : 'btn-success'}}">{{$li->status != 1 ? 'Setujui Pengajuan' : 'Sudah disetujui'}}</button>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @if ($list->isEmpty())
        <div class="text-center">
            <img src="{{asset('img/empty.svg')}}" alt="" width="40%">
            <h3 class="mt-2">Data Kosong</h3>
        </div>
        @endif
    </div>

    @foreach ($list as $li)
    <?php $detail = $cont->getDetail($li->id_cart);
    $nm_jenis = ($li->jenis == 3) ? $cont->getJenis($li->jenis)['nm_jenis'] . ' ' . $li->kd_cart : $cont->getJenis($li->jenis)['nm_jenis']; ?>
    <div id="mdlApp-{{$li->id_cart}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-{{($li->status) != 0 ? 'danger' : 'primary'}}">
                    <h5 class="modal-title">{{($li->status) != 0 ? 'Batalkan Persetujuan' : 'Setujui Pengajuan'}}</h5>
                </div>
                <div class="modal-body">
                    <p>{{($li->status) != 0 ? 'Apakah anda yakin membatalkan persetujuan pengajuan :' : 'Apakah anda yakin menyetujui pengajuan :'}}</p>
                    <p><b>{{$nm_jenis}} </b> oleh <b> {{$detail[0]->fullname}}</b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-{{($li->status) != 0 ? 'danger' : 'primary'}}" onclick="approve(<?= $li->id_cart ?>)">{{($li->status) != 0 ? 'Ya, Batalkan' : 'Ya, Setujui'}}</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</section>
@endsection

@section('script')
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
    var bln_indo = JSON.parse('@json($bulan)')

    function showBody(id) {
        var body = $('.cbody-' + id)
        if (body.hasClass('d-none')) {
            body.removeClass('d-none')
        } else {
            body.addClass('d-none')
        }
    }

    const datepicker = document.getElementById('datepicker')
    var lblTanggal = $('#lblTanggal')

    $('#lblTanggal').on('click', function() {
        var card = $('#cardDate')
        if (card.hasClass('d-none')) {
            card.removeClass('d-none')
            $(this).text('Confirm')
        } else {
            card.addClass('d-none')
            if (datepicker.value) {
                let objectDate = datepicker.value
                let day = objectDate[0].getDate()
                let month = objectDate[0].getMonth() + 1
                let year = objectDate[0].getFullYear()
                var tgl1 = day + ' ' + bln_indo[Number(month)] + ' ' + year

                if (objectDate.length > 1) {
                    let day2 = objectDate[1].getDate()
                    let month2 = objectDate[1].getMonth() + 1
                    let year2 = objectDate[1].getFullYear()
                    var tgl2 = day2 + ' ' + bln_indo[Number(month2)] + ' ' + year2

                    lblTanggal.text(tgl1 + ' - ' + tgl2)
                    filterBy('tgl', year + '-' + month + '-' + day, year2 + '-' + month2 + '-' + day2)
                } else {
                    lblTanggal.text(tgl1)
                    filterBy('tgl', year + '-' + month + '-' + day)
                }
            } else {
                lblTanggal.text('Tanggal')
                filterBy('tgl', 0)
            }
        }
    })

    $('.filSatker').on('click', function() {
        var satker = $(this).data('nm_satker')
        var kd_satker = $(this).data('kd_satker')
        $('#lblSatker').text(satker)
        filterBy('satker', kd_satker)
    })

    $('.filUnor').on('click', function() {
        var unor = $(this).data('nm_unor')
        $('#lblUnor').text(unor)
        filterBy('unor', unor)
    })

    $('.filUser').on('click', function() {
        var user = $(this).data('nm_user')
        var id = $(this).data('id_user')
        $('#lblUser').text(user)
        filterBy('user', id)
    })

    function filterBy(mode, val, val2) {
        $.ajax({
            type: 'POST',
            url: '{{ route("filter") }}',
            data: {
                _token: CSRF_TOKEN,
                'mode': mode,
                'val': val,
                'val2': val2
            },
            dataType: 'json',
            success: function(result) {
                if (result.success) {
                    location.reload()
                }
            }
        })
    }

    function approve(id) {
        $.ajax({
            type: 'POST',
            url: '{{ url("/approve") }}',
            data: {
                _token: CSRF_TOKEN,
                'id': id,
            },
            dataType: 'json',
            success: function(result) {
                if (result.success) {
                    swal.fire({
                        title: 'Selamat',
                        text: result.msg,
                        icon: 'success',
                        showConfirmButton: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload()
                        }
                    });
                }
            }
        })
    }
</script>
@endsection