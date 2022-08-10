@extends('layouts.mainlayout')

@section('maincontent')
    <div class="row mb-3">
        <div class="col-md">
            <a href="{{ Route('video.create') }}" class="btn btn-primary">Tambah Video</a>
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
                            <th scope="col">Tanggal</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">link</th>
                            <th scope="col" colspan="2">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = $video->firstItem()  @endphp
                        {{-- @php $i = 1 @endphp --}}
                        @foreach ($video as $bn)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td style="min-width:120px">{{ $bn->tanggal }}</td>
                                <td style="min-width:120px">{{ $bn->judul }}</td>
                                <td>{!! $bn->keterangan !!}</td>
                                <td>{{ $bn->link }}</td>
                                <td style="min-width:150px">
                                    <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal"
                                        data-target="#videoModal" data-whatever="{{ $bn->link }}"><i
                                            class="fas fa-fw fa-eye"></i></button>
                                    <a href="{{ Route('video.edit', $bn) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-fw fa-edit"></i>
                                    </a>
                                    <form class="form d-inline" method="post" action="{{ Route('video.destroy', $bn) }}">
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
                    {{ $video->onEachSide(3)->links() }}
                </ul>
            </nav>
        </div>
    </div>

    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                {{-- <h5 class="modal-title" id="exampleModalLabel">New message</h5> --}}
                <div class="modal-body">
                    {{-- <img src="{{ asset('images/benner/slide-1.jpg') }}" alt="" style="width:100%"> --}}
                    <iframe id="video" width="100%" height="400" src="" frameborder="0"
                        allow="autoplay; accelerometer; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick="stopVideo()">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('ckscript')
    <script>
        $('#videoModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('New message to ' + recipient);
            modal.find('.modal-body iframe').attr('src', recipient);
        });

        function stopVideo() {
            const iframe = document.getElementById("video");
            iframe.src = "";
        }
    </script>
@endSection
