<x-app-layout>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Tambah Data</h5>
            <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
            <form action="{{ route('Pengumuman.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">judul</label>
                    <input type="text" class="form-control" id="basic-default-fullname" name="judul">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Isi</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="isi" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">gambar</label>
                    <input class="form-control" type="file" name="gambar" id="formFile">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">file</label>
                    <input class="form-control" type="file" name="file" id="formFile">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">link</label>
                    <input type="text" class="form-control" id="basic-default-fullname" placeholder="https://example.com" name="link">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    @push('scripts')
    <script>
        tinymce.init({
          selector: 'textarea',
          plugins: 'advlist autolink lists link image charmap preview anchor pagebreak',
          toolbar_mode: 'floating',
        });
      </script>
    @endpush
</x-app-layout>
