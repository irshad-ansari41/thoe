<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Response;
use DB;
use Cache;
use File;

class AdminSaleCenterController extends Controller {

    public $nearby;
    public $amenities;

    public function __construct() {

        $this->nearby = [
            'Al Khail Road',
            'Al Maktoum International Airport',
            'Al Maktoum Intl. Airport',
            'Aquaventure Waterpark',
            'City Centre Al Me’aisem',
            'Close distance to Abu Dhabi',
            'Discovery Pavilion',
            'Downtown Dubai ',
            'Dubai Creek',
            'Dubai Festival City',
            'Dubai International Airport',
            'Dubai Mall',
            'Dubai Marina',
            'Dubai skyline',
            'Hotel,  Dubai Marina',
            'Ibn Battuta Mall',
            'JBR Walk ',
            'Jebel Ali Metro station ',
            'Jumeirah Lake Towers',
            'Lush maritime lands ',
            'Meydan One Mall',
            'Motor City',
            'Shiekh Mohammed Bin Zayed Road',
            'Vicinity of JAFZA ',
            'Wafi Mall',];

        $this->amenities = [
            '1 line of sea',
            'Air conditioning',
            'BBQ Seating',
            'BOCCE',
            'City Views',
            'Garage / Parking',
            'Gym',
            'Jacuzzi',
            'Lounge',
            'Outdoor play',
            'Pets agility',
            'Sauna',
            'Swimming pool',
            'Views to park',
            'Yoga zone',
            'ZEN Garden'];
    }

    /**
     * Display a listing of the Amenity.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        
    }

    /**
     * 
     * @param type $minutes
     * @return type
     */
    public function get_locations($return = null) {
        $minutes = 1;
        $locations = Cache::remember('sc_locations', $minutes, function () {
                    return DB::table('sc_locations')->get();
                });
        if (!empty($return)) {
            return ['locations' => $locations, 'count' => count($locations)];
        }
        return view('admin.sale-center.location', ['locations' => $locations, 'count' => count($locations)]);
    }

    /**
     * 
     * @param type $minutes
     * @return type
     */
    public function get_communities($return = null) {
        $minutes = 1;
        $communities = Cache::remember('sc_communities', $minutes, function () {
                    return DB::table('sc_communities')
                                    ->leftjoin('sc_locations', 'sc_locations.id', '=', 'sc_communities.location_id')
                                    ->select('sc_communities.id', 'sc_communities.CommunityID', 'sc_communities.CommunityName', 'sc_communities.status', 'sc_locations.LocationID', 'sc_locations.LocationName')
                                    ->get();
                });
        if (!empty($return)) {
            return ['communities' => $communities, 'count' => count($communities),];
        }
        return view('admin.sale-center.community', ['communities' => $communities, 'count' => count($communities),]);
    }

    /**
     * 
     * @param type $minutes
     * @return type
     */
    public function get_properties($return = null) {

        $minutes = 1;
        $get = filter_input_array(INPUT_GET);
        $totalproperties = Cache::remember('sc_properties_count', $minutes, function () {
                    return DB::table('sc_properties')->count();
                });
        $query = DB::table('sc_properties')
                ->leftjoin('sc_communities', 'sc_communities.id', '=', 'sc_properties.community_id')
                ->leftjoin('sc_locations', 'sc_locations.id', '=', 'sc_communities.location_id')
                ->select('sc_properties.*', 'sc_properties.property_old_id', 'sc_properties.PropertyID', 'sc_properties.PropertyName', 'sc_properties.status', 'sc_locations.LocationID', 'sc_locations.LocationName', 'sc_communities.CommunityName', 'sc_communities.CommunityID');

        if (!empty($get['str'])) {
            $query->where('sc_properties.PropertyName', 'like', "%{$get['str']}%");
        }
        if (!empty($get['community_id'])) {
            $query->where('sc_properties.community_id', $get['community_id']);
        }
        if (!empty($get['property_id'])) {
            $query->where('sc_properties.id', $get['property_id']);
        }

        $properties = $query->orderBy('sc_properties.PropertyName', 'asc')->get();
        foreach ($properties as $rows) {
            $unit = DB::table('sc_units')->where('property_id', $rows->id)->first();
            $data = [
                'city' => !empty($unit->city) ? $unit->city : " ",
                'bayut_locality' => !empty($unit->locality) ? $unit->locality : " ",
                'bayut_sub_locality' => !empty($unit->sub_locality) ? $unit->sub_locality : " ",
                'bayut_tower_name' => !empty($unit->tower_name) ? $unit->tower_name : " ",
                'diz_locality' => !empty($unit->locality) ? $unit->locality : " ",
                'diz_sub_locality' => !empty($unit->sub_locality) ? $unit->sub_locality : " ",
                'diz_tower_name' => !empty($unit->tower_name) ? $unit->tower_name : " ",
                'pf_locality' => !empty($unit->locality) ? $unit->locality : " ",
                'pf_sub_locality' => !empty($unit->sub_locality) ? $unit->sub_locality : " ",
                'pf_tower_name' => !empty($unit->tower_name) ? $unit->tower_name : " ",
            ];
            //print_r($data);
            DB::table('sc_properties')->where('id', $rows->id)->update($data);
        }
        $old_properties = Cache::remember('tbl_properties', $minutes, function () {
                    return DB::table('tbl_properties')->select('id', 'title_en')->orderBy('title_en', 'asc')->get();
                });
        $communities = Cache::remember('sc_communities', $minutes, function () {
                    return DB::table('sc_communities')
                                    ->leftjoin('sc_locations', 'sc_locations.id', '=', 'sc_communities.location_id')
                                    ->select('sc_communities.id', 'sc_communities.CommunityID', 'sc_communities.CommunityName', 'sc_communities.status', 'sc_locations.LocationID', 'sc_locations.LocationName')
                                    ->get();
                });

        if (!empty($get['id']) && !empty($get['pmap'])) {
            DB::table('sc_properties')->where('id', $get['id'])->update(['property_old_id' => $get['pmap']]);
        }
        if (!empty($get['id']) && !empty($get['cmap'])) {
            DB::table('sc_properties')->where('id', $get['id'])->update(['community_id' => $get['cmap']]);
        }

        $city = Cache::remember('sc_properties_city_' . date('s'), 1, function () {
                    return DB::table('sc_properties')->select('city')->groupBy('city')->get();
                });

        $bayut_locality = Cache::remember('sc_properties_b_locality_' . date('s'), 1, function () {
                    return DB::table('sc_properties')->select('bayut_locality')->groupBy('bayut_locality')->get();
                });
        $bayut_sub_locality = Cache::remember('sc_properties_b_sub_locality_' . date('s'), 1, function () {
                    return DB::table('sc_properties')->select('bayut_sub_locality')->groupBy('bayut_sub_locality')->get();
                });
        $bayut_tower_name = Cache::remember('sc_properties_b_tower_name_' . date('s'), 1, function () {
                    return DB::table('sc_properties')->select('bayut_tower_name')->groupBy('bayut_tower_name')->get();
                });

        $pf_locality = Cache::remember('sc_properties_p_locality_' . date('s'), 1, function () {
                    return DB::table('sc_properties')->select('pf_locality')->groupBy('pf_locality')->get();
                });
        $pf_sub_locality = Cache::remember('sc_properties_p_sub_locality_' . date('s'), 1, function () {
                    return DB::table('sc_properties')->select('pf_sub_locality')->groupBy('pf_sub_locality')->get();
                });
        $pf_tower_name = Cache::remember('sc_properties_p_tower_name_' . date('s'), 1, function () {
                    return DB::table('sc_properties')->select('pf_tower_name')->groupBy('pf_tower_name')->get();
                });

        $diz_locality = Cache::remember('sc_properties_d_locality_' . date('s'), 1, function () {
                    return DB::table('sc_properties')->select('diz_locality')->groupBy('diz_locality')->get();
                });
        $diz_sub_locality = Cache::remember('sc_properties_d_sub_locality_' . date('s'), 1, function () {
                    return DB::table('sc_properties')->select('diz_sub_locality')->groupBy('diz_sub_locality')->get();
                });
        $diz_tower_name = Cache::remember('sc_properties_d_tower_name_' . date('s'), 1, function () {
                    return DB::table('sc_properties')->select('diz_tower_name')->groupBy('diz_tower_name')->get();
                });

        return view('admin.sale-center.property', ['properties' => $properties, 'count' => $totalproperties, 'old_properties' => $old_properties, 'communities' => $communities,
            'city' => $city, 'bayut_locality' => $bayut_locality, 'bayut_sub_locality' => $bayut_sub_locality, 'bayut_tower_name' => $bayut_tower_name,
            'pf_locality' => $pf_locality, 'pf_sub_locality' => $pf_sub_locality, 'pf_tower_name' => $pf_tower_name,
            'diz_locality' => $diz_locality, 'diz_sub_locality' => $diz_sub_locality, 'diz_tower_name' => $diz_tower_name]);
    }

