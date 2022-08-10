@extends('layouts.mainlayout')

@section('maincontent')
    <div class="row mb-3">
        <div class="col-md">
            <a href="{{ Route('pemain.create') }}" class="btn btn-primary">Tambah Pemain</a>
        </div>
    </div>

    <div class="row">
        <div class="col col-md-6">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="table-responsive-md">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">No Punggung</th>
                            <th scope="col">Posisi</th>
                            <th scope="col">Group</th>
                            <th scope="col">Aktif</th>
                            <th scope="col" colspan="2">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = $pemain->firstItem()  @endphp
                        {{-- @php $i = 1 @endphp --}}
                        @foreach ($pemain as $bn)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $bn->nama }}</td>
                                <td>{{ $bn->nomor }}</td>
                                <td>{{ $bn->kode_posisi }} - {{ $bn->posisi }}</td>
                                <td>{{ $bn->grup_tim }}</td>
                                <td>{{ $bn->aktif }}</td>
                                <td style="min-width:150px">
                                    <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal"
                                        data-target="#videoModal" data-whatever="{{ $bn }}"><i
                                            class="fas fa-fw fa-eye"></i></button>
                                    <a href="{{ Route('pemain.edit', $bn) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-fw fa-edit"></i>
                                    </a>
                                    <form class="form d-inline" method="post" action="{{ Route('pemain.destroy', $bn) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    {{ $pemain->onEachSide(3)->links() }}
                </ul>
            </nav>
        </div>
    </div>

    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                {{-- <h5 class="modal-title" id="exampleModalLabel">New message</h5> --}}
                <div class="modal-body">
                    <div class="media">
                        <img src="{{ asset('public/images/photo/player-1.jpg') }}" class="mr-3" alt="..."
                            style="max-width:50%">
                        <div class="media-body">
                            <h5 id="nama" class="mt-0">Nama Pemain</h5>
                            <ul class="list-group list-group-flush">
                                <li id="posisi" class="list-group-item">Posisi</li>
                                <li id="nomor" class="list-group-item">Nomor Punggung</li>
                                <li id="negara" class="list-group-item">Negara</li>
                                <li id="grup" class="list-group-item">Grup</li>
                                <li id="kelamin" class="list-group-item">Kelamin</li>
                                <li id="lahir" class="list-group-item">Tanggal Lahir</li>
                                <li id="tampat" class="list-group-item">Temapt Lahir</li>
                                <li id="tinggi" class="list-group-item">Tinggi badan</li>
                                <li id="berat" class="list-group-item">Berat Badan</li>
                                <li id="main" class="list-group-item">Bermain</li>
                                <li id="kuning" class="list-group-item">Kartu Kuning</li>
                                <li id="merah" class="list-group-item">Kartu Merah</li>
                                <li id="gol" class="list-group-item">Gol</li>
                                <li id="masuk" class="list-group-item">Tanggal Masuk</li>
                                <li id="info" class="list-group-item">Informasi</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('ckscript')
    <script>
        function tanggal(tgl) {
            const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September",
                "October", "November", "December"
            ];
            var tanggal = new Date(tgl);
            var hari = tanggal.getDate();
            var bulan = tanggal.getMonth();
            var tahun = tanggal.getFullYear();
            return hari + '-' + months[bulan] + '-' + tahun;
        }

        $('#videoModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var recipient = button.data('whatever')
            var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + recipient);
            modal.find('#nama').text(recipient.nama);
            modal.find('#posisi').text(recipient.kode_posisi + ' - ' + recipient.posisi);
            modal.find('#nomor').text("No. " + recipient.nomor);
            modal.find('#negara').text(recipient.negara);
            modal.find('#grup').text(recipient.grup_tim);
            modal.find('#kelamin').text(recipient.kelamin);
            modal.find('#lahir').text("Lahir : " + tanggal(recipient.tanggal_lahir));
            modal.find('#tampat').text(recipient.tempat_lahir);
            modal.find('#tinggi').text(recipient.tinggi + " cm");
            modal.find('#berat').text(recipient.berat + " Kg");
            modal.find('#main').text("Bermain " + recipient.bermain);
            modal.find('#kuning').text("Kuning " + recipient.kartu_kuning);
            modal.find('#merah').text("Merah " + recipient.kartu_merah);
            modal.find('#gol').text("Gol " + recipient.goal);
            modal.find('#masuk').text("Bergabung pada " + tanggal(recipient.tanggal_masuk));
            modal.find('#info').text(recipient.informasi_lain);
            modal.find('.modal-body img').attr('src', "public/images/photo/" + recipient.photo);
        });
    </script>
@endSection
