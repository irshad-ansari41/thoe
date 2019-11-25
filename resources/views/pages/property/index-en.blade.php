@extends('layouts/default')

@section('title')
Events
@parent
@stop

@section('header_styles')

@stop

@section('breadcrumbs')
<nav class="breadcrumbs">
    <div class="container">
        <?= generate_breadcrumb([url("/$locale") => 'home', '' => 'Projects']) ?>
    </div>
</nav>
@stop

@section('content')
<div class="center">
    <div class="container">
        <div class="row">
            <div class="site">
                <header class="site__header">
                    <h1 class="site__title">Projects</h1>
                </header>
                <div class="site__main">
                    <div class="widget js-widget widget--main widget--no-margin">
                        <div class="widget__content">
                            <br/>
                            <p>
                                <?= $content['description_' . $locale] ?>
                            </p>
                            <br/>
                            <div class="listing listing--grid">
                                <?php
                                foreach ($projects as $project) {
                                    ?>
                                    <div class="listing__item">
                                        <div class="properties properties--grid">
                                            <div class="properties__thumb"><a href="<?= url("/$locale/projects/{$project['slug']}") ?>" class="item-photo">
                                                    <img src="{{asset('assets/images/projects')}}/{{ $project->image }}" alt=""/>
                                                    <figure class="item-photo__hover item-photo__hover--params">
                                                        <span class="properties__intro"><?= str_limit($project['description_' . $locale], 35) ?></span>
                                                    </figure></a><span class="properties__ribon">Sale On</span>
                                            </div>
                                            <!-- end of block .properties__thumb-->
                                            <div class="properties__details">
                                                <div class="properties__info"><a href="<?= url("/$locale/projects/{$project['slug']}") ?>" class="properties__address">
                                                        <span class="properties__address-street"><?= $project['title_' . $locale] ?></span></a>
                                                    <div class="properties__offer">
                                                        <div class="properties__offer-column">
                                                            <div class="properties__offer-label">Invest From AED</div>
                                                            <div class="properties__offer-value"><strong> 1,500,000</strong>
                                                            </div>
                                                        </div>
                                                        <div class="properties__offer-column">
                                                            <div class="properties__offer-label">Guaranteed ROI</div>
                                                            <div class="properties__offer-value"><strong> 100%</strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end of block .properties__info-->
                                        </div>
                                        <!-- end of block .properties__item-->
                                    </div>


                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <div class="site__footer">
                        <!-- BEGIN PAGINATION-->
                        <nav class="listing__pagination">
                            <?= $projects->links() ?>
                        </nav>
                        <!-- END PAGINATION-->
                    </div>
                </div>
            </div>
            <!-- END Site-->
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- END CENTER SECTION-->
@stop


@section('footer_scripts')

@stop