    public function save_property_details(Request $request) {
        $input = $request->all();

        if (!empty($input['city'])) {
            $data = ['id' => $input['prop_id'], 'city' => $input['city']];
        }
        if (!empty($input['permit_no'])) {
            $data = ['id' => $input['prop_id'], 'permit_no' => $input['permit_no']];
        }

        /* Locality */
        if (!empty($input['bayut_locality'])) {
            $data = ['id' => $input['prop_id'], 'bayut_locality' => $input['bayut_locality']];
        }
        if (!empty($input['pf_locality'])) {
            $data = ['id' => $input['prop_id'], 'pf_locality' => $input['pf_locality']];
        }
        if (!empty($input['diz_locality'])) {
            $data = ['id' => $input['prop_id'], 'diz_locality' => $input['diz_locality']];
        }

        /* Sub Locality */
        if (!empty($input['bayut_sub_locality'])) {
            $data = ['id' => $input['prop_id'], 'bayut_sub_locality' => $input['bayut_sub_locality']];
        }
        if (!empty($input['pf_sub_locality'])) {
            $data = ['id' => $input['prop_id'], 'pf_sub_locality' => $input['pf_sub_locality']];
        }
        if (!empty($input['diz_sub_locality'])) {
            $data = ['id' => $input['prop_id'], 'diz_sub_locality' => $input['diz_sub_locality']];
        }

        /* Tower Name */
        if (!empty($input['bayut_tower_name'])) {
            $data = ['id' => $input['prop_id'], 'bayut_tower_name' => $input['bayut_tower_name']];
        }
        if (!empty($input['pf_tower_name'])) {
            $data = ['id' => $input['prop_id'], 'pf_tower_name' => $input['pf_tower_name']];
        }
        if (!empty($input['diz_tower_name'])) {
            $data = ['id' => $input['prop_id'], 'diz_tower_name' => $input['diz_tower_name']];
        }

        if (!empty($data['id'])) {
            DB::table('sc_properties')->where('id', $data['id'])->update($data);
        }
    }

    /**
     * 
     * @param type $minutes
     * @return type
     */
    public function get_CB_units($output = null) {
        $query = DB::table('sc_units');
        $query->leftjoin('sc_properties', 'sc_properties.id', '=', 'sc_units.property_id');
        $query->leftjoin('sc_communities', 'sc_communities.id', '=', 'sc_properties.community_id');
        $query->leftjoin('sc_locations', 'sc_locations.id', '=', 'sc_communities.location_id');
        $query->select('sc_units.*', 'sc_properties.PropertyID', 'sc_properties.PropertyName', 'sc_properties.property_old_id', 'sc_communities.CommunityName', 'sc_communities.CommunityID', 'sc_locations.LocationID', 'sc_locations.LocationName');

        $query->where('sc_units.status', 'Available');
        //$query->whereIn('sc_communities.CommunityName',  ['Jebel Ali Industrial Second']);
        $query->whereNotIn('sc_communities.CommunityName', ['Al MERKADH', 'MEYDAN AVENUE']);
        //$query->where('sc_units.Type', 'Residential');
        $query->orderBy('sc_units.price', 'ASC');
        $units = $query->get();
        $short = $full = [];
        foreach ($units as $unit) {
            //$records[$unit->property_id][$unit->Bedrooms][] = $unit;

            $short[$unit->CommunityName][$unit->Type][$unit->Bedrooms] = $unit;

            $full[$unit->CommunityName][$unit->PropertyName][$unit->Type][$unit->Bedrooms] = $unit;
        }

        if ($output == 'json') {
            return Response::json(array_values($full));
        }
        return view('admin.sale-center.export-xml', ['full' => $full, 'short' => $short]);
    }

    /**
     * 
     * @param type $minutes
     * @return type
     */
    public function get_units(Request $request) {
        $minutes = 1;
        if (!empty($request->input('addtowishlist'))) {
            $this->addToWishList($request->all());
        }

        $query = DB::table('sc_units');
        $query->leftjoin('sc_properties', 'sc_properties.id', '=', 'sc_units.property_id');
        $query->leftjoin('sc_communities', 'sc_communities.id', '=', 'sc_properties.community_id');
        $query->leftjoin('sc_locations', 'sc_locations.id', '=', 'sc_communities.location_id');
        $query->select('sc_units.*', 'sc_properties.PropertyID', 'sc_properties.PropertyName', 'sc_communities.CommunityName', 'sc_communities.CommunityID', 'sc_locations.LocationID', 'sc_locations.LocationName');
        //$query->where('wishlist', '0');
        if (!empty($request->property_id)) {
            $query->where('sc_units.property_id', $request->property_id);
        }
        if (!empty($request->str) && is_numeric($request->str)) {
            $query->where('sc_units.UnitNo', 'like', "%$request->str%");
        } elseif (!empty($request->str)) {
            $query->where('sc_properties.PropertyName', 'like', "%$request->str%");
        }
        if (!empty($request->community_id)) {
            $query->where('sc_properties.community_id', $request->community_id);
        }
        if (!empty($request->status)) {
            $query->where('sc_units.status', $request->status);
        }
        if (!empty($request->view)) {
            $query->where('sc_units.view', 'like', "%$request->view%");
        }
        if (!empty($request->ptype)) {
            $query->where('sc_units.Type', $request->ptype);
        }
        if (!empty($request->utype)) {
            $query->where('sc_units.bedrooms', $request->utype);
        }
        if (!empty($request->pSort)) {
            $query->orderBy('sc_units.price', $request->pSort);
        }
        if (!empty($request->sSort)) {
            $query->orderBy('sc_units.UnitArea', $request->sSort);
        }

        $autounits = [];
        if (!empty($request->auto_generate) || $request->input('exportAutoUnits')) {

            DB::table('sc_units')->where('Bedrooms', 'like', '%STUDIO%')->update(['Bedrooms' => 'Studio']);
            DB::table('sc_units')->where('Bedrooms', 'like', '%PENTHOUSE%')->update(['Bedrooms' => 'Penthouse']);
            DB::table('sc_units')->where('Bedrooms', 'like', '%1 BEDROOM%')->update(['Bedrooms' => '1BR']);
            DB::table('sc_units')->where('Bedrooms', 'like', '%2 BEDROOM%')->update(['Bedrooms' => '2BR']);
            DB::table('sc_units')->where('Bedrooms', 'like', '%3 BEDROOM + MAID%')->update(['Bedrooms' => '3BR + Maid']);
            DB::table('sc_units')->where('Bedrooms', 'like', '%3 BEDROOM-DUPLEX%')->update(['Bedrooms' => '3BR - Duplex']);
            DB::table('sc_units')->where('Bedrooms', 'like', '%3 BEDROOM%')->update(['Bedrooms' => '3BR']);

            $autounits = Cache::remember('sc_units_auto_' . date('s'), $minutes, function () use($query) {
                        $query->where('sc_units.status', 'Available');
                        //$query->where('sc_units.Type', 'Residential');
                        $query->orderBy('sc_units.price', 'ASC');
                        $units = $query->get();
                        foreach ($units as $unit) {
                            $records[$unit->property_id][$unit->Bedrooms][] = $unit;
                        }
                        return $records;
                    });
            if ($request->input('exportAutoUnits')) {
                return view('admin.sale-center.export-auto', ['units' => $autounits]);
            }
        }



        $totalunits = Cache::remember('sc_units_' . date('s'), $minutes, function () use($query) {
                    return $query->count();
                });

        $totalwishlist = Cache::remember('sc_units_wish' . date('s'), $minutes, function () {
                    return DB::table('sc_units')->where('wishlist', 1)->count();
                });

        $status = Cache::remember('sc_units_status_' . date('i'), $minutes, function () {
                    return DB::table('sc_units')->select('status')->groupBy('status')->get();
                });

        $unitTypes = Cache::remember('sc_units_unit_' . date('i'), $minutes, function () {
                    return DB::table('sc_units')->select('Bedrooms')->groupBy('Bedrooms')->get();
                });

        $properties = Cache::remember('wish_sc_properties', 30, function () {
                    return DB::table('sc_properties')
                                    ->leftjoin('sc_communities', 'sc_communities.id', '=', 'sc_properties.community_id')
                                    ->select('sc_properties.id', 'sc_properties.property_old_id', 'sc_properties.PropertyID', 'sc_properties.PropertyName', 'sc_properties.status', 'sc_communities.CommunityName', 'sc_communities.CommunityID')
                                    ->groupBy('sc_properties.PropertyName')
                                    ->orderBy('sc_properties.PropertyName')
                                    ->get();
                });

        $communities = Cache::remember('sc_communities', 30, function () {
                    return DB::table('sc_communities')
                                    ->leftjoin('sc_locations', 'sc_locations.id', '=', 'sc_communities.location_id')
                                    ->select('sc_communities.id', 'sc_communities.CommunityID', 'sc_communities.CommunityName', 'sc_communities.status', 'sc_locations.LocationID', 'sc_locations.LocationName')
                                    ->get();
                });

        $units = $query->paginate(2000);


        return view('admin.sale-center.unit', ['count' => $totalunits, 'totalwishlist' => $totalwishlist, 'status' => $status, 'unitTypes' => $unitTypes, 'autounits' => $autounits, 'units' => $units, 'communities' => $communities, 'properties' => $properties]);
    }

