@extends('layouts.siode.app')
@section('title', 'Kartu Keluarga')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-dark card-outline table-responsive">
                <div class="card-header">
                    <div class="card-title">
                        <a href="{{ route('siode.kependudukan.kartu-keluarga.create') }}"
                            class="btn btn-xs bg-gradient-primary"><i class="fa-solid fa-plus"></i>
                            Tambah</a>
                        <a href="{{ route('siode.kependudukan.kartu-keluarga.view-delete') }}"
                            class="btn btn-xs bg-gradient-danger"><i class="fa-solid fa-trash"></i> Trash</a>
                    </div>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 250px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                placeholder="Cari...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table id="example1"
                        class="table-bordered table-hover table-striped rounded-0 table-sm table py-0 text-sm">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 1%">No</th>
                                <th style="width: 1%">Aksi</th>
                                <th>No KK</th>
                                <th>No NIK</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Tempat Lahir</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kartukeluargaanggota as $value => $fm)
                                <tr class="text-center">
                                    <td class="text-center">{{ $kartukeluargaanggota->firstItem() + $value }}</td>
                                    <td class="text-center">
                                        <div class="btn-group text-center">
                                            <button type="button"
                                                class="btn bg-gradient-success dropdown-toggle dropdown-icon btn-sm"
                                                data-toggle="dropdown">
                                                <span class="bg-gradient-success sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                <form method="POST" action="{!! route('siode.kependudukan.kartu-keluarga.destroy', $fm->id) !!}" class="text-center">
                                                    @csrf
                                                    @method('delete')
                                                    <a class="dropdown-item bg-gradient-info"
                                                        href="{{ route('siode.kependudukan.kartu-keluarga.show', $fm->no_kk) }}"><i
                                                            class="fa-solid fa-eye"></i>
                                                        View</a>
                                                    <a class="dropdown-item bg-gradient-warning"
                                                        href="{{ route('siode.kependudukan.kartu-keluarga.edit', $fm->id) }}"><i
                                                            class="fa-solid fa-pen"></i>
                                                        Edit</a>
                                                    <a class="dropdown-item bg-gradient-danger show_confirm"
                                                        data-nama="{!! $fm->nama !!}" type="submit"><i
                                                            class="fa-solid fa-trash"></i>
                                                        Delete</a>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $fm->kartukeluarga->no_kk }}</td>
                                    <td>{{ $fm->no_nik }}</td>
                                    <td style="text-transform:uppercase">{{ $fm->nama }}</td>
                                    <td style="text-transform:uppercase" class="text-center">{{ $fm->tgl_lahir }}</td>
                                    <td style="text-transform:uppercase" class="text-center">{{ $fm->tmpt_lahir }}</td>
                                    <td style="text-transform:uppercase">
                                        {{ $fm->kartukeluarga->kp }}, RT.
                                        {{ $fm->kartukeluarga->rt }}/
                                        {{ $fm->kartukeluarga->rw }}, DS.
                                        {{ $fm->kartukeluarga->villages->name }},
                                        KEC. {{ $fm->kartukeluarga->districts->name }}
                                    </td>

                                </tr>
                            @empty
                                <h4>tidak ada data</h4>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr class="text-center">
                                <th style="width: 1%">No</th>
                                <th>Aksi</th>
                                <th>No KK</th>
                                <th>No NIK</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Tempat Lahir</th>
                                <th>Alamat</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="card-footer clearfix">

                    Halaman : {{ $kartukeluargaanggota->currentPage() }} <br />
                    Jumlah Data : {{ $kartukeluargaanggota->total() }} <br />
                    Data Per Halaman : {{ $kartukeluargaanggota->perPage() }}
                    <ul class="pagination pagination-sm float-right m-0">
                        {{ $kartukeluargaanggota->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <script>
        // Your custom JavaScript...
    </script>
@endpush

@push('scripts')
    <script src="{{ URL::asset('assets/dist/plugins/sweetalert2/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            var nama_data = $(this).attr('data-nama');
            event.preventDefault();
            swal({
                    title: `Apakah anda yakin ?`,
                    text: "Data " + nama_data + " yang dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                        swal(
                            'Terhapus!',
                            'Data berhasil di Hapus!',
                            'success'
                        )
                    }
                });
        });
    </script>
@endpush
