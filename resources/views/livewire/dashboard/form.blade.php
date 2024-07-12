<div class="bg-[#111827]">
    <div class="product-form w-[40%] mx-auto">
        {{-- Because she competes with no one, no one can compete with her. --}}
        <div class="text-center">
            <div class="d-flex my-4">
                <h1 class="text-center text-green-300 text-[30px] font-bold">{{ $title }}</h1>
            </div>
            <p class="mt-2 text-sm text-gray-400">{{ $message }}</p>
        </div>
        @if ($errors->any())
            @foreach ($errors->all() as $e)
                <div class="bg-red-500 w-full p-2 m-2">{{ $e }}</div>
            @endforeach
        @endif
        @if (session()->has('success'))
            <div class="bg-green-500 w-full p-2 m-2">
                {{ session('success') }}
            </div>
        @endif
        <form wire:submit="{{ $formUrl }}" class="mt-8 flex flex-col gap-4" method="POST"
            enctype="multipart/form-data">
            <div class="grid grid-cols-1 space-y-2">
                <label for="name" class="text-sm font-bold text-gray-500 tracking-wide">Nama</label>
                <input wire:model.defer="name"
                    class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500
                    @error('name') border-red-500 @enderror"
                    type="text" placeholder="Masukkan nama batik" name="name" id="name" autofocus>

                @error('name')
                    <div class="text-sm text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="grid grid-cols-1 space-y-2">
                <label for="merch" class="text-sm font-bold text-gray-500 tracking-wide">Merk</label>
                <input wire:model.defer="merch"
                    class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500
                    @error('merk') border-red-500 @enderror"
                    type="text" placeholder="Masukkan merk batik" name="merch" id="merch" autofocus>

                @error('merch')
                    <div class="text-sm text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="grid grid-cols-1 space-y-2">
                <label for="product_category_id" class="text-sm font-bold text-gray-500 tracking-wide">Pilih kategori
                    produk</label>
                <select wire:model.defer="product_category_id"
                    class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500
                @error('product_category_id') border-red-500 @enderror"
                    name="product_category_id" id="product_category_id">
                    <option value="" @if (!$product_category_id) selected @endif> -- select an option --
                    </option>
                    @foreach ($category_list as $k)
                        <option value="{{ $k->id }}">{{ $k->name }}</option>
                    @endforeach
                </select>

                @error('product_category_id')
                    <div class="text-sm text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="grid grid-cols-1 space-y-2">
                <label for="price" class="text-sm font-bold text-gray-500 tracking-wide">Harga</label>
                <input wire:model.defer="price"
                    class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500
                    @error('price') border-red-500 @enderror"
                    type="number" placeholder="Masukkan harga batik" name="price" id="price" autofocus>

                @error('price')
                    <div class="text-sm text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="grid grid-cols-1 space-y-2">
                <label for="stock" class="text-sm font-bold text-gray-500 tracking-wide">Stok</label>
                <input wire:model.defer="stock"
                    class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500
                    @error('stock') border-red-500 @enderror"
                    type="number" placeholder="Masukkan stok batik" name="stock" id="stock" autofocus>

                @error('stock')
                    <div class="text-sm text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="grid grid-cols-1 space-y-2">
                <label for="color_type" class="text-sm font-bold text-gray-500 tracking-wide">Tipe Warna</label>
                <input wire:model.defer="color_type"
                    class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500
                    @error('color_type') border-red-500 @enderror"
                    type="text" placeholder="Masukkan tipe warna batik" name="color_type" id="color_type" autofocus>

                @error('color_type')
                    <div class="text-sm text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="grid grid-cols-1 space-y-2">
                <label for="city_origin" class="text-sm font-bold text-gray-500 tracking-wide">Asal Kota</label>
                <input wire:model.defer="city_origin"
                    class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500
                    @error('city_origin') border-red-500 @enderror"
                    type="text" placeholder="Masukkan asal kota batik" name="city_origin" id="city_origin" autofocus>

                @error('city_origin')
                    <div class="text-sm text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="grid grid-cols-1 space-y-2">
                <label for="batik_motif" class="text-sm font-bold text-gray-500 tracking-wide">Motif Batik</label>
                <input wire:model.defer="batik_motif"
                    class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500
                    @error('batik_motif') border-red-500 @enderror"
                    type="text" placeholder="Masukkan motif batik" name="batik_motif" id="batik_motif" autofocus>

                @error('batik_motif')
                    <div class="text-sm text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="grid grid-cols-1 space-y-2">
                <label for="description" class="text-sm font-bold text-gray-500 tracking-wide">Deskripsi</label>
                <textarea wire:model.defer="description"
                    class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500 h-[200px]
                    @error('description') border-red-500 @enderror"
                    type="text" placeholder="Masukkan deskripsi batik" name="description" id="description" autofocus></textarea>

                @error('description')
                    <div class="text-sm text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="grid grid-cols-1 space-y-2">
                <label class="text-sm font-bold text-gray-500 tracking-wide">Tambahkan Foto Product</label>
                <div class="flex items-center justify-center w-full">
                    <label class="flex flex-col rounded-lg border-4 border-dashed w-full h-80 p-10 group text-center">
                        <div
                            class="h-full w-full text-center flex flex-col items-center justify-center items-center  ">
                            <div class="flex flex-col gap-4 max-h-48 w-2/5 mx-auto -mt-10">
                                <div class="flex flex-auto justify-center gap-3">
                                    @php
                                        for ($i = 0; $i < count($uploaded_media); $i++) {
                                            array_push($original_media, $uploaded_media[$i]->temporaryUrl());
                                        }
                                    @endphp
                                    @if (count($original_media) == 0)
                                        <img class="has-mask h-36 object-center"
                                            src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg"
                                            alt="freepik image">
                                    @else
                                        @foreach ($original_media as $m)
                                            <img class="has-mask h-36 object-center border-2 border-solid border-[#ffe4c4] rounded-md"
                                                src="{{ asset($m ? $m : '') }}" alt="freepik image">
                                        @endforeach
                                    @endif
                                    <div wire:loading wire:target="media" class="text-lg p-2 absolute bg-gray-300">
                                        Uploading...</div>
                                </div>
                                <p class="pointer-none text-gray-500 "><span class="text-sm">Drag and drop</span>
                                    files
                                    here
                                    <br /> or
                                    <a id="" class="text-blue-600 hover:underline">select a file</a> from
                                    your
                                    computer
                                </p>
                            </div>
                        </div>
                        <input wire:model="uploaded_media" multiple type="file" name="uploaded_media"
                            id="uploaded_media" class="hidden">
                    </label>
                </div>
                <p class="text-sm text-gray-300">
                    <span>File type: doc,pdf,types of images</span>
                </p>
                @error('uploaded_media.*')
                    <div class="text-sm text-red-500">
                        File yang diupload harus memenuhi kriteria berikut :
                        <ul class="list-disc list-inside">
                            <li>File harus berupa gambar</li>
                            <li>Ukuran file maksimal 2MB</li>
                        </ul>
                    </div>
                @enderror
            </div>
            <div>
                <button type="submit"
                    class="my-5 w-full flex justify-center bg-blue-500 text-gray-100 p-4 rounded-full font-semibold focus:outline-none focus:shadow-outline hover:bg-blue-600 shadow-lg cursor-pointer transition ease-in duration-300">
                    Submit
                </button>
            </div>

        </form>
    </div>
</div>
