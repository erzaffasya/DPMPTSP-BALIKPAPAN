<x-app-layout>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Tambah Data</h5>
            <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
            <form action="{{ route('Perizinan.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">perizinan</label>
                    <input type="text" class="form-control" id="basic-default-fullname" name="perizinan">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">deskripsi</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">urut</label>
                    <input type="number" class="form-control" id="basic-default-fullname" name="urut">
                </div>
                {{-- <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">deskripsi</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" rows="3"></textarea>
                </div> --}}
                <div class="mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Aktif</label>
                    <select class="form-select" id="exampleFormControlSelect1" name="isActive"
                        aria-label="Default select example">
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
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
