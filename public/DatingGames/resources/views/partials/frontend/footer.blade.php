<footer>
        <div class="custm-foot">
            <div class="container">
                <ul>
                    <li>
                        <a href="/contact-us">
                            Contact Us
                        </a>
                    </li>
                    <li>
                        <a href="/terms-and-conditions">
                            Terms And Conditions
                        </a>
                    </li>
                    <li>
                        <a href="safety-disclaimer">
                            Safety & Disclaimer
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}">
                            Customer Login Area
                        </a>
                    </li>
                    <li>
                        <a href="privacy-policy">
                            Privacy Policy
                        </a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a target="blank" href="https://www.go-kiddy-karts.co.uk/">
                            Go Karts
                        </a>
                    </li>
                    <li>
                        <a target="blank" href="https://www.bodyzorbingparties.com/">
                            Body Zorbing
                        </a>
                    </li>
                    <li>
                        <a target="blank" href="https://www.thewackyscientist.com/">
                            Science
                        </a>
                    </li>
                    <li>
                        <a target="blank" href="https://www.battlefield-manchester.com/">
                            Battlefield Live
                        </a>
                    </li>
                    <li>
                        <a target="blank" href="http://www.manchesterfundays.com">
                            Children’s Fun Days
                        </a>
                    </li>
                    <li>
                        <a target="blank" href="http://www.active4fun.com">
                            Activity Fitness
                        </a>
                    </li>
                    <li>
                        <a target="blank" href="{{ route('landingPage') }}">
                            Fun & Games Dating
                        </a>
                    </li>
                </ul>
                <ul class="contacts">
                    <li>
                        <a target="blank" href="mailto:{{ $settings->email_id }}"><i class="fa fa-envelope" aria-hidden="true"></i> {{ $settings->email_id }} </a>
                    </li>
                    <li>
                        <a target="blank" href="tel:{{ $settings->contact_no }}"><i class="fa fa-mobile" aria-hidden="true"></i> {{ $settings->contact_no }} </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <p> {{ $settings->copyright_text }} </p>
            </div>
        </div>
    </footer>

     @include('cookieConsent::index')