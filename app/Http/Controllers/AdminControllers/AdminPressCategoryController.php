<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller as Controller;
use App\Models\PressCategory;
use App\Http\Requests;
use App\Http\Requests\PressCategoryRequest;

class AdminPressCategoryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        // Grab all the blog category
        $pressscategories = PressCategory::all();
        // Show the page
        return view('admin.presscategory.index', compact('pressscategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return view('admin.presscategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PressCategoryRequest $request) {
        $pressCategory = new PressCategory($request->all());

        if ($pressCategory->save()) {
            return redirect('admin/presscategory')->with('success', trans('presscategory/message.success.create'));
        } else {
            return Redirect::route('admin/presscategory')->withInput()->with('error', trans('presscategory/message.error.create'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  PressCategory $pressCategory
     * @return Response
     */
    public function edit(PressCategory $pressCategory) {
        return view('admin.presscategory.edit', compact('pressCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PressCategory $pressCategory
     * @return Response
     */
    public function update(PressCategoryRequest $request, PressCategory $pressCategory) {
        if ($pressCategory->update($request->all())) {
            return redirect('admin/presscategory')->with('success', trans('presscategory/message.success.update'));
        } else {
            return Redirect::route('admin/presscategory')->withInput()->with('error', trans('presscategory/message.error.update'));
        }
    }

    /**
     * Remove blog.
     *
     * @param PressCategory $pressCategory
     * @return Response
     */
    public function getModalDelete(PressCategory $pressCategory) {
        $model = 'presscategory';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.presscategory.delete', ['id' => $pressCategory->id]);
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            $error = trans('presscategory/message.error.delete', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  PressCategory $pressCategory
     * @return Response
     */
    public function destroy(PressCategory $pressCategory) {
        if ($pressCategory->delete()) {
            return redirect('admin/presscategory')->with('success', trans('presscategory/message.success.delete'));
        } else {
            return Redirect::route('admin/presscategory')->withInput()->with('error', trans('presscategory/message.error.delete'));
        }
    }

}