    function addToWishList($post) {
        if (!empty($post['wishlist'])) {
            foreach ($post['wishlist'] as $value) {
                DB::table('sc_units')->where('id', $value)->update(['wishlist' => 1, 'bayut' => 1, 'pf' => 1, 'dubizzle1' => 1, 'dubizzle2' => 1]);
            }
        }
    }

    function removeFromWishList($post) {
        if (!empty($post['wishlist'])) {
            foreach ($post['wishlist'] as $value) {
                DB::table('sc_units')->where('id', $value)->update(['title' => '', 'description' => '', 'wishlist' => 0, 'bayut' => 0, 'pf' => 0, 'dubizzle1' => 0, 'dubizzle2' => 0]);
            }
        }
    }

    /**
     * Store a newly created Amenity in storage.
     *
     * @param CreateAmenityRequest $request
     *
     * @return Response
     */
    public function wishlist(Request $request) {

        if ($request->input('exportPropertyFeed')) {
            $query = DB::table('sc_units');
            $query->leftjoin('sc_properties', 'sc_properties.id', '=', 'sc_units.property_id');
            $query->leftjoin('sc_communities', 'sc_communities.id', '=', 'sc_properties.community_id');
            $query->leftjoin('sc_locations', 'sc_locations.id', '=', 'sc_communities.location_id');
            $query->select('sc_units.*', 'sc_properties.PropertyName', 'sc_communities.CommunityName', 'sc_locations.LocationName');
            $query->where('wishlist', '1');
            return view('admin.sale-center.export', ['units' => $query->get()]);
        }

        if (!empty($request->input('generatePropertyFeed'))) {
            DB::table('sc_units')->where('Bedrooms', 'like', '%STUDIO%')->update(['Bedrooms' => 'Studio']);
            DB::table('sc_units')->where('Bedrooms', 'like', '%PENTHOUSE%')->update(['Bedrooms' => 'Penthouse']);
            DB::table('sc_units')->where('Bedrooms', 'like', '%1 BEDROOM%')->update(['Bedrooms' => '1BR']);
            DB::table('sc_units')->where('Bedrooms', 'like', '%2 BEDROOM%')->update(['Bedrooms' => '2BR']);
            DB::table('sc_units')->where('Bedrooms', 'like', '%3 BEDROOM + MAID%')->update(['Bedrooms' => '3BR + Maid']);
            DB::table('sc_units')->where('Bedrooms', 'like', '%3 BEDROOM-DUPLEX%')->update(['Bedrooms' => '3BR - Duplex']);
            DB::table('sc_units')->where('Bedrooms', 'like', '%3 BEDROOM%')->update(['Bedrooms' => '3BR']);
            $this->bayut_xml_feed();
            $this->propert_finder_xml_feed();
            $this->dubizzle_xml_feed_1();
            $this->dubizzle_xml_feed_2();
        }

        $total_bayut = Cache::remember('sc_bayut_wish_' . date('s'), 1, function () {
                    return DB::table('sc_units')->where('bayut', 1)->where('wishlist', 1)->count();
                });
        $total_pf = Cache::remember('sc_pf_wish_' . date('s'), 1, function () {
                    return DB::table('sc_units')->where('pf', 1)->where('wishlist', 1)->count();
                });
        $total_dubizzle1 = Cache::remember('sc_dubizzle1_wish_' . date('s'), 1, function () {
                    return DB::table('sc_units')->where('dubizzle1', 1)->where('wishlist', 1)->count();
                });
        $total_dubizzle2 = Cache::remember('sc_dubizzle2_wish_' . date('s'), 1, function () {
                    return DB::table('sc_units')->where('dubizzle2', 1)->where('wishlist', 1)->count();
                });
        $status = Cache::remember('sc_units_status_' . date('i'), 30, function () {
                    return DB::table('sc_units')->select('status')->groupBy('status')->get();
                });


        $query = DB::table('sc_units');
        $query->leftjoin('sc_properties', 'sc_properties.id', '=', 'sc_units.property_id');
        $query->leftjoin('sc_communities', 'sc_communities.id', '=', 'sc_properties.community_id');
        $query->leftjoin('sc_locations', 'sc_locations.id', '=', 'sc_communities.location_id');
        $query->select('sc_units.*', 'sc_properties.PropertyID', 'sc_properties.PropertyName', 'sc_communities.CommunityName', 'sc_communities.CommunityID', 'sc_locations.LocationID', 'sc_locations.LocationName');
        $query->where('wishlist', '1');

        if (!empty($request->str)) {
            $query->where('sc_properties.PropertyName', 'like', "%$request->str%");
        }
        if (!empty($request->unit_ids)) {
            $query->whereIn('sc_units.id', explode(',', $request->unit_ids));
        }
        if (!empty($request->refno)) {
            $query->where('sc_units.RefNo', 'like', "%$request->refno%");
        }
        if (!empty($request->property_id)) {
            $query->where('sc_units.property_id', $request->property_id);
        }
        if (!empty($request->community_id)) {
            $query->where('sc_properties.community_id', $request->community_id);
        }
        if (!empty($request->status)) {
            $query->where('sc_units.status', $request->status);
        }
        if (!empty($request->view)) {
            $query->where('sc_units.view', 'like', "%$request->view%");
        }
        if (!empty($request->bedrooms)) {
            $query->where('sc_units.bedrooms', $request->bedrooms);
        }
        if (!empty($request->portals)) {
            $query->where('sc_units.' . $request->portals, 1);
        }
        if (!empty($request->price) && !empty($request->mode)) {
            $query->where('sc_units.price', ($request->mode == 'less' ? '<=' : '>='), $request->price);
        }
        if (!empty($request->order)) {
            $query->orderBy('sc_units.price', $request->order);
        }



        $totalunits = Cache::remember('sc_units_wish_' . date('s'), 1, function () use($query) {
                    return $query->count();
                });

        $properties = Cache::remember('wish_sc_properties', 30, function () {
                    return DB::table('sc_properties')
                                    ->leftjoin('sc_communities', 'sc_communities.id', '=', 'sc_properties.community_id')
                                    ->select('sc_properties.id', 'sc_properties.property_old_id', 'sc_properties.PropertyID', 'sc_properties.PropertyName', 'sc_properties.status', 'sc_communities.CommunityName', 'sc_communities.CommunityID')
                                    ->groupBy('sc_properties.PropertyName')
                                    ->orderBy('sc_properties.PropertyName')
                                    ->get();
                });

        $communities = Cache::remember('sc_communities', 30, function () {
                    return DB::table('sc_communities')
                                    ->leftjoin('sc_locations', 'sc_locations.id', '=', 'sc_communities.location_id')
                                    ->select('sc_communities.id', 'sc_communities.CommunityID', 'sc_communities.CommunityName', 'sc_communities.status', 'sc_locations.LocationID', 'sc_locations.LocationName')
                                    ->get();
                });

        $units = $query->get();
        return view('admin.sale-center.wishlist', ['count' => $totalunits, 'status' => $status, 'total_bayut' => $total_bayut, 'total_pf' => $total_pf, 'total_dubizzle1' => $total_dubizzle1, 'total_dubizzle2' => $total_dubizzle2, 'units' => $units,
            'communities' => $communities, 'properties' => $properties, 'nearby' => $this->nearby]);
    }

