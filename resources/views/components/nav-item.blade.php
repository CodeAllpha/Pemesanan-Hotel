@props(['label','icon','link'])
<?php
$path = trim(str_replace(url('/'),'',$link),'/');
$wildchar = $path == 'admin' ? '' : '*';
$is = request()->is($path.$wildchar);
?>

<li class="nav-item">
    <a href="<?= $link ?>" class="nav-link {{ $is ? 'active':'' }}">
        <i class="{{ $icon }}"></i>
        <span class="menu-title" data-i18n="">{{ $label }}</span>
    </a>
</li> 