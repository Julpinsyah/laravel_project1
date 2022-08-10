@extends('layouts.mainlayout')

@section('maincontent')
    <div class="row mb-3">
        <div class="col-md">
            <a href="{{ Route('informasi.create') }}" class="btn btn-primary">Tambah Infromasi</a>
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
                <table class="table table-fluid table-hover table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Informasi</th>
                            <th scope="col">Batas</th>
                            <th scope="col">Aktif</th>
                            <th scope="col" colspan="3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = $informasi->firstItem()  @endphp
                        {{-- @php $i = 1 @endphp --}}
                        @foreach ($informasi as $bn)
                            <tr class="{{ now()->diffInDays($bn->batas) < 3 ? 'bg-danger text-light' : '' }}">
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $bn->informasi }}</td>
                                <td style="min-width:120px">{{ $bn->batas }}</td>
                                <td>{{ $bn->aktif }}</td>
                                <td style="min-width:120px">
                                    <a href="{{ Route('informasi.edit', $bn) }}" class="btn btn-outline-primary btn-sm"><i
                                            class="fas fa-fw fa-edit"></i></a>
                                    <form class="form d-inline" method="post"
                                        action="{{ Route('informasi.destroy', $bn) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"
                                            class="btn {{ now()->diffInDays($bn->batas) < 3 ? 'btn-outline-light' : 'btn-outline-danger' }} btn-sm"><i
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
                    {{ $informasi->onEachSide(3)->links() }}
                </ul>
            </nav>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="{{ asset('images/slide/slide-1.jpg') }}" alt="" style="width:100%">
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
