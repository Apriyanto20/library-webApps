<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('JURUSAN') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                    <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold w-full">
                        MAJOR
                    </div>
                    <div>
                        <form class="mx-full" action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="book_code"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                        Buku</label>
                                    <input type="text" name="book_code"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required placeholder="Konsumen" value="{{ $bookCode }}" readonly />
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="titleBook"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                                    <input type="text" name="titleBook"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required placeholder="Judul" />
                                </div>
                            </div>
                            <div class="flex justify-center items-center mb-5">
                                <label for="profile-picture"
                                    class="w-full border-2 border-dashed border-gray-300 rounded-lg p-5 cursor-pointer">
                                    <div class="flex flex-col lg:flex-row items-center justify-between gap-3">
                                        <div class="flex gap-5 items-center">
                                            <!-- Ikon Upload -->
                                            <div
                                                class="bg-blue-100 h-20 w-20 rounded-xl flex items-center justify-center">
                                                <i class="fi fi-sr-picture text-blue-500 text-2xl"></i>
                                            </div>
                                            <!-- Teks -->
                                            <p id="file-name" class="text-gray-500">Upload a book cover. Max size 2MB
                                            </p>
                                        </div>
                                        <!-- Tombol Browse -->
                                        <button type="button"
                                            class="bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-100">
                                            Browse
                                        </button>
                                    </div>
                                    <input type="file" id="profile-picture" name="profile-picture" class="hidden"
                                        onchange="updateFileName()" />
                                </label>
                            </div>
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="author"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengarang</label>
                                    <input type="text" name="author"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required placeholder="Pengarang" />
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="publisher"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penerbit</label>
                                    <input type="text" name="publisher"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required placeholder="Penerbit" />
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="place_of_publication"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat
                                        Terbit</label>
                                    <input type="text" name="place_of_publication"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required placeholder="Tempat Terbit" />
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="publication_year"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                                        Terbit</label>
                                    <input type="number" name="publication_year"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required placeholder="Tahun Terbit" />
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="faculty_code"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fakultas</label>
                                    <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                        name="faculty_code" data-placeholder="Pilih Fakultas">
                                        <option value="">Pilih...</option>
                                        @foreach ($faculty as $f)
                                            <option value="{{ $f->faculty_code }}">{{ $f->faculty }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="genre_code"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genre</label>
                                    <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                        name="genre_code" data-placeholder="Pilih Genre">
                                        <option value="">Pilih...</option>
                                        @foreach ($genre as $f)
                                            <option value="{{ $f->genre_code }}">{{ $f->genre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="source_code"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sumber</label>
                                    <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                        name="source_code" data-placeholder="Pilih Sumber">
                                        <option value="">Pilih...</option>
                                        @foreach ($source as $f)
                                            <option value="{{ $f->source_code }}">{{ $f->source }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="bookshelf"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rak
                                        Buku</label>
                                    <input type="text" name="bookshelf"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required placeholder="Rak Buku" />
                                </div>
                            </div>
                            <div class="mb-5 w-full">
                                <label for="sinopsis"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sinopsis</label>
                                <textarea type="text" name="synopsis"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required placeholder="Sinopsis"></textarea>
                            </div>
                            <div class="flex justify-center items-center mb-5">
                                <label for="ebook-file"
                                    class="w-full border-2 border-dashed border-gray-300 rounded-lg p-5 cursor-pointer">
                                    <div class="flex flex-col lg:flex-row items-center justify-between gap-3">
                                        <div class="flex gap-5 items-center">
                                            <!-- Ikon Upload -->
                                            <div class="bg-green-100 h-20 w-20 rounded-xl flex items-center justify-center">
                                                <i class="fi fi-sr-file text-green-500 text-2xl"></i>
                                            </div>
                                            <!-- Teks -->
                                            <p id="ebook-name" class="text-gray-500">Upload your eBook file. Supported formats: PDF, EPUB. Max size 5MB</p>
                                        </div>
                                        <!-- Tombol Browse -->
                                        <button type="button"
                                            class="bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-100">
                                            Browse
                                        </button>
                                    </div>
                                    <input type="file" id="ebook-file" name="ebook-file" class="hidden"
                                        onchange="updateFileNameEbook()" accept=".pdf,.epub" />
                                </label>
                            </div>
                            <button type="submit" id="submitButton"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.getElementById('submitButton').addEventListener('click', async function() {
                const form = document.getElementById('bookFormAdd');
                const formData = new FormData(form);

                // Tambahkan CSRF token ke dalam formData
                // formData.append('_token', document.querySelector('input[name="_token"]').value);

                try {
                    const response = await fetch('/api/bookAdd', {
                        method: 'POST', // Gunakan POST untuk mengirimkan form
                        headers: {
                            'Accept': 'application/json', // Tidak perlu Content-Type karena FormData akan men-set otomatis
                        },
                        body: formData, // Langsung gunakan formData
                    });

                    if (response.ok) {
                        const data = await response.json();
                        alert('Book added successfully!');
                    } else {
                        const error = await response.json();
                        alert(`Error: ${error.message || 'Failed to add book'}`);
                    }
                } catch (err) {
                    alert('An error occurred: ' + err.message);
                }
            });
        </script>
        <script>
            function updateFileName() {
                const fileInput = document.getElementById('profile-picture');
                const fileNameElement = document.getElementById('file-name');

                // Jika file dipilih, tampilkan nama file; jika tidak, kembalikan teks default.
                if (fileInput.files.length > 0) {
                    fileNameElement.textContent = fileInput.files[0].name;
                } else {
                    fileNameElement.textContent = 'Upload a book cover. Max size 2MB';
                }
            }
        </script>
        <script>
            function updateFileNameEbook() {
                const fileInput = document.getElementById('ebook-file');
                const fileNameElement = document.getElementById('ebook-name');

                // Jika file dipilih, tampilkan nama file; jika tidak, kembalikan teks default.
                if (fileInput.files.length > 0) {
                    fileNameElement.textContent = fileInput.files[0].name;
                } else {
                    fileNameElement.textContent = 'Upload your eBook file. Supported formats: PDF, EPUB. Max size 5MB';
                }
            }
        </script>
</x-app-layout>
