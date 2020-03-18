<?php $mobilemenu = ""; ?>

    <div class="close1 cst-navbar">
        <i class="fa fa-times" aria-hidden="true"></i>
    </div>

    <ul class="nav navbar-nav">
        <!-- url(route('product_category')) -->
        <li><a href="{{url(route('product_category'))}}" class="megamenu arrow allpt">All Products
                                <i class="fa fa-angle-down" aria-hidden="true"></i></a>
            <!-- MegaMenu Starts Here-->
            <div class="dropdown-content">

                <!--For Full Screen Menu-->
                <div class="cust-fullmenu">
                    <div class="drop-side">
                        <ul class="nav nav-tabs" role="tablist">

                            <?php $categories = \App\Category::with('subCategory','subCategory.childCategory')->where('parent',0)->where('status',1)->get();  ?>
                                @foreach($categories as $k1 => $cate)
                                <li role="presentation" class="{{$k1 == 0 ? 'active' : ''}}">
                                    <a href="#{{$cate->slug}}" aria-controls="{{$cate->slug}}" role="tab" data-toggle="tab">{{$cate->label}}</a></li>

                                @endforeach

                        </ul>
                    </div>

                    <div class="tab-content">
                        @foreach($categories as $k => $cate)
                        <div role="tabpanel" class="tab-pane {{$k == 0 ? 'active' : ''}}" id="{{$cate->slug}}">
                            <h4 class="header-label"> {{$cate->label}} </h4>
                            <div class="row">

                                <?php $mobilemenu .= "<button class='accordion'>".$cate->label."</button>"; ?>

                                    @foreach($cate->SubCategory as $sub)

                                    <?php
                                                            $mobilemenu .= '<div class="panel">';
                                                            $mobilemenu .= '<div class="drop-rite" id="list1">';
                                                            $mobilemenu .= "<h4>$sub->label</h4>";
                                                            $mobilemenu .= '<div class="cust-list">';

                                                 ?>
                                        <div class="col-sm-6">
                                            <h4 class="header-pane-h4"><a href="{{url($sub->slug)}}">{{$sub->label}}</a></h4> @if($sub->childCategory->count() > 0)
                                            <?php $mobilemenu .= '<ul>'; ?>
                                                <ul>
                                                    @foreach($sub->childCategory as $ch)
                                                    <li><a href="{{url($ch->slug)}}">{{$ch->label}}</a></li>

                                                    <?php $mobilemenu .= "<li><a href='".url($ch->slug)."'>".$ch->label."</a></li>"; ?>

                                                        @endforeach

                                                </ul>
                                                <?php $mobilemenu .= '</ul>'; ?>
                                                    @endif
                                        </div>

                                        <?php
                                                            $mobilemenu .= '</div>';
                                                            $mobilemenu .= '</div>';
                                                            $mobilemenu .= '</div>';

                                                 ?>
                                            @endforeach

                            </div>

                        </div>
                        @endforeach

                    </div>

                </div>

                <div class="cus-accordian">

                    <?= $mobilemenu ?>

                </div>

            </div>
            <!-- MegaMenu Ends Here-->
        </li>

        <li><a href="{{ url( route('how_its_works') ) }}">How it Works</a></li>
        <li><a href="{{url( route('mockup_product_category') )}}">Mockup Generator</a></li>
        <!-- <li><a href="/services/branding-service">Services</a></li> -->

        <li>
            <a href="javascript:void(0)" class="megamenu arrow">Resources
                                <i class="fa fa-angle-down" aria-hidden="true"></i></a>
            <!-- MegaMenu Starts Here-->
            <div class="dropdown-content">

                <!--For Full Screen Menu-->
                <div class="cust-fullmenu">
                    <div class="drop-side">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#printing-tips-pane" aria-controls="printing-tips-pane" role="tab" data-toggle="tab">
                                                               Printing Tips
                                                            </a>
                            </li>
                            <li role="presentation">
                                <a href="#Policies-pane" aria-controls="Policies-pane" role="tab" data-toggle="tab">
                                                               Policies
                                                            </a>
                            </li>

                            <li role="presentation">
                                <a href="#intergrtion-pane" aria-controls="Policies-pane" role="tab" data-toggle="tab">
                                                               Integrations
                                                            </a>
                            </li>

                            <li role="presentation">
                                <a href="#Quality-pane" aria-controls="Policies-pane" role="tab" data-toggle="tab">
                                                               Quality
                                                            </a>
                            </li>

                        </ul>
                    </div>

                    <div class="tab-content">

                        <!--  Start pane -->
                        <div role="tabpanel" class="tab-pane active" id="printing-tips-pane">
                            <h4 class="header-label ">  Printing Tips </h4>
                            <ul class="menu-ul-design">

                                <li><a href="{{ url('print-file-guide') }}">Print file Guideline</a></li>

                                <!-- <li><a href="{{ url( route('transparency_in_dtg_files') ) }}">Print file transparency</a></li>
                                                                <li><a href="{{ url( route('fabric_printing') ) }}">Fabric facts</a></li>
                                                                <li><a href="/important-sublimation-printing-facts">Sublimation facts</a></li>
                                                                <li><a href="/important-facts-about-tshirt-printing">Printing facts</a></li>
                                                                <li><a href="/creating-embroidery-file">Embroidery files</a></li> -->
                            </ul>
                        </div>
                        <!-- end pane -->

                        <!--  Start pane -->
                        <div role="tabpanel" class="tab-pane " id="Policies-pane">
                            <h4 class="header-label "> Policies </h4>
                            <ul>
                                <li><a href="/privacy-policy">Privacy Policy</a></li>
                                <li><a href="/return-policy">Return Policy</a></li>
                                <li><a href="{{ url('terms-of-service') }}">Terms Of Service</a></li>
                                <li><a href="{{ url(route('printgenie.content_guidelines')) }}">Content Guidelines</a></li>

                                <!-- <li><a href="/policies/terms-of-services">Terms of Service</a></li>
                                                                    /privacy-policy<li><a href="/policies/returns">Return Policy</a></li>
                                                                    <li><a href="/policies/content-guidelines">Content Guidelines</a></li>
                                                                    <li><a href="/policies/privacy">Privacy Policy</a></li>
                                                                    <li><a href="/policies/data-processing-terms">Data Processing Terms</a></li>
                                                                    <li><a href="/policies/cookies">Cookie Policy</a></li>
                                                                    <li><a href="/policies/warehousing-fulfillment">Warehouse &amp; Fulfillment Terms of Service</a></li>
                                                                     <li><a href="/policies/affiliate">Affiliate Program Terms of Service</a></li> -->
                            </ul>
                        </div>
                        <!-- end pane -->

                        <!--  Start pane -->
                        <div role="tabpanel" class="tab-pane " id="intergrtion-pane">
                            <h4 class="header-label "> Integrations </h4>
                            <ul>

                                <li><a href="{{url('integrations')}}">Integrations</a></li>

                            </ul>
                        </div>
                        <!-- end pane -->

                        <!--  Start pane -->
                        <div role="tabpanel" class="tab-pane " id="Quality-pane">
                            <h4 class="header-label"> Quality </h4>
                            <ul>
                                <li><a href="{{url('quality')}}">Quality</a></li>
                            </ul>
                        </div>
                        <!-- end pane -->

                    </div>

                </div>

                <div class="cus-accordian">

                    <button class="accordion">Printing Tips</button>

                    <div class="panel">
                        <div class="drop-rite" id="list1">
                            <div class="cust-list">

                                <ul>
                                    <li><a href="{{ url('print-file-guide') }}">Print file Guideline</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <button class="accordion">Policies</button>

                    <div class="panel">
                        <div class="drop-rite" id="list1">

                            <div class="cust-list">

                                <ul>
                                    <li><a href="/privacy-policy">Privacy Policy</a></li>
                                    <li><a href="/return-policy">Return Policy</a></li>
                                    <li><a href="{{ url('terms-of-service') }}">Terms Of Service</a></li>
                                    <li><a href="{{ url(route('printgenie.content_guidelines')) }}">Content Guidelines</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <button class="accordion">Integrations</button>

                    <div class="panel">
                        <div class="drop-rite" id="list1">

                            <div class="cust-list">

                                <ul>
                                    <li><a href="{{url('integrations')}}">Integrations</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <button class="accordion">Quality</button>

                    <div class="panel">
                        <div class="drop-rite" id="list1">

                            <div class="cust-list">

                                <ul>
                                    <li><a href="{{url('quality')}}">Quality</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </li>
        <li><a href="{{url('faq')}}">FAQ</a></li>
        <li><a href="{{ url( route('list_blogs') ) }}">Blogs</a></li>
        <li><a href="{{ url( route('about_us') ) }}">About</a></li>
        <li><a href="{{url('/contactus')}}">Contact</a></li>
    </ul>