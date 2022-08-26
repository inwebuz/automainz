@php
$siteTitle = setting('site.title');
$phone = setting('contact.phone');
$email = setting('contact.email');
$map = setting('contact.map');
$telegram = setting('contact.telegram');
@endphp

<footer class="footer">
    <div class="container">
        <div class="footer__head">
            <a href="#" class="footer__logo">
                <img src="assets/img/logo-automainz.svg" alt="" />
            </a>
            <a href="#" class="footer__social">
                <img src="assets/img/icons/social-facebook.svg" alt="" />
            </a>
            <a href="#" class="footer__social">
                <img src="assets/img/icons/social-twitter.svg" alt="" />
            </a>
            <div class="location location--footer">
                <div class="location__btn">
                    <i class="bx bxs-map"></i>
                    <span>Tashkent</span>
                    <i class="bx bx-chevron-down"></i>
                </div>
                <div class="location__box">
                    <div class="location__in">
                        <h3 class="location__title">Automainz Tashkent</h3>
                        <a href="#" class="location__show">
                            <i class="bx bxs-map"></i>
                            <span>Show on map</span>
                        </a>
                        <p class="location__text">
                            14442 Northampton Dr Granger, Indiana(IN), 46530
                        </p>
                        <a href="tel:9133846697" class="location__number">(913) 384–6697</a>
                        <a href="#" class="btn btn--outlined">View cars at this store</a>
                        <div class="location__search">
                            <div class="input__box input__box--100">
                                <input
                                    type="text"
                                    class="input"
                                    placeholder="Enter ZIP or State"
                                />
                                <button type="submit" class="input__btn">
                                    <i class="bx bx-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="tel:9133846697" class="footer__number"
                ><i class="bx bxs-phone"></i> (913) 384–6697</a
            >
        </div>
        <div class="footer__in">
            <div class="footer__col">
                <h3 class="drawer-btn">
                    <span>Shop</span> <i class="bx bx-chevron-down"></i>
                </h3>
                <ul>
                    <li><a href="#">Browse By Category</a></li>
                    <li><a href="#">View All Inventory</a></li>
                    <li><a href="#">Find a Store</a></li>
                </ul>
            </div>
            <div class="footer__col">
                <h3 class="drawer-btn">
                    <span>Sell/Trade</span> <i class="bx bx-chevron-down"></i>
                </h3>
                <ul>
                    <li><a href="#">Get an Online Offer</a></li>
                </ul>
            </div>
            <div class="footer__col">
                <h3 class="drawer-btn">
                    <span>Finance</span> <i class="bx bx-chevron-down"></i>
                </h3>
                <ul>
                    <li><a href="#">How it Works</a></li>
                    <li><a href="#">Automainz Auto Finance</a></li>
                </ul>
            </div>
            <div class="footer__col">
                <h3 class="drawer-btn">
                    <span>About</span> <i class="bx bx-chevron-down"></i>
                </h3>
                <ul>
                    <li><a href="#">About Automainz</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer__col">
                <h3 class="drawer-btn">
                    <span>Careers</span> <i class="bx bx-chevron-down"></i>
                </h3>
                <ul>
                    <li><a href="#">Search Jobs</a></li>
                </ul>
            </div>
        </div>
        <div class="footer__social--bottom">
            <a href="#" class="footer__social">
                <img src="assets/img/icons/social-facebook.svg" alt="" />
            </a>
            <a href="#" class="footer__social">
                <img src="assets/img/icons/social-twitter.svg" alt="" />
            </a>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container">
            <div class="footer__bottom--in">
                <p class="footer__copy">2022 © «Automainz.com»</p>
                <a href="https://inweb.uz" class="footer__author">
                    <p>Development</p>
                    <span>-</span>
                    <img src="assets/img/logo-inweb.svg" alt="" />
                </a>
            </div>
        </div>
    </div>
</footer>
