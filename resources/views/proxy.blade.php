@extends('layouts.app')

@section('content')
<div class="supreme" style="width:100%;height:100%;">
    <?php print file_get_contents('https://www.supremenewyork.com/'); ?>
</div>
@endsection
