<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <h1 class="text-3xl font-bold mb-6">
                Edit Kucing
            </h1>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-4 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('cats.update', $cat->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block font-semibold">Nama Kucing</label>
                    <input type="text" name="nama"
                        value="{{ $cat->nama }}"
                        class="border rounded w-full p-2">
                </div>

                <div class="mb-4">
                    <label class="block font-semibold">Umur</label>
                    <input type="number" name="umur"
                        value="{{ $cat->umur }}"
                        class="border rounded w-full p-2">
                </div>

                <div class="mb-4">
                    <label class="block font-semibold">Jenis Kelamin</label>
                    <select name="jenis_kelamin"
                        class="border rounded w-full p-2">

                        <option value="Jantan"
                            {{ $cat->jenis_kelamin == 'Jantan' ? 'selected' : '' }}>
                            Jantan
                        </option>

                        <option value="Betina"
                            {{ $cat->jenis_kelamin == 'Betina' ? 'selected' : '' }}>
                            Betina
                        </option>

                    </select>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold">Ras</label>
                    <input type="text" name="ras"
                        value="{{ $cat->ras }}"
                        class="border rounded w-full p-2">
                </div>

                <div class="mb-4">
                    <label class="block font-semibold">Warna</label>
                    <input type="text" name="warna"
                        value="{{ $cat->warna }}"
                        class="border rounded w-full p-2">
                </div>

                <div class="mb-4">
                    <label class="block font-semibold">Lokasi</label>
                    <input type="text" name="lokasi"
                        value="{{ $cat->lokasi }}"
                        class="border rounded w-full p-2">
                </div>

                <div class="mb-4">
                    <label class="block font-semibold">Deskripsi</label>
                    <textarea name="deskripsi"
                        class="border rounded w-full p-2"
                        rows="4">{{ $cat->deskripsi }}</textarea>
                </div>

                <button
                    type="submit"
                    class="bg-yellow-500 text-white px-4 py-2 rounded">
                    Update
                </button>

            </form>

        </div>
    </div>
</x-app-layout>