<x-app-layout>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Ubah Data</h5>
            <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
            <form action="{{ route('Berita.update', $Berita->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">judul</label>
                    <input type="text" class="form-control" id="basic-default-fullname" value="{{ $Berita->judul }}"
                        name="judul">
                </div>
                {{-- <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">deskripsi singkat</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi_singkat" rows="3"></textarea>
                </div> --}}
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">isi</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="isi" rows="3">{{ $Berita->isi }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">gambar</label>
                    @if ($Berita->gambar != null)
                        <br>
                        <a href="{{ asset($Berita->gambar) }}" target="_blank"> Lihat Gambar</a>
                    @endif
                    <input class="form-control" type="file" name="gambar" id="formFile">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">file</label>
                    @if ($Berita->file != null)
                        <br>
                        <a href="{{ asset($Berita->file) }}" target="_blank"> Lihat File</a>
                    @endif
                    <input class="form-control" type="file" name="file" id="formFile">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">link</label>
                    <input type="text" class="form-control" id="basic-default-fullname"
                        placeholder="https://example.com" value="{{$Berita->link}}" name="link">
                </div>
                {{-- <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">kategori berita</label>
                    <select id="defaultSelect" name="kategori_berita_id" class="form-select">
                        @foreach ($KategoriBerita as $item)
                            <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
                        @endforeach
                    </select>
                </div> --}}
                {{-- <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Tag berita</label>
                    <select multiple="" class="form-select" id="exampleFormControlSelect2" name="tag_berita_id[]" aria-label="Multiple select example">
                        @foreach ($TagBerita as $item)
                            <option value="{{$item->id}}">{{$item->nama_tag}}</option>
                        @endforeach
                      </select>
                </div> --}}
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
