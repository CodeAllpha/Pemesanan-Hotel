@props(['label','link'])
<?php
$active = $link == url()->current() ;
?>

<li class="nav-item{{ $active ? 'active':'' }} mx-md-2">
    <a href="<?=$link ?>" class="nav-link {{ $active ? 'active':'' }}">{{ $label }}</a>
</li>