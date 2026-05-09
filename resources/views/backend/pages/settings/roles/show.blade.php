// Blade: show.blade.php
<h2>{{ $role->name }}</h2>
<ul>
@foreach($role->permissions as $permission)
    <li>{{ $permission->name }}</li>
@endforeach
</ul>