@extends('layouts.mainlayout')

@section('maincontent')
    {{ $news }}
    <div class="row">
        <div class="col-md">
            <div class="card mb-3">
                <img src="https://images.unsplash.com/photo-1543326619-57a357115984?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                    class="card-img-top" alt="..." style="height:300px; object-fit:cover">
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-10">
                            <h3 class="card-title mb-0 align-items-lg-stretch">Ini Judul Beritanya vulputate convallis, erat
                                urna tincidunt nulla,
                                non mattis lacus purus at turpis. Fusce in</h3>
                        </div>
                        <div class="col col-md-2">
                            <div class="card-text text-right">

                                <a href="/news/1/edit" class="btn btn-primary">Edit</a>


                                <a href="" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>

                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago by Admin in category</small></p>
                    <p class="card-text">
                    <div><strong>Lorem ipsum dolor sit amet</strong>, consectetur adipiscing elit. Nam laoreet, erat in
                        vulputate convallis, erat urna tincidunt nulla, non mattis lacus purus at turpis. Fusce in
                        vestibulum augue. Cras maximus sagittis auctor. Vivamus aliquet ligula sit amet posuere facilisis.
                        Vestibulum tristique posuere odio, sed tempus metus ullamcorper in. Duis facilisis ex eu libero
                        congue, a ullamcorper nibh interdum. Morbi iaculis scelerisque ex sed faucibus. Proin a aliquam
                        mauris. Aliquam vulputate eros nec turpis fringilla, vel scelerisque nunc mollis. Curabitur
                        dignissim, sem sed bibendum iaculis, nunc risus mollis dui, hendrerit gravida leo urna et
                        est.<br><br></div>
                    <div>Phasellus commodo, enim quis dignissim auctor, libero diam eleifend nibh, id mollis ipsum mauris
                        non nisi. Vestibulum id est interdum, molestie odio vitae, rhoncus lorem. Curabitur hendrerit
                        iaculis odio. Curabitur a mauris cursus, mattis lectus eget, posuere sapien. Sed tincidunt tellus
                        augue, eu tempus ex pharetra non. Mauris vulputate maximus rutrum. Sed sollicitudin eleifend ante,
                        nec cursus urna pulvinar a. Donec auctor massa eget vehicula cursus. Morbi interdum vulputate ligula
                        nec dictum. Nunc eu est congue risus euismod mattis eget in mi.<br><br></div>
                    <div>Duis sollicitudin elit a faucibus tempor. Proin et lorem ac lorem rhoncus rutrum. Curabitur sed
                        lobortis leo. Nullam faucibus magna sed dapibus tincidunt. Phasellus cursus, nunc sit amet interdum
                        accumsan, lacus odio venenatis sem, et luctus quam ex at turpis. Sed ligula arcu, sagittis
                        vestibulum risus in, facilisis tristique augue. Aliquam elementum laoreet nunc, at congue arcu
                        bibendum viverra.<br><br></div>
                    <div>Nulla vestibulum magna velit, sit amet ultrices sapien mattis vehicula. Etiam fermentum magna in
                        est porta malesuada. Duis tincidunt a orci et iaculis. Etiam quis iaculis nisi. Ut eu metus
                        malesuada, rutrum arcu lobortis, molestie dolor. Nullam bibendum dui ac erat cursus, a vehicula mi
                        accumsan. Nunc non leo tortor. Maecenas bibendum laoreet turpis, vitae scelerisque mi malesuada et.
                        Suspendisse fermentum orci vel eros gravida, vel commodo nisi egestas. Duis consectetur elementum
                        elit, quis blandit nisi sagittis sit amet. Mauris placerat nec dolor sit amet molestie. Pellentesque
                        habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi vitae
                        tincidunt est. Cras maximus purus id libero fringilla bibendum. Nunc quis ex at orci semper aliquet.
                        Duis ornare metus non enim congue pellentesque.<br><br></div>
                    <div>Nullam lobortis quam a eros malesuada porttitor. In scelerisque interdum quam, vel tincidunt eros
                        feugiat et. Aliquam a nunc pharetra justo varius ultrices quis sed elit. Donec quis lorem ut purus
                        placerat viverra dapibus vitae ipsum. Nam dignissim libero eleifend, tempus turpis nec, lobortis
                        lacus. Nam mattis lorem quis ullamcorper aliquet. Morbi sagittis, metus nec consequat volutpat,
                        mauris dui elementum ante, id consequat elit quam ac lectus.<br><br></div>
                    </p>

                </div>
            </div>
        </div>
    </div>
@endsection
