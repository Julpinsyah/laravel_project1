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

                <form action="{{ Route('konfig.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Aktif</th>
                                <th scope="col" class="col-md-9">Keterangan</th>
                                {{-- <th scope="col" colspan="3">
                                Action
                            </th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php $i = $berita->firstItem()  @endphp --}}
                            @php $i = 1 @endphp
                            <input type="hidden" name="keterangan-8" value="{{ $konfig[8]->keterangan }}">
                            <input type="hidden" name="keterangan-20" value="{{ $konfig[20]->keterangan }}">
                            <input type="hidden" name="keterangan-21" value="{{ $konfig[21]->keterangan }}">
                            @foreach ($konfig as $bn)
                                <input type="hidden" name="id[]" value="{{ $bn->id }}">
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $bn->nama }}</td>
                                    <td>
                                        <div>
                                            <select id="aktif-{{ $i - 2 }}" name="aktif-{{ $i - 2 }}">
                                                <option value="Y"
                                                    {{ old('aktif-' . $i, $bn->aktif) == 'Y' ? 'selected' : '' }}>
                                                    Ya</option>
                                                <option value="T"
                                                    {{ old('aktif-' . $i, $bn->aktif) == 'T' ? 'selected' : '' }}>
                                                    Tidak</option>
                                            </select>
                                        </div>
                                    </td>
                                    @if ($bn->nama == 'logo' || $bn->nama == 'icon' || $bn->nama == 'gedung')
                                        <td><input type="file" name="keterangan-{{ $i - 2 }}" class="mb-3"
                                                class="photo" onchange="imgPreview(this)" style="display:block">
                                            @if ($bn->keterangan != '')
                                                <img class="img-fluid img-preview col-md-8 mb-3" style="width:200px"
                                                    src="{{ asset('public/images/img/' . $bn->keterangan) }}">
                                            @else
                                                <img class="img-fluid img-preview col-md-8">
                                            @endif
                                        </td>
                                    @elseif($bn->nama == 'map_embed' || $bn->nama == 'profil')
                                        <td>
                                            <div class="mb-3 form-group ">
                                                <Textarea type="text" rows="3" class="form-control" id="informasi_lain" name="keterangan-{{ $i - 2 }}">{{ old('keterangan', $bn->keterangan) }}</Textarea>
                                            </div>
                                        </td>
                                    @else
                                        <td style="overflow: anywhere"><input type="text" value="{{ $bn->keterangan }}"
                                                name="keterangan-{{ $i - 2 }}" class="col-md-9"></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary mb-3"><i class="fas fa-fw fa-edit"></i> Ubah
                        Konfigurasi</button>
                </form>

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
        function imgPreview(e) {
            // console.log(e.files[0]);
            const imgPreview = document.getElementsByClassName("img-preview");
            imgPreview[0].classList.add("mt-3");
            imgPreview[0].style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(e.files[0]);

            oFReader.onload = function(oFREvent) {
                e.parentElement.children[1].src = oFREvent.target.result;
            };
        }
        // $('#exampleModal').on('show.bs.modal', function(event) {
        //     var button = $(event.relatedTarget) // Button that triggered the modal
        //     var recipient = button.data('whatever') // Extract info from data-* attributes
        //     // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        //     // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        //     var modal = $(this)
        //     modal.find('.modal-title').text('New message to ' + recipient)
        //     modal.find('.modal-body img').attr('src', recipient)
        // })
    </script>
@endSection
