<?php

namespace App\Http\Controllers\Frontend;

use App\Contracts\Services\PoemServiceInterface;
use App\Models\Poem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\frontend\PoemRequest;

class PoemController extends Controller
{
    public function __construct(private PoemServiceInterface $poemService)
    {
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function myPoems()
    {
        $user = Auth()->user();
        $poems = Poem::with(['user','reactions','comments.user'])->where('user_id',$user->id)->orderBy('id','desc')->paginate(15);
        return view('frontend.home', compact('poems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.poems.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PoemRequest $request)
    {
        $this->poemService->store( $request->validated() + 
        [
            'slug' => Str::slug($request->title),
            'user_id' => Auth::id(),
        ]
        );

        return redirect()->route('home')->with(['created' => 'Poem Successfully Created.']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poem  $poem
     * @return \Illuminate\Http\Response
     */
    public function show(Poem $poem)
    {
        return $poem;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poem  $poem
     * @return \Illuminate\Http\Response
     */
    public function edit(Poem $poem)
    {
        return view('frontend.poems.edit',compact('poem'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Poem  $poem
     * @return \Illuminate\Http\Response
     */
    public function update(PoemRequest $request, PoemRequest $poem)
    {
        $this->poemService->update($request->validated() + 
        [
            'slug' => Str::slug($request->title),
            'user_id' => Auth::id(),
        ]
        ,$poem);

        return redirect()->route('home')->with(['updated' => 'Poem Successfully Updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poem  $poem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poem $poem)
    {
        $this->poemService->destroy($poem);
        return redirect()->route('home')->with(['deleted' => 'Poem Successfully Deleted.']);

    }
}
