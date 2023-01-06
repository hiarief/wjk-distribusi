@extends('siode.infodesa.wilayah-administratif.wilayah-side')
@section('content-administratif')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Rukun Warga</h3>
        </div>

        <div class="card-body table-responsive">
            <div class="row">
                <div class="col">

                    <button class="btn btn-xs bg-gradient-navy" style="text-transform:uppercase" type="button"
                        id="button-addon2" data-toggle="modal" data-target="#ketuarw"><i class="fa-solid fa-plus"></i>
                        Tambah Rw</button>

                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <table class="table-sm table-bordered table">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 5%">No</th>
                                <th>No RW</th>
                                <th>Ketua</th>
                                <th colspan="3" style="width: 1%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($rw as $key => $r)
                                <tr class="text-center">
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $r->no }}</td>
                                    <td>{{ $r->ketua }}</td>
                                    <td>View</td>
                                    <td>Edit</td>
                                    <td>Hapus</td>
                                </tr>

                            @empty
                                <h4>tidak ada data</h4>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card-footer">

        </div>

    </div>
    <div class="modal fade" id="ketuarw" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content rounded-0 text-sm">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah data rw</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('siode.infodesa.rw.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="">No Rw</label>
                            <input type="number" class="form-control form-control-sm" name="no" required>
                        </div>
                        <div class="form-group">
                            <label for="">Ketua Rw</label>
                            <input type="text" id='ketua' class="form-control form-control-sm" name="ketua"
                                required>

                        </div>
                        <div class="form-group">
                            <label for="">No Nik</label>
                            <input type="text" id='nonik' class="form-control form-control-sm" name="no_nik"
                                required>
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
@endsection
@push('styles-administratif')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/dist/plugins/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/dist/plugins/jquery-ui/jquery-ui.theme.min.css') }}">
@endpush

@push('scripts-administratif')
    <script src="{{ URL::asset('assets/dist/plugins/jquery/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/dist/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {

            $("#ketua").autocomplete({
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
                    $('#ketua').val(ui.item.label);
                    $('#nonik').val(ui.item.nonik);
                    return false;
                },
                appendTo: "#ketuarw",
            });

        });
    </script>
@endpush
