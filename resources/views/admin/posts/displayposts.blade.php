@include('admin.includes.head')
@include('admin.includes.nav')


<div class="row medium-padding120">
    <div class="product-details">
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="product-details-thumb">
                <div class="swiper-container swiper-swiper-unique-id-0 initialized swiper-container-horizontal swiper-container-fade" data-effect="fade" id="swiper-unique-id-0">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper" style="transition-duration: 0ms;"><div class="product-details-img-wrap swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="0" style="width: 172px; transform: translate3d(0px, 0px, 0px); opacity: 0; transition-duration: 0ms;">
                            <img src="img/product-details.png" alt="product" data-swiper-parallax="-10" style="transform: translate3d(-10px, 0px, 0px); transition-duration: 0ms;">
                        </div>
                        <!-- Slides -->
                        <div class="product-details-img-wrap swiper-slide swiper-slide-active" data-swiper-slide-index="0" style="width: 172px; transform: translate3d(-172px, 0px, 0px); opacity: 1; transition-duration: 0ms;">
                            <img src="img/product-details.png" alt="product" data-swiper-parallax="-10" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                        </div>
                        <div class="product-details-img-wrap swiper-slide swiper-slide-duplicate swiper-slide-next" data-swiper-slide-index="0" style="width: 172px; transform: translate3d(-344px, 0px, 0px); opacity: 0; transition-duration: 0ms;">
                            <img src="img/product-details.png" alt="product" data-swiper-parallax="-10" style="transform: translate3d(10px, 0px, 0px); transition-duration: 0ms;">
                        </div></div>
                </div>
            </div>
        </div>


        <div class="col-lg-6 col-lg-offset-1 col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-1 col-xs-12 col-xs-offset-0">
            <div class="product-details-info">
                <div class="product-details-info-price">$16.99</div>
                <h3 class="product-details-info-title">Marketing Strategy</h3>
                <p class="product-details-info-text">Qolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                    nibham liber tempor cum soluta nobis eleifend option congue nihil uarta decima et quinta.
                    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis.
                </p>

                <div class="quantity">
                    <a href="#" class="quantity-minus">-</a>
                    <input title="Qty" class="email input-text qty text" type="text" value="2">
                    <a href="#" class="quantity-plus">+</a>
                </div>

                <a href="19_cart.html" class="btn btn-medium btn--primary">
                    <span class="text">Add to Cart</span>
                    <i class="seoicon-commerce"></i>
                    <span class="semicircle"></span>
                </a>
            </div>
        </div>
    </div>
</div>



@include('admin.includes.footer')