    public function update_wishlist($post) {
        if (!empty($post['portal'])) {
            foreach ($post['portal'] as $key => $value) {
                shuffle($value['images']);
                $data = [
                    'bayut' => !empty($value['bayut']) ? 1 : '0',
                    'pf' => !empty($value['pf']) ? 1 : '0',
                    'dubizzle1' => !empty($value['dubizzle1']) ? 1 : '0',
                    'dubizzle2' => !empty($value['dubizzle2']) ? 1 : '0',
                    'title' => !empty($value['title']) ? $value['title'] : '0',
                    'description' => !empty($value['description']) ? $value['description'] : '0',
                    'images' => !empty($value['images']) ? implode('|', $value['images']) : '0',
                ];
                DB::table('sc_units')->where('id', $key)->update($data);
                sleep(1);
            }
        }
    }

    public function save_unit_details(Request $request) {
        $input = $request->all();

        if (!empty($input['bayut'])) {
            $data = ['id' => $input['bayut'], 'bayut' => ($input['checked'] == 'true' ? 1 : 0)];
        }
        if (!empty($input['pf'])) {
            $data = ['id' => $input['pf'], 'pf' => ($input['checked'] == 'true' ? 1 : 0)];
        }
        if (!empty($input['pf'])) {
            $data = ['id' => $input['pf'], 'dubizzle1' => ($input['checked'] == 'true' ? 1 : 0)];
        }
        if (!empty($input['pf'])) {
            $data = ['id' => $input['pf'], 'dubizzle2' => ($input['checked'] == 'true' ? 1 : 0)];
        }
        if (!empty($input['title'])) {
            $data = ['id' => $input['unitId'], 'title' => $input['title']];
        }
        if (!empty($input['description'])) {
            $data = ['id' => $input['unitId'], 'description' => $input['description']];
        }

        if (!empty($data['id'])) {
            DB::table('sc_units')->where('id', $data['id'])->update($data);
        }

        if (!empty($input['unitIds'])) {
            DB::table('sc_units')->whereIn('id', explode(',', $input['unitIds']))->update(['wishlist' => 0, 'bayut' => 0, 'pf' => 0, 'dubizzle1' => 0, 'dubizzle2' => 0, 'title' => '', 'description' => '']);
        }

        if (!empty($input['bayutIds'])) {
            DB::table('sc_units')->whereIn('id', explode(',', $input['bayutIds']))->update(['bayut' => $input['action']]);
        }

        if (!empty($input['pfIds'])) {
            DB::table('sc_units')->whereIn('id', explode(',', $input['pfIds']))->update(['pf' => $input['action']]);
        }

        if (!empty($input['dubizzle1Ids'])) {
            DB::table('sc_units')->whereIn('id', explode(',', $input['dubizzle1Ids']))->update(['dubizzle1' => $input['action']]);
        }

        if (!empty($input['dubizzle2Ids'])) {
            DB::table('sc_units')->whereIn('id', explode(',', $input['dubizzle2Ids']))->update(['dubizzle2' => $input['action']]);
        }
    }

    public function update_title_desc($post) {
        if (!empty($post['id']) && !empty($post['title'])) {
            $data['title'] = $post['title'];
        }
        if (!empty($post['id']) && !empty($post['description'])) {
            $data['description'] = $post['description'];
        }

        DB::table('sc_units')->where('id', $post['id'])->update(['title' => $post['title'], 'description' => $post['description']]);

        if (!empty($post['property_id'])) {
            DB::table('sc_units')->where('property_id', $post['property_id'])->update([
                //'images' => implode('|', !empty($post['images']) ? $post['images'] : []),
                'nearby' => implode('|', !empty($post['nearby']) ? $post['nearby'] : []),
                'amenities' => implode('|', !empty($post['amenities']) ? $post['amenities'] : []),
                'video' => $post['video'],
                'view360' => $post['view360'],
                    /* 'city' => $post['city'],
                      'locality' => $post['locality'],
                      'sub_locality' => $post['sub_locality'],
                      'tower_name' => $post['tower_name'],
                      'permit_no' => $post['permit_no'], */
            ]);
        }
    }

    public function wishlist_edit(Request $request, $id) {


        if ($request->input('submit')) {
            $this->update_wishlist($request->all());
            $this->update_title_desc($request->all());
        }

        $query = DB::table('sc_units');
        $query->leftjoin('sc_properties', 'sc_properties.id', '=', 'sc_units.property_id');
        $query->leftjoin('sc_communities', 'sc_communities.id', '=', 'sc_properties.community_id');
        $query->leftjoin('sc_locations', 'sc_locations.id', '=', 'sc_communities.location_id');
        $query->select('sc_units.*', 'sc_properties.PropertyID', 'sc_properties.PropertyName', 'sc_communities.CommunityName', 'sc_communities.CommunityID', 'sc_locations.LocationID', 'sc_locations.LocationName');
        $unit = $query->where('sc_units.id', $id)->first();
        //$unittype= $unit->Bedrooms == "Studio" ? [1,0] : ($unit->Bedrooms == "1BR"?[0,2]:($unit->Bedrooms == "2BR"?[0,3]:($unit->Bedrooms == "3BR"?[0,4]:0)));
        $unittype = $unit->Bedrooms == "Studio" ? [1, 0] : [0, 2, 3, 4];
        $property_old_id = DB::table('sc_properties')->where('id', $unit->property_id)->value('property_old_id');
        $property = DB::table('tbl_properties')->where('id', $property_old_id)->first();
        $project = db::table('tbl_projects')->where('id', $property->project_id)->where('status', '1')->orderBy("id", "ASC")->first();
        $galleries = DB::table('tbl_property_gallery')->where('property_id', $property_old_id)->where('status', '1')->whereIn('unit_type_id', $unittype)->orderBy("id", "DESC")->get();
        foreach ($galleries as $value) {
            $images[] = "https://azizidevelopments.com/assets/images/properties/{$project->gallery_location}/{$property->gallery_location}/$value->image";
        }



        return view('admin.sale-center.edit', ['unit' => $unit, 'property' => $property, 'images' => $images, 'nearby' => $this->nearby, 'amenities' => $this->amenities,]);
    }

    public function strip_all_tags($string) {
        /* $string = preg_replace('@<(script|style)[^>]*?>.*?</\\1>@si', '', $string); */
        //$string = strip_tags($string,'<br><br/>');
        //$string = preg_replace('/[\r\n\t ]+/', ' ', $string);
        $string = nl2br($string, false);
        $string = str_replace(['&', '<br/>', '<br>'], ['&amp;', "<br/>", "<br/>"], $string);
        return trim($string);
    }

