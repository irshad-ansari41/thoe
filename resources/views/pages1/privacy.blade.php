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
        <section class="az-section" style="padding-top: 5rem;">

            <div class="container">
                
                <div class="row m0">
                    <div class="col s12 p0">
                        <div class="col s12 p0">
                            <ul>
                                
                                <li>
                                    @if($locale=='en')
                                    <span class="ion-ios-arrow-left" style=""></span>
                                    @endif

                                    @if($locale=='en')
                                      <a href="{{ url("/")}}/<?php echo $locale ?>" style="color: #5a5a5a;">{{trans('words.home')}} / </a>
                                      @endif

                                      @if($locale=='ar')
                                      <a href="{{ url("/")}}/<?php echo $locale ?>" style="color: #5a5a5a;">{{trans('words.home')}} / </a>
                                      @endif

                                      @if($locale=='cn')
                                      <a href="{{ url("/")}}/<?php echo $locale ?>" style="color: #5a5a5a;">主页 / </a>
                                      @endif

                                    
                                     @if($locale=='en')
                                      <a style="font-weight: 600;">Privacy Policy</a>
                                      @endif

                                      @if($locale=='ar')
                                      <a style="font-weight: 600;">سياسة الخصوصية</a>
                                      @endif

                                      @if($locale=='cn')
                                      <a style="font-weight: 600;"> 隐私政策</a>
                                      @endif
                                     

                                      @if($locale=='ar')
                                    <span class="ion-ios-arrow-left" style=""></span>
                                    @endif

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row" style="margin-bottom:5rem;">
                    <div class="col s12 m12">


                          @if($locale=='en')

                          <h5 class="title-uppercase" style="font-weight: 600;margin-bottom: 0;">Privacy Policy</h5>

                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">Thoe Developments  Website Cookie and Privacy Policy</i>
                        </div>
                        <p class="az-pcontent">This cookie policy applies to the www.<?=DOMAIN_NAME?> website. By continuing to browse the www.<?=DOMAIN_NAME?> website, you are consenting to our use of cookies in accordance with this cookie policy. If you do not agree to our use of cookies in this way, you should set your browser settings accordingly or not use the www.<?=DOMAIN_NAME?> website. If you disable the cookies that we use, this may impact your user experience while on the www.<?=DOMAIN_NAME?> website.</p>

                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">What are cookies?</i>
                        </div>
                        <p class="az-pcontent">A cookie is a small file of data-letters and numbers we store on your browser or your computer or other internet enabled mobile device such as a smartphone or tablet. A cookie will usually contain the name of the website from which the cookie has come, the “lifetime” of the cookie (i.e. how long it will remain on your device) and a value, which is usually a randomly generated unique number.</p>


                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">What do we use cookies for?</i>
                        </div>
                        <p class="az-pcontent">Cookies allow the website to “remember” your actions or preferences over time, such as your preferred language and other settings. Our website uses cookies to distinguish you from other users of our website. This helps us to provide you with a good experience when you browse our website and also allows us to improve our site. Cookies may also be used to help speed up your future activities and experience on the www.<?=DOMAIN_NAME?> website. We also use cookies to compile anonymous, aggregated statistics that allow us to understand how people use the www.<?=DOMAIN_NAME?> website and to help us improve its structure and content. We cannot identify you personally from this information. Cookies play an important role. Without them, using the web would be a much more frustrating experience.</p>




                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">What types of cookies do we use?</i>
                        </div>
                        <p class="az-pcontent">www.<?=DOMAIN_NAME?> uses session cookies which are temporary cookies that remain on your device until you leave the www.<?=DOMAIN_NAME?> website.</p>

                        <p class="az-pcontent">The cookies we use are “analytical” cookies which allow us to recognize and count the number of visitors and to see how visitors move around the site when they are using it. This helps us to improve the way our website works, for example by ensuring that users are finding what they are looking for easily. Overall, cookies help us provide the user with a better website. A cookie does not give us access to the user’s computer or any information about him/her, other than the data he/she chooses to share with us.</p>

                        <p class="az-pcontent">Read more about the individual cookies we use, the purposes for which we use them and how to recognise them by clicking here or referring to the table below.</p>

                        <p class="az-pcontent">Please note that third parties (including, for example, advertising networks and providers of external services like web traffic analysis services) may also use cookies, over which we have no control. These cookies are likely to be analytical/performance cookies or targeting cookies.</p>

                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">Do we use third party cookies?</i>
                        </div>

                        <p class="az-pcontent">There are links to a number of social media websites on the www.<?=DOMAIN_NAME?> website. These third parties may also set cookies on your device on our behalf when you visit the www.<?=DOMAIN_NAME?>website to allow them to deliver the services they are providing. We don’t control the setting of these cookies, so please check those website for more information about their cookies and how to manage them.</p>

                        <p class="az-pcontent">When you visit the www.<?=DOMAIN_NAME?> website you may receive cookies from third party websites or domains. We endeavor to identify these cookies before they are used so that you can decide whether or not you wish to accept them. More information about these cookies may be available on the relevant third party’s website.</p>



                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">How can I control or delete cookies?</i>
                        </div>

                        <p class="az-pcontent">You can choose to accept or decline cookies. Accepting cookies is usually the best way to make sure you get the most from a website. Some people prefer not to allow cookies, which is why most browsers give you the ability to manage cookies to suit you. Most browsers automatically accept cookies, but users can set up rules in their browsers to restrict, block or delete cookies on a site-by-site basis, giving you more fine-grained control over your privacy. What this means is that you can disallow cookies from all sites expect those you trust. However, this may prevent the user from taking full advantage of our website. You can also delete cookies from your computer or device whenever you like. Each browser is different, so check the “Help” menu of your particular browser (or your smartphone or tablet’s manual) to learn how to change your cookie preferences. Many browsers have universal privacy settings for you to choose from.</p>

                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">What happens if I delete my cookies?</i>
                        </div>

                        <p class="az-pcontent">If you delete all your cookies, some aspects of our site may not work.</p>


                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">How do cookies affect my privacy?</i>
                        </div>

                        <p class="az-pcontent">You can visit our website without revealing any personal information.</p>

                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">INFORMATION WE COLLECT ABOUT YOU AND HOW WE COLLECT IT</i>
                        </div>

                        <p class="az-pcontent">We collect several types of information from and about users of our Website, including information:</p>

                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">Information collection and use</i>
                        </div>

                        <p class="az-pcontent">We will not sell, trade or disclose to any third party other than an entity in Thoe Developments  (in this privacy policy, ‘we’, ‘us’ and ‘our’ means Thoe Developments  LLC) any information derived from the use of any online service without the consent of the user (except as required by law or in the case of imminent physical harm to the user or others). When we use third parties to perform services on our behalf, we will ensure that such third parties protect the user’s personal information in a manner which is consistent with this statement.</p>

                        <div class="desig-person m0" style="">
                                                    <i style="font-weight: 600;">Security</i>
                                                </div>

                        <p class="az-pcontent">We will take appropriate steps to protect the personal information you share with us. We have implemented technology and security features to safeguard the privacy of your personal information.</p>

                        <div class="desig-person m0" style="">
                                                    <i style="font-weight: 600;">Links</i>
                                                </div>

                        <p class="az-pcontent">Our website may contain links to other websites as well as information provided by third parties. Please be aware that we are not responsible for the privacy practices of, or the information contained on or sourced from, websites not operated by any company within Thoe Developments . We encourage our users to read the privacy statements of each website that collects personally identifiable information. This privacy statement applies solely to information collected by our website.</p>

                        <div class="desig-person m0" style="">
                                                    <i style="font-weight: 600;">Correction/updating of personal information</i>
                                                </div>

                        <p class="az-pcontent">If a user’s personally identifiable information changes, we will provide a way to correct, update or remove that user’s personal information provided to us.</p>

                        <div class="desig-person m0" style="">
                                                    <i style="font-weight: 600;">Choice/Opt-out</i>
                                                </div>

                        <p class="az-pcontent">Users who no longer wish to receive promotional materials may opt-out of receiving these communications by sending a mail to info@www.<?=DOMAIN_NAME?> with “Unsubscribe” in the subject line.</p>

                        <p class="az-pcontent">Users of our website will always be notified when their information is being collected by any outside parties. We do this so our users can make an informed choice as to whether they should proceed with services that require an outside party or not.</p>

                        <div class="desig-person m0" style="">
                                                    <i style="font-weight: 600;">Notification of changes</i>
                                                </div>

                        <p class="az-pcontent">If we decide to change our privacy policy, we will post those changes on the www.<?=DOMAIN_NAME?> website so our users are always aware of what information we collect, how we use it, and under what circumstances, if any, we disclose it. If at any point we decide to use personally identifiable information in a manner different from that stated at the time it was collected, we will notify users by way of an email. Users will have a choice as to whether or not we use their information in this different manner. We will use information in accordance with the privacy policy under which the information was collected.</p>
                         
                          @endif











                        @if($locale=='ar')



                          <h5 class="title-uppercase" style="font-weight: 600;margin-bottom: 0;">سياسة الخصوصية</h5>

                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">سياسة الخصوصية وملفات تعريف الارتباط (الكوكيز) لموقع عزيزي للتطوير العقاري</i>
                        </div>
                        <p class="az-pcontent">تنطبق سياسة ملفات تعريف الارتباط (الكوكيز) على موقع www.<?=DOMAIN_NAME?> ، وباستمرارك في تصفح موقع www.<?=DOMAIN_NAME?> فإنك توافق على استخدامنا لملفات تعريف الارتباط (الكوكيز) وفقاً لسياسة ملفات تعريف الارتباط (الكوكيز) هذه. وفي حال لم توافق على استخدامنا لملفات تعريف الارتباط (الكوكيز) بهذه الطريقة، يجب عليك تحديد إعدادات المتصفح الخاص بك وفقاً لذلك، أو عدم استخدام موقع www.<?=DOMAIN_NAME?> وإذا قمت بتعطيل ملفات تعريف الارتباط (الكوكيز) التي نستخدمها، فقد يؤثر هذا الأمر على تجربة المستخدم الخاصة بك أثناء تصفح موقع  www.<?=DOMAIN_NAME?>.</p>

                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">ما هي ملفات تعريف الارتباط (الكوكيز)؟</i>
                        </div>
                        <p class="az-pcontent">ملف تعريف الارتباط (الكوكي) عبارة عن ملف صغير من البيانات (أحرف وأرقام) التي نقوم بتخزينها على المتصفح أو جهاز الكمبيوتر الخاص بك، أو غيرها من الأجهزة المحمولة القادرة على الوصول إلى الإنترنت، كالهاتف الذكي أو الكمبيوتر اللوحي. وعادة ما يحتوي ملف تعريف الارتباط (الكوكي) على اسم الموقع الذي جاء منه، و"العمر الافتراضي" لملف تعريف الارتباط (أي، المدة الزمنية التي سيبقى فيها ضمن جهازك) وعلى قيمة عادة ما يتم إنشاؤها بشكل عشوائي واستثنائي.</p>


                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">ما هي استخدامات ملفات تعريف الارتباط (الكوكيز)؟</i>
                        </div>
                        <p class="az-pcontent">تتيح ملفات تعريف الارتباط (الكوكيز) للموقع بـ "تذكر" سلوك أو تفضيلات المستخدم مع مرور الوقت، على غرار اللغة المفضلة لديك وغيرها من الإعدادات. ويستخدم موقعنا ملفات تعريف الارتباط (الكوكيز) من أجل أن يميز بينك وبين المستخدمين الآخرين لموقعنا على الانترنت، وهو ما يساعدنا على تقديم تجربة جيدة عند تصفحك لموقعنا، كما أنه يتيح لنا تحسين مستوى خدمة موقعنا. وبالإمكان استخدام ملفات تعريف الارتباط (الكوكيز) للمساعدة في تسريع وتيرة أنشطتك وتجربتك المستقبلية ضمن موقع www.<?=DOMAIN_NAME?> بالإضافة إلى أننا نستخدم ملفات تعريف الارتباط (الكوكيز) من أجل جمع إحصاءات مجهولة ومركبة، تتيح لنا معرفة كيفية استخدام الأشخاص لموقع www.<?=DOMAIN_NAME?>، ولمساعدتنا على تحسين بنية ومحتوى الموقع. لا نستطيع تحديد شخصيتك من خلال هذه المعلومات، لكن ملفات تعريف الارتباط (الكوكيز) تلعب دوراً هاماً في المواقع الالكتيرونية، وبدونها فإن تجربة استخدام المواقع الالكترونية تصبح تجربة محبطة وصعبة.</p>




                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">ما هي أنواع ملفات تعريف الارتباط (الكوكيز) التي نستخدمها؟</i>
                        </div>
                        <p class="az-pcontent">يستخدم موقع www.<?=DOMAIN_NAME?> ملفات تعريف الارتباط (الكوكيز) المؤقتة، التي تبقى على جهازك حتى مغادرتك لموقع www.<?=DOMAIN_NAME?>.</p>

                        <p class="az-pcontent">ملفات تعريف الارتباط (الكوكيز) التي نستخدمها هي ملفات تعريف ارتباط (كوكيز) "تحليلية"، تسمح لنا بالتعرف على الزوار وحساب عددهم، ومعرفة حركة الزوار ضمن الموقع عند استخدامه. ويساعدنا هذا الأمر على تحسين آلية عمل موقعنا، على سبيل المثال من خلال ضمان إيجاد المستخدمين ما يبحثون عنه بكل سهولة. وبشكل عام، تساعدنا ملفات تعريف الارتباط (الكوكيز) على تقديم موقع أفضل للمستخدم. تجدر الإشارة إلى أن ملف تعريف الارتباط (الكوكي) لا يمكننا من الوصول إلى جهاز الكمبيوتر الخاص بالمستخدم، أو إلى أي معلومات حوله/حولها، إلا إذا كان المستخدم اختار مشاركتها معنا.</p>

                        <p class="az-pcontent">يرجى قراءة المزيد حول ملفات تعريف الارتباط (الكوكيز) الفردية التي نستخدمها، والهدف منها، وكيفية التعرف عليها، وذلك من خلال النقر هنا، أو بالعودة إلى الجدول المذكور أدناه</p>

                        <p class="az-pcontent">كما يرجى ملاحظة أن الأطراف الثالثة (بما فيها، على سبيل المثال، شبكات الإعلان ومقدمي الخدمات الخارجية كخدمات تحليل حركة البيانات على الشبكة) بإمكانها أيضاً استخدام ملفات تعريف الارتباط (الكوكيز)، وهو أمر لا نستطيع التحكم به. وغالباً ما تكون ملفات تعريف الارتباط (الكوكيز) هذه تحليلية أو أدائية أو استهدافية.</p>

                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">هل نستخدم ملفات تعريف ارتباط (كوكيز) لطرف ثالث؟</i>
                        </div>

                        <p class="az-pcontent">هناك العديد من الروابط الخاصة بمواقع التواصل الاجتماعي على موقعنا www.<?=DOMAIN_NAME?>، وبإمكان هذه الأطراف الثالثة وضع ملفات تعريف الارتباط (الكوكيز) على جهازك نيابة عنا، وذلك عند زيارتك لموقع www.<?=DOMAIN_NAME?>، من أجل تمكينهم من توفير الخدمات التي يقدمونها. نحن لا نستطيع التحكم في إعدادات وضع هذه الملفات، لذا يرجى التحقق من هذه المواقع لمعرفة المزيد من المعلومات حول ملفات تعريف الارتباط (الكوكيز) الخاصة بها، وكيفية إدارتها.</p>

                        <p class="az-pcontent">عند زيارتك لموقع   www.<?=DOMAIN_NAME?>   قد تستقبل ملفات تعريف ارتباط (كوكيز) من مواقع طرف أو نطاق ثالث، لذا فإننا نسعى إلى تحديد ملفات تعريف الارتباط هذه قبل استخدامها، وذلك كي تتمكن من تقرير فيما إذا كنت ترغب في قبولها أم لا. وللمزيد من المعلومات حول ملفات تعريف الارتباط هذه، يرجى زيارة موقع الطرف الثالث ذي الصلة.</p>



                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">كيف بإمكاني التحكم بملفات تعريف الارتباط (الكوكيز) أو حذفها؟</i>
                        </div>

                        <p class="az-pcontent">بإمكانك اختيار قبول أو رفض ملفات تعريف الارتباط (الكوكيز)، وعادة ما يكون قبول ملفات تعريف الارتباط (الكوكيز) الطريقة الأفضل للحصول على تجربة استخدام مثالية للموقع. ويفضل بعض الأشخاص رفض ملفات تعريف الارتباط (الكوكيز)، ولهذا السبب تتيح لك معظم برامج التصفح القدرة على إدارة ملفات تعريف الارتباط (الكوكيز) وفق تفضيلاتك. معظم برامج التصفح تقبل ملفات تعريف الارتباط (الكوكيز) بشكل تلقائي، ولكن بإمكان المستخدمين تغيير إعدادات برامج التصفح الخاصة بهم من أجل تقييد أو حجب أو حذف ملفات تعريف الارتباط (الكوكيز) عند زيارة كل موقع، ما يتيح لك الحصول على المزيد من التحكم بخصوصيتك. وهذا يعني، أنه بإمكانك رفض استقبال ملفات تعريف الارتباط (الكوكيز) من جميع المواقع باستثناء المواقع التي تثق بها. إلا أن هذا الأمر قد يمنع المستخدم من الاستفادة بشكل كامل من موقعنا. وبإمكانك أيضاً حذف ملفات تعريف الارتباط (الكوكيز) من جهاز كمبيوترك أو جهازك وقتما تشاء. كما نشير إلى أن برامج التصفح مختلف عن بعضها البعض، لذا يجب التحقق من قائمة "المساعدة" الموجودة على برنامج التصفح (أو دليل هاتفك الذكي أو كمبيوترك اللوحي) لمعرفة كيفية تغيير تفضيلات ملفات تعريف الارتباط (الكوكيز). كما أن معظم برامج التصفح تحتوي على إعدادات خصوصية عامة بإمكانك الاختيار من بينها.</p>

                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">ماذا يحدث إذا قمت بحذف ملفات تعريف الارتباط (الكوكيز)؟</i>
                        </div>

                        <p class="az-pcontent">إذا قمت بحذف جميع ملفات تعريف الارتباط (الكوكيز) فإن بعض جوانب أو خصائص موقعنا قد لا تعمل.</p>


                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">كيف تؤثر ملفات تعريف الارتباط (الكوكيز) على خصوصيتي؟</i>
                        </div>

                        <p class="az-pcontent">بإمكانك زيارة موقعنا دون الكشف عن أية معلومات شخصية. سياسة الخصوصية</p>

                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">جمع المعلومات واستخدامها</i>
                        </div>

                        <p class="az-pcontent">لن نبيع أو نتداول أو نكشف لأي طرف ثالث باستثناء الهيئات العاملة في عزيزي للتطوير العقاري (ضمن سياسة الخصوصية هذه، "نحن" و"نا" تشير إلى عزيزي للتطوير العقاري) أية معلومات مستخلصة من استخدام أي خدمة عبر الإنترنت دون موافقة المستخدم (باستثناء ما يقتضيه القانون، أو في حالة الضرر المادي الوشيك للمستخدم، أو غيرها). وعندما نستعين بأطراف ثالثة من أجل توفير خدمات بالنيابة عنا، فإننا نتأكد من أن هذه الأطراف الثالثة تقوم بحماية المعلومات الشخصية للمستخدم بطريقة متوافقة مع سياسة الخصوصية هذه.</p>

                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">الأمن</i>
                        </div>

                        <p class="az-pcontent">سنتخذ كافة الخطوات اللازمة والضرورية لحماية المعلومات الشخصية التي تزودنا بها، فقد قمنا بتطبيق مزايا تقنية وأمنية للحفاظ على خصوصية معلوماتك الشخصية.</p>

                        <div class="desig-person m0" style="">
                                                    <i style="font-weight: 600;">الروابط</i>
                                                </div>

                        <p class="az-pcontent">قد يحتوي موقعنا على روابط لمواقع أخرى، فضلاً عن معلومات مقدمة من قبل أطراف ثالثة، لذا يرجى أخذ العلم أننا غير مسؤولين عن ممارسات الخصوصية للمعلومات الواردة في محتوى أو التي مصدرها هذه المواقع، التي لا يتم تشغيلها من قبل أي شركة من عزيزي للتطوير العقاري. كما أننا نشجع مستخدمينا على قراءة سياسة الخصوصية المتعلقة بكل موقع يقوم بجمع معلومات شخصية، فسياسة الخصوصية هذه تنطبق فقط على المعلومات التي يقوم بجمعها موقعنا.</p>

                        <div class="desig-person m0" style="">
                                                    <i style="font-weight: 600;">تصحيح / تحديث المعلومات الشخصية</i>
                                                </div>

                        <p class="az-pcontent">إذا تم تغيير المعلومات الشخصية للمستخدم، فإننا سنقدم وسيلة مناسبة لتصحيح أو تحديث أو إزالة المعلومات الشخصية التي قدمها المستخدم إلينا.</p>

                        <!-- <div class="desig-person m0" style="">
                                                    <i style="font-weight: 600;">Correction/updating of personal information</i>
                                                </div>

                        <p class="az-pcontent">If a user’s personally identifiable information changes, we will provide a way to correct, update or remove that user’s personal information provided to us.</p> -->

                        <div class="desig-person m0" style="">
                                                    <i style="font-weight: 600;">اختيار الخروج من الخدمة</i>
                                                </div>

                        <p class="az-pcontent">بإمكان المستخدمين الراغبين بإيقاف تلقيهم للمواد الترويجية إرسال بريد الكتروني إلى العنوان info@<?=DOMAIN_NAME?>، و وضع العنوان "إلغاء الاشتراك" أو "Unsubscribe"عليه. هذا وسيتم إخطار مستخدمي موقعنا دائماً عند جمع المعلومات من قبل أي أطراف خارجية، ونحن نقوم بهذا الأمر كي نتيح للمستخدمين خيار المضي بالاستفادة من الخدمات المقدمة من قبل طرف خارجي، أو إيقافها.</p>

                       <!--  <p class="az-pcontent">Users of our website will always be notified when their information is being collected by any outside parties. We do this so our users can make an informed choice as to whether they should proceed with services that require an outside party or not.</p> -->

                        <div class="desig-person m0" style="">
                                                    <i style="font-weight: 600;">الإخطار بالتغييرات</i>
                                                </div>

                        <p class="az-pcontent">إذا قررنا تغيير سياسة الخصوصية الخاصة بالموقع، فإننا سنقوم بنشر هذه التغييرات على الموقع www.<?=DOMAIN_NAME?>، كي يتمكن مستخدمينا على الدوام من معرفة المعلومات التي نقوم بجمعها، وكيفية استعمالها، وما هي الظروف التي قد نضطر إلى الكشف عنها عند حصولها (إن وجدت). إذا قررنا في أي لحظة استخدام المعلومات الشخصية بطريقة مختلفة عما ذكر في الوقت التي جمعت فيها، فإننا سنقوم بإعلام المستخدمين عن طريق البريد الإلكتروني. وسيتاح للمستخدمين حرية الخيار فيما إذا بإمكاننا استخدام معلوماتهم أم لا ضمن هذا السياق المختلف. وسنستخدم المعلومات وفقاً لسياسة الخصوصية التي جمعت هذه المعلومات بموجبها.</p>




                          
                          @endif



                         @if($locale=='cn')

                          <h5 class="title-uppercase" style="font-weight: 600;margin-bottom: 0;">Privacy Policy</h5>

                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">Thoe Developments  Website Cookie and Privacy Policy</i>
                        </div>
                        <p class="az-pcontent">This cookie policy applies to the www.<?=DOMAIN_NAME?> website. By continuing to browse the www.<?=DOMAIN_NAME?> website, you are consenting to our use of cookies in accordance with this cookie policy. If you do not agree to our use of cookies in this way, you should set your browser settings accordingly or not use the www.<?=DOMAIN_NAME?> website. If you disable the cookies that we use, this may impact your user experience while on the www.<?=DOMAIN_NAME?> website.</p>

                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">What are cookies?</i>
                        </div>
                        <p class="az-pcontent">A cookie is a small file of data-letters and numbers we store on your browser or your computer or other internet enabled mobile device such as a smartphone or tablet. A cookie will usually contain the name of the website from which the cookie has come, the “lifetime” of the cookie (i.e. how long it will remain on your device) and a value, which is usually a randomly generated unique number.</p>


                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">What do we use cookies for?</i>
                        </div>
                        <p class="az-pcontent">Cookies allow the website to “remember” your actions or preferences over time, such as your preferred language and other settings. Our website uses cookies to distinguish you from other users of our website. This helps us to provide you with a good experience when you browse our website and also allows us to improve our site. Cookies may also be used to help speed up your future activities and experience on the www.<?=DOMAIN_NAME?> website. We also use cookies to compile anonymous, aggregated statistics that allow us to understand how people use the www.<?=DOMAIN_NAME?> website and to help us improve its structure and content. We cannot identify you personally from this information. Cookies play an important role. Without them, using the web would be a much more frustrating experience.</p>




                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">What types of cookies do we use?</i>
                        </div>
                        <p class="az-pcontent">www.<?=DOMAIN_NAME?> uses session cookies which are temporary cookies that remain on your device until you leave the www.<?=DOMAIN_NAME?> website.</p>

                        <p class="az-pcontent">The cookies we use are “analytical” cookies which allow us to recognize and count the number of visitors and to see how visitors move around the site when they are using it. This helps us to improve the way our website works, for example by ensuring that users are finding what they are looking for easily. Overall, cookies help us provide the user with a better website. A cookie does not give us access to the user’s computer or any information about him/her, other than the data he/she chooses to share with us.</p>

                        <p class="az-pcontent">Read more about the individual cookies we use, the purposes for which we use them and how to recognise them by clicking here or referring to the table below.</p>

                        <p class="az-pcontent">Please note that third parties (including, for example, advertising networks and providers of external services like web traffic analysis services) may also use cookies, over which we have no control. These cookies are likely to be analytical/performance cookies or targeting cookies.</p>

                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">Do we use third party cookies?</i>
                        </div>

                        <p class="az-pcontent">There are links to a number of social media websites on the www.<?=DOMAIN_NAME?> website. These third parties may also set cookies on your device on our behalf when you visit the www.<?=DOMAIN_NAME?>website to allow them to deliver the services they are providing. We don’t control the setting of these cookies, so please check those website for more information about their cookies and how to manage them.</p>

                        <p class="az-pcontent">When you visit the www.<?=DOMAIN_NAME?> website you may receive cookies from third party websites or domains. We endeavor to identify these cookies before they are used so that you can decide whether or not you wish to accept them. More information about these cookies may be available on the relevant third party’s website.</p>



                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">How can I control or delete cookies?</i>
                        </div>

                        <p class="az-pcontent">You can choose to accept or decline cookies. Accepting cookies is usually the best way to make sure you get the most from a website. Some people prefer not to allow cookies, which is why most browsers give you the ability to manage cookies to suit you. Most browsers automatically accept cookies, but users can set up rules in their browsers to restrict, block or delete cookies on a site-by-site basis, giving you more fine-grained control over your privacy. What this means is that you can disallow cookies from all sites expect those you trust. However, this may prevent the user from taking full advantage of our website. You can also delete cookies from your computer or device whenever you like. Each browser is different, so check the “Help” menu of your particular browser (or your smartphone or tablet’s manual) to learn how to change your cookie preferences. Many browsers have universal privacy settings for you to choose from.</p>

                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">What happens if I delete my cookies?</i>
                        </div>

                        <p class="az-pcontent">If you delete all your cookies, some aspects of our site may not work.</p>


                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">How do cookies affect my privacy?</i>
                        </div>

                        <p class="az-pcontent">You can visit our website without revealing any personal information.</p>

                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">INFORMATION WE COLLECT ABOUT YOU AND HOW WE COLLECT IT</i>
                        </div>

                        <p class="az-pcontent">We collect several types of information from and about users of our Website, including information:</p>

                        <div class="desig-person m0" style="">
                            <i style="font-weight: 600;">Information collection and use</i>
                        </div>

                        <p class="az-pcontent">We will not sell, trade or disclose to any third party other than an entity in Thoe Developments  (in this privacy policy, ‘we’, ‘us’ and ‘our’ means Thoe Developments  LLC) any information derived from the use of any online service without the consent of the user (except as required by law or in the case of imminent physical harm to the user or others). When we use third parties to perform services on our behalf, we will ensure that such third parties protect the user’s personal information in a manner which is consistent with this statement.</p>

                        <div class="desig-person m0" style="">
                                                    <i style="font-weight: 600;">Security</i>
                                                </div>

                        <p class="az-pcontent">We will take appropriate steps to protect the personal information you share with us. We have implemented technology and security features to safeguard the privacy of your personal information.</p>

                        <div class="desig-person m0" style="">
                                                    <i style="font-weight: 600;">Links</i>
                                                </div>

                        <p class="az-pcontent">Our website may contain links to other websites as well as information provided by third parties. Please be aware that we are not responsible for the privacy practices of, or the information contained on or sourced from, websites not operated by any company within Thoe Developments . We encourage our users to read the privacy statements of each website that collects personally identifiable information. This privacy statement applies solely to information collected by our website.</p>

                        <div class="desig-person m0" style="">
                                                    <i style="font-weight: 600;">Correction/updating of personal information</i>
                                                </div>

                        <p class="az-pcontent">If a user’s personally identifiable information changes, we will provide a way to correct, update or remove that user’s personal information provided to us.</p>

                        <div class="desig-person m0" style="">
                                                    <i style="font-weight: 600;">Choice/Opt-out</i>
                                                </div>

                        <p class="az-pcontent">Users who no longer wish to receive promotional materials may opt-out of receiving these communications by sending a mail to info@www.<?=DOMAIN_NAME?> with “Unsubscribe” in the subject line.</p>

                        <p class="az-pcontent">Users of our website will always be notified when their information is being collected by any outside parties. We do this so our users can make an informed choice as to whether they should proceed with services that require an outside party or not.</p>

                        <div class="desig-person m0" style="">
                                                    <i style="font-weight: 600;">Notification of changes</i>
                                                </div>

                        <p class="az-pcontent">If we decide to change our privacy policy, we will post those changes on the www.<?=DOMAIN_NAME?> website so our users are always aware of what information we collect, how we use it, and under what circumstances, if any, we disclose it. If at any point we decide to use personally identifiable information in a manner different from that stated at the time it was collected, we will notify users by way of an email. Users will have a choice as to whether or not we use their information in this different manner. We will use information in accordance with the privacy policy under which the information was collected.</p>



                        @endif


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
