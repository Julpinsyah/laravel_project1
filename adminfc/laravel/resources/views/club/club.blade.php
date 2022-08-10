@extends('layouts.mainlayout')

@section('maincontent')
    <div class="row mb-3">
        <div class="col-md">
            <a href="{{ Route('club.create') }}" class="btn btn-primary">Tambah Club</a>
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
                            <th scope="col">Logo</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tempat</th>
                            <th scope="col">Kontak</th>
                            <th scope="col">Manager</th>
                            <th scope="col">Pelatih</th>
                            <th scope="col">Aktif</th>
                            <th scope="col" colspan="3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = $club->firstItem()  @endphp
                        {{-- @php $i = 1 @endphp --}}
                        @foreach ($club as $bn)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td><button class="border-0" data-toggle="modal" data-target="#exampleModal"
                                        data-whatever="{{ $bn }}">
                                        <img src="{{ asset('public/images/klub/' . $bn->logo) }}" alt=""
                                            style="width:100px">
                                    </button>
                                </td>
                                <td>{{ $bn->nama }}</td>
                                <td>{{ $bn->tempat }}</td>
                                <td>{{ $bn->kontak }}</td>
                                <td>{{ $bn->manager }}</td>
                                <td>{{ $bn->pelatih }}</td>
                                <td>{{ $bn->aktif }}</td>
                                <td style="min-width:150px">
                                    <a href="{{ Route('club.edit', $bn) }}" class="btn btn-outline-primary btn-sm"><i
                                            class="fas fa-fw fa-edit"></i></a>
                                    <form class="form d-inline" method="post" action="{{ Route('club.destroy', $bn) }}">
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
                    {{ $club->onEachSide(3)->links() }}
                </ul>
            </nav>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" style="max-width: 50%">
            <div class="modal-content">
                <div class="modal-body">
                    {{-- <img src="{{ asset('images/slide/slide-1.jpg') }}" alt="" style="width:100%"> --}}
                    <div class="card mb-3 border-0" style="width: 100%">
                        <div class="row no-gutters">
                            <div class="col-md-4 justify-content-center pl-3 pt-4">
                                <img src="..." alt="..." style="max-width:100%">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <h3 class="nama"
                                                style="font-weight: bold; font-family: Arial, Helvetica, sans-serif"></h3>
                                        </li>
                                        <li class="list-group-item tempat">A second item</li>
                                        <li class="list-group-item kontak">A third item</li>
                                        <li class="list-group-item manager">A fourth item</li>
                                        <li class="list-group-item pelatih">And a fifth one</li>
                                        <li>
                                            <div id="map"></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
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
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            // console.log(recipient);
            modal.find('.nama').text(recipient['nama'])
            modal.find('.tempat').text(recipient['tempat'])
            modal.find('.kontak').text(recipient['kontak'])
            modal.find('.manager').text(recipient['manager'] + " (Manager)")
            modal.find('.pelatih').text(recipient['pelatih'] + " (Pelatih)")
            modal.find('#map').html(recipient['map'])
            modal.find('.modal-body img').attr('src', 'public/images/klub/' + recipient['logo'])
        })
    </script>
@endSection
