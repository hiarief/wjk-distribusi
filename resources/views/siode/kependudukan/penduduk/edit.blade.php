@extends('layouts.siode.app')
@section('title', 'Edit Anggota Keluarga')
@section('content')

    <div class="card card-dark card-outline">
        <form method="POST" action="{!! route('siode.kependudukan.anggota-keluarga.update', $anggota->id) !!}" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('PUT')
            {{--  <input type="text" name="memberid" value="{{ $anggota->id }}">  --}}
            <input type="hidden" name="famillyid" value="{{ $anggota->no_kk }}">
            <div class="card-header">
                <div class="card-title">
                    <strong>EDIT DATA ANGGOTA KELUARGA</strong>
                </div>
            </div>
            <div class="card-body text-sm">
                <div class="row">
                    {{--  <div class="col-6">
                        <div class="form-group">
                            <label for="">No Kartu Keluarga</label>
                            <input type="number" class="form-control form-control-sm  "
                                style="text-transform:uppercase" name="no_kk" id="no_kk"
                                value="{{ $anggota->kartukeluarga->no_kk }}" required>
                        </div>
                    </div>  --}}
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">No Kartu Keluarga</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="no_kk" id="no_kk" class="form-control form-control-sm"
                                    style="text-transform:uppercase" aria-describedby="button-addon2" required="required"
                                    value="{{ $anggota->kartukeluarga->no_kk }}" readonly required>
                                <button class="btn btn-outline-secondary btn-sm" style="text-transform:uppercase"
                                    type="button" id="button-addon2" data-toggle="modal" data-target="#modalFamillies"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="fom-group">
                            <label for="">Nama Kepala Keluarga</label>
                            <input id="nama" type="text" class="form-control form-control-sm"
                                style="text-transform:uppercase" value="" required readonly>
                            <input type="hidden" id="id_kk" name="no_kk" value="{{ $anggota->no_kk }}">
                        </div>
                    </div>
                </div>
                <div class="bg-gray mt-2 mb-2 py-2 px-2">
                    <h6 class="mb-0">
                        <strong>ALAMAT KARTU KELUARGA :</strong>
                    </h6>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Provinsi</label>
                            <input type="text" class="form-control form-control-sm" style="text-transform:uppercase"
                                id="provinsi" value="{{ $anggota->kartukeluarga->provinces->name }}" required readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Kabupaten / Kota</label>
                            <input type="text" class="form-control form-control-sm" id="kabkot"
                                style="text-transform:uppercase" value="{{ $anggota->kartukeluarga->cities->name }}"
                                required readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Kecamatan</label>
                            <input type="text" class="form-control form-control-sm" style="text-transform:uppercase"
                                id="kecamatan" value="{{ $anggota->kartukeluarga->districts->name }}" required readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Desa</label>
                            <input type="text" class="form-control form-control-sm" style="text-transform:uppercase"
                                id="desa" value="{{ $anggota->kartukeluarga->villages->name }}" required readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mb-0">
                        <div class="form-group">
                            <label for="">Dusun / Kampung</label>
                            <input type="text" class="form-control form-control-sm" id="kp"
                                style="text-transform:uppercase" value="{{ $anggota->kartukeluarga->kp }}" required
                                readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Rt</label>
                                    <input type="text" class="form-control form-control-sm" id="rt"
                                        style="text-transform:uppercase" value="{{ $anggota->kartukeluarga->rt }}" required
                                        readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Rw</label>
                                    <input type="text" class="form-control form-control-sm" id="rw"
                                        style="text-transform:uppercase" value="{{ $anggota->kartukeluarga->rw }}"
                                        required readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">

                        <div class="form-group">
                            <label for="">Kode Pos</label>
                            <input type="number" class="form-control form-control-sm" style="text-transform:uppercase"
                                name="kodepos" id="kodepos" required value="{{ $anggota->kartukeluarga->kodepos }}"
                                readonly>
                        </div>
                    </div>
                </div>
                <div class="bg-gray mt-2 mb-2 py-2 px-2">
                    <h6 class="mb-0">
                        <strong>IDENTITAS KEPALA KELUARGA :</strong>
                    </h6>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="">No Induk Keluarga (NIK)</label>
                            <input type="number" class="form-control form-control-sm" style="text-transform:uppercase"
                                name="no_nik" id="no_nik" value="{{ $anggota->no_nik }}" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form-control form-control-sm" style="text-transform:uppercase"
                                name="nama" id="" value="{{ $anggota->nama }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select class="form-control form-control-sm select2bs4" style="text-transform:uppercase"
                                style="width: 100%;" name="jenkel" id="" required>
                                <option value="" hidden>Pilih Jenis Kelamin</option>
                                @foreach ($jeniskelamin as $id => $nama)
                                    <option value="{!! $id !!}" {!! $id == $anggota->jenkel ? 'selected' : '' !!}>
                                        {!! $nama !!}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Tempat Lahir</label>
                            <input type="text" class="form-control form-control-sm" style="text-transform:uppercase"
                                name="tmpt_lahir" id="" value="{{ $anggota->tmpt_lahir }}" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" class="form-control form-control-sm" style="text-transform:uppercase"
                                name="tgl_lahir" id="" value="{{ $anggota->tgl_lahir }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Agama</label>
                            <select class="form-control form-control-sm select2bs4" style="text-transform:uppercase"
                                style="width: 100%;" name="agama" id="" required>
                                <option value="" hidden>Pilih Agama</option>
                                @foreach ($agama as $id => $nama)
                                    <option value="{!! $id !!}" {!! $id == $anggota->agama ? 'selected' : '' !!}>
                                        {!! $nama !!}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Pendidikan</label>
                            <select class="form-control form-control-sm select2bs4" style="text-transform:uppercase"
                                style="width: 100%;" name="pendidikan" id=""required>
                                <option value="" hidden>Pilih Pendidikan</option>
                                @foreach ($pendidikankeluarga as $id => $nama)
                                    <option value="{!! $id !!}" {!! $id == $anggota->pendidikan ? 'selected' : '' !!}>
                                        {!! $nama !!}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Jenis Pekerjaan</label>
                            <select class="form-control form-control-sm select2bs4" style="text-transform:uppercase"
                                style="width: 100%;" name="jns_pekerjaan" id="" required>
                                <option value="" hidden>Pilih Pekerjaan</option>
                                @foreach ($pekerjaan as $id => $nama)
                                    <option value="{!! $id !!}" {!! $id == $anggota->jns_pekerjaan ? 'selected' : '' !!}>
                                        {!! $nama !!}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Golongan Darah</label>
                            <select class="form-control form-control-sm select2bs4" style="text-transform:uppercase"
                                style="width: 100%;" name="gol_darah" id="" required>
                                <option value="" hidden>Pilih Gol. Darah</option>
                                @foreach ($goldarah as $id => $nama)
                                    <option value="{!! $id !!}" {!! $id == $anggota->gol_darah ? 'selected' : '' !!}>
                                        {!! $nama !!}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="bg-gray mt-2 mb-2 py-2 px-2">
                    <h6 class="mb-0">
                        <strong>STATUS PERKAWINAN :</strong>
                    </h6>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Status Perkawinan</label>
                            <select class="form-control form-control-sm select2bs4" style="text-transform:uppercase"
                                style="width: 100%;" name="sts_perkawinan" id="" required>
                                <option value="" hidden>Pilih Status Perkawinan</option>
                                @foreach ($pernikahan as $id => $nama)
                                    <option value="{!! $id !!}" {!! $id == $anggota->sts_perkawinan ? 'selected' : '' !!}>
                                        {!! $nama !!}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Tanggal Perkawinan</label>
                            <input type="date" class="form-control form-control-sm" style="text-transform:uppercase"
                                name="tgl_perkawinan" value="{{ $anggota->tgl_perkawinan }}" id="tgl_perkawinan">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Hubungan Dalam Keluarga</label>
                            <select class="form-control form-control-sm select2bs4" style="text-transform:uppercase"
                                style="width: 100%;" name="sts_hub_kel" id="" required>
                                @foreach ($hubungankeluarga as $id => $nama)
                                    <option value="{!! $id !!}" {!! $id == $anggota->sts_hub_kel ? 'selected' : '' !!}>
                                        {!! $nama !!}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="bg-gray mt-2 mb-2 py-2 px-2">
                    <h6 class="mb-0">
                        <strong>KEWARGANEGARAAN :</strong>
                    </h6>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Kewarganegaraan</label>
                            <select class="form-control form-control-sm select2bs4" style="text-transform:uppercase"
                                style="width: 100%;" name="sts_kwn" id="sts_kawin" required>
                                <option value="" hidden>Pilih Kewarganegaraan</option>
                                @foreach ($kewarganegaraan as $id => $nama)
                                    <option value="{!! $id !!}" {!! $id == $anggota->sts_kwn ? 'selected' : '' !!}>
                                        {!! $nama !!}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">No Paspor</label>
                            <input type="number" class="form-control form-control-sm" style="text-transform:uppercase"
                                value="{{ $anggota->no_paspor }}" name="no_paspor" id="no_paspor">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">No Kitap</label>
                            <input type="number" class="form-control form-control-sm" style="text-transform:uppercase"
                                value="{{ $anggota->no_kitap }}" name="no_kitap" id="no_kitap">
                        </div>
                    </div>
                </div>
                <div class="bg-gray mt-2 mb-2 py-2 px-2">
                    <h6 class="mb-0">
                        <strong>ORANG TUA :</strong>
                    </h6>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">No Induk Keluarga (NIK) Ayah</label>
                            <input type="number" class="form-control form-control-sm" style="text-transform:uppercase"
                                value="{{ $anggota->nik_ayah }}" name="nik_ayah" id="nik_ayah" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Nama Ayah</label>
                            <input type="text" class="form-control form-control-sm" style="text-transform:uppercase"
                                value="{{ $anggota->nm_ayah }}" name="nm_ayah" id="" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">No Induk Keluarga (NIK) Ibu</label>
                            <input type="number" class="form-control form-control-sm" style="text-transform:uppercase"
                                value="{{ $anggota->nik_ibu }}" name="nik_ibu" id="nik_ibu" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Nama ibu</label>
                            <input type="text" class="form-control form-control-sm" style="text-transform:uppercase"
                                value="{{ $anggota->nm_ibu }}" name="nm_ibu" id="" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-6">
                    <a style="margin-top:0px;" class="btn bg-gradient-secondary btn-sm" style="text-transform:uppercase"
                        href="{{ route('siode.kependudukan.anggota-keluarga.index') }}">
                        {{ trans('Cancel') }}
                    </a>
                    <input type="submit" value="Submit" class="btn bg-gradient-primary btn-sm">
                </div>
            </div>
        </form>
    </div>

    @include('siode.kependudukan.penduduk.partials.modal-kk')