    public function bayut_xml_feed() {

        $query = DB::table('sc_units');
        $query->leftjoin('sc_properties', 'sc_properties.id', '=', 'sc_units.property_id');
        $query->leftjoin('sc_communities', 'sc_communities.id', '=', 'sc_properties.community_id');
        $query->leftjoin('sc_locations', 'sc_locations.id', '=', 'sc_communities.location_id');
        $query->select('sc_units.*', 'sc_properties.PropertyID', 'sc_properties.PropertyName', 'sc_communities.CommunityName', 'sc_communities.CommunityID', 'sc_locations.LocationID', 'sc_locations.LocationName');
        $units = $query->where('bayut', 1)->limit(50)->get();

        $day = date('d');
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<Properties>';
        $sep = "\n";
        foreach ($units as $unit) {

            $sc_property = DB::table('sc_properties')->where('id', $unit->property_id)->first();
            $property = DB::table('tbl_properties')->where('id', $sc_property->property_old_id)->first();
            if (!empty($property)) {

                $bed = self::getBedrooms($unit->Bedrooms);
                $bath = self::getBathrooms($unit->Bedrooms);
                $images = getPropertiesImage($unit);
                $amenities = self::getAmenities($property, $unit);
                $video = self::getVideo($property, $unit);
                $floorplan = self::getFoorPlan($property, $unit);
                $sub_locality = self::getSubLocality($property, $unit);
                $area = self::getArea($property);

                $propertyfeed = [
                    'property_ref_no' => "{$unit->UnitID}/$day",
                    'permit_id' => $unit->permit_no,
                    'property_status' => 'Live',
                    'property_purpose' => 'Buy',
                    'property_type' => $unit->Category,
                    'property_size' => $unit->TotalArea,
                    'property_size_unit' => $unit->TotalArea,
                    'bedrooms' => $bed,
                    'bathroom' => $bath,
                    'features' => $amenities,
                    'images' => $images,
                    'videos' => $video,
                    'floor_plans' => $floorplan,
                    'off_plan' => 'Yes',
                    'city' => $sc_property->city,
                    'locality' => $sc_property->bayut_locality,
                    'sub_locality' => $sc_property->bayut_sub_locality,
                    'tower_name' => $sc_property->bayut_tower_name,
                    'last_updated' => date('y-m-d h:i:s'),
                    'price' => $unit->Price . ' AED',
                    'property_title' => self::strip_all_tags($unit->title),
                    'property_description' => self::strip_all_tags($unit->description),
                    'listing_agent' => 'Azizi Developments',
                    'listing_agent_phone' => '80029494',
                    'listing_agent_email' => 'info@azizidevelopments.com',
                ];


                $xml .= "<Property>" . $sep;
                $xml .= "<Property_Ref_No><![CDATA[" . trim($propertyfeed['property_ref_no']) . "]]></Property_Ref_No>" . $sep;
                $xml .= "<Permit_Number><![CDATA[" . trim($propertyfeed['permit_id']) . "]]></Permit_Number>" . $sep;
                $xml .= "<Property_Status><![CDATA[" . trim($propertyfeed['property_status']) . "]]></Property_Status>" . $sep;
                $xml .= "<Property_purpose><![CDATA[" . trim($propertyfeed['property_purpose']) . "]]></Property_purpose>" . $sep;
                $xml .= "<Property_Type><![CDATA[" . trim($propertyfeed['property_type']) . "]]></Property_Type>" . $sep;
                $xml .= "<Property_Size><![CDATA[" . trim(round($propertyfeed['property_size'])) . "]]></Property_Size>" . $sep;
                $xml .= "<Property_Size_Unit><![CDATA[SQFT]]></Property_Size_Unit>" . $sep;
                $xml .= "<Bedrooms><![CDATA[" . trim($propertyfeed['bedrooms']) . "]]></Bedrooms>" . $sep;
                $xml .= "<Bathroom><![CDATA[" . trim($propertyfeed['bathroom']) . "]]></Bathroom>" . $sep;
                $xml .= "<Features>" . $sep;
                foreach ($propertyfeed['features'] as $feature) {
                    $xml .= "<Feature><![CDATA[$feature]]></Feature>" . $sep;
                }
                $xml .= "</Features>" . $sep;
                $xml .= "<Images>" . $sep;
                foreach ($propertyfeed['images'] as $image) {
                    $xml .= "<Image><![CDATA[$image]]></Image>" . $sep;
                }
                $xml .= "</Images>" . $sep;
                $xml .= "<Videos><Video><![CDATA[" . trim($propertyfeed['videos']) . "]]></Video></Videos>" . $sep;
                $xml .= "<Floor_Plans><Floor_Plan><![CDATA[{$propertyfeed['floor_plans']}]]></Floor_Plan></Floor_Plans>" . $sep;
                $xml .= "<Off_Plan><![CDATA[" . trim($propertyfeed['off_plan']) . "]]></Off_Plan>" . $sep;
                $xml .= "<City><![CDATA[" . trim($propertyfeed['city']) . "]]></City>" . $sep;
                $xml .= "<Locality><![CDATA[" . trim($propertyfeed['locality']) . "]]></Locality>" . $sep;
                $xml .= "<Sub_Locality><![CDATA[" . trim($propertyfeed['sub_locality']) . "]]></Sub_Locality>" . $sep;
                $xml .= "<Tower_Name><![CDATA[" . trim($propertyfeed['tower_name']) . "]]></Tower_Name>" . $sep;
                $xml .= "<Last_Updated><![CDATA[" . trim($propertyfeed['last_updated']) . "]]></Last_Updated>" . $sep;
                $xml .= "<Price><![CDATA[" . trim($propertyfeed['price']) . "]]></Price>" . $sep;
                $xml .= "<Property_Title><![CDATA[" . trim($propertyfeed['property_title']) . "]]></Property_Title>" . $sep;
                $xml .= "<Property_Description><![CDATA[{$propertyfeed['property_description']}]]></Property_Description>" . $sep;
                $xml .= "<Listing_Agent><![CDATA[" . trim($propertyfeed['listing_agent']) . "]]></Listing_Agent>" . $sep;
                $xml .= "<Listing_Agent_Phone><![CDATA[" . trim($propertyfeed['listing_agent_phone']) . "]]></Listing_Agent_Phone>" . $sep;
                $xml .= "<Listing_Agent_Email><![CDATA[" . trim($propertyfeed['listing_agent_email']) . "]]></Listing_Agent_Email>" . $sep;
                $xml .= "</Property>" . $sep;
            }
        }
        $xml .= '</Properties>';
        $xmlcontent = preg_replace('/\s\s+/', '', $xml);
        file_put_contents(PUBLIC_PATH . '/uploads/property-feed-bayut.xml', $xmlcontent);
    }

