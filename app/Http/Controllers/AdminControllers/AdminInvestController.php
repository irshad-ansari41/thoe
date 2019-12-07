<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\JoshController as Controller;
use App\Models\Invest;
use App\Http\Requests;
use App\Http\Requests\InvestRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Response;
use Sentinel;
use Intervention\Image\Facades\Image;
use DOMDocument;

class AdminInvestController extends Controller {

    private $tags;

    public function __construct() {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        // Grab all the invests
        $invests = Invest::all();
        // Show the page
        return view('admin.invest.index', compact('invests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return view('admin.invest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(InvestRequest $request) {
        $invest = new Invest();

        if ($request->get('description_en')) {
            $message = $request->get('description_en');
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
                    $filepath = "uploads/invest/$filename.$mimetype";
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
            $invest->description_en = $dom->saveHTML();
        }

        if ($request->get('description_ar')) {
            $message = $request->get('description_ar');
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
                    $filepath = "uploads/invest/$filename.$mimetype";
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
            $invest->description_ar = $dom->saveHTML();
        }

        $invest->title_en = $request->get('title_en');
        $invest->title_ar = $request->get('title_ar');
        $invest->status = 1; //Sentinel::getUser()->id;
        $invest->save();

        if ($invest->id) {
            return redirect('admin/invest')->with('success', trans('invest/message.success.create'));
        } else {
            return Redirect::route('admin/invest')->withInput()->with('error', trans('invest/message.error.create'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Invest $invest
     * @return view
     */
    public function show(Invest $invest) {
        $comments = Invest::find($invest->id)->comments;

        return view('admin.invest.show', compact('invest', 'comments', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Invest $invest
     * @return view
     */
    public function edit(Invest $invest) {
        return view('admin.invest.edit', compact('invest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Invest $invest
     * @return Response
     */
    public function update(InvestRequest $request, Invest $invest) {

        if ($request->get('description_en')) {
            $message = $request->get('description_en');
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
                    $filepath = "uploads/invest/$filename.$mimetype";
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
            $invest->description_en = $dom->saveHTML();
        }

        if ($request->get('description_ar')) {
            $message = $request->get('description_ar');
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
                    $filepath = "uploads/invest/$filename.$mimetype";
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
            $invest->description_ar = $dom->saveHTML();
        }

        $invest->title_en = $request->get('title_en');
        $invest->title_ar = $request->get('title_ar');

        if ($invest->update()) {
            return redirect('admin/invest')->with('success', trans('invest/message.success.update'));
        } else {
            return Redirect::route('admin/invest')->withInput()->with('error', trans('invest/message.error.update'));
        }
    }

    /**
     * Remove invest.
     *
     * @param Invest $invest
     * @return Response
     */
    public function getModalDelete(Invest $invest) {
        $model = 'invest';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.invest.delete', ['id' => $invest->id]);
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            $error = trans('invest/message.error.delete', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Invest $invest
     * @return Response
     */
    public function destroy(Invest $invest) {

        if ($invest->delete()) {
            return redirect('admin/invest')->with('success', trans('invest/message.success.delete'));
        } else {
            return Redirect::route('admin/invest')->withInput()->with('error', trans('invest/message.error.delete'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InvestCommentRequest $request
     * @param Invest $invest
     *
     * @return Response
     */
    public function storeComment(InvestCommentRequest $request, Invest $invest) {
        $investcooment = new InvestComment($request->all());
        $investcooment->invest_id = $invest->id;
        $investcooment->save();

        return redirect('admin/invest/' . $invest->id . '/show');
    }

}
