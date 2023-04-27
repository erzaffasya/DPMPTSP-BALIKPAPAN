<li @if ($menu->children->count() > 0) class="menu-item-has-children" @endif>
    <a class=""
        @if ($menu->HalamanMenu != null) href="{{ route('HalamanMenu', $menu->HalamanMenu->id) }}" @endif>{{ $menu->nama_menu }}
    </a>

    @if ($menu->children->count() > 0)
        <ul class="sub-menu">
            @foreach ($menu->children->sortBy('urutan') as $child)
                <x-menu-item :menu="$child" />
            @endforeach
        </ul>
    @endif

</li>
