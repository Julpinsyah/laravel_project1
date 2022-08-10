@extends('layouts.mainlayout')

@section('maincontent')
    <div class="row mb-3">
        <div class="col-md">
            <a href="{{ Route('pengurus.create') }}" class="btn btn-primary">Tambah Management</a>
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
                            <th scope="col">Posisi</th>
                            <th scope="col">Urutan</th>
                            <th scope="col">Aktif</th>
                            <th scope="col" colspan="2">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = $pengurus->firstItem()  @endphp
                        {{-- @php $i = 1 @endphp --}}
                        @foreach ($pengurus as $bn)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $bn->nama }}</td>
                                <td>{{ $bn->posisi }}</td>
                                <td>{{ $bn->urutan }}</td>
                                <td>{{ $bn->aktif }}</td>
                                <td style="min-width:150px">
                                    <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal"
                                        data-target="#pengurusModal" data-whatever="{{ $bn }}"><i
                                            class="fas fa-fw fa-eye"></i></button>
                                    <a href="{{ Route('pengurus.edit', $bn) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-fw fa-edit"></i>
                                    </a>
                                    <form class="form d-inline" method="post"
                                        action="{{ Route('pengurus.destroy', $bn) }}">
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
                    {{ $pengurus->onEachSide(3)->links() }}
                </ul>
            </nav>
        </div>
    </div>

    <div class="modal fade" id="pengurusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <li id="negara" class="list-group-item">Negara</li>
                                <li id="kelamin" class="list-group-item">Kelamin</li>
                                <li id="lahir" class="list-group-item">Tanggal Lahir</li>
                                <li id="tampat" class="list-group-item">Temapt Lahir</li>
                                <li id="tinggi" class="list-group-item">Tinggi badan</li>
                                <li id="berat" class="list-group-item">Berat Badan</li>
                                <li id="facebook" class="list-group-item">facebook</li>
                                <li id="instagram" class="list-group-item">Instagram</li>
                                <li id="twitter" class="list-group-item">twitter</li>
                                <li id="masuk" class="list-group-item">Tanggal Masuk</li>
                                <li id="keluar" class="list-group-item">Tanggal Keluar</li>
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
            if (tgl == null) {
                return ' - ';
            }
            var tanggal = new Date(tgl);
            var hari = tanggal.getDate();
            var bulan = tanggal.getMonth();
            var tahun = tanggal.getFullYear();
            return hari + '-' + months[bulan] + '-' + tahun;
        }

        $('#pengurusModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var recipient = button.data('whatever')

            var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + recipient);
            modal.find('#nama').text(recipient.nama);
            modal.find('#posisi').text(recipient.posisi);
            modal.find('#negara').text(recipient.negara);
            modal.find('#kelamin').text(recipient.kelamin);
            modal.find('#lahir').text("Lahir : " + tanggal(recipient.tanggal_lahir));
            modal.find('#tampat').text(recipient.tempat_lahir);
            modal.find('#tinggi').text(recipient.tinggi + " cm");
            modal.find('#berat').text(recipient.berat + " Kg");
            modal.find('#facebook').text("Facebook : " + recipient.facebook);
            modal.find('#instagram').text("instagram : " + recipient.instagram);
            modal.find('#twitter').text("twitter : " + recipient.twitter);
            modal.find('#masuk').text("Bergabung pada " + tanggal(recipient.tanggal_masuk));
            modal.find('#keluar').text("keluar pada " + tanggal(recipient.tanggal_keluar));
            modal.find('#info').html(recipient.informasi_lain);
            modal.find('.modal-body img').attr('src', "public/images/photo/" + recipient.photo);
        });
    </script>
@endSection
