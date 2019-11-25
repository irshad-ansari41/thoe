@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
<!-- Time line css -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/timeline_style.css')}}">
<style>.parallax-container .parallax img {    top: initial;}.cd-horizontal-timeline .timeline {position: relative;height: 100px;margin: 0 auto;width: 60%;}</style>
<!-- End -->
@stop

@section('main_div_wrapper')

@stop

@section('section_content')

<!-- Header -->
<section class="az-section">

    <div class="container">
        <div class="parallax-container valign-wrapper">
            <div class="parallax">
                <img src="{{ asset('assets/images/header-founder.jpg') }}">
            </div>
        </div>
        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <ul>
                        <li>
                            <span class="ion-ios-arrow-left" style=""></span>
                            <a href="#" style="color: #5a5a5a;">Home / </a>
                            <a href="#" style="color: #5a5a5a;">About / </a>
                            <a style="font-weight: 600;">Our Founder</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" style="margin-bottom:0;">
            <div class="col s12 m10">
                <h5 class="title-uppercase" style="font-weight: 600;margin-bottom: 0;">MIRWAIS THOE</h5><div class="desig-person m0" style="">

                    <i style="font-size: 12px;">Chairman, Thoe Developments</i>
                </div>
                <p class="az-pcontent">My name is Mirwais and my father’s name is Abdul Aziz. But people in many countries know me by my family name, Thoe. </p>

            </div>
        </div>

        <div class="row">

            <div class="col s12">
                <p class="az-pcontent">I was born in 1962 in Kabul, Afghanistan. When I was five years old, I attended my first class at school, and from sixth class, I went to another school. After this, I went on to study law. When I finished my studies I began working at a law firm which I worked at from the mid-80s until 1988.</p>
                <p class="az-pcontent">In 1988, while working at the law firm, a war was happening in Afghanistan. I made a decision to leave the country to protect the lives of my family. When I left Afghanistan, I had only USD 700 in my pocket. While I came from a well-educated family, no one in my family had a business background. </p>
                <p class="az-pcontent">
                    I made a decision to move to Uzbekistan. Upon arriving there I met a friend – a fellow Afghani and businessman. By then I had only USD 500 so I planned to take USD 5,000 from my friend to immigrate to Europe with my family. My friend was willing to give me this money and even more, but he advised me it would be better to stay and start my own business instead. I listened to his advice and this is when I established my first business in textile manufacturing.</p>

                <p class="az-pcontent">
                    Within six months, I had earned my first USD 1 million. At that point, I had only two employees – a driver named Sergei, and an accountant named Baser. With this money I planned to start a business in Europe and buy a house and relocate my family there. I offered to share my earnings and give my accountant USD 200,000 and use the remaining USD 800,000 to set up a future for my family. But my accountant recommended that I stay in Uzbekistan until I had earned USD 5 million. I managed to do this within five months at which time my accountant suggested we go to Europe. But by that time I had developed a good understanding of business so I made a decision to stay.</p>

            </div>

        </div>


        <div class="row">
            <div class="col s12 m6">
                <img src="https://pbs.twimg.com/media/DPNrcqfV4AEcZmD.jpg" class="responsive-img">
            </div>
            <div class="col s12 m6">
                <img src="https://d1pl9wrwxozm3b.cloudfront.net/wp-content/uploads/2017/09/HH-Sheikh-Hamdan-with-Mirwais-Thoe.jpg" class="responsive-img">
            </div>
        </div>

        <!--  <div class="row">
             <div class="col s12 m4">
                 <img src="http://www.al-press.com/images/0-2017/0107/HE-Saeed-Humaid-Al-Tayer-Meydan-Group-image.jpg" class="responsive-img">
             </div>
             <div class="col s12 m4">
                 <img src="http://thoebank.com/data/uploads/00009994.JPG" class="responsive-img">
             </div>
             <div class="col s12 m4">
                 <img src="http://www.vvip.co/wp-content/uploads/2017/10/img_5568.jpg" class="responsive-img">
             </div>
         </div> -->


        <div class="row">

            <div class="col s12">
                <p class="az-pcontent">II established a tobacco business, first in Bulgaria. This was at the time of the Soviet Union, and many countries were smoking Bulgarian cigarettes. I was importing cigarettes to Russian Commonwealth countries and later became an official dealer. After that, I relocated my family to the capital of Uzbekistan, Tashkent. At that time I had offices in more than 20 countries including Russia, Ukraine, Bulgaria, Kazakhstan, Uzbekistan, Bulgaria, and Poland.</p>

                <p class="az-pcontent">In 1994, some employees came to me with a proposal. They explained that there were two very popular types of cigarette – Winston and Magna. At that time there was no internet so I made a number of phone calls to find out who was the official dealer of these cigarettes. I found the dealer who was living in Sharjah in the United Arab Emirates – the company was called Al Ofuq. I purchased two containers of the cigarettes at a price of USD 150,000. Once the containers arrived in Tashkent, all the cigarettes were sold for USD 300,000 on the same day. After that, I became very enthusiastic and ordered 50 containers. Soon after, the general manager of the company in Sharjah came to Tashkent to meet with me. A week later he invited me to the UAE.</p>
                <p class="az-pcontent">I arrived to a very warm welcome. I stayed for one week and saw Dubai and Sharjah for the first time. My mind was opened up to the possibilities the UAE presented, including a good education system, healthcare, and security, leading to my decision to start a business here. I bought a house and opened an office and I moved all my family to the UAE and sent my children to school. In 1998, I finished the tobacco business and started an oil business. My oil products were exported to many countries. </p>
            </div>


            <div class="col s12">
                <p class="az-pcontent">In 2002, after 16 years, I returned to my homeland, Afghanistan. What I saw there were people and a country ruined. I noticed a huge difference in the people. Initially, I thought the change was me because I had been living abroad for quite some time. But then I realised it was the effect of the war. So, I made a decision to help people in three different ways.</p>
                <p class="az-pcontent">First, I invested in the country so that people could have a chance to work. I invested in the petroleum sector and within three months this had created 5,000 jobs. I also invested heavily in rebuilding the city through infrastructure and township projects. This led to the creation of 10,000 apartments and new commercial areas. <p>
            </div>

            <div class="col s12">
                <p class="az-pcontent">The second way was through education. I wanted to establish an American education system so I opened the American University of Afghanistan in Kabul and arranged the first board meeting in Dubai. The university is the first not-for-profit higher education institution in Afghanistan. Today, thousands of students receive education through the university and go on to work in Afghanistan in many different fields.</p>
                <p class="az-pcontent">
                    The third way was through the creation of the Thoe Foundation, established with the objective of helping underprivileged people and families to live better lives. The foundation has sponsored the education of many students.
                </p>

            </div>









        </div>


        <div class="parallax-container valign-wrapper">
            <div class="parallax">
                <img src="http://www.constructionweekonline.com/pictures/AE1_2489_2048.gif">
            </div>
        </div>



        <div class="row" style="margin-top: 2rem;margin-bottom: 5rem;">
            <div class="col s12">
                <p class="az-pcontent">In 2006, Thoe Bank was established. The bank is now the largest and strongest financial institution in Afghanistan. Following this, Thoe Group acquired Al Bakhtar Bank which has become one of the fastest growing banks in Afghanistan.</p>

                <p class="az-pcontent">In 2007, Thoe Developments was established in Dubai and I purchased our first plots of land in the city. My motivation was to make something for a city that had given so much to me and my family. During the years I have been running my businesses, I was travelling frequently and couldn’t always be with my children, but not once did I ever have to worry about my children being here. Dubai has given my family a peaceful life and I wanted to make something for this city that my children and grandchildren would be proud of.</p>


                <p class="az-pcontent">In 2008, we started selling off-plan properties in Dubai. Once we had sold around AED 1 billion, the global financial crisis hit. The majority of buyers could not continue payments and were handed back their deposits. In 2013, we resumed the construction of existing projects and in doing so, became very successful. Today, we are working harder than ever and developing properties in many locations across Dubai.</p>
                <p class="az-pcontent">Dubai is a peaceful place that unites all people. Those who live here feel safe, and this is owing to a strong system and visionary leader. My ambition is to give back to the city that has given so much to my family, by supporting the leader’s vision to put the city in the league of the best in the world.</p>
            </div>
        </div>


    </div>



</div>

</section>
<!-- End -->

@stop

@section('footer_main_scripts')

@stop
@section('footer_scripts')
<!-- Timeline -->
<script type="text/javascript" src="{{asset('assets/js/timeline-main.js')}}"></script>
@stop
