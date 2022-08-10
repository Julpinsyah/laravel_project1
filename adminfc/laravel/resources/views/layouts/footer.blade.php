<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            @php
                $konfig = \App\Models\Konfig::all();
                $icon = $konfig->where('nama', 'copyright')->first()->keterangan;
            @endphp
            <span>Copyright &copy; Ijeck FC {{ $icon }}</span>
        </div>
    </div>
</footer>
