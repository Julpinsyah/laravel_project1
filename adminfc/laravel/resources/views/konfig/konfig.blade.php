@extends('layouts.mainlayout')

@section('maincontent')
    {{-- <div class="row mb-3">
        <div class="col-md">
            <a href="/banner/create" class="btn btn-primary">Tambah Banner</a>
        </div>
    </div> --}}

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
                <a href="{{ Route('konfig.create') }}" class="btn btn-primary mb-3"><i class="fas fa-fw fa-edit"></i>
                    Ubah
                    Konfigurasi</a>
                <table class="table table-hover table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Aktif</th>
                            <th scope="col">Keterangan</th>
                            {{-- <th scope="col" colspan="3">
                                Action
                            </th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @php $i = $berita->firstItem()  @endphp --}}
                        @php $i = 1 @endphp
                        @foreach ($konfig as $bn)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $bn->nama }}</td>
                                <td>{{ $bn->aktif }}</td>
                                <td style="overflow: anywhere">{!! $bn->keterangan !!}</td>
                                {{-- <td style="min-width:150px">
                                    <a href="/banner/{{ $bn->id }}/edit" class="btn btn-outline-primary btn-sm"><i
                                            class="fas fa-fw fa-edit"></i></a>
                                    <form class="form d-inline" method="post" action="/banner/{{ $bn->id }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger btn-sm"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>


            {{-- <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    {{ $berita->onEachSide(3)->links() }}
                </ul>
            </nav> --}}
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="{{ asset('images/benner/slide-1.jpg') }}" alt="" style="width:100%">
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
            modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body img').attr('src', recipient)
        })
    </script>
@endSection
