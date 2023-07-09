<x-app-layout>
    <div class="card">
        <h5 class="card-header">Responsive Table</h5>
        <div class="table-responsive p-3 text-nowrap" style="height: 80vh;">
            <table class="table" id="myTable">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Perizinan</th>
                        <th>Deskripsi</th>
                        <th>Urut</th>
                        <th>isActive</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Perizinan as $item)
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td> {{ $item->perizinan }} </td>
                            <td> {!! $item->deskripsi !!} </td>
                            <td> {{ $item->isActive }} </td>
                            <td> {{ $item->urut }} </td>

                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow "
                                        data-bs-toggle="dropdown" aria-expanded="true">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu " data-popper-placement="bottom-start"
                                        style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 27px);">
                                        <a class="dropdown-item" href="{{ route('settingDetail', $item->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i> Setting Detail</a>
                                        <a class="dropdown-item" href="{{ route('Perizinan.edit', $item->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <form action="{{ route('Perizinan.destroy', $item->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf

                                            <button class="dropdown-item" onclick="ConfirmDelete()" type="SUBMIT"><i
                                                    class="bx bx-trash me-1"></i> Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
