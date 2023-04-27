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
                    <label class="form-label" for="basic-default-fullname">instagram</label>
                    <input type="text" class="form-control" id="basic-default-fullname"
                        value="{{ $ProfileWebsite->instagram ?? null }}" name="instagram">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">facebook</label>
                    <input type="text" class="form-control" id="basic-default-fullname"
                        value="{{ $ProfileWebsite->facebook ?? null }}" name="facebook">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">youtube</label>
                    <input type="text" class="form-control" id="basic-default-fullname"
                        value="{{ $ProfileWebsite->youtube ?? null }}" name="youtube">
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
