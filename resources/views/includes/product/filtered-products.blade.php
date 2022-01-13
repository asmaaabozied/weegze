@if (count($prods) > 0)
    @foreach ($prods as $key => $prod)
        <div class="col-lg-4 col-md-4 col-6 ">
            <br>

            <a href="{{ route('front.product', $prod->slug) }}" class="item">
                <div class="item-img">
                    @if(!empty($prod->features))
                        <div class="sell-area">
                            @foreach($prod->features as $key => $data1)
                                <span class="sale"
                                      style="background-color:{{ $prod->colors[$key] }}">{{ $prod->features[$key] }}</span>
                            @endforeach
                        </div>
                    @endif
                    <div class="extra-list">
                        <ul>
                            <li>
                                @if(Auth::guard('web')->check())

                                    <span class="add-to-wish" data-href="{{ route('user-wishlist-add',$prod->id) }}"
                                          data-toggle="tooltip" data-placement="right"
                                          title="{{ trans('site.wishlist') }}" data-placement="right"><i
                                            class="icofont-heart-alt"></i>
																</span>

                                @else

                                    <span rel-toggle="tooltip" title="{{trans('site.wishlist')}}" data-toggle="modal"
                                          id="wish-btn" data-target="#comment-log-reg" data-placement="right">
																	<i class="icofont-heart-alt"></i>
																</span>

                                @endif
                            </li>
                            <li>
															<span class="quick-view" rel-toggle="tooltip"
                                                                  title="{{ trans('site.products') }}"
                                                                  href="javascript:;"
                                                                  data-href="{{ route('product.quick',$prod->id) }}"
                                                                  data-toggle="modal" data-target="#quickview"
                                                                  data-placement="right"> <i class="icofont-eye"></i>
															</span>
                            </li>
                            <li>
																<span class="add-to-compare"
                                                                      data-href="{{ route('product.compare.add',$prod->id) }}"
                                                                      data-toggle="tooltip" data-placement="right"
                                                                      title="{{ trans('site.compare') }}"
                                                                      data-placement="right">
																	<i class="icofont-exchange"></i>
																</span>
                            </li>
                        </ul>
                    </div>
                    <img class="img-fluid"
                         src="{{ $prod->photo ? asset('assets/images/products/'.$prod->photo):asset('assets/images/noimage.png') }}"
                         alt="" width="50px" height="50px" style="border: 20px">
                </div>
                <div class="info">
                    <div class="stars">
                        <div class="ratings">
                            <div class="empty-stars"></div>
                            <div class="full-stars" style="width:{{App\Models\Rating::ratings($prod->id)}}%"></div>
                        </div>
                    </div>
                    <h4 class="price">{{ $prod->setCurrency() }} <span id="sizeprice">{{ $prod->showPrice() }}</span>
                        <del><small>{{ $prod->showPreviousPrice() }}</small></del>
                    </h4>
                    <h5 class="name">{{ $prod->showName() }}</h5>
                    <div class="item-cart-area">
                        @if($prod->product_type == "affiliate")
                            <span class="add-to-cart-btn affilate-btn"
                                  data-href="{{ route('affiliate.product', $prod->slug) }}"><i class="icofont-cart"></i>
																	{{ trans('site.affiliate') }}
																</span>
                        @else
                            @if($prod->emptyStock())
                                <span class="add-to-cart-btn cart-out-of-stock">
																	<i class="icofont-close-circled"></i> {{ trans('site.stock')}}
																</span>
                            @else
                                <span class="add-to-cart add-to-cart-btn"
                                      data-href="{{ route('product.cart.add',$prod->id) }}">
																	<i class="icofont-cart"></i> {{ trans('site.cart') }}
																</span>
                                <span class="add-to-cart-quick add-to-cart-btn"
                                      data-href="{{ route('product.cart.quickadd',$prod->id) }}">
																	<i class="icofont-cart"></i> {{ trans('site.quickadd') }}
																</span>
                            @endif
                        @endif
                    </div>
                </div>
            </a>

        </div>
    @endforeach
    <div class="col-lg-12">
        <div class="page-center mt-5">
            {{--						{!! $prods->appends(['search' => request()->input('search')])->links() !!}--}}
        </div>
    </div>
@else
    <div class="col-lg-12">
        <div class="page-center">
            <h4 class="text-center">{{ trans('site.notfound') }}</h4>
        </div>
    </div>
@endif


@if(isset($ajax_check))


    <script type="text/javascript">


        // Tooltip Section


        $('[data-toggle="tooltip"]').tooltip({});
        $('[data-toggle="tooltip"]').on('click', function () {
            $(this).tooltip('hide');
        });


        $('[rel-toggle="tooltip"]').tooltip();

        $('[rel-toggle="tooltip"]').on('click', function () {
            $(this).tooltip('hide');
        });


        // Tooltip Section Ends

    </script>

@endif
