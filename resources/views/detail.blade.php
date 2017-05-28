@extends( 'layouts.app' )

@section('viewe_class','view__dictionary_detail')

@section('content')
    <ul class="dictionary__detail_item">
        <li class="keyword">{{ $data->keyword }}</li>
        <li class="category">{{ $data->category }}</li>
        <li class="defined">{{ $data->defined_keyword }}</li>
        <li class="option_link"><a href="{{ $data->option_link }}" target="_blank">추가설명</a></li>
    </ul>
    @if (Auth::check())
    <div class="dictionary__detail_btn_list">
        <a href="{{ route('edit', $data->id) }}" class="btn__keyword_fix">수정</a>
        <form method="post" action="{{ route('delete', $data->id) }}" class="form__keyword_delete">
            {!! csrf_field() !!}
            {{ method_field('delete') }}
            <button type="submit" class="btn__keyword_delete">삭제</button>
        </form>
    </div>
    @endif

    @if (Session::has('msg'))
    <div class="noti_msg">{{ Session::get('msg') }}</div>
    @endif
@endsection
