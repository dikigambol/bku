@extends('layouts.admin')
@section('transfer', 'active')

@section('content')
    <section class="content" style="padding-top: 10px;">
        <div class="container-fluid">
            <form action="{{ route('transfer.update', $transfer->id) }}" method="post">
                @method('PUT')
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-body">
                        <div class="col pb-2">
                            <a class="d-inline-block btn btn-primary float-left" href="{{ url()->previous() }}">Cancel</a>
                            <button class="d-inline-block float-right btn btn-warning" type="submit">Edit</button>
                        </div>
                        <div class="row my-2 mt-5">
                            <input id="role" name="role" type="text" value="{{ $auth->role }}"
                                class="form-control" hidden>
                            <div class="col-2"><label for="">Tanggal Buku</label></div>
                            <div class="col-3">
                                <input id="tgl_buku" name="tgl_buku"
                                    value="{{ old('tgl_buku') ? old('tgl_buku') : $transfer->tgl_buku }}" type="date"
                                    class="form-control">
                                @error('tgl_buku')
                                    <small class="text-danger ml-1"><i
                                            class="fa fa-exclamation-circle mr-1"></i>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-2"><label for="">No. Buku</label></div>
                            <div class="col-3">
                                <input id="no_buku" name="no_buku" type="text"
                                    value="{{ old('no_buku') ? old('no_buku') : $transfer->no_buku }}" class="form-control">
                                @error('no_buku')
                                    <small class="text-danger ml-1"><i
                                            class="fa fa-exclamation-circle mr-1"></i>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-2"><label for="">No. Bukti</label></div>
                            <div class="col-3">
                                <input id="no_bukti" name="no_bukti"
                                    value="{{ old('no_bukti') ? old('no_bukti') : $transfer->no_bukti }}" type="text"
                                    class="form-control mb-3">
                                @error('no_bukti')
                                    <small class="text-danger ml-1"><i
                                            class="fa fa-exclamation-circle mr-1"></i>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-2"><label for="">Jenis Transfer</label></div>
                            <div class="col-3">
                                <select id="jenis_transfer" name="jenis_transfer" class="form-select">
                                    <option
                                        value="{{ old('jenis_transfer') ? old('jenis_transfer') : $transfer->jenis_transfer }}">
                                        {{ $transfer->jenis_transfer }}</option>
                                    <option value="UP">UP</option>
                                    <option value="TUP">TUP</option>
                                    <option value="LS">LS-Bendahara</option>
                                </select>
                                @error('jenis_transfer')
                                    <small class="text-danger ml-1"><i
                                            class="fa fa-exclamation-circle mr-1"></i>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-3">
                                <select id="detail_transfer" name="detail_transfer" class="form-select">
                                    <option
                                        value="{{ old('detail_transfer') ? old('detail_transfer') : $transfer->detail_transfer }}">
                                        {{ $transfer->detail_transfer }}</option>

                                </select>
                                @error('detail_transfer')
                                    <small class="text-danger ml-1"><i
                                            class="fa fa-exclamation-circle mr-1"></i>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-2"><label for="">Dari / Ke</label></div>
                            <div class="col-6">
                                <div class="d-inline-flex mb-3" style="width: 100%;">
                                    <select id="dari" name="dari" class="form-select">
                                        <option value="{{ old('dari') ? old('dari') : $transfer->dari }}">
                                            {{ $transfer->dari }}</option>
                                        <option value="KPPN">KPPN</option>
                                        <option value="BANK">Kas Bank</option>
                                        <option value="BP">Kas BP</option>
                                        <option value="BPP">Kas BPP</option>
                                        <option value="PUMK">Kas PUMK</option>
                                    </select>
                                    <i class="fas fa-arrow-right m-2"></i>
                                    <select id="kepada" name="kepada" class="form-select mr-2">
                                        <option value="{{ old('kepada') ? old('kepada') : $transfer->kepada }}">
                                            {{ $transfer->kepada }}</option>
                                    </select>
                                    <select id="bpp_unor" name="bpp_unor" class="form-select" style="display:none;">
                                        <option value="" selected>--UNOR--</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-2"><label for="">Uraian Transaksi</label></div>
                            <div class="col-6">
                                <textarea id="uraian" name="uraian" class="form-control" rows="3">
                                {{ old('uraian') ? old('uraian') : strip_tags($transfer->uraian) }}
                            </textarea>
                                @error('uraian')
                                    <small class="text-danger ml-1"><i
                                            class="fa fa-exclamation-circle mr-1"></i>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-2"><label for="">Jumlah Transaksi</label></div>
                            <div class="col-6">
                                <input type="number" min="1" id="jumlah" name="jumlah"
                                    value="{{ old('jumlah') ? old('jumlah') : $transfer->jumlah }}" class="form-control">
                                @error('jumlah')
                                    <small class="text-danger ml-1"><i
                                            class="fa fa-exclamation-circle mr-1"></i>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-2"></div>
                            <div class="col-10">
                                <textarea id="terbilang" name="terbilang" class="form-control" rows="3" readonly>
                                {{ old('terbilang') ? old('terbilang') : strip_tags($transfer->terbilang) }}
                            </textarea>
                                @error('terbilang')
                                    <small class="text-danger ml-1"><i
                                            class="fa fa-exclamation-circle mr-1"></i>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script>
        const firstDropdown = document.querySelector("#jenis_transfer");
        const secondDropdown = document.querySelector("#detail_transfer");

        const dariDropdown = document.querySelector("#dari");
        const kepadaDropdown = document.querySelector("#kepada");
        const unorDropdown = document.querySelector("#bpp_unor");

        firstDropdown.addEventListener("change", function() {
            if (firstDropdown.value === "UP") {
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

        dariDropdown.addEventListener("change", function() {
            if (dariDropdown.value === "KPPN") {
                kepadaDropdown.style.display = "block";
                kepadaDropdown.innerHTML = `
                <option value="{{ old('dari') ? old('dari') : $transfer->dari }}">{{ $transfer->dari }}</option>
                <option value="BANK">Kas Bank</option>
                <option value="BP">Kas BP</option>
                <option value="BPP">Kas BPP</option>
                <option value="PUMK">Kas PUMK</option>
                `;

            } else if (dariDropdown.value === "BANK") {
                kepadaDropdown.style.display = "block";
                kepadaDropdown.innerHTML = `
                <option value="{{ old('dari') ? old('dari') : $transfer->dari }}">{{ $transfer->dari }}</option>
                <option value="KPPN">KPPN</option>
                <option value="BP">Kas BP</option>
                <option value="BPP">Kas BPP</option>
                <option value="PUMK">Kas PUMK</option>
                `;

            } else if (dariDropdown.value === "BP") {
                kepadaDropdown.style.display = "block";
                kepadaDropdown.innerHTML = `
                <option value="{{ old('dari') ? old('dari') : $transfer->dari }}">{{ $transfer->dari }}</option>
                <option value="KPPN">KPPN</option>
                <option value="BANK">Kas Bank</option>
                <option value="BPP">Kas BPP</option>
                <option value="PUMK">Kas PUMK</option>
                `;

            } else if (dariDropdown.value === "BPP") {
                kepadaDropdown.style.display = "block";
                kepadaDropdown.innerHTML = `
                <option value="{{ old('dari') ? old('dari') : $transfer->dari }}">{{ $transfer->dari }}</option>
                <option value="KPPN">KPPN</option>
                <option value="BANK">Kas Bank</option>
                <option value="BP">Kas BP</option>
                <option value="PUMK">Kas PUMK</option>
                `;

            } else if (dariDropdown.value === "PUMK") {
                kepadaDropdown.style.display = "block";
                kepadaDropdown.innerHTML = `
                <option value="{{ old('dari') ? old('dari') : $transfer->dari }}">{{ $transfer->dari }}</option>
                <option value="KPPN">KPPN</option>
                <option value="BANK">Kas Bank</option>
                <option value="BP">Kas BP</option>
                <option value="BPP">Kas BPP</option>
                `;

            } else {
                kepadaDropdown.style.display = "block";
                kepadaDropdown.innerHTML = `
                <option value="{{ old('dari') ? old('dari') : $transfer->dari }}">{{ $transfer->dari }}</option>
            `;
            }
        })

        kepadaDropdown.addEventListener("change", function() {
            if (kepadaDropdown.value === 'BPP') {
                unorDropdown.style.display = "block";
                unorDropdown.innerHTML = `
                <option value="{{ old('bpp_unor') ? old('bpp_unor') : $transfer->bpp_unor }}">{{ $transfer->bpp_unor }}</option>
                @foreach ($unor as $un)
                    <option value="{{ $un->name }}">{{ $un->name }}</option>
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

        "@if (session('stsAksi'))"
        showAlert(
            "{{ session('stsAksi') }}",
            "{{ session('iconAksi') }}",
            "{{ session('titleAksi') }}"
        );
        "@endif"

        function showAlert(message, icon, title) {
            Swal.fire({
                icon: icon,
                width: 600,
                title: title,
                text: message,
            })
        }


        $("#jumlah").on('change keydown paste input', function() {
            var jumlah = 1 * ($('#jumlah').val())
            var inpTerbilang = $('#terbilang')
            var terbilang = pembilang(jumlah)
            console.log(jumlah)
            if (jumlah != 0) {
                if (jumlah > 100000000000000000) {
                    inpTerbilang.val('Jumlah melebihi batas perhitungan!')
                } else {
                    inpTerbilang.val(terbilang + ' Rupiah')
                }
            } else {
                inpTerbilang.val('')
            }
        })

        function pembilang(nilai) {
            nilai = Math.abs(nilai);
            var simpanNilaiBagi = 0;
            var huruf = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh",
                "Sebelas"
            ];
            var temp = "";

            if (nilai < 12) {
                temp = " " + huruf[nilai];
            } else if (nilai < 20) {
                temp = pembilang(nilai - 10) + " Belas";
            } else if (nilai < 100) {
                simpanNilaiBagi = Math.floor(nilai / 10);
                temp = pembilang(simpanNilaiBagi) + " Puluh" + pembilang(nilai % 10);
            } else if (nilai < 200) {
                temp = " Seratus" + pembilang(nilai - 100);
            } else if (nilai < 1_000) {
                simpanNilaiBagi = Math.floor(nilai / 100);
                temp = pembilang(simpanNilaiBagi) + " Ratus" + pembilang(nilai % 100);
            } else if (nilai < 2_000) {
                temp = " Seribu" + pembilang(nilai - 1_000);
            } else if (nilai < 1_000_000) {
                simpanNilaiBagi = Math.floor(nilai / 1_000);
                temp = pembilang(simpanNilaiBagi) + " Ribu" + pembilang(nilai % 1_000);
            } else if (nilai < 1_000_000_000) {
                simpanNilaiBagi = Math.floor(nilai / 1_000_000);
                temp = pembilang(simpanNilaiBagi) + " Juta" + pembilang(nilai % 1_000_000);
            } else if (nilai < 1_000_000_000_000) {
                simpanNilaiBagi = Math.floor(nilai / 1_000_000_000);
                temp = pembilang(simpanNilaiBagi) + " Miliar" + pembilang(nilai % 1_000_000_000);
            } else if (nilai < 1_000_000_000_000_000) {
                simpanNilaiBagi = Math.floor(nilai / 1_000_000_000_000);
                temp = pembilang(simpanNilaiBagi) + " Triliun" + pembilang(nilai % 1_000_000_000_000);
            } else if (nilai < 1_000_000_000_000_000_000) {
                simpanNilaiBagi = Math.floor(nilai / 1_000_000_000_000_000);
                temp = pembilang(simpanNilaiBagi) + " Kuadriliun" + pembilang(nilai % 1_000_000_000_000_000);
            }

            return temp;
        }
    </script>
@endsection
