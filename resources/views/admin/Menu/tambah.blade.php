<x-app-layout>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Tambah Data</h5>
            <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
            <form action="{{ route('Menu.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Nama Menu</label>
                    <input type="text" class="form-control" id="basic-default-fullname" name="nama_menu">
                </div>
                {{-- <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">link</label>
                    <input type="text" class="form-control" id="basic-default-fullname" name="link">
                </div> --}}
                <div class="mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Parent</label>
                    <select class="form-select" id="exampleFormControlSelect1" name="parent_id"
                        aria-label="Default select example">
                        @if ($Menu != null)
                            <option value="{{$Menu->id}}">{{$Menu->nama_menu}}</option>
                        @else
                            <option value="">Kepala</option>
                        @endif
                        {{-- @foreach ($Menu as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_menu }}</option>
                        @endforeach --}}
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">urutan</label>
                    <input type="number" class="form-control" id="basic-default-fullname" name="urutan">
                </div>
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
