<?php

namespace App\Http\Controllers\Admin\Custom;

use App\Http\Controllers\Controller;
use App\Models\Custom\Link;
use Database\Seeders\LinkSeeder;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:setting-manager');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::first();
        if($links === null){
            $default = new LinkSeeder();
            $default->run();
            $links = Link::first();
        }
        $links = Link::all();
        return view('admin.custom.link.index', compact('links'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Link $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        return view('admin.custom.link.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        $request->validate([
            'link' => 'required|max:255',
        ]);
        $inputs = $request->all();
        $link->update($inputs);
        return redirect()->route('admin.custom.link.index')->with('swal-success', 'تنظیمات شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
