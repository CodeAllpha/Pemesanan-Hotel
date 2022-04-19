@props(['label','link'])
<?php
$path = trim(str_replace(url('/'),'',$link),'/');
$wildchar = $path == '/' ? '' : '*';
$is = request()->is($path.$wildchar);
?>

<li class="nav-item mx-md-2">
    <a href="<?=$link ?>" class="nav-link {{ $is ? 'active':'' }}">{{ $label }}</a>
</li>