    public function propert_finder_xml_feed() {
        $day = date('d');


        $query = DB::table('sc_units');
        $query->leftjoin('sc_properties', 'sc_properties.id', '=', 'sc_units.property_id');
        $query->leftjoin('sc_communities', 'sc_communities.id', '=', 'sc_properties.community_id');
        $query->leftjoin('sc_locations', 'sc_locations.id', '=', 'sc_communities.location_id');
        $query->select('sc_units.*', 'sc_properties.PropertyID', 'sc_properties.PropertyName', 'sc_communities.CommunityName', 'sc_communities.CommunityID', 'sc_locations.LocationID', 'sc_locations.LocationName');
        $units = $query->where('pf', 1)->limit(120)->get();
        $count = 120;
        $last_updated = date('Y-m-d H:i:s');
        $sep = "\n";
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . $sep;
        $xml .= '<list last_update="' . $last_updated . '" listing_count="' . $count . '">' . $sep;


        foreach ($units as $unit) {

            $sc_property = DB::table('sc_properties')->where('id', $unit->property_id)->first();
            $property = DB::table('tbl_properties')->where('id', $sc_property->property_old_id)->first();
            if (!empty($property)) {

                $bed = self::getBedrooms($unit->Bedrooms);
                $bath = self::getBathrooms($unit->Bedrooms);
                $images = getPropertiesImage($unit);
                $amenities = self::getAmenities($property, $unit);
                $video = self::getVideo($property, $unit);
                $view360 = self::getView360($property, $unit);
                $floorplan = self::getFoorPlan($property, $unit);
                $sub_locality = self::getSubLocality($property, $unit);
                $area = self::getArea($property);

                $propertyfeed = [
                    'property_ref_no' => "{$unit->UnitID}/$day",
                    'permit_id' => $unit->permit_no,
                    'property_status' => 'Live',
                    'property_purpose' => 'Buy',
                    'property_type' => $unit->Category,
                    'property_size' => $unit->TotalArea,
                    'property_size_unit' => $unit->TotalArea,
                    'bedrooms' => $bed == -1 ? 'Studio' : $bed,
                    'bathroom' => $bath,
                    'features' => $amenities,
                    'images' => $images,
                    'videos' => $video,
                    'floor_plans' => $floorplan,
                    'view360' => $view360,
                    'latitude' => $property->latitude,
                    'longitude' => $property->longitude,
                    'off_plan' => 'Yes',
                    'city' => $sc_property->city,
                    'locality' => $sc_property->pf_locality,
                    'sub_locality' => $sc_property->pf_sub_locality,
                    'tower_name' => $sc_property->pf_tower_name,
                    'last_updated' => $day,
                    'price' => round($unit->Price),
                    'property_title' => self::strip_all_tags($unit->title),
                    'property_description' => self::strip_all_tags($unit->description),
                    'listing_agent_name' => 'Azizi Developments',
                    'listing_agent_phone' => '80029494',
                    'listing_agent_email' => 'info@azizidevelopments.com',
                    'listing_agent_photo' => 'https://azizidevelopments.com/assets/images/logo/1512057079974431552.png',
                    'listing_agent_license_no' => '',
                    'listing_agent_info' => 'Azizi Developments is the real estate investment arm of Azizi Group. Established in 2007, the company’s diverse experience as a leading Dubai Property Developer in the market.',
                ];

                $xml .= '<property last_update="' . $propertyfeed['last_updated'] . '">' . "$sep";
                $xml .= "<reference_number>" . trim($propertyfeed['property_ref_no']) . "</reference_number>" . "$sep";
                $xml .= "<permit_number>{$propertyfeed['permit_id']}</permit_number>" . "$sep";
                $xml .= "<offering_type>RS</offering_type>" . "$sep";
                $xml .= "<property_type>AP</property_type>" . "$sep";
                $xml .= "<price_on_application>No</price_on_application>" . "$sep";
                $xml .= "<price>" . trim($propertyfeed['price']) . "</price>" . "$sep";
                $xml .= "<service_charge></service_charge>" . "$sep";
                $xml .= "<cheques></cheques>" . "$sep";
                $xml .= "<city>" . trim($propertyfeed['city']) . "</city>" . "$sep";
                $xml .= "<community>" . trim($propertyfeed['locality']) . "</community>" . "$sep";
                $xml .= "<sub_community>" . trim($propertyfeed['sub_locality']) . "</sub_community>" . "$sep";
                $xml .= "<property_name>" . trim($propertyfeed['tower_name']) . "</property_name>" . "$sep";
                $xml .= "<title_en>" . trim($propertyfeed['property_title']) . "</title_en>" . "$sep";
                $xml .= "<title_ar>" . trim($propertyfeed['property_title']) . "</title_ar>" . "$sep";
                $xml .= "<description_en><![CDATA[{$propertyfeed['property_description']}]]></description_en>" . "$sep";
                $xml .= "<description_ar><![CDATA[{$propertyfeed['property_description']}]]></description_ar>" . "$sep";
                $xml .= "<private_amenities>AC,BA,SE,</private_amenities>" . "$sep";
                $xml .= "<commercial_amenities>CP</commercial_amenities>" . "$sep";
                $xml .= "<plot_size>" . trim(round($propertyfeed['property_size'])) . "</plot_size>" . "$sep";
                $xml .= "<size>" . trim($propertyfeed['property_size_unit']) . "</size>" . "$sep";
                $xml .= "<bedroom>" . trim($propertyfeed['bedrooms']) . "</bedroom>" . "$sep";
                $xml .= "<bathroom>" . trim($propertyfeed['bathroom']) . "</bathroom>" . "$sep";
                $xml .= "<agent>
                <id>1</id>
                <name>" . trim($propertyfeed['listing_agent_name']) . "</name>$sep
                <email>" . trim($propertyfeed['listing_agent_email']) . "</email>$sep
                <phone>" . trim($propertyfeed['listing_agent_phone']) . "</phone>$sep
                <photo>" . trim($propertyfeed['listing_agent_photo']) . "</photo>$sep
                <license_no>" . trim($propertyfeed['listing_agent_license_no']) . "</license_no>$sep
                <info>" . trim($propertyfeed['listing_agent_info']) . "</info>$sep
                </agent>" . "$sep";
                $xml .= "<developer>" . trim($propertyfeed['listing_agent_name']) . "</developer>" . "$sep";
                $xml .= "<build_year></build_year>" . "$sep";
                $xml .= "<completion_status>off_plan</completion_status>" . "$sep";
                $xml .= "<floor></floor>" . "$sep";
                $xml .= "<stories></stories>" . "$sep";
                $xml .= "<parking></parking>" . "$sep";
                $xml .= "<furnished></furnished>" . "$sep";
                $xml .= "<view360>" . trim($propertyfeed['view360']) . "</view360>" . "$sep";
                $xml .= "<photo>" . "$sep";
                foreach ($propertyfeed['images'] as $image) {
                    $img = str_replace('https://azizidevelopments.com/assets/images/', 'https://azizidevelopments.in/uploads/', $image);
                    $xml .= "<url last_updated= '{$last_updated}' watermark='no'>{$img}</url>" . "$sep";
                }
                $xml .= "</photo>" . "$sep";
                $xml .= "<floor_plan><url last_updated= '{$last_updated}' watermark='no'></url></floor_plan>" . "$sep";
                $xml .= "<geopoints>" . trim($propertyfeed['latitude']) . ',' . trim($propertyfeed['longitude']) . "</geopoints>" . "$sep";
                $xml .= "</property>" . "$sep";
            }
        }
        $xml .= '</list>';
        $xml1 = preg_replace('/\s\s+/', '', $xml);
        file_put_contents(PUBLIC_PATH . '/uploads/property-feed-property-finder.xml', $xml1);
    }

