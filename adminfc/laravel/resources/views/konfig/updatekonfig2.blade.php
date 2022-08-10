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
                                <th scope="col">Keterangan</th>
                                {{-- <th scope="col" colspan="3">
                                Action
                            </th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>{{ $konfig[0]->nama }}</td>
                                <td>
                                    <select id="aktif" name="aktif-0">
                                        <option value="Y"
                                            {{ old('aktif', $konfig[0]->aktif) == 'Y' ? 'selected' : '' }}>
                                            Ya</option>
                                        <option value="T"
                                            {{ old('aktif', $konfig[0]->aktif) == 'T' ? 'selected' : '' }}>
                                            Tidak</option>
                                    </select>
                                </td>
                                <td><input type="text" value="{{ old('keterangan-0', $konfig[0]->keterangan) }}"
                                        name="keterangan-0"></td>
                                </td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>{{ $konfig[1]->nama }}</td>
                                <td>
                                    <select id="aktif" name="aktif-1">
                                        <option value="Y"
                                            {{ old('aktif-1', $konfig[1]->aktif) == 'Y' ? 'selected' : '' }}>
                                            Ya</option>
                                        <option value="T"
                                            {{ old('aktif-1', $konfig[1]->aktif) == 'T' ? 'selected' : '' }}>
                                            Tidak</option>
                                    </select>
                                </td>
                                <td><input type="text" value="{{ old('keterangan-1', $konfig[1]->keterangan) }}"
                                        name="keterangan[]"></td>
                                </td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>{{ $konfig[2]->nama }}</td>
                                <td>
                                    <select id="aktif" name="aktif-2">
                                        <option value="Y"
                                            {{ old('aktif-2', $konfig[2]->aktif) == 'Y' ? 'selected' : '' }}>
                                            Ya</option>
                                        <option value="T"
                                            {{ old('aktif-2', $konfig[2]->aktif) == 'T' ? 'selected' : '' }}>
                                            Tidak</option>
                                    </select>
                                </td>
                                <td><input type="text" value="{{ old('keterangan-2', $konfig[2]->keterangan) }}"
                                        name="keterangan[]"></td>
                                </td>
                            </tr>

                            <tr>
                                <td>4</td>
                                <td>{{ $konfig[3]->nama }}</td>
                                <td>
                                    <select id="aktif" name="aktif-3">
                                        <option value="Y"
                                            {{ old('aktif-3', $konfig[3]->aktif) == 'Y' ? 'selected' : '' }}>
                                            Ya</option>
                                        <option value="T"
                                            {{ old('aktif-3', $konfig[3]->aktif) == 'T' ? 'selected' : '' }}>
                                            Tidak</option>
                                    </select>
                                </td>
                                <td><input type="text" value="{{ old('keterangan-3', $konfig[3]->keterangan) }}"
                                        name="keterangan[]"></td>
                                </td>
                            </tr>

                            <tr>
                                <td>5</td>
                                <td>{{ $konfig[4]->nama }}</td>
                                <td>
                                    <select id="aktif" name="aktif-4">
                                        <option value="Y"
                                            {{ old('aktif-4', $konfig[4]->aktif) == 'Y' ? 'selected' : '' }}>
                                            Ya</option>
                                        <option value="T"
                                            {{ old('aktif-4', $konfig[4]->aktif) == 'T' ? 'selected' : '' }}>
                                            Tidak</option>
                                    </select>
                                </td>
                                <td><input type="text" value="{{ old('keterangan-4', $konfig[4]->keterangan) }}"
                                        name="keterangan-4"></td>
                                </td>
                            </tr>

                            <tr>
                                <td>6</td>
                                <td>{{ $konfig[5]->nama }}</td>
                                <td>
                                    <select id="aktif" name="aktif-5">
                                        <option value="Y"
                                            {{ old('aktif-5', $konfig[5]->aktif) == 'Y' ? 'selected' : '' }}>
                                            Ya</option>
                                        <option value="T"
                                            {{ old('aktif-5', $konfig[5]->aktif) == 'T' ? 'selected' : '' }}>
                                            Tidak</option>
                                    </select>
                                </td>
                                <td><input type="text" value="{{ old('keterangan-5', $konfig[5]->keterangan) }}"
                                        name="keterangan-5"></td>
                                </td>
                            </tr>

                            <tr>
                                <td>7</td>
                                <td>{{ $konfig[6]->nama }}</td>
                                <td>
                                    <select id="aktif" name="aktif-6">
                                        <option value="Y"
                                            {{ old('aktif', $konfig[6]->aktif) == 'Y' ? 'selected' : '' }}>
                                            Ya</option>
                                        <option value="T"
                                            {{ old('aktif', $konfig[6]->aktif) == 'T' ? 'selected' : '' }}>
                                            Tidak</option>
                                    </select>
                                </td>
                                <td><input type="text" value="{{ old('keterangan[0]', $konfig[6]->keterangan) }}"
                                        name="keterangan[]"></td>
                                </td>
                            </tr>

                            <tr>
                                <td>8</td>
                                <td>{{ $konfig[7]->nama }}</td>
                                <td>
                                    <select id="aktif" name="aktif[]">
                                        <option value="Y"
                                            {{ old('aktif', $konfig[7]->aktif) == 'Y' ? 'selected' : '' }}>
                                            Ya</option>
                                        <option value="T"
                                            {{ old('aktif', $konfig[7]->aktif) == 'T' ? 'selected' : '' }}>
                                            Tidak</option>
                                    </select>
                                </td>
                                <td><input type="text" value="{{ old('keterangan[0]', $konfig[7]->keterangan) }}"
                                        name="keterangan[]"></td>
                                </td>
                            </tr>

                            <tr>
                                <td>9</td>
                                <td>{{ $konfig[8]->nama }}</td>
                                <td>
                                    <select id="aktif" name="aktif[]">
                                        <option value="Y"
                                            {{ old('aktif', $konfig[8]->aktif) == 'Y' ? 'selected' : '' }}>
                                            Ya</option>
                                        <option value="T"
                                            {{ old('aktif', $konfig[8]->aktif) == 'T' ? 'selected' : '' }}>
                                            Tidak</option>
                                    </select>
                                </td>
                                <td><input type="file" name="keterangan[]" class="mb-3" class="photo"
                                        onchange="imgPreview(this)">
                                    @if ($konfig[8]->keterangan != '')
                                        <img class="img-fluid img-preview col-md-8 mb-3"
                                            src="{{ asset('public/images/img/' . $konfig[8]->keterangan) }}">
                                    @else
                                        <img class="img-fluid img-preview col-md-8">
                                    @endif
                                </td>
                            </tr>

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
