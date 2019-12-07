<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\JoshController as Controller;
use App\Models\Offer;
use App\Http\Requests;
use App\Http\Requests\OfferRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Response;
use Sentinel;
use Intervention\Image\Facades\Image;
use DOMDocument;

class AdminOfferController extends Controller {

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
        // Grab all the offers
        $offers = Offer::all();
        // Show the page
        return view('admin.offer.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return view('admin.offer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(OfferRequest $request) {
        $offer = new Offer();

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
                    $filepath = "uploads/offer/$filename.$mimetype";
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
            $offer->description_en = $dom->saveHTML();
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
                    $filepath = "uploads/offer/$filename.$mimetype";
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
            $offer->description_ar = $dom->saveHTML();
        }

        $offer->title_en = $request->get('title_en');
        $offer->title_ar = $request->get('title_ar');
        $offer->status = 1; //Sentinel::getUser()->id;
        $offer->save();

        if ($offer->id) {
            return redirect('admin/offer')->with('success', trans('offer/message.success.create'));
        } else {
            return Redirect::route('admin/offer')->withInput()->with('error', trans('offer/message.error.create'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Offer $offer
     * @return view
     */
    public function show(Offer $offer) {
        $comments = Offer::find($offer->id)->comments;

        return view('admin.offer.show', compact('offer', 'comments', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Offer $offer
     * @return view
     */
    public function edit(Offer $offer) {
        return view('admin.offer.edit', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Offer $offer
     * @return Response
     */
    public function update(OfferRequest $request, Offer $offer) {

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
                    $filepath = "uploads/offer/$filename.$mimetype";
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
            $offer->description_en = $dom->saveHTML();
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
                    $filepath = "uploads/offer/$filename.$mimetype";
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
            $offer->description_ar = $dom->saveHTML();
        }

        $offer->title_en = $request->get('title_en');
        $offer->title_ar = $request->get('title_ar');

        if ($offer->update()) {
            return redirect('admin/offer')->with('success', trans('offer/message.success.update'));
        } else {
            return Redirect::route('admin/offer')->withInput()->with('error', trans('offer/message.error.update'));
        }
    }

    /**
     * Remove offer.
     *
     * @param Offer $offer
     * @return Response
     */
    public function getModalDelete(Offer $offer) {
        $model = 'offer';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.offer.delete', ['id' => $offer->id]);
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            $error = trans('offer/message.error.delete', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Offer $offer
     * @return Response
     */
    public function destroy(Offer $offer) {

        if ($offer->delete()) {
            return redirect('admin/offer')->with('success', trans('offer/message.success.delete'));
        } else {
            return Redirect::route('admin/offer')->withInput()->with('error', trans('offer/message.error.delete'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OfferCommentRequest $request
     * @param Offer $offer
     *
     * @return Response
     */
    public function storeComment(OfferCommentRequest $request, Offer $offer) {
        $offercooment = new OfferComment($request->all());
        $offercooment->offer_id = $offer->id;
        $offercooment->save();

        return redirect('admin/offer/' . $offer->id . '/show');
    }

}