    public function dubizzle_xml_feed_1() {

        $query = DB::table('sc_units');
        $query->leftjoin('sc_properties', 'sc_properties.id', '=', 'sc_units.property_id');
        $query->leftjoin('sc_communities', 'sc_communities.id', '=', 'sc_properties.community_id');
        $query->leftjoin('sc_locations', 'sc_locations.id', '=', 'sc_communities.location_id');
        $query->select('sc_units.*', 'sc_properties.PropertyID', 'sc_properties.PropertyName', 'sc_communities.CommunityName', 'sc_communities.CommunityID', 'sc_locations.LocationID', 'sc_locations.LocationName');
        $units = $query->where('dubizzle1', 1)->limit(100)->get();
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<dubizzlepropertyfeed>';
        $sep = "\n";

        foreach ($units as $unit) {

            $sc_property = DB::table('sc_properties')->where('id', $unit->property_id)->first();
            $property = DB::table('tbl_properties')->where('id', $sc_property->property_old_id)->first();
            if (!empty($property)) {

                $bed = self::getBedrooms($unit->Bedrooms);
                $bath = self::getBathrooms($unit->Bedrooms);
                $images = getPropertiesImage($unit);
                $amenities = self::getAmenities($property, $unit);
                $video = self::getVideo($property, $unit);
                $view360 = self::getView360($property, $unit);
                $floorplan = self::getFoorPlan($property, $unit);
                $sub_locality = self::getSubLocality($property, $unit);
                $area = self::getArea($property);

                $propertyfeed = [
                    'property_ref_no' => "{$unit->UnitID}",
                    'permit_id' => $unit->permit_no,
                    'property_status' => 'Live',
                    'property_purpose' => 'Buy',
                    'property_type' => $unit->Category,
                    'property_size' => $unit->TotalArea,
                    'property_size_unit' => $unit->TotalArea,
                    'bedrooms' => $bed == -1 ? 'Studio' : $bed,
                    'bathroom' => $bath,
                    'features' => $amenities,
                    'images' => $images,
                    'videos' => $video,
                    'floor_plans' => $floorplan,
                    'view360' => $view360,
                    'latitude' => $property->latitude,
                    'longitude' => $property->longitude,
                    'off_plan' => 'Yes',
                    'city' => $sc_property->city,
                    'locality' => $sc_property->diz_locality,
                    'sub_locality' => $sc_property->diz_sub_locality,
                    'tower_name' => $sc_property->diz_tower_name,
                    'last_updated' => $property->updated_at,
                    'price' => round($unit->Price),
                    'property_title' => self::strip_all_tags($unit->title),
                    'property_description' => self::strip_all_tags($unit->description),
                    'listing_agent_name' => 'Azizi Developments',
                    'listing_agent_phone' => '80029494',
                    'listing_agent_email' => 'info@azizidevelopments.com',
                    'listing_agent_photo' => 'https://azizidevelopments.com/assets/images/logo/1512057079974431552.png',
                    'listing_agent_license_no' => '',
                    'listing_agent_info' => 'Azizi Developments is the real estate investment arm of Azizi Group. Established in 2007, the company’s diverse experience as a leading Dubai Property Developer in the market.',
                ];

                $xml .= "<property>";
                $xml .= "<status>vacant</status>" . $sep;
                $xml .= "<type>SP</type>" . $sep;
                $xml .= "<subtype>AP</subtype>" . $sep;
                $xml .= "<refno>" . trim($propertyfeed['property_ref_no']) . "</refno>" . $sep;
                $xml .= "<title>" . trim($propertyfeed['property_title']) . "</title>" . $sep;
                $xml .= "<description><![CDATA[{$propertyfeed['property_description']}]]></description>" . $sep;
                $xml .= "<privateamenities>AC|BA|CP</privateamenities>" . $sep;
                $xml .= "<commercialamenities>AF|VW|CP</commercialamenities>" . $sep;
                $xml .= "<size>" . trim(round($propertyfeed['property_size'])) . "</size>" . $sep;
                $xml .= "<sizeunits>" . trim($propertyfeed['property_size_unit']) . "</sizeunits>" . $sep;
                $xml .= "<price>" . trim($propertyfeed['price']) . "</price>" . $sep;
                $xml .= "<rentpriceterm></rentpriceterm>" . $sep;
                $xml .= "<totalclosingfee></totalclosingfee>" . $sep;
                $xml .= "<annualcommunityfee></annualcommunityfee>" . $sep;
                $xml .= "<agencyfee></agencyfee>" . $sep;
                $xml .= "<rentispaid></rentispaid>" . $sep;
                $xml .= "<furnished></furnished>" . $sep;
                $xml .= "<bedrooms>" . trim($propertyfeed['bedrooms']) . "</bedrooms>" . $sep;
                $xml .= "<bathrooms>" . trim($propertyfeed['bathroom']) . "</bathrooms>" . $sep;
                $xml .= "<developer>" . trim($propertyfeed['listing_agent_name']) . "</developer>" . $sep;
                $xml .= "<readyby></readyby>" . $sep;
                $xml .= "<lastupdated>" . trim($propertyfeed['last_updated']) . "</lastupdated>" . $sep;
                $xml .= "<contactemail>" . trim($propertyfeed['listing_agent_email']) . "</contactemail>" . $sep;
                $xml .= "<contactnumber>" . trim($propertyfeed['listing_agent_phone']) . "</contactnumber>" . $sep;
                $xml .= "<locationtext>" . trim($propertyfeed['listing_agent_phone']) . "</locationtext>" . $sep;
                $xml .= "<permit_number>" . trim($propertyfeed['permit_id']) . "</permit_number>" . $sep;
                $xml .= "<building>" . trim($propertyfeed['tower_name']) . "</building>" . $sep;
                $xml .= "<city>2</city>" . $sep;
                $xml .= "<photos>" . implode('|', $propertyfeed['images']) . "</photos>" . $sep;
                $xml .= "<view360>" . $propertyfeed['view360'] . "</view360>" . $sep;
                $xml .= "<geopoint>" . trim($propertyfeed['latitude']) . ',' . trim($propertyfeed['longitude']) . "</geopoint>" . $sep;
                $xml .= "<freehold></freehold>" . $sep;
                $xml .= "<zoned>MU</zoned>" . $sep;
                $xml .= "</property>";
            }
        }
        $xml .= '</dubizzlepropertyfeed>';

        $xml1 = preg_replace('/\s\s+/', '', $xml);
        file_put_contents(PUBLIC_PATH . '/uploads/property-feed-dubizzle-1.xml', $xml1);
    }

    public function dubizzle_xml_feed_2() {

        $query = DB::table('sc_units');
        $query->leftjoin('sc_properties', 'sc_properties.id', '=', 'sc_units.property_id');
        $query->leftjoin('sc_communities', 'sc_communities.id', '=', 'sc_properties.community_id');
        $query->leftjoin('sc_locations', 'sc_locations.id', '=', 'sc_communities.location_id');
        $query->select('sc_units.*', 'sc_properties.PropertyID', 'sc_properties.PropertyName', 'sc_communities.CommunityName', 'sc_communities.CommunityID', 'sc_locations.LocationID', 'sc_locations.LocationName');
        $units = $query->where('dubizzle2', 1)->limit(100)->get();
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<dubizzlepropertyfeed>';
        $sep = "\n";

        foreach ($units as $unit) {

            $sc_property = DB::table('sc_properties')->where('id', $unit->property_id)->first();
            $property = DB::table('tbl_properties')->where('id', $sc_property->property_old_id)->first();
            if (!empty($property)) {

                $bed = self::getBedrooms($unit->Bedrooms);
                $bath = self::getBathrooms($unit->Bedrooms);
                $images = getPropertiesImage($unit);
                $amenities = self::getAmenities($property, $unit);
                $video = self::getVideo($property, $unit);
                $view360 = self::getView360($property, $unit);
                $floorplan = self::getFoorPlan($property, $unit);
                $sub_locality = self::getSubLocality($property, $unit);
                $area = self::getArea($property);

                $propertyfeed = [
                    'property_ref_no' => "{$unit->UnitID}",
                    'permit_id' => $unit->permit_no,
                    'property_status' => 'Live',
                    'property_purpose' => 'Buy',
                    'property_type' => $unit->Category,
                    'property_size' => $unit->TotalArea,
                    'property_size_unit' => $unit->TotalArea,
                    'bedrooms' => $bed == -1 ? 'Studio' : $bed,
                    'bathroom' => $bath,
                    'features' => $amenities,
                    'images' => $images,
                    'videos' => $video,
                    'floor_plans' => $floorplan,
                    'view360' => $view360,
                    'latitude' => $property->latitude,
                    'longitude' => $property->longitude,
                    'off_plan' => 'Yes',
                    'city' => $sc_property->city,
                    'locality' => $sc_property->diz_locality,
                    'sub_locality' => $sc_property->diz_sub_locality,
                    'tower_name' => $sc_property->diz_tower_name,
                    'last_updated' => $property->updated_at,
                    'price' => round($unit->Price),
                    'property_title' => self::strip_all_tags($unit->title),
                    'property_description' => self::strip_all_tags($unit->description),
                    'listing_agent_name' => 'Azizi Developments',
                    'listing_agent_phone' => '80029494',
                    'listing_agent_email' => 'info@azizidevelopments.com',
                    'listing_agent_photo' => 'https://azizidevelopments.com/assets/images/logo/1512057079974431552.png',
                    'listing_agent_license_no' => '',
                    'listing_agent_info' => 'Azizi Developments is the real estate investment arm of Azizi Group. Established in 2007, the company’s diverse experience as a leading Dubai Property Developer in the market.',
                ];
                $xml .= "<property>";
                $xml .= "<status>vacant</status>" . $sep;
                $xml .= "<type>SP</type>" . $sep;
                $xml .= "<subtype>AP</subtype>" . $sep;
                $xml .= "<refno>" . trim($propertyfeed['property_ref_no']) . "</refno>" . $sep;
                $xml .= "<title>" . trim($propertyfeed['property_title']) . "</title>" . $sep;
                $xml .= "<description><![CDATA[{$propertyfeed['property_description']}]]></description>" . $sep;
                $xml .= "<privateamenities>AC|BA|CP</privateamenities>" . $sep;
                $xml .= "<commercialamenities>AF|VW|CP</commercialamenities>" . $sep;
                $xml .= "<size>" . trim(round($propertyfeed['property_size'])) . "</size>" . $sep;
                $xml .= "<sizeunits>" . trim($propertyfeed['property_size_unit']) . "</sizeunits>" . $sep;
                $xml .= "<price>" . trim($propertyfeed['price']) . "</price>" . $sep;
                $xml .= "<rentpriceterm></rentpriceterm>" . $sep;
                $xml .= "<totalclosingfee></totalclosingfee>" . $sep;
                $xml .= "<annualcommunityfee></annualcommunityfee>" . $sep;
                $xml .= "<agencyfee></agencyfee>" . $sep;
                $xml .= "<rentispaid></rentispaid>" . $sep;
                $xml .= "<furnished></furnished>" . $sep;
                $xml .= "<bedrooms>" . trim($propertyfeed['bedrooms']) . "</bedrooms>" . $sep;
                $xml .= "<bathrooms>" . trim($propertyfeed['bathroom']) . "</bathrooms>" . $sep;
                $xml .= "<developer>" . trim($propertyfeed['listing_agent_name']) . "</developer>" . $sep;
                $xml .= "<readyby></readyby>" . $sep;
                $xml .= "<lastupdated>" . trim($propertyfeed['last_updated']) . "</lastupdated>" . $sep;
                $xml .= "<contactemail>" . trim($propertyfeed['listing_agent_email']) . "</contactemail>" . $sep;
                $xml .= "<contactnumber>" . trim($propertyfeed['listing_agent_phone']) . "</contactnumber>" . $sep;
                $xml .= "<locationtext>" . trim($propertyfeed['listing_agent_phone']) . "</locationtext>" . $sep;
                $xml .= "<permit_number>" . trim($propertyfeed['permit_id']) . "</permit_number>" . $sep;
                $xml .= "<building>" . trim($propertyfeed['tower_name']) . "</building>" . $sep;
                $xml .= "<city>2</city>" . $sep;
                $xml .= "<photos>" . implode('|', $propertyfeed['images']) . "</photos>" . $sep;
                $xml .= "<view360>" . $propertyfeed['view360'] . "</view360>" . $sep;
                $xml .= "<geopoint>" . trim($propertyfeed['latitude']) . ',' . trim($propertyfeed['longitude']) . "</geopoint>" . $sep;
                $xml .= "<freehold></freehold>" . $sep;
                $xml .= "<zoned>MU</zoned>" . $sep;

                $xml .= "</property>";
            }
        }
        $xml .= '</dubizzlepropertyfeed>';

        //preg_replace($image, $feature, $xml);
        $xml1 = preg_replace('/\s\s+/', '', $xml);
        file_put_contents(PUBLIC_PATH . '/uploads/property-feed-dubizzle-2.xml', $xml1);
    }

