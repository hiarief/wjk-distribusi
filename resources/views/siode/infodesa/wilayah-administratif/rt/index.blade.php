@extends('siode.infodesa.wilayah-administratif.wilayah-side')
@section('content-administratif')
    <div class="card card-primary card-outline table-responsive">
        <div class="card-header">
            <h3 class="card-title">Rukun Tetangga</h3>
        </div>

        <div class="card-body table-responsive">
            <div class="row">
                <div class="col">

                    <button class="btn btn-xs bg-gradient-navy" style="text-transform:uppercase" type="button"
                        id="button-addon2" data-toggle="modal" data-target="#ketuart"><i class="fa-solid fa-plus"></i>
                        Tambah Rt</button>

                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <table class="table-sm table-bordered table">
                        <tr class="text-center">
                            <th>No Rw</th>
                            @foreach ($kampungs as $warga => $kampung)
                                <th colspan="{{ $kampung->count() + 2 }}">{{ $warga }}</th>
                            @endforeach
                        </tr>
                        <tr class="text-center">
                            <th style="width: 1%">Kampung/Blok</th>
                            @foreach ($kampungs as $warga => $kampung)
                                @foreach ($kampung as $kp => $kamp)
                                    <th colspan="2">{{ $kamp->nama }}</th>
                                @endforeach
                            @endforeach
                        </tr>
                        <tr class="bg-gradient-light">
                            @foreach ($kampungs as $warga => $kampung)
                                <th colspan="{{ $kampung->count() }}"></th>
                            @endforeach
                        </tr>
                        <tr>
                            <th class="text-center">No Rt</th>
                            @foreach ($kampungs as $warga => $kampung)
                                @foreach ($kampung as $kp => $kamp)
                                    <th class="text-center">Ketua</th>
                                    <th class="text-center">Aksi</th>
                                @endforeach
                            @endforeach
                        </tr class="text-center">
                        @foreach ($keyby as $key => $by)
                            <tr class="text-center">
                                <th>{{ $key }}</th>
                                @foreach ($kampungs as $warga => $kampung)
                                    @foreach ($kampung as $kp => $kamp)
                                        <td>
                                            @foreach ($kamp->rukuntetangga->where('no', $key) as $rt => $tetangga)
                                                {{ $tetangga->ketua }}
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($kamp->rukuntetangga->where('no', $key) as $rt => $tetangga)
                                                <button class="btn btn-xs bg-gradient-info" style="text-transform:uppercase"
                                                    type="button" id="button-addon2" data-toggle="modal"
                                                    data-target="#edit"><i class="fa-solid fa-pen-to-square"></i></button>
                                            @endforeach
                                        </td>
                                    @endforeach
                                @endforeach
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="card-footer">

        </div>

    </div>
    <div class="modal fade" id="ketuart" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded-0 text-sm">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah data rt</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row-col-12">
                        <form method="post" action="{{ route('siode.infodesa.rt.store') }}" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Kp / Blok / Perum</label>
                                        <input type="text" id='nama' class="form-control form-control-sm"
                                            name="nama" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">No Rw</label>
                                        <select id='rw_id' class="form-control form-control-sm" name="rw_id" required>
                                            @foreach ($rw as $id => $no)
                                                <option value="{{ $id }}">{{ $no }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">

                                <table class="table text-sm" id="dynamicTable">
                                    <thead>
                                        <tr class="text-center">
                                            <th style="width: 15%">NO RT</th>
                                            <th style="width: 35%">KETUA RT</th>
                                            <th style="width: 35%">NO NIK</th>
                                            <th style="width: 15%"><button type="button" id="add"
                                                    class="btn bg-gradient-navy btn-sm">Tambah</button></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <a style="margin-top:0px;" class="btn bg-gradient-secondary btn-sm" data-dismiss="modal"
                                aria-label="Close" style="text-transform:uppercase">
                                {{ trans('Cancel') }}
                            </a>
                            <input type="submit" value="Submit" class="btn bg-gradient-primary btn-sm">
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles-administratif')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/dist/plugins/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('assets/dist/plugins/jquery-ui/jquery-ui.theme.min.css') }}">
@endpush

@push('scripts-administratif')
    <script src="{{ URL::asset('assets/dist/plugins/jquery/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/dist/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var i = 0;
            var b = 1;
            $("#add").click(function() {
                ++i;
                ++b;
                $("#dynamicTable").append(
                    '<tr>' +
                    '<td>' +
                    '<div class="input-group">' +
                    '<input type="text" name="no[]" class="form-control form-control-sm" id="no' +
                    i + '"  required>' +
                    '</div>' +
                    '</td>' +
                    '<td>' +
                    '<div class="input-group">' +
                    '<input type="text" name="ketua[]" class="form-control form-control-sm" id="ketua' +
                    i + '" required>' +
                    '</div>' +
                    '</td>' +
                    '<td>' +
                    '<div class="input-group">' +
                    '<input type="text" name="no_nik[]" class="form-control form-control-sm" id="nonik' +
                    i + '" required>' +
                    '</div>' +
                    '</td>' +
                    '<td style="width: 1%" class="text-center"><button type="button" class="btn btn-danger remove-tr btn-sm">Hapus</button></td>' +
                    '</tr>'
                );
                $('#ketua' + i + '').autocomplete({
                    source: function(request, response) {
                        // Fetch data
                        $.ajax({
                            url: "{{ route('siode.infodesa.rw.autocomplete') }}",
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
                        $('#ketua' + i + '').val(ui.item.label);
                        $('#nonik' + i + '').val(ui.item.nonik);
                        return false;
                    },
                    appendTo: "#ketuart",
                });
            });

            $(document).on('click', '.remove-tr', function() {
                $(this).parents('tr').remove();
            });


        });
    </script>
@endpush
