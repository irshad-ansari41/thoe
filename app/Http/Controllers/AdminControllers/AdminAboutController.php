<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\JoshController as Controller;
use App\About;
use App\Http\Requests;
use App\Http\Requests\AboutRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Response;
use Sentinel;
use Intervention\Image\Facades\Image;
use DOMDocument;


class AdminAboutController extends Controller
{


    private $tags;

    public function __construct()
    {
        parent::__construct();
        $this->tags = About::allTags();
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // Grab all the abouts
        $abouts = About::all();
        // Show the page
        return view('admin.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(AboutRequest $request)
    {
        $about = new About($request->except('files','image','tags'));

        $message=$request->get('content');
        $dom = new DomDocument();
        $dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        // foreach <img> in the submited message
        foreach($images as $img){
            $src = $img->getAttribute('src');
            // if the img source is 'data-url'
            if(preg_match('/data:image/', $src)){
                // get the mimetype
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                // Generating a random filename
                $filename = uniqid();
                $filepath = "uploads/about/$filename.$mimetype";
                // @see http://image.intervention.io/api/
                $image = Image::make($src)
                    // resize if required
                    /* ->resize(300, 200) */
                    ->encode($mimetype, 100)  // encode file to the specified mimetype
                    ->save(STORE_PATH.($filepath));
                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
            } // <!--endif
        } // <!-
        $about->content = $dom->saveHTML();

        $picture = "";

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/about/';
            $picture = str_random(10) . '.' . $extension;
            $about->image = $picture;
        }
        $about->user_id = 1;//Sentinel::getUser()->id;
        $about->save();

        if ($request->hasFile('image')) {
            $destinationPath = STORE_PATH . $folderName;
            $request->file('image')->move($destinationPath, $picture);
        }

        $about->tag($request->tags);

        if ($about->id) {
            return redirect('admin/about')->with('success', trans('about/message.success.create'));
        } else {
            return Redirect::route('admin/about')->withInput()->with('error', trans('about/message.error.create'));
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  About $about
     * @return view
     */
    public function show(About $about)
    {
        $comments = About::find($about->id)->comments;

        return view('admin.about.show', compact('about', 'comments', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  About $about
     * @return view
     */
    public function edit(About $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  About $about
     * @return Response
     */
    public function update(AboutRequest $request, About $about)
    {
        $message=$request->get('content');
        $dom = new DomDocument();
        $dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        // foreach <img> in the submited message
        foreach($images as $img){
            $src = $img->getAttribute('src');
            // if the img source is 'data-url'
            if(preg_match('/data:image/', $src)){
                // get the mimetype
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                // Generating a random filename
                $filename = uniqid();
                $filepath = "uploads/about/$filename.$mimetype";
                // @see http://image.intervention.io/api/
                $image = Image::make($src)
                    // resize if required
                    /* ->resize(300, 200) */
                    ->encode($mimetype, 100)  // encode file to the specified mimetype
                    ->save(STORE_PATH.($filepath));
                $new_src = asset($filepath);
            } // <!--endif
            else{
                $new_src=$src;
            }
            $img->removeAttribute('src');
            $img->setAttribute('src', $new_src);
        } // <!-
        $about->content = $dom->saveHTML();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/about/';
            $picture = str_random(10) . '.' . $extension;
            $about->image = $picture;
        }

        if ($request->hasFile('image')) {
            $destinationPath = STORE_PATH . $folderName;
            $request->file('image')->move($destinationPath, $picture);
        }
        $about->retag($request['tags']);

        if ($about->update($request->except('content','image','files','_method', 'tags'))) {
            return redirect('admin/about')->with('success', trans('about/message.success.update'));
        } else {
            return Redirect::route('admin/about')->withInput()->with('error', trans('about/message.error.update'));
        }
    }

    /**
     * Remove about.
     *
     * @param About $about
     * @return Response
     */
    public function getModalDelete(About $about)
    {
        $model = 'about';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.about.delete', ['id' => $about->id]);
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            $error = trans('about/message.error.delete', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  About $about
     * @return Response
     */
    public function destroy(About $about)
    {

        if ($about->delete()) {
            return redirect('admin/about')->with('success', trans('about/message.success.delete'));
        } else {
            return Redirect::route('admin/about')->withInput()->with('error', trans('about/message.error.delete'));
        }
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param AboutCommentRequest $request
	 * @param About $about
	 *
	 * @return Response
	 */
    public function storeComment(AboutCommentRequest $request, About $about)
    {
        $aboutcooment = new AboutComment($request->all());
        $aboutcooment->about_id = $about->id;
        $aboutcooment->save();

        return redirect('admin/about/' . $about->id . '/show');
    }
}
