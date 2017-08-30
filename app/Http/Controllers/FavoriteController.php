<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                //
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
//            $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);
            $timelinemicroposts = $user->feed_microposts()->orderBy('created_at', 'desc')->paginate(10);
            $favoritemicroposts = $user->feed_favoritemicroposts()->orderBy('created_at', 'desc')->paginate(10);;

            $data = [
                'timelinemicroposts' => $timelinemicroposts,
                'favoritemicroposts' => $favoritemicroposts,
            ];
        }
        return view('favorite_post.favoriteposts', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        \Auth::user()->favorite($id);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $favoritemicroposts = $user->favoring()->orderBy('created_at', 'desc')->pagenate(10);
        $timelinemicroposts = $user->feed_microposts()->orderBy('created_at', 'desc')->paginate(10);
        
        return view('favorite_post.favoriteposts',['timelinemicroposts' => $timelinemicroposts,'favoritemicroposts' => $timelinemicroposts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \Auth::user()->unfavorite($id);
        return redirect()->back();
    }
}
