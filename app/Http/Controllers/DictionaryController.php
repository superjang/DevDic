<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Dictionary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DictionaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $result = null;
        $isEmptyResult = true;
        $modelView = [
            'isLogin' => auth()->check() ? true : false,
            'dictionaryTotlaCount' => Dictionary::count(),
            'isSearchResult' => false,
        ];

        if( $keyword !== null ){
            // 검색 결과 리스트 노출
            $result = Dictionary::where('keyword', 'LIKE', '%'.$keyword.'%')
                ->orWhere('defined_keyword', 'LIKE', '%'.$keyword.'%')
                ->orderBy('created_at', 'desc')
                ->simplePaginate(20);

            $isEmptyResult = $result->isEmpty();
            $modelView['isSearchResult'] = true;

            if($isEmptyResult){
                $modelView['data'] = [];
                $modelView['msg'] = '"'.$keyword.'" 와 일치하는 키워드가 없습니다.';
            }else{
                $modelView['data'] = $result;
                $modelView['resultCount'] = count($result);
                $modelView['msg'] = $keyword;
            }
        } else {
            // 전체 리스트 노출
            $result = Dictionary::orderBy('created_at', 'desc')->simplePaginate(20);
            $isEmptyResult = $result->isEmpty();

            if($isEmptyResult){
                $modelView['data'] =  [];
                $modelView['msg'] = '아직 등록된 키워드가 없습니다.';
            }else{
                $modelView['data'] =  $result;
                $modelView['resultCount'] = count($result);
            }

        }

        return view('list')->with($modelView);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $landingDestination = null;

        if(!auth()->check()){
            $landingDestination = redirect()->route('login');
        } else {
            $landingDestination = view('add');
        }

        return $landingDestination;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();

        $inputs = $request->only([
            'keyword',
            'category',
            'defined_keyword',
            'option_link',
        ]);

        $dictionary = new Dictionary();
        $dictionary->user_id = $user->id;
        $dictionary->keyword = $inputs['keyword'];
        $dictionary->category = $inputs['category'];
        $dictionary->defined_keyword = $inputs['defined_keyword'];
        $dictionary->option_link = $inputs['option_link'];
        $dictionary->save();

        return redirect( route('detail', $dictionary) );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $defined_keyword = Dictionary::where('id', $id)->first();
        $modelView['data'] = $defined_keyword;

        return view('detail')->with($modelView);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $defined_keyword = Dictionary::where('id', $id)->first();
        $modelView['data'] = $defined_keyword;

        $user = Auth::user();
        if($user->id !== $defined_keyword->user_id)
        {
            $request->session()->flash('msg', '작성자만 수정 가능합니다.');
            return redirect()->back();
        } else{
            return view('edit')->with($modelView);
        }



    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->only([
            'keyword',
            'category',
            'defined_keyword',
            'option_link',
        ]);

        // where('id', $id)->get()은 인스턴스 로우를 리턴? 리턴값 차이 있음 save시 새로 로우가 생성됨
        $dictionary = Dictionary::find($id);
        $dictionary->keyword = $inputs['keyword'];
        $dictionary->category = $inputs['category'];
        $dictionary->defined_keyword = $inputs['defined_keyword'];
        $dictionary->option_link = $inputs['option_link'];
        $dictionary->save();

        return redirect( route('detail', $dictionary) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // 삭제 후 리스트로 리다이렉트 처리
        $dictionary = Dictionary::find($id);

        $user = Auth::user();
        if($user->id !== $dictionary->user_id)
        {
            $request->session()->flash('msg', '작성자만 삭제 가능합니다.');
            return redirect()->back();
        }else{
            $dictionary->delete();
            return redirect( route('list') );
        }
    }
}
