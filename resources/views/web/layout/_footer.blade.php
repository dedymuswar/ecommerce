<div class="footer_top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="widgets_container contact_us">
                    <div class="footer_logo">
                        <a href="#"><img src="{{asset('site/junko/assets/img/logo/logo.png')}}" alt=""></a>
                    </div>
                    <div class="footer_contact">
                        <p>We are a team of designers and developers that
                            create high quality HTML Template, Woocommerce, Shopify Theme.</p>
                        <p><span>Address</span> The Barn, Ullenhall, Henley in Arden B578 5C, England.</p>
                        <p><span>Mobile: </span><a href="tel:+123.456.789">+123.456.789</a> – <a
                                href="tel:+123.456.678">+123.456.678</a> </p>
                        <p><span>Support: </span><a target="_blank"
                                href="https://hasthemes.com/contact-us/">https://hasthemes.com/contact-us/</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="widgets_container widget_menu">
                    <h3>Information</h3>
                    <div class="footer_menu">
                        <ul>
                            {{menu('footer (information)')}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="widgets_container widget_menu">
                    <h3>My Account</h3>
                    <div class="footer_menu">
                        <ul>
                            {{menu('footer (My Account)')}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="widgets_container newsletter">
                    <h3>Follow Us</h3>
                    <div class="footer_social_link">
                        <ul>
                            {{menu('footer', 'web.layout.menu.footer')}}
                        </ul>
                    </div>
                    <div class="subscribe_form">
                        <h3>Join Our Newsletter Now</h3>
                        <form id="mc-form" class="mc-form footer-newsletter">
                            <input id="mc-email" type="email" autocomplete="off" placeholder="Your email address..." />
                            <button id="mc-submit">Subscribe!</button>
                        </form>
                        <!-- mailchimp-alerts Start -->
                        <div class="mailchimp-alerts text-centre">
                            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                            <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                            <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                        </div><!-- mailchimp-alerts end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer_bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="copyright_area">
                    {{setting('site.description')}}
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="footer_payment text-right">
                    <a href="#"><img src="{{asset('site/junko/assets/img/icon/payment.png')}}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>