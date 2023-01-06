<div class="modal fade" id="modalFamillies" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content rounded-0 text-sm">
            <div class="modal-header">
                <h5 class="modal-title">Data Kepala Keluarga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="kartukeluarga" class="table-bordered table-striped table-sm table">
                    <thead>
                        <tr>
                            <th scope="col" class="" width="15">No</th>
                            <th scope="col">No Kartu keluarga</th>
                            <th scope="col">Nama Kepala Keluarga</th>
                            <th scope="col" class="text-center">pilih</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($kartukeluargaanggota as $fcm)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $fcm->kartukeluarga->no_kk }}</td>
                                <td>{{ $fcm->nama }}</td>
                                <td>
                                    <button class="btnreg btn bg-gradient-info btn-sm rounded-0 text-sm"
                                        id="selectFamillies" data-no_kk="{!! $fcm->kartukeluarga->no_kk !!}"
                                        data-nama="{!! $fcm->nama !!}" data-id_kk="{!! $fcm->kartukeluarga->id !!}"
                                        data-kp="{!! $fcm->kartukeluarga->kp !!}" data-rt="{!! $fcm->kartukeluarga->rt !!}"
                                        data-rw="{!! $fcm->kartukeluarga->rw !!}" data-kodepos="{!! $fcm->kartukeluarga->kodepos !!}"
                                        data-provinsi="{!! $fcm->kartukeluarga->provinces->name !!}" data-kabkot="{!! $fcm->kartukeluarga->cities->name !!}"
                                        data-kecamatan="{!! $fcm->kartukeluarga->districts->name !!}" data-desa="{!! $fcm->kartukeluarga->villages->name !!}"
                                        data-dismiss="modal" </button>Select
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
