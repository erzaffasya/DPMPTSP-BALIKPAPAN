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
                    <label class="form-label" for="basic-default-fullname">alamat</label>
                    <input type="text" class="form-control" id="basic-default-fullname"
                        value="{{ $ProfileWebsite->alamat ?? null }}" name="alamat">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">email</label>
                    <input type="text" class="form-control" id="basic-default-fullname"
                        value="{{ $ProfileWebsite->email ?? null }}" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">no_telp</label>
                    <input type="text" class="form-control" id="basic-default-fullname"
                        value="{{ $ProfileWebsite->no_telp ?? null }}" name="no_telp">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">google maps</label>
                    <input type="text" class="form-control" id="basic-default-fullname"
                        value="{{ $ProfileWebsite->google_maps ?? null }}" name="google_maps">
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
