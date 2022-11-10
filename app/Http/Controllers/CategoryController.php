<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    // Permission setup for category
    public function __construct()
    {
        $this->middleware('permission:category_show', ['only' => 'index']);
        $this->middleware('permission:category_detail', ['only' => 'show']);
        $this->middleware('permission:category_delete', ['only' => 'destroy']);
        $this->middleware('permission:category_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category_update', ['only' => ['edit', 'update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::latest()->paginate(5);
        $search = $request->keyword;

        if($search != "") {
            $categories = Category::where(function($query) use ($search) {
                $query->where('title', 'like', '%'.$search.'%');
            })
            ->paginate(5);
            $categories->appends(['keyword' => $search]);
        }
        else {
            $categories = Category::latest()->paginate(5)->appends(['keyword' => $request->get('keyword')]);
        }
        return view('categories.index', [
            'categories' => $categories,
        ]);

        // if ($request->has('keyword') && trim($request->keyword)) {
        //     $category = Category::all();
        //     $category->search($request->keyword);

        //     return view('categories.index', [
        //     'category' => $category->get()
        // ]);
        // }

        // return view('categories.index', [
        //     'categories' => Category::latest()->paginate(4),
        //     'category' => $category->get()
        // ]);
    }

    // Controller untuk script select2 pada categories create.blade.php
    // public function select(Request $request)
    // {
    //     $categories = [];
    //     if ($request->has('q')) {
    //         $search = $request->q;
    //         $categories = Category::select('id', 'title')->where('title', 'LIKE', "%$search%")->limit(6)->get();
    //     } else {
    //         $categories = Category::select('id', 'title')->limit(6)->get();
    //     }

    //     return response()->json($categories);
        
    // }

    // Fitur Translate tambahan label
    private function attribute()
    {
        return [
            'title' => trans('categories.form_control.input.title.attribute'),
            'slug' => trans('categories.form_control.input.slug.attribute'),
            'thumbnail' => trans('categories.form_control.input.thumbnail.attribute'),
            'description' => trans('categories.form_control.textarea.description.attribute'),
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'title' => ['required', 'string', 'max:60'],
            'slug' => ['required', 'string', 'unique:categories,slug'],
            'thumbnail' => ['required', 'max:2048'],
            'description' => ['required', 'string'],
        ],
        [],
        $this->attribute()
    )->validate();

        try {
            Category::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'thumbnail' => parse_url($request->thumbnail)['path'],
                'description' => $request->description,
            ]);
            Alert::success(
                trans('categories.alert.create.title'),
                trans('categories.alert.create.message.success'),
            );
            return redirect()->route('categories.index');
        } catch (\Throwable $th) {
            // Throw $th
            Alert::error(
                trans('categories.alert.create.title'),
                trans('categories.alert.create.message.error', ['error' => $th->getMessage()]),
            );
            return redirect()->back()->withInput($request->all());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show', [
            'category' => $category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        Validator::make($request->all(), [
            'title' => 'required|string|max:60|unique:categories,title' . $category->title,
            'slug' => 'required|string|unique:categories,slug,' . $category->id,
            'thumbnail' => ['required','max:2048'],
            'description' => ['required', 'string'],
        ],
        [],
        $this->attribute()
    )->validate();

        try {
            $category->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'thumbnail' => parse_url($request->thumbnail)['path'],
                'description' => $request->description,
            ]);
            Alert::success(
                trans('categories.alert.update.title'),
                trans('categories.alert.update.message.success'),
            );
            return redirect()->route('categories.index');
        } catch (\Throwable $th) {
            // Throw $th
            Alert::error(
                trans('categories.alert.update.title'),
                trans('categories.alert.update.message.error', ['error' => $th->getMessage()]),
            );
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            Alert::success(
                trans('categories.alert.delete.title'),
                trans('categories.alert.delete.message.success')
            );
        } catch (\Throwable $th) {
            Alert::error(
                trans('categories.alert.delete.title'),
                trans('categories.alert.delete.message.error', ['error' => $th->getMessage()])
            );
        }

        return redirect()->back();
    }
}
