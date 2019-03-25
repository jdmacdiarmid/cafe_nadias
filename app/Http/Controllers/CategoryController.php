<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Name: index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $errors = null;

        $this->authorize('manage', Category::class);
        $categories = Category::orderBy('display_order')->get();

        return view('admin.categories.index', ['categories' => $categories]);

    }

    /**
     * Name: upsert
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function upsert(Request $request): array
    {
        $this->authorize('manage', Category::class);
        $categories = $request->post('categories');
        foreach ($categories as $category)
        {
            if ($category['id'])
            {
                Category::where('id', $category['id'])->update($category);
            }
            else
            {
                Category::create($category);
            }
        }

        // Return success and the latest collection of categories.
        return ['success' => true, 'categories' => Category::all()];

    }

    /**
     * Show the form for creating a new resource.
     *
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
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Category $category
     *
     * @return void
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category $category
     *
     * @return array
     * @throws \Exception
     */
    public function destroy(Category $category): array
    {
        try {
            $this->authorize('delete', $category);
            $category->delete();
            return ['success' => true];
        } catch (AuthorizationException $e) {
            $str = $e->getMessage();
            return ['success' => false, 'message' => $str];
        }
    }
}
