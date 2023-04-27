<x-app-layout>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Tambah Data</h5>
            <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
            <form action="{{ route('KategoriBerita.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Nama Kategori</label>
                    <input type="text" class="form-control" id="basic-default-fullname" name="nama_kategori">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-message">Deskripsi</label>
                    <textarea id="basic-default-message" class="form-control" name="deskripsi" ></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>