@endsection

@push('styles')
    <link rel="stylesheet" href="{!! URL::asset('assets/dist/plugins/select2/css/select2.min.css') !!}">
    <link rel="stylesheet" href="{!! URL::asset('assets/dist/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') !!}">
    <link rel="stylesheet" href="{!! URL::asset('assets/dist/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') !!}">
    <link rel="stylesheet" href="{!! URL::asset('assets/dist/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') !!}">
@endpush

@push('scripts')
    <script src="{!! URL::asset('assets/dist/plugins/select2/js/select2.full.min.js') !!}"></script>
    <script src="{!! URL::asset('assets/dist/plugins/datatables/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! URL::asset('assets/dist/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') !!}"></script>
    <script src="{!! URL::asset('assets/dist/plugins/datatables-responsive/js/dataTables.responsive.min.js') !!}"></script>
    <script src="{!! URL::asset('assets/dist/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') !!}"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4',
                placeholder: "== Pilih ==",
                allowClear: true
            })
            $("#kartukeluarga").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,

            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '#selectFamillies', function() {
                var id_kk = $(this).data('id_kk');
                var nama = $(this).data('nama');
                var no_kk = $(this).data('no_kk');
                var kp = $(this).data('kp');
                var rt = $(this).data('rt');
                var rw = $(this).data('rw');
                var kodepos = $(this).data('kodepos');
                var desa = $(this).data('desa');
                var kecamatan = $(this).data('kecamatan');
                var kabkot = $(this).data('kabkot');
                var provinsi = $(this).data('provinsi');
                $('#id_kk').val(id_kk);
                $('#nama').val(nama);
                $('#no_kk').val(no_kk);
                $('#kp').val(kp);
                $('#rt').val(rt);
                $('#rw').val(rw);
                $('#kodepos').val(kodepos);
                $('#desa').val(desa);
                $('#kecamatan').val(kecamatan);
                $('#kabkot').val(kabkot);
                $('#provinsi').val(provinsi);
            })
        })
    </script>
@endpush
