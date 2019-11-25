<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use DB;
use Illuminate\Http\Request;

class SitemapController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Home Controller
      |--------------------------------------------------------------------------
      |
      | This controller renders your application's "dashboard" for users that
      | are authenticated. Of course, you are free to change or remove the
      | controller as you wish. It is just here to get your app started!
      |
     */

    public $locales;

    /**
     * Initializer.
     *
     * @return void
     */
    public function __construct(Request $request) {
        $this->locale = get_locale($request->segment(1));
        \App::setLocale($this->locale);
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index(Request $request) {


        $cpage = get_cache_page($request->fullUrl());
        if ($cpage) {
            //return $cpage;
        }
        $pages = $this->getPages($this->locale);
        $projects = self::getProjects($this->locale);
        $properties = self::getProperties($this->locale);
        $cproperties = self::getPropertiesConstructionUpdate($this->locale);
        $igalleries = self::getImageGallery($this->locale);
        $vgalleries = self::getVideoGallery($this->locale);
        $events = self::getEvents($this->locale);
        $press = self::getPress($this->locale);


        $data = [
            "AllRatings" => DB::table('tbl_ratings')->where('menu_title', 'Sitemap')->where('menu_id', 46)->first(),
            'pages' => $pages,
            'projects' => $projects,
            'properties' => $properties,
            'cproperties' => $cproperties,
            'igalleries' => $igalleries,
            'vgalleries' => $vgalleries,
            'events' => $events,
            'press' => $press,
            'meta_title' => 'Sitemap | The Heart of Europe',
            'meta_keyword' => 'Sitemap | The Heart of Europe',
            'meta_description' => 'Sitemap | The Heart of Europe',
            'og_title' => 'Sitemap | The Heart of Europe',
            'og_desc' => 'Sitemap | The Heart of Europe',
            'og_pic' => '',
            'banner' => '',
            'locale' => $this->locale,
        ];

        set_cache_page($request->fullUrl(), View("pages.sitemap", $data)->render());
        return view('pages.sitemap', $data);
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function create_sitemap_xml() {

        $sitemaps[] = self::saveSiteMap(array_merge(self::getPages('en', 1), self::getProjects('en', 1), self::getProperties('en', 1), self::getPropertiesConstructionUpdate('en', 1), self::getImageGallery('en', 1), self::getVideoGallery('en', 1), self::getPress('en', 1)), 'en');
        //$sitemaps[] = self::saveSiteMap(array_merge(self::getPages('cn', 1), self::getProjects('cn', 1), self::getProperties('cn', 1), self::getPropertiesConstructionUpdate('cn', 1), self::getImageGallery('cn', 1), self::getVideoGallery('cn', 1)), 'cn');
        $sitemaps[] = self::saveSiteMap(array_merge(self::getPages('ar', 1), self::getProjects('ar', 1), self::getProperties('ar', 1), self::getPropertiesConstructionUpdate('ar', 1), self::getImageGallery('ar', 1), self::getVideoGallery('ar', 1), self::getPress('ar', 1)), 'ar');
        $sitemaps[] = self::getGalleryVideoSiteMap();
        $mainsitemap = $this->saveMainSiteMap($sitemaps);

        echo "<div style='margin:100px auto; padding:15px; text-align:center;background:#e1e1e1;border:1px solid #ccc'>XML sitemap file Updated. "
        . "<br><br>Open file <a href='" . $mainsitemap . "' target=_blank>Sitemap</a> \n\n"
        . "<br><br>Open file <a href='" . APP_URL . '/sitemaps/video-sitemap.xml' . "' target=_blank>Video Sitemap</a> \n\n"
        . "<br><br>you will be redirected to \n\n <a href='" . SITE_URL . "'>" . SITE_URL . "</a></div>";
    }

    /**
     * Save Site Map
     * @param type $xmlurls
     * @retrurn none
     */
    static protected function saveMainSiteMap($sitemaps) {

        $mod = date("Y-m-d");
        $xml = '<?xml version="1.0" encoding="UTF-8"?>'
                . '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        foreach ($sitemaps as $url) {
            $xml .= "\n<sitemap><loc>" . trim($url) . "</loc><lastmod>$mod</lastmod></sitemap>\n";
        }
        $xml .= '</sitemapindex>';
        $filename = "/sitemap.xml";
        file_put_contents(PUBLIC_PATH . $filename, $xml);

//        $content = '';
//        $file = PUBLIC_PATH . "/sitemap.txt";
//        if (file_exists($file) && date("dmy", filemtime($file)) == date('dmy')) {
//            $content = file_get_contents($file);
//        }
//        file_put_contents($file, $content . str_replace('https://www.thoedevelopments.com/', '', implode("\n", $sitemaps)));

        return SITE_URL . $filename;
    }

    /**
     * Save Site Map
     * @param type $xmlurls
     * @retrurn none
     */
    static protected function saveSiteMap($xmlurls, $locale) {
        $uni_xmlurls = array_unique($xmlurls);

        $mod = date("Y-m-d");
        $xml = '<?xml version="1.0" encoding="UTF-8"?>'
                . '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd http://www.google.com/schemas/sitemap-image/1.1 http://www.google.com/schemas/sitemap-image/1.1/sitemap-image.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        foreach ($uni_xmlurls as $url) {
            $xml .= "<url><loc>" . trim($url) . "</loc><lastmod>$mod</lastmod><changefreq>daily</changefreq><priority>1</priority></url>";
        }
        $xml .= '</urlset>';
        $filename = "/sitemaps/{$locale}-sitemap.xml";
        file_put_contents(PUBLIC_PATH . $filename, $xml);

        $content = '';
        $file = PUBLIC_PATH . "/sitemaps/{$locale}-sitemap.txt";
        if (file_exists($file) && date("dmy", filemtime($file)) == date('dmy')) {
            $content = file_get_contents($file);
        }

        file_put_contents($file, $content . str_replace('https://www.thoedevelopments.com/', '', implode("\n", $uni_xmlurls)));
        return SITE_URL . $filename;
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    static public function getPages($locale, $index = null) {
        $xmlurls[] = ['title' => ($locale == 'ar' ? 'Home' : ($locale == 'cn' ? 'Home' : 'Home')), 'url' => url("/$locale")];
        $xmlurls[] = ['title' => ($locale == 'ar' ? 'About' : ($locale == 'cn' ? 'About' : 'About')), 'url' => url($locale . '/about')];
        $xmlurls[] = ['title' => 'Board of Directors', 'url' => url($locale . '/board-of-directors')];
        $xmlurls[] = ['title' => 'Management', 'url' => url($locale . '/management')];
        $xmlurls[] = ['title' => 'Media Center', 'url' => url($locale . '/media-center')];
        $xmlurls[] = ['title' => 'Events', 'url' => url($locale . '/events')];
        $xmlurls[] = ['title' => 'News PR', 'url' => url($locale . '/news-pr')];
        $xmlurls[] = ['title' => 'Image Gallery', 'url' => url($locale . '/image-gallery')];
        $xmlurls[] = ['title' => 'Video Gallery', 'url' => url($locale . '/video-gallery')];
        $xmlurls[] = ['title' => 'Agent Login', 'url' => url($locale . '/agent-login')];
        $xmlurls[] = ['title' => 'Online Payments', 'url' => url($locale . '/online-payments')];
        $xmlurls[] = ['title' => 'Contact', 'url' => url($locale . '/contact')];
        $xmlurls[] = ['title' => 'Privacy', 'url' => url($locale . '/privacy')];
        $xmlurls[] = ['title' => 'Offers', 'url' => url($locale . '/offers')];

        return !empty($index) ? array_column($xmlurls, 'url') : $xmlurls;
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    static private function getProjects($locale, $index = null) {

        $xmlurls[] = ['title' => 'Dubai', 'url' => url("$locale/dubai")];
        $projects = DB::table('tbl_projects')->where('status', '1')->whereNotIn('id', [15, 16, 17])->get();
        foreach ($projects as $project) {
            $xmlurls[] = ['title' => ($locale == 'ar' ? $project->title_ar : $project->title_en), 'url' => url("$locale/dubai/$project->slug")];
            $communities = DB::table('tbl_projects')->where('status', '1')->whereIn('id', [15, 16, 17])->get();
            foreach ($communities as $community) {
                if ($project->id == 10) {
                    $xmlurls[] = ['title' => ($locale == 'ar' ? $project->title_ar : $project->title_en), 'url' => url("$locale/dubai/$project->slug/$community->slug")];
                }
            }
        }
        return !empty($index) ? array_column($xmlurls, 'url') : $xmlurls;
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    static private function getProperties($locale, $index = null) {
        $projects = DB::table('tbl_projects')->where('status', '1')->get();
        foreach ($projects as $project) {
            $properties = DB::table('tbl_properties')->where('status', '1')->where('project_id', $project->id)->get();
            foreach ($properties as $property) {
                if (in_array($project->id, [15, 16, 17])) {
                    $xmlurls[] = ['title' => ($locale == 'ar' ? $property->title_ar : $property->title_en), 'url' => url("$locale/dubai/meydan/$project->slug/$property->slug")];
                } else {
                    $xmlurls[] = ['title' => ($locale == 'ar' ? $property->title_ar : $property->title_en), 'url' => url("$locale/dubai/$project->slug/$property->slug")];
                }
            }
        }
        return !empty($index) ? array_column($xmlurls, 'url') : $xmlurls;
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    static private function getPropertiesConstructionUpdate($locale, $index = null) {
        $projects = DB::table('tbl_projects')->where('status', '1')->get();
        $xmlurls = [];
        foreach ($projects as $project) {
            $properties = DB::table('tbl_properties')->where('status', '1')->where('completed', 0)->where("constrution_show", "Yes")->where('project_id', $project->id)->get();
            foreach ($properties as $property) {
                if (in_array($project->id, [15, 16, 17])) {
                    $xmlurls[] = ['title' => ($locale == 'ar' ? $property->title_ar : $property->title_en), 'url' => url("$locale/dubai/meydan/$project->slug/$property->slug/construction-updates")];
                } else {
                    $xmlurls[] = ['title' => ($locale == 'ar' ? $property->title_ar : $property->title_en), 'url' => url("$locale/dubai/$project->slug/$property->slug/construction-updates")];
                }
            }
        }
        return !empty($index) && !empty($xmlurls) ? array_column($xmlurls, 'url') : $xmlurls;
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    static private function getImageGallery($locale, $index = null) {
        $images = DB::table('tbl_image_gallery_master')->where('status', '1')->get();
        $xmlurls = [];
        foreach ($images as $image) {
            $gallery_type = $image->gallery_type == 1 ? 'corporate' : ($image->gallery_type == 2 ? 'identity' : 'events');
            $slug = str_replace(['&', '/', '<br/>', '<br>'], ['&amp;', '-', '', ''], strip_tags($image->slug));
            $xmlurls[] = ['title' => ($locale == 'ar' ? $image->gallery_title_ar : $image->gallery_title), 'url' => url("$locale/image-gallery/$gallery_type/$slug")];
        }
        return !empty($index) ? array_column($xmlurls, 'url') : $xmlurls;
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    static private function getEvents($locale, $index = null) {
        $events = DB::table('tbl_events')->where('status', '1')->orderBy('id', 'desc')->limit(1)->get();
        foreach ($events as $event) {
            $xmlurls[] = ['title' => ($locale == 'ar' ? $event->event_title_ar : ($locale == 'cn' ? $event->event_title_cn : $event->event_title_en)), 'url' => url("$locale/events/$event->slug_en")];
        }
        return !empty($index) ? array_column($xmlurls, 'url') : $xmlurls;
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    static private function getPress($locale, $index = null) {
        $xmlurls = [];
        $presss = DB::table('tbl_pressrelease')->where('status', '1')->orderBy('id', 'desc')->get();
        foreach ($presss as $press) {
            $xmlurls[] = ['title' => ($locale == 'ar' ? $press->title_ar : ($locale == 'cn' ? $press->title_cn : $press->title)), 'url' => url("$locale/events/$press->slug")];
        }
        return !empty($index) ? array_column($xmlurls, 'url') : $xmlurls;
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    static private function getVideoGallery($locale, $index = null) {
        $xmlurls = [];
        $videos = DB::table('tbl_video_gallery_master')->where('status', '1')->get();
        foreach ($videos as $video) {
            $gallery_type = $video->gallery_type == 1 ? 'corporate' : ($video->gallery_type == 2 ? 'commercial' : 'events');
            $slug = str_replace(['&', '/', '<br/>', '<br>'], ['&amp;', '-', '', ''], strip_tags($video->slug));
            $xmlurls[] = ['title' => ($locale == 'ar' ? $video->gallery_title_ar : $video->gallery_title), 'url' => url("$locale/video-gallery/$gallery_type/$slug")];
        }
        return !empty($index) ? array_column($xmlurls, 'url') : $xmlurls;
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    static private function getGalleryVideoSiteMap() {
        $videos = DB::table('tbl_video_gallery_master')->where('status', '1')->get();
        $sep = "\n";
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">' . $sep;
        foreach ($videos as $video) {
            $gallery_type = $video->gallery_type == 3 ? 'events' : ($video->gallery_type == 2 ? 'commercial' : 'corporate');
            //get iframe src & Video ID
            $slug = str_replace(['&', '/', '<br/>', '<br>'], ['&amp;', '-', '', ''], strip_tags($video->slug));
            $video_src_arr = $img = explode("v=", $video->image);
            if (!empty($video_src_arr[1])) {
                $video_ID = strstr(trim($video_src_arr[1]), '?', true);

                $post_title = str_replace(['&', '/', '<br/>', '<br>'], ['&amp;', '-', '', ''], strip_tags($video->gallery_title . ', Id - ' . $video->id));
                $post_content = str_replace(['&', '/', '<br/>', '<br>'], ['&amp;', '-', '', ''], strip_tags($video->gallery_long_title));
                $tags = [$post_title, $post_content, 'off plan properties', 'dubai off plan', 'real estate', 'THOE developments', 'off plan property', 'real estate developer',
                    'dubai properties'];

                $xml .= "<url>" . $sep;
                $xml .= "<loc>" . url("/video-gallery/$gallery_type/$slug") . "</loc>" . $sep;
                $xml .= "<changefreq>daily</changefreq>" . $sep;
                $xml .= "<priority>1.0</priority>" . $sep;
                $xml .= "<video:video>" . $sep;
                $xml .= "<video:player_loc allow_embed='yes'>http://www.youtube.com/v/$video_ID?fs=1&amp;hl=en_US&amp;rel=0&amp;hd=1&amp;autoplay=1</video:player_loc>" . $sep;
                $xml .= "<video:thumbnail_loc>http://img.youtube.com/vi/$video_ID/default.jpg</video:thumbnail_loc>" . $sep;
                $xml .= "<video:title>" . $post_title . "</video:title>" . $sep;
                $xml .= "<video:description>" . $post_content . "</video:description>" . $sep;
                foreach (array_filter($tags) as $tag) {
                    $xml .= "<video:tag>$tag</video:tag>" . $sep;
                }
                $xml .= "<video:category>People &amp; Blogs</video:category>" . $sep;
                $xml .= "</video:video>" . $sep;
                $xml .= "</url>" . $sep;
            }
        }
        $xml .= '</urlset>' . $sep;

        file_put_contents(PUBLIC_PATH . "/sitemaps/video-sitemap.xml", $xml);
        return APP_URL . "/sitemaps/video-sitemap.xml";
    }

}
