@extends('layouts.app')

@section('content')
<div class="supreme" style="width:100%;height:100%;">
    <?php
    $context = stream_context_create(
        array(
            "http" => array(
                "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
            )
        )
    );
    print file_get_contents('https://www.supremenewyork.com/', false, $context); 
    ?>
</div>
@endsection
