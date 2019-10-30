<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use View;
use DB;
use Cache;

class SurveyController extends Controller {

    public function index() {
        return view('pages.survey.index');
    }

    public function store(Request $request) {
        $input = $request->except(['submit', '_token', 'status']);
        if (!empty($input)) {
            foreach ($input as $key => $value) {
                if (is_array($value)) {
                    if (!empty($value['ans']) || !empty($value['com'])) {
                        if (!empty($value['ans']) && is_array($value['ans'])) {
                            $data[$key] = implode('-', $value['ans']) . '|' . $value['other'];
                        } else {
                            $data[$key] = !empty($value['ans']) ? $value['ans'] . '|' . $value['com'] : $value['com'];
                        }
                    }
                } else if (!empty($value)) {
                    $data[$key] = $value;
                }
            }

            $id = DB::table('survey_answers')->insert([$data]);

            return redirect()->route('survey.index', ['status' => !empty($id) ? 'success' : 'failed']);
        }
        return redirect()->route('survey.index');
    }

    public function report(Request $request) {


        $questions = [
            'que_1' => '1. How satisfied are you with the functionality of your Living area?',
            'que_2' => '2. How satisfied are you with the functionality of your Dining area?',
            'que_3' => '3. How satisfied are you with the functionality of your Bedroom area?',
            'que_4' => '4. How satisfied are you with the functionality of your Bathroom area?',
            'que_5' => '5. How satisfied are you with the functionality of your Guest bathroom area?',
            'que_6' => '6. How satisfied are you with the functionality of your Kitchen area?',
            'que_7' => '7. How satisfied are you with the finishing of your apartment?',
            'que_8' => '8. How satisfied are you with the A/C and Cooling?',
            'que_9' => '9. How satisfied are you with the Lighting and Light Levels?',
            'que_10' => '10. How satisfied are you with the storage areas in your apartment?',
            'que_11' => '11. Overall, How satisfied are you with the apartment quality?',
            'que_12' => '12. Which areas do you believe should have been designed differently for your apartment?',
            'que_13' => '13. Do you like the provided appliances?', 'que_14' => '14. How do you feel about the architecture of the building?',
            'que_15' => '15. How do you feel about the accessibility of the carpark?',
            'que_16' => '16. How do you feel about the design of the reception?',
            'que_17' => '17. How do you feel about the landscape and garden of your building?',
            'que_18' => '18. Are you satisfied with the provided facilities in your building?',
            'que_19' => '19. What type of facilities would you prefer additionally?',
            'que_20' => '20. What do you like most about your apartment building?',
            'que_21' => '21. What do you like least about your apartment building?',
            'que_a' => 'a. Maintenance – Team Responsiveness',
            'que_b' => 'b. Maintenance – Team Friendliness ',
            'que_c' => 'c. Maintenance – Team Competence ',
            'que_d' => 'd. Landscape/Garden Maintenance ',
            'que_e' => 'e. Cleanliness of Hallways/Lobbies ',
            'que_f' => 'f. On-Site Management – Competence ',
            'que_g' => 'g. On-Site Management – Friendliness ',
            'que_h' => 'h. On-Site Management – Responsiveness'];

        $answers = [
            5 => 'Excellent',
            4 => 'Very Satisfied',
            3 => 'Satisfied',
            2 => 'Below Average',
            1 => 'Unsatisfied',
        ];


        if (empty($request->password) || (!empty($request->password) && $request->password != 'Survey@2018')) {
            return view('pages.survey.report', ['questions' => [], 'surveys' => [], 'msg' => 'Invalid Access Key']);
        }

        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }

        $query = DB::table('survey_answers');
        if (!empty($request->question)) {
            $query->select($request->question, 'created_at', 'id');
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

        $surveys = $query->orderBy('id', 'desc')->paginate($request->list);

        $data = ['surveys' => $surveys, 'questions' => $questions, 'answers' => $answers, 'msg' => ''];

        //check page
        set_cache_page($request->fullUrl(), view("pages.survey.report", $data)->render());

        return view('pages.survey.report', $data);
    }

}