    public function getPropertyTypes($type) {
        if ($type == 'Penthouse') {
            return 'Pent House';
        }
        return 'Apartment';
    }

    static public function getBedrooms($type) {
        if ($type == 'Studio') {
            return -1;
        } elseif ($type == '1BR' || $type == '1BR - Duplex') {
            return 1;
        } elseif ($type == '2BR' || $type == '2BR + Maid') {
            return 2;
        } elseif ($type == '3BR' || $type == '3BR - Duplex' || $type == '3BR + Maid') {
            return 3;
        } elseif ($type == 'Penthouse') {
            return '4';
        }
        return -1;
    }

    static public function getBathrooms($type) {
        if ($type == 'Studio') {
            return 1;
        } elseif ($type == '1BR' || $type == '1BR - Duplex') {
            return 1;
        } elseif ($type == '2BR' || $type == '2BR + Maid') {
            return 2;
        } elseif ($type == '3BR' || $type == '3BR - Duplex' || $type == '3BR + Maid') {
            return 3;
        } elseif ($type == 'Penthouse') {
            return '4';
        }
        return 1;
    }

    static private function getArea($property, $unit = null) {
        $project = db::table('tbl_projects')->where('id', $property->project_id)->where('status', '1')->orderBy("id", "ASC")->first();
        return $project->title_en;
    }

    static private function getAmenities($property, $unit) {
        if ($unit->amenities) {
            return explode('|', $unit->amenities);
        } else if (!empty($property->amenities)) {
            return explode(', ', ucwords(Property::getAmenities($property->amenities)));
        } else {
            return [''];
        }
    }

    static private function getNearBy($property, $unit) {
        if (!empty($unit->nearby)) {
            return explode('|', $unit->nearby);
        } else if (!empty($property->nearby)) {
            return array_keys(unserialize($property->nearby));
        } else {
            return [''];
        }
    }

    static private function getVideo($property, $unit) {
        if (!empty($unit->video)) {
            return $unit->video;
        } else if (!empty($property->video_url)) {
            return $property->video_url;
        } else {
            return '';
        }
    }

    static private function getView360($property, $unit) {
        if (!empty($unit->view360)) {
            return $unit->view360;
        }
        if (!empty($property->views_360)) {
            return $property->views_360;
        }
    }

    static private function getSubLocality($property, $unit = null) {
        $project = db::table('tbl_projects')->where('id', $property->project_id)->where('status', '1')->orderBy("id", "ASC")->first();
        return $project->title_en;
    }

    static private function getFoorPlan($property, $unit = null) {
        $project = db::table('tbl_projects')->where('id', $property->project_id)->where('status', '1')->orderBy("id", "ASC")->first();
        $file_path = "/assets/images/properties/" . $project->gallery_location . '/' . $property->gallery_location;
        $files = File::files(STORE_PATH . $file_path . '/Floor_Plans');
        return $floor_plan = !empty($files[0]) ? APP_URL . $file_path . "/Floor_Plans/" . basename($files[0]) : '';
    }

    static private function getBrochure($property, $unit = null) {
        $project = db::table('tbl_projects')->where('id', $property->project_id)->where('status', '1')->orderBy("id", "ASC")->first();
        $file_path = "/assets/images/properties/" . $project->gallery_location . '/' . $property->gallery_location;
        $files = File::files(STORE_PATH . $file_path . '/Brochures');
        return $brochure = !empty($files[0]) ? APP_URL . $file_path . "/Brochures/" . basename($files[0]) : '';
    }

    public function getUnits() {
        /*
          //EMPS GET Data in json format
          $postData['Unit'] = [
          'AppKey' => 'sdfkdsjak@#!$DSAaflmds@#$SDAFdsllask32$?sadkfnasiur@#',
          'CompanyId' => '1000',
          ];
          $opts = ['http' => [
          'method' => 'POST',
          'header' => "Content-type: application/json; charset=utf-8;  \r\n",
          //"X-Requested-With: XMLHttpRequest \r\n".
          //"curl/7.9.8 (i686-pc-linux-gnu) libcurl 7.9.8 (OpenSSL 0.9.6b) (ipv6 enabled)\r\n",
          'content' => json_encode($postData, JSON_UNESCAPED_UNICODE),
          'ignore_errors' => true,
          'timeout' => 30,
          ]
          ];

          $context = stream_context_create($opts);
          $content = file_get_contents("https://crm.azizidevelopments.com/WebForms/websiteleads.aspx/GetUnits", false, $context);
          $result = json_decode($content);
          if (!empty($result->d)) {
          file_put_contents(PUBLIC_PATH . '/read-json/data.json', $result->d);
          echo "<a href='http://azizidevelopments.com/admin/sale-center/units'>Back to Units</a>";
          }
          //print_r($postData); die;

          //End EPMS GET DATA JSON FILE
         */


        //SalesForce System GET Json File

        $result = file_get_contents('https://azizidevelopments.com/salesforce-leads/getValues.php', false);
        //$result = $this->avaliablilityListApi();

        if (!empty($result)) {
            file_put_contents(PUBLIC_PATH . '/read-json/data.json', $result);
            echo "<a href='http://azizidevelopments.com/admin/sale-center/units'>Back to Units</a>";
        }
        //print_r($result); die(); 
    }

}
