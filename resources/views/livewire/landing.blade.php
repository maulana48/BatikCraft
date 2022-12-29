
    @extends('layouts.app')
    @section('content')
    @livewire('layouts.' . $url, [
        'kategori' => (isset($kategori) && $kategori != null) ? $kategori : null,
        'batik' => (isset($batik) && $batik != null) ? $batik : null,
        'tipe_warna' => (isset($tipe_warna) && $tipe_warna != null) ? $tipe_warna : null,
        'kategoriBatik' => (isset($kategoriBaju) && $kategoriBaju != null) ? $kategoriBaju : null,
        'terbaru' => (isset($terbaru) && $terbaru != null) ? $terbaru : null
    ])
    @endsection
