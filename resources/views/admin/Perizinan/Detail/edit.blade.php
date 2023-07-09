<x-app-layout>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Tambah Data</h5>
            <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
            <form action="{{ route('PerizinanDetail.update',$id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">dasar hukum</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="dasar_hukum" rows="3">{{$PerizinanDetail->dasar_hukum??null}}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">persyaratan</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="persyaratan" rows="3">{{$PerizinanDetail->persyaratan??null}}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">masa berlaku</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="masa_berlaku" rows="3">{{$PerizinanDetail->masa_berlaku??null}}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">waktu proses</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="waktu_proses" rows="3">{{$PerizinanDetail->waktu_proses??null}}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">proses penerbitan</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="proses_penerbitan" rows="3">{{$PerizinanDetail->proses_penerbitan??null}}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">biaya retribusi</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="biaya_retribusi" rows="3">{{$PerizinanDetail->biaya_retribusi??null}}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">urut</label>
                    <input type="number" class="form-control" id="basic-default-fullname" value="{{$PerizinanDetail->urut??null}}" name="urut">
                </div>
               
                <a href="{{route('Perizinan.index')}}" class="btn btn-warning">Back</a>
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
