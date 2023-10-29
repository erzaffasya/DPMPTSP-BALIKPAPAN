<x-app-layout>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Tambah Data</h5>
            <small class="text-muted float-end">
                <form method="post" action="{{ route('BannerPortal.destroy', $BannerPortal->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </small>
        </div>
        <div class="card-body">
            <form action="{{ route('BannerPortal.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control">{{ $BannerPortal->deskripsi ?? null }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Link</label>
                    <input type="text" class="form-control" id="basic-default-fullname"
                        value="{{ $BannerPortal->link ?? null }}" name="link">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Link Youtube</label>
                    <input type="text" class="form-control" id="basic-default-fullname"
                        value="{{ $BannerPortal->youtube ?? null }}" name="youtube">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Gambar</label>
                    <input class="form-control" type="file" name="gambar" id="formFile">
                </div>


                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Aktif</label>
                    <select id="defaultSelect" name="isActive" class="form-select">
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
