@extends( 'layouts.app' )


@section('viewe_class','view__dictionary_list')

@section('content')
<section class="content view__dictionary_list">
    @if( count($data) )
    <section class="content__dictionary">
        {{-- 검색결과 정보 --}}
        <div class="dictionary__information">
            <p class="dictionary__total_keyword_length_information">Total : <strong>{{ $dictionaryTotlaCount }}</strong></p>
            @if( $isSearchResult )
            <p class="dictionary__search_result_information">Search Result About <strong>'{{ $msg }}'</strong> : <strong>{{ $resultCount }}</strong></p>
            @endif
        </div>
    </section>
    @endif

    <section class="dictionary__table_box">
        <table class="dictionary__table">
            <thead>
            <tr>
                <th class="dictionary__column_index">No</th>
                <th class="dictionary__column_keyword">Keyword</th>
                <th class="dictionary__column_definition">Definition</th>
            </tr>
            </thead>
            <tbody>
            @forelse($data as $item)
            <tr>
                <td class="dictionary__column_item_index">{{ $loop->iteration }}</td>
                <td class="dictionary__column_item_keyword">
                    <a href="{{ route('detail', $item->id) }}" class="dictionary__keyword_detail_link">{{ $item->keyword }}</a>
                </td>
                <td class="dictionary__column_item_definition">
                    <a href="{{ route('detail', $item->id) }}" class="dictionary__keyword_detail_link">{{ $item->defined_keyword }}</a>
                    {{-- $item->option_link --}}
                </td>
            </tr>
            @empty
            <tr>
                <td class="dictionary__column_item_empty" colspan="3">등록된 키워드가 없습니다.</td>
            </tr>
            @endforelse
            </tbody>
        </table>
    </section>
    @if( count($data) )
    {{ $data->links('common.pagination.simple-default') }}
    @endif
</section>
@endsection

