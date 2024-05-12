<div class="p-[50px] bg-[#111827]">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
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
    <form wire:submit.prevent="{{ $urlForm }}" class="mt-8 space-y-3" method="POST" enctype="multipart/form-data">
        <div class="grid grid-cols-1 space-y-2">
            <label for="nama" class="text-sm font-bold text-gray-500 tracking-wide">Nama</label>
            <input wire:model.defer="nama" class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500
                @error('nama') border-red-500 @enderror" type="text" placeholder="Masukkan nama batik" name="nama"
                id="nama" autofocus>

            @error('nama')
            <div class="text-sm text-red-500">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="grid grid-cols-1 space-y-2">
            <label for="deskripsi" class="text-sm font-bold text-gray-500 tracking-wide">Deskripsi</label>
            <textarea wire:model.defer="deskripsi" class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500
                @error('deskripsi') border-red-500 @enderror" type="text" placeholder="Masukkan deskripsi batik"
                name="deskripsi" id="deskripsi" autofocus></textarea>

            @error('deskripsi')
            <div class="text-sm text-red-500">
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
                            @if(!$media)
                            <img class="has-mask h-36 object-center"
                                src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg"
                                alt="freepik image">

                            @elseif(is_string($media[0]))
                            @foreach($media as $m)
                            <img class="has-mask h-36 object-center" src="{{ $m }}" alt="freepik image">
                            @endforeach
                            @else
                            @foreach($media as $m)
                            <img class="has-mask h-36 object-center" src="{{ $m->temporaryUrl() }}" alt="freepik image">
                            @endforeach
                            @endif
                            <div wire:loading wire:target="media" class="text-lg p-2 absolute bg-gray-300">Uploading...
                            </div>
                        </div>
                        <p class="pointer-none text-gray-500 "><span class="text-sm">Drag and drop</span> files here
                            <br /> or
                            <a id="" class="text-blue-600 hover:underline">select a file</a> from your
                            computer
                        </p>
                    </div>
                    <input wire:model="media" multiple type="file" name="medias" id="medias" class="hidden">
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
                Submit
            </button>
        </div>

    </form>
</div>