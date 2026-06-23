<x-app-layout>
    <div class="py-10 bg-orange-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4">

            {{-- Header --}}
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8">
                <div>
                    <h1 class="text-4xl font-extrabold text-orange-500">
                        🐾 PawCare Aceh
                    </h1>

                    <p class="text-gray-600 mt-2">
                        Sistem Adopsi dan Perawatan Kucing
                    </p>
                </div>

                <a href="{{ route('cats.create') }}"
                   class="mt-4 md:mt-0 bg-orange-500 hover:bg-orange-600 text-white px-5 py-3 rounded-xl shadow-md">
                    + Tambah Kucing
                </a>
            </div>

            {{-- Alert Success --}}
            @if(session('success'))
                <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Search --}}
            <form method="GET" action="{{ route('cats.index') }}" class="mb-8">
                <div class="flex gap-2">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari nama kucing..."
                        class="flex-1 border border-orange-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-300">

                    <button
                        type="submit"
                        class="bg-orange-500 hover:bg-orange-600 text-white px-5 rounded-xl">
                        Cari
                    </button>
                </div>
            </form>

            {{-- Data --}}
            @if($cats->count())

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                    @foreach($cats as $cat)

                        <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden">

                            {{-- Foto --}}
                            @if($cat->foto)
                                <img
                                    src="{{ asset('storage/' . $cat->foto) }}"
                                    alt="{{ $cat->nama }}"
                                    class="w-full h-56 object-cover">
                            @else
                                <div class="w-full h-56 bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-500">
                                        Tidak Ada Foto
                                    </span>
                                </div>
                            @endif

                            {{-- Isi Card --}}
                            <div class="p-5">

                                <h2 class="text-2xl font-bold text-gray-800">
                                    {{ $cat->nama }}
                                </h2>

                                <div class="mt-3 space-y-2 text-sm text-gray-600">

                                    <p>
                                        <strong>Umur:</strong>
                                        {{ $cat->umur }} tahun
                                    </p>

                                    <p>
                                        <strong>Kelamin:</strong>
                                        {{ $cat->jenis_kelamin }}
                                    </p>

                                    <p>
                                        <strong>Ras:</strong>
                                        {{ $cat->ras ?: '-' }}
                                    </p>

                                    <p>
                                        <strong>Warna:</strong>
                                        {{ $cat->warna ?: '-' }}
                                    </p>

                                    <p>
                                        <strong>Lokasi:</strong>
                                        {{ $cat->lokasi }}
                                    </p>

                                    <p>
                                        <strong>Status:</strong>

                                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs">
                                            {{ $cat->status }}
                                        </span>
                                    </p>

                                </div>

                                @if($cat->deskripsi)
                                    <div class="mt-4">
                                        <p class="text-gray-700 text-sm">
                                            {{ $cat->deskripsi }}
                                        </p>
                                    </div>
                                @endif

                                {{-- Tombol --}}
                                <div class="flex mt-5">

                                    <a href="{{ route('cats.edit', $cat->id) }}"
                                       class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-lg">
                                        Edit
                                    </a>

                                    <form action="{{ route('cats.destroy', $cat->id) }}"
                                          method="POST"
                                          class="ml-2">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')"
                                            class="bg-rose-500 hover:bg-rose-600 text-white px-4 py-2 rounded-lg">
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="bg-white rounded-2xl shadow-md p-10 text-center">

                    <h2 class="text-2xl font-semibold text-gray-700">
                        Belum Ada Data Kucing
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Tambahkan data kucing pertama untuk PawCare Aceh.
                    </p>

                </div>

            @endif

            {{-- Footer --}}
            <div class="text-center mt-12 text-gray-500 text-sm">
                🐾 PawCare Aceh — Sistem Adopsi dan Perawatan Kucing
            </div>

        </div>
    </div>
</x-app-layout>