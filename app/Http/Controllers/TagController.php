<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TagController extends Controller
{
    private $perPage = 5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tags = $request->get('keyword')
            ? Tag::search($request->keyword)->paginate($this->perPage)
            : Tag::latest()->paginate($this->perPage);
        return view('tags.index', [
            'tags' => $tags->appends(['keyword' => $request->keyword])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:25'],
            'slug' => ['required', 'string', 'unique:tags,slug'],
        ],
        [],
        $this->getAttributes()
    )->validate();

        try {
            Tag::create([
                'title' => $request->title,
                'slug' => $request->slug,
            ]);
            Alert::success(
                trans('tags.alert.create.title'),
                trans('tags.alert.create.message.success'),
            );
            return redirect()->route('tags.index');
        } catch (\Throwable $th) {
            // Throw $th
            Alert::error(
                trans('tags.alert.create.title'),
                trans('tags.alert.create.message.error', ['error' => $th->getMessage()]),
            );
            return redirect()->back()->withInput($request->all());
        }
    }

    // Set for multilanguages
    private function getAttributes()
    {
        return [
            'title' => trans('tags.form_control.input.title.attribute'),
            'slug' => trans('tags.form_control.input.slug.attribute'),
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit', [
            'tag' => $tag,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:25'],
            'slug' => 'required|string|unique:tags,slug,' . $tag->id,
        ],
        [],
        $this->getAttributes()
    )->validate();

        try {
            $tag->update([
                'title' => $request->title,
                'slug' => $request->slug,
            ]);
            Alert::success(
                trans('tags.alert.update.title'),
                trans('tags.alert.update.message.success'),
            );
            return redirect()->route('tags.index');
        } catch (\Throwable $th) {
            // Throw $th
            Alert::error(
                trans('tags.alert.update.title'),
                trans('tags.alert.update.message.error', ['error' => $th->getMessage()]),
            );
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        try {
            $tag->delete();
            Alert::success(
                trans('tags.alert.delete.title'),
                trans('tags.alert.delete.message.success'),
            );
        } catch (\Throwable $th) {
            // Throw $th
            Alert::error(
                trans('tags.alert.delete.title'),
                trans('tags.alert.delete.message.error', ['error' => $th->getMessage()]),
            );
        }
        return redirect()->back();
    }
}
