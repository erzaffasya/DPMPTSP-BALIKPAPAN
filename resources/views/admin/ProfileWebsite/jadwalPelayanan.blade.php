<x-app-layout>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Tambah Data</h5>
            <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
            <form action="{{ route('ProfileWebsites.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">slogan pelayanan</label>
                    <input type="text" class="form-control" id="basic-default-fullname"
                        value="{{ $ProfileWebsite->slogan_pelayanan ?? null }}" name="slogan_pelayanan">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">deskripsi pelayanan</label>
                    <input type="text" class="form-control" id="basic-default-fullname"
                        value="{{ $ProfileWebsite->deskripsi_pelayanan ?? null }}" name="deskripsi_pelayanan">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">gambar pelayanan</label>
                    <input class="form-control" type="file" name="gambar_pelayanan" id="formFile">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Senin - Kamis</label>
                    <input type="text" class="form-control" id="basic-default-fullname"
                        value="{{ $ProfileWebsite->senin_kamis ?? null }}" name="senin_kamis">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Jumat</label>
                    <input type="text" class="form-control" id="basic-default-fullname"
                        value="{{ $ProfileWebsite->jumat ?? null }}" name="jumat">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Apakah Hari ini libur?</label>
                    <select id="defaultSelect" name="isLibur" class="form-select">
                        <option value="0">Tidak Libur</option>
                        <option value="1">Libur</option>
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
