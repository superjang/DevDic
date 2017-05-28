@extends( 'layouts.app' )

@section('viewe_class','view__dictionary_edit')

@section('content')
    <form method="post" action="{{ route('update', $data->id) }}" >
        {!! csrf_field() !!}
        {{ method_field('PUT') }}
        <ul class="dictionary__form">
            <li class="keyword">
                <input type="text" name="keyword" class="dictionary__form_keyword" placeholder="키워드를 입력해 주세요." value="{{ $data->keyword }}"/>
            </li>
            <li class="category">
                <input type="text" name="category" class="dictionary__form_category" placeholder="카테고리를 입력해 주세요." value="{{ $data->category }}"/>
            </li>
            <li class="defined">
                <textarea class="dictionary__form_defined" name="defined_keyword" id="" cols="30" rows="10">{{ $data->defined_keyword }}</textarea>
            </li>
            <li class="option_link">
                <input type="text" name="option_link" class="dictionary__form_option_link" placeholder="http://URL" value="{{ $data->option_link }}"/>
            </li>
        </ul>

        <button type="submit" class="btn__save_form">저장</button>
        <a href="{{ route('detail', $data->id) }}" class="btn__cancel_form">취소</a>
    </form>
@endsection
