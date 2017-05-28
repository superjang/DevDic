<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
    <META name="author" content="Jae Won Jang">
    <META name="title" content="사이트이름 블라블라">
    <META name="keywords" content="키워드">
    <meta name="description" content="" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sue+Ellen+Francisco"/>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="@yield('viewe_class')">
        <header class="app_header">
            <a href="{{ route('list') }}" class="main__logo">DevDict</a>

            <button type="button" class="btn__global_navigation_title">메뉴</button>

            <nav class="global_navigation global_navigation--off">
                <!-- [D]
                    .global_navigation__list--on
                    .global_navigation__list--off
                -->
                <ul class="global_navigation__list">
                    @if (Auth::check())
                    <li class="global_navigation__list_item global_navigation__list_item_login--on">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                             로그아웃
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @else
                    <li class="global_navigation__list_item global_navigation__list_item_login--on">
                        <a href="{{ route('login') }}">로그인</a>
                    </li>
                    <li class="global_navigation__list_item global_navigation__list_item_register">
                        <a href="{{ route('register') }}">가입</a>
                    </li>
                    @endif
                </ul>
            </nav>

            <div class="form__search">
                <form action="{{ route('list') }}" method="get">
                    {!! csrf_field() !!}
                    <input type="text" name="keyword" class="input__search input__search--on" placeholder="검색할 키워드를 입력해 주세요."/>
                    <button type="submit" class="btn__keyword_search">
                        <span class="btn__keyword_search_image">검색</span>
                    </button>
                </form>
            </div>
        </header>

        <section class="app_content">
        @yield('content')
        </section>

        <footer class="app_footer">
            <div class="util__status--has_keywords">
                <a href="{{ route('create') }}" class="util__btn util__btn_add_keyword_to_dic">키워드 추가</a>
                <a href="{{ route('list') }}" class="util__btn util__btn_go_to_whole_list">전체 목록</a>
            </div>

            {!--<div class="util__status--has_not_keywords">
                <a href="{{ route('create') }}" class="util__btn util__btn_add_keyword_to_dic">키워드 추가</a>
            </div>--}

            <a href="#" class="btn__move_top" title="페이지 상단으로 이동">TOP</a>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
