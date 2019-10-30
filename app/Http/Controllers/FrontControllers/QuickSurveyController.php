<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use View;
use DB;
use Cache;

class QuickSurveyController extends Controller {

    public $locale;

    /**
     * Initializer.
     *
     * @return void
     */
    public function __construct(Request $request) {
        $this->locale = get_locale($request->segment(1));
        \App::setLocale($this->locale);
    }

    public function indexlp() {
        return view("pages.quick-survey.index");
    }

    public function index() {
        return view("pages.quick-survey.index-{$this->locale}");
    }

    public function store(Request $request) {
        $input = $request->except(['submit', '_token', 'status']);
        if (!empty($input)) {
            foreach ($input as $key => $value) {
                if (!empty($value)) {
                    $data[$key] = $value;
                }
            }
            $data['type'] = 'quick';
            $data['created'] = date('Y-m-d');
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $id = DB::table('survey_answers')->insert([$data]);

            return redirect()->route("quick-survey.index", ['status' => !empty($id) ? 'success' : 'failed']);
        }
        return redirect()->route("quick-survey.index");
    }

    public function report(Request $request) {


        $questions = [
            'que_1' => '1. How would you rate the project knowledge and response time of our Sales Representatives?',
            'que_2' => '2. What do you think of our Range of Properties?',
            'que_3' => '3. How would you rate our Payment Plans?',
            'que_4' => '4. How would you rate our Cityscape Offers?',
            'que_5' => '5. Where did you hear about our Cityscape Offers?',
        ];

        $answers = [
            5 => 'Excellent',
            4 => 'Good',
            3 => 'Neutral',
            2 => 'Poor',
            1 => 'Very Poor',
        ];

        $nationalities = DB::table('survey_answers')->select('nationality')->where('nationality', '!=', '')->groupBy('nationality')->get();
        if (empty($request->password) || (!empty($request->password) && $request->password != 'Survey@2018')) {
            return view('pages.quick-survey.report', ['questions' => [], 'surveys' => [], 'msg' => 'Invalid Access Key']);
        }

        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }

        $query = DB::table('survey_answers');
        if (!empty($request->question)) {
            $query->select($request->question, 'created_at', 'id', 'name', 'email', 'phone', 'nationality');
        }
        if (!empty($request->nationality)) {
            $query->where('nationality', $request->nationality);
        }
        if (!empty($request->source)) {
            $query->where('que_5', $request->source);
        }
        if (empty($request->start_date) && empty($request->end_date)) {
            $query->whereBetween('created', [date('Y-m-d', strtotime(date('Y-m-d') . " -90 day")), date('Y-m-d')]);
        }
        if (!empty($request->start_date) && !empty($request->end_date)) {
            $query->whereBetween('created', [date("Y-m-d", strtotime($request->start_date)), date("Y-m-d", strtotime($request->end_date))]);
        } elseif (!empty($request->start_date)) {
            $query->where('created', '>=', date("Y-m-d", strtotime($request->start_date)));
        } elseif (!empty($request->end_date)) {
            $query->where('created', '<=', date("Y-m-d", strtotime($request->end_date)));
        }

        $surveys = $query->where('type', 'quick')->orderBy('id', 'desc')->paginate($request->list);
        $count = DB::table('survey_answers')->where('type', 'quick')->count();

        $data = ['surveys' => $surveys, 'questions' => $questions, 'answers' => $answers, 'msg' => '', 'count' => $count, 'nationalities' => $nationalities];

        //check page
        set_cache_page($request->fullUrl(), view("pages.quick-survey.report", $data)->render());

        return view('pages.quick-survey.report', $data);
    }

}
