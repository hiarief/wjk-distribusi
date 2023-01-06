@extends('layouts.siode.app')
@section('title', 'Anggota Keluarga')
@section('content')


    <div class="card card-dark card-outline">
        <form method="POST" action="{!! route('siode.kependudukan.anggota-keluarga.store') !!}" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card-header">
                <div class="card-title">
                    <strong>INPUT DATA KEPALA KELUARGA</strong>
                </div>
            </div>
            <div class="card-body text-sm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">No Kartu Keluarga</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="nk" id="no_kk" value="{{ old('nk') }}"
                                    class="form-control form-control-sm text-sm" style="text-transform:uppercase"
                                    aria-describedby="button-addon2" readonly required>
                                <button class="btn btn-outline-secondary btn-sm" style="text-transform:uppercase"
                                    type="button" id="button-addon2" data-toggle="modal" data-target="#modalFamillies"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md">
                        <div class="fom-group">
                            <label for="">Nama Kepala Keluarga</label>
                            <input id="nama" type="text" class="form-control form-control-sm text-sm" name="namakk"
                                style="text-transform:uppercase" value="{{ old('namakk') }}" required readonly>
                            <input type="hidden" id="id_kk" value="{{ old('no_kk') }}" name="no_kk">
                        </div>
                    </div>
                </div>
                <div class="bg-gray mt-2 mb-2 py-2 px-2">
                    <h6 class="mb-0">
                        <strong>ALAMAT KARTU KELUARGA :</strong>
                    </h6>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Provinsi</label>
                            <input type="text" class="form-control form-control-sm text-sm"
                                style="text-transform:uppercase" name="provinsi" value="{{ old('provinsi') }}"
                                id="provinsi" readonly required>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Kabupaten / Kota</label>
                            <input type="text" class="form-control form-control-sm text-sm"
                                style="text-transform:uppercase" name="kabupaten" value="{{ old('kabupaten') }}"
                                id="kabkot" readonly required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Kecamatan</label>
                            <input type="text" class="form-control form-control-sm text-sm"
                                style="text-transform:uppercase" name="kecamatan" value="{{ old('kecamatan') }}"
                                id="kecamatan" readonly required>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Desa</label>
                            <input type="text" class="form-control form-control-sm text-sm"
                                style="text-transform:uppercase" name="desa" value="{{ old('desa') }}" id="desa"
                                readonly required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-0">
                        <div class="form-group">
                            <label for="">Dusun / Kampung</label>
                            <input type="text" class="form-control form-control-sm text-sm"
                                style="text-transform:uppercase" name="kp" value="{{ old('kp') }}" id="kp"
                                required readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">Rt</label>
                                    <input type="text" class="form-control form-control-sm text-sm"
                                        style="text-transform:uppercase" name="rt" value="{{ old('rt') }}"
                                        id="rt" readonly required>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">Rw</label>
                                    <input type="text" class="form-control form-control-sm text-sm"
                                        style="text-transform:uppercase" name="rw" value="{{ old('rw') }}"
                                        id="rw" readonly required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Kode Pos</label>
                            <input type="number" class="form-control form-control-sm text-sm"
                                style="text-transform:uppercase" name="kodepos" value="{{ old('kodepos') }}"
                                id="kodepos" required readonly>
                        </div>
                    </div>
                </div>
                <div class="bg-gray mt-2 mb-2 py-2 px-2">
                    <h6 class="mb-0">
                        <strong>IDENTITAS ANGGOTA KELUARGA :</strong>
                    </h6>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">No Induk Keluarga (NIK)</label>
                            <input type="number" class="form-control form-control-sm text-sm"
                                style="text-transform:uppercase" name="no_nik" value="{{ old('no_nik') }}"
                                id="no_nik" required>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form-control form-control-sm text-sm"
                                style="text-transform:uppercase" name="nama" value="{{ old('nama') }}"
                                id="" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select class="form-control form-control-sm select2bs4 text-sm"
                                style="text-transform:uppercase" style="width: 100%;" name="jenkel" id=""
                                required>
                                <option value="" hidden>Pilih Jenis Kelamin</option>
                                @foreach ($jeniskelamin as $id => $nama)
                                    <option value="{!! $id !!}" {{ old('jenkel') == $id ? 'selected' : '' }}>
                                        {!! $nama !!}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Tempat Lahir</label>
                            <input type="text" class="form-control form-control-sm text-sm"
                                style="text-transform:uppercase" name="tmpt_lahir" value="{{ old('tmpt_lahir') }}"
                                id="" required>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" class="form-control form-control-sm text-sm"
                                style="text-transform:uppercase" name="tgl_lahir" value="{{ old('tgl_lahir') }}"
                                id="" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Agama</label>
                            <select class="form-control form-control-sm select2bs4 text-sm"
                                style="text-transform:uppercase" style="width: 100%;" name="agama" id=""
                                required>
                                <option value="" hidden>Pilih Agama</option>
                                @foreach ($agama as $id => $nama)
                                    <option value="{!! $id !!}" {{ old('agama') == $id ? 'selected' : '' }}>
                                        {!! $nama !!}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Pendidikan</label>
                            <select class="form-control form-control-sm select2bs4 text-sm"
                                style="text-transform:uppercase" style="width: 100%;" name="pendidikan"
                                id=""required>
                                <option value="" hidden>Pilih Pendidikan</option>
                                @foreach ($pendidikankeluarga as $id => $nama)
                                    <option value="{!! $id !!}"
                                        {{ old('pendidikan') == $id ? 'selected' : '' }}>{!! $nama !!}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Jenis Pekerjaan</label>
                            <select class="form-control form-control-sm select2bs4 text-sm"
                                style="text-transform:uppercase" style="width: 100%;" name="jns_pekerjaan"
                                id="" required>
                                <option value="" hidden>Pilih Pekerjaan</option>
                                @foreach ($pekerjaan as $id => $nama)
                                    <option value="{!! $id !!}"
                                        {{ old('jns_pekerjaan') == $id ? 'selected' : '' }}>{!! $nama !!}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Golongan Darah</label>
                            <select class="form-control form-control-sm select2bs4 text-sm"
                                style="text-transform:uppercase" style="width: 100%;" name="gol_darah" id=""
                                required>
                                <option value="" hidden>Pilih Gol. Darah</option>
                                @foreach ($goldarah as $id => $nama)
                                    <option value="{!! $id !!}"
                                        {{ old('gol_darah') == $id ? 'selected' : '' }}>{!! $nama !!}
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
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Status Perkawinan</label>
                            <select class="form-control form-control-sm select2bs4 text-sm"
                                style="text-transform:uppercase" style="width: 100%;" name="sts_perkawinan"
                                id="" required>
                                <option value="" hidden>Pilih Status Perkawinan</option>
                                @foreach ($pernikahan as $id => $nama)
                                    <option value="{!! $id !!}"
                                        {{ old('sts_perkawinan') == $id ? 'selected' : '' }}>{!! $nama !!}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Tanggal Perkawinan</label>
                            <input type="date" class="form-control form-control-sm text-sm"
                                style="text-transform:uppercase" name="tgl_perkawinan"
                                value="{{ old('tgl_perkawinan') }}" id="tgl_perkawinan">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Hubungan Dalam Keluarga</label>
                            <select class="form-control form-control-sm select2bs4 text-sm"
                                style="text-transform:uppercase" style="width: 100%;" name="sts_hub_kel" id=""
                                required>
                                <option value="" hidden>Pilih Hubungan</option>
                                @foreach ($hubungankeluarga as $id => $nama)
                                    <option value="{!! $id !!}"
                                        {{ old('sts_hub_kel') == $id ? 'selected' : '' }}>{!! $nama !!}
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
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Kewarganegaraan</label>
                            <select class="form-control form-control-sm select2bs4 text-sm"
                                style="text-transform:uppercase" style="width: 100%;" name="sts_kwn" id="sts_kawin"
                                required>
                                <option value="" hidden>Pilih Kewarganegaraan</option>
                                @foreach ($kewarganegaraan as $id => $nama)
                                    <option value="{!! $id !!}"
                                        {{ old('sts_kwn') == $id ? 'selected' : '' }}>
                                        {!! $nama !!}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">No Paspor</label>
                            <input type="number" class="form-control form-control-sm text-sm"
                                style="text-transform:uppercase" name="no_paspor" value="{{ old('no_paspor') }}"
                                id="no_paspor">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">No Kitap</label>
                            <input type="number" class="form-control form-control-sm text-sm"
                                style="text-transform:uppercase" name="no_kitap" value="{{ old('no_kitap') }}"
                                id="no_kitap">
                        </div>
                    </div>
                </div>
                <div class="bg-gray mt-2 mb-2 py-2 px-2">
                    <h6 class="mb-0">
                        <strong>ORANG TUA :</strong>
                    </h6>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">No Induk Keluarga (NIK) Ayah</label>
                            <input type="number" class="form-control form-control-sm text-sm"
                                style="text-transform:uppercase" name="nik_ayah" value="{{ old('nik_ayah') }}"
                                id="nik_ayah" required>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Nama Ayah</label>
                            <input type="text" class="form-control form-control-sm text-sm"
                                style="text-transform:uppercase" name="nm_ayah" value="{{ old('nm_ayah') }}"
                                id="" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">No Induk Keluarga (NIK) Ibu</label>
                            <input type="number" class="form-control form-control-sm text-sm"
                                style="text-transform:uppercase" name="nik_ibu" value="{{ old('nik_ibu') }}"
                                id="nik_ibu" required>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Nama ibu</label>
                            <input type="text" class="form-control form-control-sm text-sm"
                                style="text-transform:uppercase" name="nm_ibu" value="{{ old('nm_ibu') }}"
                                id="" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="col-md-6">
                    <a style="margin-top:0px;" class="btn bg-gradient-secondary btn-sm" style="text-transform:uppercase"
                        href="#">
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
    {{--  <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/dist/plugins/jquery-ui/jquery-ui.min.css') }}">  --}}

    <link rel="stylesheet" href="{!! URL::asset('assets/dist/plugins/select2/css/select2.min.css') !!}">
    <link rel="stylesheet" href="{!! URL::asset('assets/dist/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') !!}">
    <link rel="stylesheet" href="{!! URL::asset('assets/dist/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') !!}">
    <link rel="stylesheet" href="{!! URL::asset('assets/dist/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') !!}">
@endpush

@push('scripts')
    {{--  <script src="{{ URL::asset('assets/dist/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {

            $("#kepala_keluarga").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('siode.kependudukan.kartu-keluarga.anggota-keluarga.autocomplete') }}",
                        type: 'POST',
                        data: {
                            search: request.term,
                            _token: '{{ csrf_token() }}',
                        },
                        dataType: "json",
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#kepala_keluarga').val(ui.item.label);
                    $('#nokk').val(ui.item.nokk); 
                    $('#provinsi').val(ui.item.provinsi); 
                    $('#kabkot').val(ui.item.kabkot); 
                    $('#kecamatan').val(ui.item.kecamatan); 
                    $('#desa').val(ui.item.desa); 
                    $('#kp').val(ui.item.kp); 
                    $('#rt').val(ui.item.rt); 
                    $('#rw').val(ui.item.rw); 
                    return false;
                }
            });

        });
    </script>  --}}

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
                theme: 'bootstrap4'
            })
            $("#kartukeluarga").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            });
        });
    </script>
    <script>
        $(function() {

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
