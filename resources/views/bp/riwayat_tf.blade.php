@extends('layouts.admin')
@section('riwayat_tf', 'active')

@section('content')
    <section class="content" style="padding-top: 10px;">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="box-body table-responsive">
                        <div id="toolbar" class="d-inline-flex">
                            {{-- <p class="mr-4" style="align-self: center;">Menampilkan {{$transfer->total() >= '10' ? '10' : $transfer->total()}} data dari {{$transfer->total()}} total data</p>
                            {{$transfer->links()}} --}}
                        </div>
                        <table id="tableM" class='table table-bordered table-striped' data-toggle="table"
                            data-sticky-header="true" data-click-to-select="true" data-filter-control="true"
                            data-toolbar="#toolbar" data-buttons="buttons" data-search="true">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Tgl Buku</th>
                                    <th>No Buku</th>
                                    <th>No Bukti</th>
                                    <th>Pentransfer</th>
                                    <th>Detail Transfer</th>
                                    <th>Dari ➡️ Kepada</th>
                                    <th>Uraian Transaksi</th>
                                    <th>Jumlah Transaksi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transfer as $tf)
                                    @if ($tf->role == Auth::user()->role)
                                        <tr>
                                            <td>{{ $loop->iteration - 2 }}</td>
                                            <td>{{ $tf->tgl_buku }}</td>
                                            <td>{{ $tf->no_buku }}</td>
                                            <td>{{ $tf->no_bukti }}</td>
                                            <td>{{ $tf->fullname }}</td>
                                            <td>{{ $tf->jenis_transfer }} ({{ $tf->detail_transfer }})</td>
                                            <td>{{ $tf->dari }} ➡️ {{ $tf->kepada }}
                                                @if ($tf->bpp_unor != null)
                                                    ({{ $tf->bpp_unor }})
                                                @endif
                                            </td>
                                            <td>
                                                @if (str_word_count($tf->uraian) > 5)
                                                    {{ substr($tf->uraian, 0, 12) }}
                                                    <a href="" class="" data-bs-toggle="modal"
                                                        data-bs-target="#modalDetUraian-<?= $tf->id ?>">[...]</a>
                                                @else
                                                    {{ $tf->uraian }}
                                                @endif
                                            </td>
                                            <td>
                                                <p class="my-0 text-right">Rp.
                                                    {{ number_format($tf->jumlah, 0, ',', '.') }}</p>
                                                <small class="my-0 text-primary fw-bold" style="cursor: pointer;"
                                                    data-bs-toggle="modal" data-bs-target="#modalDet-<?= $tf->id ?>">lihat
                                                    terbilang</small>
                                            </td>
                                            <td>
                                                <a href="{{ route('transfer.edit', $tf->id) }}"
                                                    class="btn btn-warning m-1">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                {{-- <button role="button" data-bs-toggle="modal" data-bs-target="#modalEdit-<?= $tf->id ?>" class="btn btn-warning m-1"><i class="fa fa-edit "></i></button> --}}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Detail --}}
        @isset($transfer)
            @foreach ($transfer as $tf)
                <div class="modal fade" id="modalDet-<?= $tf->id ?>" tabindex="-1" role="dialog" aria-labelledby="modal"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h5 class="modal-title" id="modalAddLabel">
                                    Nominal Terbilang</h5>
                                <button type="button " class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="text-light">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="justify-content-center">{{ $tf->terbilang }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

                <div class="modal fade" id="modalDetUraian-<?= $tf->id ?>" tabindex="-1" role="dialog" aria-labelledby="modal"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h5 class="modal-title" id="modalAddLabel">
                                    Keterangan Lanjut</h5>
                                <button type="button " class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="text-light">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="justify-content-center">{{ $tf->uraian }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            @endforeach
        @endisset

        {{-- Modal Edit --}}
        @isset($transfer)
            @foreach ($transfer as $tf)
                <div class="modal fade" id="modalEdit-<?= $tf->id ?>" tabindex="-1" role="dialog" aria-labelledby="modal"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h5 class="modal-title" id="modalAddLabel">
                                    Edit Transfer</h5>
                                <button type="button " class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="text-light">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <input id="role" name="role" type="text" value="{{ $auth->role }}"
                                        class="form-control" hidden>
                                    <div class="form-group col-4">
                                        <label class="form-label">Tanggal Buku</label>
                                        <input type="date" value="{{ old('tgl_buku') ? old('tgl_buku') : $tf->tgl_buku }}"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-4">
                                        <label class="form-label">Nomor Buku</label>
                                        <input type="text" value="{{ old('no_buku') ? old('no_buku') : $tf->no_buku }}"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-4">
                                        <label class="form-label">Nomor Bukti</label>
                                        <input type="text" value="{{ old('no_bukti') ? old('no_bukti') : $tf->no_bukti }}"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="form-label">Jenis Transfer</label>
                                        <select id="jenis_transfer" name="jenis_transfer" class="form-select">
                                            <option
                                                value="{{ old('jenis_transfer') ? old('jenis_transfer') : $tf->jenis_transfer }}">
                                                {{ $tf->jenis_transfer }}</option>
                                            <option value="UP">UP</option>
                                            <option value="TUP">TUP</option>
                                            <option value="LS">LS-Bendahara</option>
                                        </select>
                                        @error('jenis_transfer')
                                            <small class="text-danger ml-1"><i
                                                    class="fa fa-exclamation-circle mr-1"></i>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="form-label">Detail Transfer</label>
                                        <select id="detail_transfer" name="detail_transfer" class="form-select">
                                            <option
                                                value="{{ old('jenis_transfer') ? old('jenis_transfer') : $tf->jenis_transfer }}">
                                                {{ $tf->detail_transfer }}</option>
                                        </select>
                                        @error('detail_transfer')
                                            <small class="text-danger ml-1"><i
                                                    class="fa fa-exclamation-circle mr-1"></i>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label class="form-label">Dari</label>
                                        <input type="text" value="{{ $tf->dari }}"
                                            class="form-control form-control-sm">
                                        <select id="dari" name="dari" class="form-select">
                                            <option value="{{ $tf->dari }}">{{ $tf->dari }}</option>
                                            <option value="kppn">KPPN</option>
                                            <option value="bank">Kas Bank</option>
                                            <option value="bp">Kas BP</option>
                                            <option value="bpp">Kas BPP</option>
                                            <option value="pumk">Kas PUMK</option>
                                        </select>
                                        @error('dari')
                                            <small class="text-danger ml-1"><i
                                                    class="fa fa-exclamation-circle mr-1"></i>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-4 form-group">
                                        <label class="form-label">Kepada</label>
                                        <input type="text" value="{{ $tf->kepada }}"
                                            class="form-control form-control-sm">
                                        <select id="kepada" name="kepada" class="form-select">
                                            <option value="{{ $tf->kepada }}">{{ $tf->kepada }}</option>
                                            <option value="kppn">KPPN</option>
                                            <option value="bank">Kas Bank</option>
                                            <option value="bp">Kas BP</option>
                                            <option value="bpp">Kas BPP</option>
                                            <option value="pumk">Kas PUMK</option>
                                        </select>
                                        @error('kepada')
                                            <small class="text-danger ml-1"><i
                                                    class="fa fa-exclamation-circle mr-1"></i>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-4 form-group">
                                        <label class="form-label">UNOR</label>
                                        <select id="bpp_unor" name="bpp_unor" class="form-select">
                                            <option value="{{ $tf->bpp_unor }}">{{ $tf->bpp_unor }}</option>
                                        </select>
                                        @error('bpp_unor')
                                            <small class="text-danger ml-1"><i
                                                    class="fa fa-exclamation-circle mr-1"></i>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Uraian</label>
                                    <textarea type="text" class="form-control form-control-sm" required rows="3">{{ $tf->uraian }}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label class="form-label">Jumlah</label>
                                        <input type="number" value="Rp. {{ $tf->jumlah }}"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="form-label">Terbilang</label>
                                        <textarea type="text" class="form-control form-control-sm" required rows="3">{{ $tf->terbilang }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endisset

        <!-- Modal Filter -->
        <div class="modal fade" id="mdlFilter" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Filter data by</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php for ($i = 1; $i <= 7; $i++) : ?>
                        <div class="row my-2">
                            <div class="col-4"><label for=""></label></div>
                            <div class="col-8">
                                <select class="form-select" name="" id="" data-ke="" required>
                                    <option value="" selected>--PILIH --</option>

                                </select>
                            </div>
                        </div>
                        <?php endfor; ?>
                        <small class="text-dark"><i class="fa fa-info-circle mr-1 text-danger"></i> <b><i>Minimal pilih 1
                                    kategori</i></b></small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="btnFilter" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true //to close picker once year is selected
        });

        const firstDropdown = document.querySelector("#jenis_transfer");
        const secondDropdown = document.querySelector("#detail_transfer");

        const kasBppDropdown = document.querySelector("#kepada");
        const unorDropdown = document.querySelector("#bpp_unor");

        firstDropdown.addEventListener("change", function() {
            if (firstDropdown.value === "{{ $tf->jenis_transfer }}") {
                secondDropdown.innerHTML = `
            <option value="">--DETAIL UP--</option>
            @foreach ($upTf as $tf)
                <option value="{{ $tf }}">{{ $tf }}</option>
            @endforeach
            `;
                secondDropdown.disabled = false;
            } else if (firstDropdown.value === "TUP") {
                secondDropdown.innerHTML = `
            <option value="">--DETAIL TUP--</option>
            @foreach ($cart as $cr)
            <option value="{{ $cr->jenis }}">{{ $cr->jenis }}</option>
            @endforeach
            `;
                secondDropdown.disabled = false;
            } else if (firstDropdown.value === "LS") {
                secondDropdown.innerHTML = `
            <option value="">--Tanggal--</option>
            @foreach ($cart as $cr)
            <?php $detail = $cont->getDetail($cr->id_cart); ?>
                <option value="{{ $detail->sum('jumlah') }}">{{ date_format($cr->created_at, 'd F Y') }} ( {{ number_format($detail->sum('jumlah'), 0, ',', '.') }} )</option>
            @endforeach
            `;
                secondDropdown.disabled = false;

            } else {
                secondDropdown.innerHTML = `
            <option value="">--DETAIL JENIS TRANSFER--</option>
            `;
                secondDropdown.disabled = true;
            }
        });

        kasBppDropdown.addEventListener("change", function() {
            if (kasBppDropdown.value === 'bpp') {
                unorDropdown.style.display = "block";
                unorDropdown.innerHTML = `
                <option value="">--UNOR--</option>
                @foreach ($unor as $un)
                    <option value="{{ $un }}">{{ $un }}</option>
                @endforeach
                `;
                unorDropdown.disabled = false;

            } else {
                unorDropdown.style.display = "none";
                unorDropdown.innerHTML = `
            <option value="">--UNOR--</option>
            `;
                unorDropdown.disabled = true;
            }
        });
    </script>
@endsection
