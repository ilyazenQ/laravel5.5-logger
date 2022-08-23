<?php

namespace App\Http\Controllers;

use App\Foo;
use App\Helpers\LogToChannels;
use App\Jobs\FooJob;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FooController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|View
     */
    public function index()
    {
        $foos = Foo::all();
        return View('foo',['foos'=>$foos]);
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        FooJob::dispatch('Created new Foo', $request->get('title'));
        return redirect()->route('foo.index')->with('success','Success, job in process.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Foo  $foo
     * @return \Illuminate\Http\Response
     */
    public function show(Foo $foo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Foo  $foo
     * @return \Illuminate\Http\Response
     */
    public function edit(Foo $foo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Foo  $foo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Foo $foo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Foo  $foo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Foo $foo)
    {
        //
    }
}
