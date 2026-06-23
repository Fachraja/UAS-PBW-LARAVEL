<x-app-layout>
    <div class="min-h-screen bg-orange-50 py-10">

        <div class="max-w-4xl mx-auto px-6">

            <div class="mb-8">
                <h1 class="text-4xl font-bold text-orange-600">
                    🐾 Tambah Kucing
                </h1>
                <p class="text-gray-600 mt-2">
                    Tambahkan data kucing yang akan diadopsi atau dirawat.
                </p>
            </div>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl mb-6">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white rounded-3xl shadow-lg p-8">

                <form action="{{ route('cats.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="grid md:grid-cols-2 gap-6">

                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">
                                Nama Kucing
                            </label>
                            <input type="text"
                                   name="nama"
                                   class="w-full border border-orange-200 rounded-xl p-3 focus:ring-2 focus:ring-orange-300 focus:outline-none"
                                   required>
                        </div>

                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">
                                Umur
                            </label>
                            <input type="number"
                                   name="umur"
                                   class="w-full border border-orange-200 rounded-xl p-3 focus:ring-2 focus:ring-orange-300 focus:outline-none"
                                   required>
                        </div>

                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">
                                Jenis Kelamin
                            </label>
                            <select name="jenis_kelamin"
                                    class="w-full border border-orange-200 rounded-xl p-3 focus:ring-2 focus:ring-orange-300 focus:outline-none"
                                    required>
                                <option value="Jantan">Jantan</option>
                                <option value="Betina">Betina</option>
                            </select>
                        </div>

                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">
                                Ras
                            </label>
                            <input type="text"
                                   name="ras"
                                   class="w-full border border-orange-200 rounded-xl p-3 focus:ring-2 focus:ring-orange-300 focus:outline-none">
                        </div>

                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">
                                Warna
                            </label>
                            <input type="text"
                                   name="warna"
                                   class="w-full border border-orange-200 rounded-xl p-3 focus:ring-2 focus:ring-orange-300 focus:outline-none">
                        </div>

                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">
                                Lokasi
                            </label>
                            <input type="text"
                                   name="lokasi"
                                   class="w-full border border-orange-200 rounded-xl p-3 focus:ring-2 focus:ring-orange-300 focus:outline-none"
                                   required>
                        </div>

                    </div>

                    <div class="mt-6">
                        <label class="block mb-2 font-semibold text-gray-700">
                            Foto Kucing
                        </label>
                        <input type="file"
                               name="foto"
                               accept="image/*"
                               class="w-full border border-orange-200 rounded-xl p-3 bg-orange-50">
                    </div>

                    <div class="mt-6">
                        <label class="block mb-2 font-semibold text-gray-700">
                            Deskripsi
                        </label>
                        <textarea name="deskripsi"
                                  rows="5"
                                  class="w-full border border-orange-200 rounded-xl p-3 focus:ring-2 focus:ring-orange-300 focus:outline-none"></textarea>
                    </div>

                    <div class="mt-8 flex gap-4">

                        <a href="{{ route('cats.index') }}"
                           class="px-6 py-3 rounded-xl bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold">
                            ← Kembali
                        </a>

                        <button type="submit"
                                class="px-8 py-3 rounded-xl bg-orange-500 hover:bg-orange-600 text-white font-semibold shadow-md transition">
                            🐱 Simpan Kucing
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>
</x-app-layout>