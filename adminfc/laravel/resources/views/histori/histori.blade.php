@extends('layouts.mainlayout')

@section('maincontent')
    <div class="row mb-3">
        <div class="col-md">
            <a href="{{ Route('histori.create') }}" class="btn btn-primary">Tambah Histori</a>
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
                            <th scope="col">Gambar</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Aktif</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col" colspan="3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = $histori->firstItem()  @endphp
                        {{-- @php $i = 1 @endphp --}}
                        @foreach ($histori as $bn)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td><button class="border-0" data-toggle="modal" data-target="#exampleModal"
                                        data-whatever="{{ $bn }}">
                                        <img src="{{ asset('public/images/histori/' . $bn->gambar) }}" alt=""
                                            style="width:100px">
                                    </button>
                                </td>
                                <td>{{ $bn->judul }}</td>
                                <td>{{ $bn->tahun }}</td>
                                <td>{{ $bn->aktif }}</td>
                                <td>{{ $bn->ringakasan }}</td>
                                <td style="min-width:150px">
                                    <a href="{{ Route('histori.edit', $bn) }}" class="btn btn-outline-primary btn-sm"><i
                                            class="fas fa-fw fa-edit"></i></a>
                                    <form class="form d-inline" method="post"
                                        action="{{ Route('histori.destroy', $bn) }}">
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
                    {{ $histori->onEachSide(3)->links() }}
                </ul>
            </nav>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" style="max-width: 50%">
            <div class="modal-content">
                <div class="modal-body">
                    {{-- <img src="{{ asset('images/slide/slide-1.jpg') }}" alt="" style="width:100%"> --}}
                    <div class="card border-0" style="width: 100%">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"> </p>
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
            console.log(recipient);
            modal.find('.card-title').text(recipient['judul'])
            modal.find('.card-text').html(recipient['keterangan'])
            modal.find('.modal-body img').attr('src', 'public/images/histori/' + recipient['gambar'])
        })
    </script>
@endSection
