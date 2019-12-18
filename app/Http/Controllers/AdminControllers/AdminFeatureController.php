<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\JoshController as Controller;
use App\Feature;
use App\Http\Requests;
use App\Http\Requests\FeatureRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Response;
use Sentinel;
use Intervention\Image\Facades\Image;
use DOMDocument;

class AdminFeatureController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        // Grab all the features
        $features = Feature::all();
        // Show the page
        return view('admin.feature.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return view('admin.feature.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(FeatureRequest $request) {
        $feature = new Feature($request->except('files', 'image'));

        $message = $request->get('content');
        $dom = new DomDocument();
        $dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        // foreach <img> in the submited message
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            // if the img source is 'data-url'
            if (preg_match('/data:image/', $src)) {
                // get the mimetype
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                // Generating a random filename
                $filename = uniqid();
                $filepath = "uploads/feature/$filename.$mimetype";
                // @see http://image.intervention.io/api/
                $image = Image::make($src)
                        // resize if required
                        /* ->resize(300, 200) */
                        ->encode($mimetype, 100)  // encode file to the specified mimetype
                        ->save(STORE_PATH . ($filepath));
                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
            } // <!--endif
        } // <!-
        $feature->content = $dom->saveHTML();

        $picture = "";

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $folderName = '/uploads/feature/';
            $picture = make_image_slug($file->getClientOriginalName());
            $feature->image = $picture;
        }
        $feature->user_id = 1; //Sentinel::getUser()->id;
        $feature->save();

        if ($request->hasFile('image')) {
            $destinationPath = STORE_PATH . $folderName;
            $request->file('image')->move($destinationPath, $picture);
        }

        if ($feature->id) {
            return redirect('admin/feature')->with('success', trans('feature/message.success.create'));
        } else {
            return Redirect::route('admin/feature')->withInput()->with('error', trans('feature/message.error.create'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Feature $feature
     * @return view
     */
    public function show(Feature $feature) {
        $comments = Feature::find($feature->id)->comments;

        return view('admin.feature.show', compact('feature', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Feature $feature
     * @return view
     */
    public function edit(Feature $feature) {
        return view('admin.feature.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Feature $feature
     * @return Response
     */
    public function update(FeatureRequest $request, Feature $feature) {
        $message = $request->get('content');
        $dom = new DomDocument();
        $dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        // foreach <img> in the submited message
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            // if the img source is 'data-url'
            if (preg_match('/data:image/', $src)) {
                // get the mimetype
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                // Generating a random filename
                $filename = uniqid();
                $filepath = "uploads/feature/$filename.$mimetype";
                // @see http://image.intervention.io/api/
                $image = Image::make($src)
                        // resize if required
                        /* ->resize(300, 200) */
                        ->encode($mimetype, 100)  // encode file to the specified mimetype
                        ->save(STORE_PATH . ($filepath));
                $new_src = asset($filepath);
            } // <!--endif
            else {
                $new_src = $src;
            }
            $img->removeAttribute('src');
            $img->setAttribute('src', $new_src);
        } // <!-
        $feature->content = $dom->saveHTML();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $folderName = '/uploads/feature/';
            $picture = make_image_slug($file->getClientOriginalName());
            $feature->image = $picture;
        }

        if ($request->hasFile('image')) {
            $destinationPath = STORE_PATH . $folderName;
            $request->file('image')->move($destinationPath, $picture);
        }

        if ($feature->update($request->except('content', 'image', 'files', '_method'))) {
            return redirect('admin/feature')->with('success', trans('feature/message.success.update'));
        } else {
            return Redirect::route('admin/feature')->withInput()->with('error', trans('feature/message.error.update'));
        }
    }

    /**
     * Remove feature.
     *
     * @param Feature $feature
     * @return Response
     */
    public function getModalDelete(Feature $feature) {
        $model = 'feature';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.feature.delete', ['id' => $feature->id]);
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            $error = trans('feature/message.error.delete', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Feature $feature
     * @return Response
     */
    public function destroy(Feature $feature) {

        if ($feature->delete()) {
            return redirect('admin/feature')->with('success', trans('feature/message.success.delete'));
        } else {
            return Redirect::route('admin/feature')->withInput()->with('error', trans('feature/message.error.delete'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FeatureCommentRequest $request
     * @param Feature $feature
     *
     * @return Response
     */
    public function storeComment(FeatureCommentRequest $request, Feature $feature) {
        $featurecooment = new FeatureComment($request->all());
        $featurecooment->feature_id = $feature->id;
        $featurecooment->save();

        return redirect('admin/feature/' . $feature->id . '/show');
    }

}
