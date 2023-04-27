@foreach ($categories as $menu)
    <x-menu-item :menu="$menu" />
@endforeach