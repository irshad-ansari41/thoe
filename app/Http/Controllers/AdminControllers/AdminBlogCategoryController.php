<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller as Controller;
use App\BlogCategory;
use App\Http\Requests;
use App\Http\Requests\BlogCategoryRequest;

class AdminBlogCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // Grab all the blog category
        $blogscategories = BlogCategory::all();
        // Show the page
        return view('admin.blogcategory.index', compact('blogscategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.blogcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(BlogCategoryRequest $request)
    {
	    $blogCategory = new BlogCategory($request->all());

        if ($blogCategory->save()) {
            return redirect('admin/blogcategory')->with('success', trans('blogcategory/message.success.create'));
        } else {
            return Redirect::route('admin/blogcategory')->withInput()->with('error', trans('blogcategory/message.error.create'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  BlogCategory $blogCategory
     * @return Response
     */
    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blogcategory.edit', compact('blogCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BlogCategory $blogCategory
     * @return Response
     */
    public function update(BlogCategoryRequest $request, BlogCategory $blogCategory)
    {
        if ($blogCategory->update($request->all())) {
            return redirect('admin/blogcategory')->with('success', trans('blogcategory/message.success.update'));
        } else {
            return Redirect::route('admin/blogcategory')->withInput()->with('error', trans('blogcategory/message.error.update'));
        }
    }

    /**
     * Remove blog.
     *
     * @param BlogCategory $blogCategory
     * @return Response
     */
    public function getModalDelete(BlogCategory $blogCategory)
    {
        $model = 'blogcategory';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.blogcategory.delete', ['id' => $blogCategory->id]);
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            $error = trans('blogcategory/message.error.delete', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  BlogCategory $blogCategory
     * @return Response
     */
    public function destroy(BlogCategory $blogCategory)
    {
        if ($blogcategory->delete()) {
            return redirect('admin/blogcategory')->with('success', trans('blogcategory/message.success.delete'));
        } else {
            return Redirect::route('admin/blogcategory')->withInput()->with('error', trans('blogcategory/message.error.delete'));
        }
    }

}
