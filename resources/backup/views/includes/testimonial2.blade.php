  <!--client review sec start here-->
    <section class="client-review">
        <div class="container cst-container">
            <div class="heading">
                <h2>What Our Clients Say</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme client-review-carousel">
                    
                    <?php $testimonials = \App\Testimonial::where('status',1)->get(); ?>

                    @foreach($testimonials as $t)

                        <div class="item">
                            <div class="review">
                                <p>{{$t->title}}
                                     <span>{{$t->testimonial}}</span></p>
                            </div>
                            <div class="img-text">
                                <figure><img src="{{ url($t->image)}}" alt=""></figure>
                                <figcaption>
                                    <h3>{{$t->name}}</h3>
                                    <p>{{$t->tagline}}</p>
                                </figcaption>
                            </div>
                        </div>

                    @endforeach
                      
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--client review sec end here-->