<x-app-layout>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Ubah Data</h5>
            <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
            <form action="{{ route('Menu.update',$Menu->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Nama Menu</label>
                    <input type="text" class="form-control" id="basic-default-fullname"
                        value="{{ $Menu->nama_menu }}" name="nama_menu">
                </div>
                {{-- <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">link</label>
                    <input type="text" class="form-control" id="basic-default-fullname" name="link">
                </div> --}}
                <div class="mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Parent</label>
                    <input  class="form-control" disabled value="{{ $Menu->Menu->nama_menu??'Kepala' }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">urutan</label>
                    <input type="number" class="form-control" id="basic-default-fullname" value="{{ $Menu->urutan }}"
                        name="urutan">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Aktif</label>
                    <select class="form-select" id="exampleFormControlSelect1" name="isActive"
                        aria-label="Default select example">
                        <option @if ($Menu->isActive == 1) selected @endif value="1">Aktif</option>
                        <option @if ($Menu->isActive == 0) selected @endif value="0">Tidak Aktif</option>
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
