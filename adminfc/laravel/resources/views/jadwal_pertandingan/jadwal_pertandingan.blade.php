@extends('layouts.mainlayout')

@section('maincontent')
    <div class="row mb-3">
        <div class="col-md">
            <a href="{{ Route('pertandingan.create') }}" class="btn btn-primary">Tambah Jadwal</a>
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
                <table class="table table-hover table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Id Tanding</th>
                            <th scope="col">Tangal Pertandingan</th>
                            <th scope="col">Waktu Pertandingan</th>
                            <th scope="col">Tim Kandang</th>
                            <th scope="col">Tim Tandang</th>
                            <th scope="col">Lapangan</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Link Map</th>
                            <th scope="col">Aktif</th>
                            <th scope="col" colspan="3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = $tanding->firstItem()  @endphp
                        {{-- @php $i = 1 @endphp --}}
                        @foreach ($tanding as $bn)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $liga->find($bn->idtanding)->nama }}</td>
                                <td>{{ $bn->tanggal }}</td>
                                <td>{{ $bn->waktu }}</td>
                                <td>{{ $club->find($bn->tanding)->nama }}</td>
                                <td>{{ $club->find($bn->tandang)->nama }}</td>
                                <td>{{ $bn->lapangan }}</td>
                                <td>{{ $bn->lokasi }}</td>
                                <td><button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal"
                                        data-target="#mapModal" data-whatever="{{ $bn->map }}"><i
                                            class="fas fa-map-marked"></i></button></td>
                                <td>{{ $bn->aktif }}</td>
                                <td style="min-width:150px">
                                    <a href="{{ Route('pertandingan.edit', $bn) }}"
                                        class="btn btn-outline-primary btn-sm"><i class="fas fa-fw fa-edit"></i></a>
                                    <form class="form d-inline" method="post"
                                        action="{{ Route('pertandingan.destroy', $bn) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger btn-sm"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    {{ $tanding->onEachSide(3)->links() }}
                </ul>
            </nav>
        </div>
    </div>

    <div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">LOKASI</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div id="map"></div>
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
        $('#mapModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('#map').html(recipient)
        })
    </script>
@endSection
