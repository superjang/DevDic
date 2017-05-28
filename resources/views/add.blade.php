@extends( 'layouts.app' )

@section('viewe_class','view__dictionary_add')

@section('content')
    <form method="post" action="{{ route('save') }}" >
        {!! csrf_field() !!}

        <ul class="dictionary__form">
            <li class="keyword">
                <input type="text" name="keyword" class="dictionary__form_keyword" placeholder="키워드를 입력해 주세요."/>
            </li>
            <li class="category">
                <input type="text" name="category" class="dictionary__form_category" placeholder="카테고리를 입력해 주세요."/>
            </li>
            <li class="defined">
                <textarea class="dictionary__form_defined" name="defined_keyword" id="" cols="30" rows="10"></textarea>
            </li>
            <li class="option_link">
                <input type="text" name="option_link" class="dictionary__form_option_link" placeholder="http://URL"/>
            </li>
        </ul>

        <button type="submit" class="btn__save_form">저장</button>
        <a href="{{ route('list') }}" class="btn__cancel_form">취소</a>
    </form>
@endsection
