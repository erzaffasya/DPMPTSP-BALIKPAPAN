<x-app-layout>
    <div class="card">
        <h5 class="card-header">Responsive Table</h5>
        <div class="table-responsive p-3 text-nowrap" style="height: 80vh;">
            <table class="table" id="myTable">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Nama Menu</th>
                        <th>isActive</th>
                        <th>Jumlah Sub Menu</th>
                        <th>Isi Halaman</th>
                        <th>Urutan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Menu->where('parent_id', null) as $item)
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td> {{ $item->nama_menu }} </td>
                            <td> {{ $item->isActive }} </td>
                            <td> {{ $item->subMenu->count() ?? 0 }} </td>
                            <td>
                                @if ($item->HalamanMenu)
                                    Tersedia
                                @else
                                    Tidak Tersedia
                                @endif
                            </td>
                            <td> {{ $item->urutan }} </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow "
                                        data-bs-toggle="dropdown" aria-expanded="true">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu " data-popper-placement="bottom-start"
                                        style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 27px);">
                                        <a class="dropdown-item" href="{{ route('HalamanMenu.show', $item->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i> Isi Halaman </a>
                                        <a class="dropdown-item" href="{{ route('sub-menu', $item->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i> Sub Menu</a>
                                        <a class="dropdown-item" href="{{route('Menu.edit',$item->id)}}"><i
                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <form action="{{ route('Menu.destroy', $item->id) }}" method="post">
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
