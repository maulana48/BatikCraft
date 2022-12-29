<div class="p-[50px] bg-white">
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="mb-4">
        <button wire:click="product" class="py-[10px] px-[15px] rounded-lg bg-blue-500 text-white">Back</button>
    </div>
    <div class="text-center">
        <div class="d-flex my-4">
            <h1 class="text-center text-green-300 text-[30px] font-bold">Edit Product</h1>
        </div>
        <p class="mt-2 text-sm text-gray-400">Lorem ipsum is placeholder text.</p>
    </div>
    @if($errors->any())
        @foreach ($errors->all() as $e)
            <div class="bg-red-500 w-full p-2 m-2">{{ $e }}</div>
        @endforeach
    @endif
    @if (session()->has('success'))
        <div class="bg-green-500 w-full p-2 m-2">
            {{ session('success') }}
        </div>
    @endif
    <form wire:submit.prevent="editProduct({{ $product->id }})" class="mt-8 space-y-3" method="POST"
        enctype="multipart/form-data">
        <div class="grid grid-cols-1 space-y-2">
            <label for="nama" class="text-sm font-bold text-gray-500 tracking-wide">Nama</label>
            <input wire:model="nama" class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                type="text" placeholder="Insert book nama" @error('nama') is-invalid @enderror" name="nama"
                id="nama" autofocus value="{{ $product->nama }}">

            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="grid grid-cols-1 space-y-2">
            <label for="harga" class="text-sm font-bold text-gray-500 tracking-wide">Harga</label>
            <input wire:model="harga" class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                type="number" placeholder="Masukkan harga batik" @error('harga') is-invalid @enderror
                name="harga" id="harga" required autofocus value="{{ $product->harga }}">

            @error('harga')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="grid grid-cols-1 space-y-2">
            <label for="stok" class="text-sm font-bold text-gray-500 tracking-wide">Stok</label>
            <input wire:model="stok" class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                type="number" placeholder="Masukkan stok batik"
                @error('stok') is-invalid @enderror name="stok" id="stok" required
                autofocus value="{{ $product->stok }}">

            @error('stok')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="grid grid-cols-1 space-y-2">
            <label for="tipe_warna" class="text-sm font-bold text-gray-500 tracking-wide">Tipe Warna</label>
            <input wire:model="tipe_warna" class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                type="text" placeholder="Masukkan tipe warna batik" @error('tipe_warna') is-invalid @enderror name="tipe_warna"
                id="tipe_warna" required autofocus value="{{ $product->tipe_warna }}">

            @error('tipe_warna')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="grid grid-cols-1 space-y-2">
            <label for="asal_kota" class="text-sm font-bold text-gray-500 tracking-wide">Asal Kota</label>
            <input wire:model="asal_kota" class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                type="text" placeholder="Masukkan asal kota batik" @error('asal_kota') is-invalid @enderror name="asal_kota"
                id="asal_kota" required autofocus value="{{ $product->asal_kota }}">

            @error('asal_kota')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="grid grid-cols-1 space-y-2">
            <label for="motif_batik" class="text-sm font-bold text-gray-500 tracking-wide">Motif Batik</label>
            <input wire:model="motif_batik" class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                type="text" placeholder="Masukkan motif batik" @error('motif_batik') is-invalid @enderror name="motif_batik"
                id="motif_batik" required autofocus value="{{ $product->motif_batik }}">

            @error('motif_batik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="grid grid-cols-1 space-y-2">
            <label for="deskripsi" class="text-sm font-bold text-gray-500 tracking-wide">Deskripsi</label>
            <textarea wire:model="deskripsi" class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                type="text" placeholder="Masukkan deskripsi batik" @error('deskripsi') is-invalid @enderror name="deskripsi"
                id="deskripsi" required autofocus>{{ $product->deskripsi }}</textarea>

            @error('deskripsi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="grid grid-cols-1 space-y-2">
            <label class="text-sm font-bold text-gray-500 tracking-wide">Tambahkan Foto Product</label>
            <div class="flex items-center justify-center w-full">
                <label class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center">
                    <div class="h-full w-full text-center flex flex-col items-center justify-center items-center  ">
                        <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10 justify-center">
                            <img class="has-mask h-36 object-center"
                                src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg"
                                alt="freepik image">
                        </div>
                        <p class="pointer-none text-gray-500 "><span class="text-sm">Drag and drop</span> files here
                            <br /> or
                            <a id="" class="text-blue-600 hover:underline">select a file</a> from your computer
                        </p>
                    </div>
                    <input wire:model="media" type="file" name="media" id="media" class="hidden">
                </label>
            </div>
        </div>
        <p class="text-sm text-gray-300">
            <span>File type: doc,pdf,types of images</span>
        </p>
        <div>
            <button type="submit"
                class="my-5 w-full flex justify-center bg-blue-500 text-gray-100 p-4  rounded-full
                										font-semibold  focus:outline-none focus:shadow-outline hover:bg-blue-600 shadow-lg cursor-pointer transition ease-in duration-300">
                Upload
            </button>
        </div>

    </form>
</div>