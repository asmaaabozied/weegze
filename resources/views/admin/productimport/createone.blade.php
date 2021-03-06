@extends('layouts.admin')
@section('title')
    {{ __("site.Affiliate Products") }}
@endsection
@section('styles')

<link href="{{asset('assets/admin/css/product.css')}}" rel="stylesheet" />
<link href="{{asset('assets/admin/css/jquery.Jcrop.css')}}" rel="stylesheet" />
<link href="{{asset('assets/admin/css/Jcrop-style.css')}}" rel="stylesheet" />
@endsection
@section('content')

<div class="content-area">
	<div class="mr-breadcrumb">
		<div class="row">
			<div class="col-lg-12">
				<h4 class="heading">{{ __("site.Affiliate Products") }} <a class="add-btn"
						href="{{ route('admin-prod-types') }}"><i class="fas fa-arrow-left"></i> {{ __("site.back") }}</a>
				</h4>
				<ul class="links">
					<li>
						<a href="{{ route('admin.dashboard') }}">{{ __("site.dashboard") }} </a>
					</li>
					<li>
						<a href="javascript:;">{{ __("site.Affiliate Products") }} </a>
					</li>
					<li>
						<a href="{{ route('admin-import-index') }}">{{ __("site.All Products") }}</a>
					</li>
					<li>
						<a href="{{ route('admin-import-create') }}">{{ __("site.Add Affiliate Product") }}</a>
					</li>
				</ul>
			</div>
		</div>
	</div>


	<form action="{{route('admin-import-store')}}" method="POST"
	enctype="multipart/form-data">
	{{csrf_field()}}
        @include('partials._errors')
	<div class="row">
		<div class="col-lg-8">
			<div class="add-product-content">
				<div class="row">
					<div class="col-lg-12">
						<div class="product-description">
							<div class="body-area">

								<div class="gocover"
									style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
								</div>
									@include('includes.admin.form-both')

{{--									<div class="row">--}}
{{--										<div class="col-lg-12">--}}
{{--											<div class="left-area">--}}
{{--												<h4 class="heading">{{ __('site.name') }}* </h4>--}}
{{--												<p class="sub-heading">(In Any Language)</p>--}}
{{--											</div>--}}
{{--										</div>--}}
{{--										<div class="col-lg-12">--}}
{{--											<input type="text" class="input-field" placeholder="{{ __('Enter Product Name') }}"--}}
{{--												name="name" required="">--}}
{{--										</div>--}}
{{--									</div>--}}



                                @bsMultilangualFormTabs
                                <div class="row">
                                    <div class="col-lg-12">



                                        {{ BsForm::text('name')->label(trans('site.name'))}}

                                        {{--											<div class="left-area">--}}
                                        {{--												<h4 class="heading">@lang('site.name')* </h4>--}}
                                        {{--												<p class="sub-heading">{{ __('(In Any Language)') }}</p>--}}
                                        {{--											</div>--}}
                                    </div>
                                    {{--										<div class="col-lg-12">--}}
                                    {{--											<input type="text" class="input-field" placeholder="{{ __('Enter Product Name') }}"--}}
                                    {{--												name="name" required="">--}}
                                    {{--										</div>--}}
                                </div>

                                <div class="row">
                                    {{--                                    <div class="col-lg-12">--}}
                                    {{--                                        <div class="left-area">--}}
                                    {{--                                            <h4 class="heading">--}}
                                    {{--                                                @lang('site.description')*--}}
                                    {{--                                            </h4>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    <div class="col-lg-12">
                                        <div class="text-editor">

                                            {{ BsForm::textarea('details')->attribute('class', 'nic-edit-p')->label(trans('site.description')) }}
                                            {{--                                            <textarea class="nic-edit-p" name="details"></textarea>--}}
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    {{--                                    <div class="col-lg-12">--}}
                                    {{--                                        <div class="left-area">--}}
                                    {{--                                            <h4 class="heading">--}}
                                    {{--                                                {{ __('Product Buy/Return Policy') }}*--}}
                                    {{--                                            </h4>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    <div class="col-lg-12">
                                        <div class="text-editor">
                                            {{--                                            <textarea class="nic-edit-p" name="policy"></textarea>--}}
                                            {{ BsForm::textarea('policy')->attribute('class', 'nic-edit-p')->label(trans('site.Product Buy/Return Policy')) }}

                                        </div>
                                    </div>
                                </div>
                                @endBsMultilangualFormTabs
                                <div class="row">
										<div class="col-lg-12">
											<div class="left-area">
												<h4 class="heading">{{ __('site.sku') }}* </h4>
											</div>
										</div>
										<div class="col-lg-12">
											<input type="text" class="input-field" placeholder="{{ __('Enter Product Sku') }}"
												name="sku" required=""
												>
{{--                                            value="{{ str_random(3).substr(time(), 6,8).str_random(3) }}"--}}

										</div>
									</div>

									<div class="row">
										<div class="col-lg-12">
											<div class="left-area">
												<h4 class="heading">{{ __("site.Product Affiliate Link") }}* </h4>
												<p class="sub-heading">{{ __("site.External Link") }}</p>
											</div>
										</div>
										<div class="col-lg-12">
											<input type="text" class="input-field" placeholder="{{ __("Enter Product Link") }}"
												name="affiliate_link" >
											<div class="checkbox-wrapper">
												<input type="checkbox" name="product_condition_check" class="checkclick"
													id="conditionCheck" value="1">
												<label for="conditionCheck">{{ __('Allow Product Condition') }}</label>
											</div>
										</div>
									</div>

									<div class="showbox">

										<div class="row">
											<div class="col-lg-12">
												<div class="left-area">
													<h4 class="heading">{{ __("site.Product Condition") }}*</h4>
												</div>
											</div>
											<div class="col-lg-12">
												<select name="product_condition">
													<option value="2">{{ __("site.New") }}</option>
													<option value="1">{{ __("site.Used") }}</option>
												</select>
											</div>

										</div>

									</div>

									<div class="row">
										<div class="col-lg-12">
											<div class="left-area">
												<h4 class="heading">{{ __("site.category") }}*</h4>
											</div>
										</div>
										<div class="col-lg-12">
											<select id="cat" name="category_id" required="">
												<option value="">{{ __("site.Select Category") }}</option>
												@foreach($cats as $cat)
												<option data-href="{{ route('admin-subcat-load',$cat->id) }}"
													value="{{ $cat->id }}">{{$cat->name}}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-12">
											<div class="left-area">
												<h4 class="heading">{{ __("site.Sub Category") }}*</h4>
											</div>
										</div>
										<div class="col-lg-12">
											<select id="subcat" name="subcategory_id" disabled="">
												<option value="">{{ __("site.Select Sub Category") }}</option>
											</select>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-12">
											<div class="left-area">
												<h4 class="heading">{{ __("site.Child Category") }}*</h4>
											</div>
										</div>
										<div class="col-lg-12">
											<select id="childcat" name="childcategory_id" disabled="">
												<option value="">{{ __("site.Select Child Category") }}</option>
											</select>
										</div>
									</div>


									<div class="row">
										<div class="col-lg-12">
											<ul class="list">
												<li>
													<input class="checkclick1" name="shipping_time_check" type="checkbox"
														id="check1" value="1">
													<label for="check1">{{ __("Allow Estimated Shipping Time") }}</label>
												</li>
											</ul>
										</div>
									</div>



									<div class="showbox">

										<div class="row">
											<div class="col-lg-12">
												<div class="left-area">
													<h4 class="heading">{{ __("site.Product Estimated Shipping Time") }}* </h4>
												</div>
											</div>
											<div class="col-lg-12">
												<input type="text" class="input-field"
													placeholder="{{ __("site.Estimated Shipping Time") }}" name="ship">
											</div>
										</div>


									</div>

									<div class="row">
										<div class="col-lg-12">
											<div class="left-area">

											</div>
										</div>
										<div class="col-lg-12">
											<ul class="list">
												<li>
													<input name="size_check" type="checkbox" id="size-check" value="1">
													<label for="size-check">{{ __("site.Allow Product Sizes") }}</label>
												</li>
											</ul>
										</div>
									</div>
									<div class="showbox" id="size-display">
										<div class="row">
											<div class="col-lg-12">
											</div>
											<div class="col-lg-12">
												<div class="product-size-details" id="size-section">
													<div class="size-area">
														<span class="remove size-remove"><i class="fas fa-times"></i></span>
														<div class="row">
															<div class="col-md-4 col-sm-6">
																<label>
																	{{ __("site.Size Name") }} :
																	<span>
																		{{ __("(eg. S,M,L,XL,XXL,3XL,4XL)") }}
																	</span>
																</label>
																<input type="text" name="size[]" class="input-field"
																	placeholder="{{ __("site.Size Name") }}">
															</div>
															<div class="col-md-4 col-sm-6">
																<label>
																	{{ __("site.Size Qty") }} :
																	<span>
																		{{ __("(Number of quantity of this size)") }}
																	</span>
																</label>
																<input type="number" name="size_qty[]" class="input-field"
																	placeholder="{{ __("site.Size Qty") }}" value="1" min="1">
															</div>
															<div class="col-md-4 col-sm-6">
																<label>
																	{{ __("site.Size Price") }} :
																	<span>
																		{{ __("(This price will be added with base price)") }}
																	</span>
																</label>
																<input type="number" name="size_price[]" class="input-field"
																	placeholder="{{ __("site.Size Price") }}" value="0" min="0">
															</div>
														</div>
													</div>
												</div>

												<a href="javascript:;" id="size-btn" class="add-more"><i
														class="fas fa-plus"></i>{{ __("Add More Size") }} </a>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<ul class="list">
												<li>
													<input class="checkclick1" name="color_check" type="checkbox" id="check3"
														value="1">
													<label for="check3">{{ __("Allow Product Colors") }}</label>
												</li>
											</ul>
										</div>
									</div>



									<div class="showbox">

										<div class="row">
											<div class="col-lg-12">
												<div class="left-area">
													<h4 class="heading">
														{{ __("site.Product Colors") }}*
													</h4>
													<p class="sub-heading">
														{{ __("(Choose Your Favorite Colors)") }}
													</p>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="select-input-color" id="color-section">
													<div class="color-area">
														<span class="remove color-remove"><i class="fas fa-times"></i></span>
														<div class="input-group colorpicker-component cp">
															<input type="text" name="color[]" value="#000000"
																class="input-field cp" />
															<span class="input-group-addon"><i></i></span>
														</div>
													</div>
												</div>
												<a href="javascript:;" id="color-btn" class="add-more mt-4 mb-3"><i
														class="fas fa-plus"></i>{{ __("Add More Color") }} </a>
											</div>
										</div>

									</div>

									<div class="row" id="stckprod">
										<div class="col-lg-12">
											<div class="left-area">
												<h4 class="heading">{{ __("site.stock") }}*</h4>
												<p class="sub-heading">{{ __("(Leave Empty will Show Always Available)") }}</p>
											</div>
										</div>
										<div class="col-lg-12">
											<input name="stock" type="text" class="input-field"
												placeholder="{{ __("e.g 20") }}">
											<div class="checkbox-wrapper">
												<input type="checkbox" name="measure_check" class="checkclick"
													id="allowProductMeasurement" value="1">
												<label
													for="allowProductMeasurement">{{ __("Allow Product Measurement") }}</label>
											</div>
										</div>
									</div>



									<div class="showbox">

										<div class="row">
											<div class="col-lg-12">
												<div class="left-area">
													<h4 class="heading">{{ __("site.Product Measurement") }}*</h4>
												</div>
											</div>
											<div class="col-lg-6">
												<select id="product_measure">
													<option value="">{{ __("None") }}</option>
													<option value="Gram">{{ __("Gram") }}</option>
													<option value="Kilogram">{{ __("Kilogram") }}</option>
													<option value="Litre">{{ __("Litre") }}</option>
													<option value="Pound">{{ __("Pound") }}</option>
													<option value="Custom">{{ __("Custom") }}</option>
												</select>
											</div>
											<div class="col-lg-6 hidden" id="measure">
												<input name="measure" type="text" id="measurement" class="input-field"
													placeholder="{{ __("Enter Unit") }}">
											</div>
										</div>

									</div>


{{--									<div class="row">--}}
{{--										<div class="col-lg-12">--}}
{{--											<div class="left-area">--}}
{{--												<h4 class="heading">--}}
{{--													{{ __("site.description") }}*--}}
{{--												</h4>--}}
{{--											</div>--}}
{{--										</div>--}}
{{--										<div class="col-lg-12">--}}
{{--											<div class="text-editor">--}}
{{--												<textarea class="nic-edit-p" name="details"></textarea>--}}
{{--											</div>--}}
{{--										</div>--}}
{{--									</div>--}}



{{--									<div class="row">--}}
{{--										<div class="col-lg-12">--}}
{{--											<div class="left-area">--}}
{{--												<h4 class="heading">--}}
{{--													{{ __("site.Product Buy/Return Policy") }}*--}}
{{--												</h4>--}}
{{--											</div>--}}
{{--										</div>--}}
{{--										<div class="col-lg-12">--}}
{{--											<div class="text-editor">--}}
{{--												<textarea class="nic-edit-p" name="policy"></textarea>--}}
{{--											</div>--}}
{{--										</div>--}}
{{--									</div>--}}


									<div class="row">
										<div class="col-lg-12">
											<div class="checkbox-wrapper">
												<input type="checkbox" name="seo_check" value="1" class="checkclick"
													id="allowProductSEO" value="1">
												<label for="allowProductSEO">{{ __("Allow Product SEO") }}</label>
											</div>
										</div>
									</div>



									<div class="showbox">
										<div class="row">
											<div class="col-lg-12">
												<div class="left-area">
													<h4 class="heading">{{ __("site.Meta Tags") }} *</h4>
												</div>
											</div>
											<div class="col-lg-12">
												<ul id="metatags" class="myTags">
												</ul>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-12">
												<div class="left-area">
													<h4 class="heading">
														{{ __("site.Meta Description") }} *
													</h4>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="text-editor">
													<textarea name="meta_description" class="input-field"
														placeholder="{{ __("site.Meta Description") }}"></textarea>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-12 text-center">
											<button class="addProductSubmit-btn"
												type="submit">{{ __("site.add") }}</button>
										</div>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="add-product-content">
				<div class="row">
					<div class="col-lg-12">
						<div class="product-description">
							<div class="body-area">


									<div class="row">
										<div class="col-lg-12">
											<div class="left-area">
												<h4 class="heading">{{ __("site.image") }}*</h4>
											</div>
										</div>
										<div class="col-lg-12">
											<select id="imageSource" name="image_source">
												<option value="file">{{ __("site.file") }}</option>
												<option value="link">{{ __("site.link") }}</option>
											</select>
										</div>
									</div>


									<div id="f-file">
										<div class="row">
											<div class="col-lg-12">
												<div class="left-area">
													<h4 class="heading">{{ __("site.image") }} *</h4>
												</div>
											</div>
											<div class="col-lg-12">
													<div class="panel panel-body">
														<div class="span4 cropme text-center" id="landscape"
														style="width: 100%; height: 285px; border: 1px dashed #ddd; background: #f1f1f1;">

												<a href="javascript:;" id="crop-image" class="d-inline-block mybtn1">
													<i class="icofont-upload-alt"></i> {{ __("Upload Image Here") }}
												</a>
														</div>
													</div>



											</div>
										</div>

										<input type="hidden" id="feature_photo" name="photo" value="">

									</div>

									<div id="f-link" style="display: none;">
										<div class="row">
											<div class="col-lg-12">
												<div class="left-area">
													<h4 class="heading">{{ __("site.Feature Image Link") }}*</h4>
												</div>
											</div>
											<div class="col-lg-12">

												<input type="text" name="photolink" value="" class="input-field">
											</div>
										</div>
									</div>
									<input type="file" name="gallery[]" class="hidden" id="uploadgallery" accept="image/*"
										multiple>
									<div class="row">
										<div class="col-lg-12">
											<div class="left-area">
												<h4 class="heading">
													{{ __("site.Product Gallery Images") }} *
												</h4>
											</div>
										</div>
										<div class="col-lg-12">
											<a href="#" class="set-gallery" data-toggle="modal" data-target="#setgallery">
												<i class="icofont-plus"></i> {{ __("site.Set Gallery") }}
											</a>
										</div>
									</div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                @lang('site.Product Current Price')*
                                            </h4>
                                            <p class="sub-heading">
                                                ({{ __('In') }} {{$sign->name}})
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <input name="price" type="number" class="input-field"
                                               placeholder="{{ __('e.g 20') }}" step="0.01" required="" min="0"
                                               id="prices">
                                    </div>
                                </div>




                                <div class="row">


                                    <div class="col-lg-12">
                                        <label>{{ __('site.type') }}</label>
                                        <select class="form-control" name="typetax_id" id="selecttype">
                                            <option></option>

                                            <option value="Percentage">{{trans('site.Percentage')}}</option>
                                            <option value="Fixed value">{{trans('site.Fixed value')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="left-area">
                                            <h4 class="heading">{{ __('site.discount') }} *</h4>
                                            <p class="sub-heading">@lang('site.Optional')</p>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">

                                        {{ BsForm::text('discount')->attribute('class', 'input-field discount')->placeholder(trans('site.discount')) }}

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="left-area">
                                            <h4 class="heading">@lang('site.Productdiscount')*</h4>
                                            {{--                                            <p class="sub-heading">@lang('site.Optional')</p>--}}
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <input name="previous_price" step="0.01" type="text"
                                               class="input-field"
                                               placeholder="" min="0" id="afterdiscount">
                                    </div>
                                </div>


									<div class="row">
										<div class="col-lg-12">
											<div class="left-area">
												<h4 class="heading">{{ __("Youtube Video URL") }}*</h4>
												<p class="sub-heading">{{ __("(Optional)") }}</p>
											</div>
										</div>
										<div class="col-lg-12">
											<input name="youtube" type="text" class="input-field"
												placeholder="{{ __("Enter Youtube Video URL") }}">
										</div>
									</div>



									<div class="row">
										<div class="col-lg-12">
											<div class="featured-keyword-area">
												<div class="left-area">
													<h4 class="heading">{{ __('site.Feature Tags') }}</h4>
												</div>

												<div class="feature-tag-top-filds" id="feature-section">
													<div class="feature-area">
														<span class="remove feature-remove"><i class="fas fa-times"></i></span>
														<div class="row">
															<div class="col-lg-6">
																<input type="text" name="features[]" class="input-field"
																	placeholder="Enter Your Keyword">
															</div>

															<div class="col-lg-6">
																<div class="input-group colorpicker-component cp">
																	<input type="text" name="colors[]" value="#000000"
																		class="input-field cp" />
																	<span class="input-group-addon"><i></i></span>
																</div>
															</div>
														</div>
													</div>
												</div>

												<a href="javascript:;" id="feature-btn" class="add-fild-btn"><i
														class="icofont-plus"></i> {{ __("site.Add More Field") }}</a>
											</div>
										</div>
									</div>


									<div class="row">
										<div class="col-lg-12">
											<div class="left-area">
												<h4 class="heading">{{ __("site.Tags") }} *</h4>
											</div>
										</div>
										<div class="col-lg-12">
											<ul id="tags" class="myTags">
											</ul>
										</div>
									</div>
									<input type="hidden" name="type" value="Physical">
                                <label for="">{{trans('site.USe Currency')}}</label>

                                <input type="checkbox" name="use_currency" id="use_currency"  value="1"  onclick="show_checked()" checkes="false">
                                {{--                                        {{ BsForm::checkbox('use_currency')->attribute('id', 'use_currency') }}--}}

                                @foreach(\App\Models\Currency::get() as $currency)
                                    <input type="hidden" name="currency_id[]" value="{{$currency->id}}">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="left-area">
                                                <h4 class="heading">{{trans('site.price')}}{{$currency->name}}</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <input type="text" name="currency[]" id="{{$currency->key}}" data-value="{{$currency->value}}"
                                                   class="form-control currecny" data-key="{{$currency->key}}" onkeyup="Checkedkeyed(this)">
                                        </div>
                                    </div>
                                @endforeach
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">@lang('site.status') *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <label class="switch">
                                            <input type="checkbox" name="status" value="1">
                                            <span class="slider round"></span>
                                        </label></div>
                                </div>



                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
</div>

<div class="modal fade" id="setgallery" tabindex="-1" role="dialog" aria-labelledby="setgallery" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">{{ __("site.image") }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">??</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="top-area">
					<div class="row">
						<div class="col-sm-6 text-right">
							<div class="upload-img-btn">
								<label for="image-upload" id="prod_gallery"><i
										class="icofont-upload-alt"></i>{{ __("Upload File") }}</label>
							</div>
						</div>
						<div class="col-sm-6">
							<a href="javascript:;" class="upload-done" data-dismiss="modal"> <i
									class="fas fa-check"></i> {{ __("Done") }}</a>
						</div>
						<div class="col-sm-12 text-center">( <small>{{ __("You can upload multiple Images.") }}</small>
							)</div>
					</div>
				</div>
				<div class="gallery-images">
					<div class="selected-image">
						<div class="row">


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')

    <script>

        function Checkedkeyed (data) {

            if ($('#use_currency').attr('checkes') == 'true') {

                var use_currency = $("#use_currency").val();


                var currency_from_key = $(data).data('key');
                var price = $(data).val();

                // console.log(change_currency(currency_from_key,'EGP',price));

                var divs = document.getElementsByClassName('currecny');

                console.log(divs);
                var currency_to_key = '';
                for (let i = 0; i < divs.length; ++i) {
                    currency_to_key = divs[i].getAttribute('data-key');
                    divs[i].value = change_currency(currency_from_key, currency_to_key, price);
                }


                // }

                function change_currency(from_currecny, to_cuurency, price) {
                    let CurrencyJson = @json($currecny_json);

                    return Math.round(CurrencyJson[from_currecny][to_cuurency] * price);
                }
            }
        }
        function show_checked() {
            if ($('#use_currency').attr('checkes') == 'false') {
                // $(this).prop('checked',true);

                $('input[name="use_currency"]').attr('checkes', 'true');



                // }else{
                //         $(this).prop('checked',false);
                //
                //         // $('input[name="use_currency"]').prop('checked', false);
                //
                //     }

            }else if($('#use_currency').attr('checkes')=='true') {

                $('input[name="use_currency"]').attr('checkes','false');

            }



            if ($('#use_currency').attr('checkes') == 'true') {

                Checkedkeyed();

                // alert($('#use_currency').attr('checkes'));

            }else if($('#use_currency').attr('checkes') == 'false'){

                console.log('error');


                // }

            }
        }
        // var  use_currency = $("#use_currency").val();
        // alert($('input[name="use_currency"]').attr('checked'));
        // if($('input[name="use_currency"]').is(':checked')){
        // if(document.getElementById('use_currency').checked) {
        // $("#use_currency").click(function() {


        // if(("#use_currency").is('checked',true)) {

        // if($('input[name="use_currency"]').attr('checked') == true)
        // {
        // if(use_currency){
        //     if (!empty(use_currency)) {
        {{--    if($('#use_currency').attr('checkes')=='true')--}}
        {{--    {--}}

        {{--    // if($('#use_currency').prop('checked')==true) {--}}
        {{--        //     if (this.checked) {--}}
        {{--        // console.log(use_currency);--}}

        {{--        $('.currecny').on('keyup', function (e) {--}}
        {{--            var currency_from_key = $(this).data('key');--}}
        {{--            var price = $(this).val();--}}

        {{--            // console.log(change_currency(currency_from_key,'EGP',price));--}}

        {{--            var divs = document.getElementsByClassName('currecny');--}}

        {{--            console.log(divs);--}}
        {{--            var currency_to_key = '';--}}
        {{--            for (let i = 0; i < divs.length; ++i) {--}}
        {{--                currency_to_key = divs[i].getAttribute('data-key');--}}
        {{--                divs[i].value = change_currency(currency_from_key, currency_to_key, price);--}}
        {{--            }--}}
        {{--        });--}}

        {{--        // }--}}

        {{--        function change_currency(from_currecny, to_cuurency, price) {--}}
        {{--            let CurrencyJson = @json($currecny_json);--}}

        {{--            return Math.round(CurrencyJson[from_currecny][to_cuurency] * price);--}}
        {{--        }--}}
        {{--    }--}}
        {{--    else{--}}
        {{--        console.log($('#use_currency').prop('checked'));--}}
        {{--    }--}}
        {{--}--}}
        // jQuery('input#dollars').change(function () {
        //     var dollars = jQuery('input#dollars').val();
        //
        //     jQuery('input#egyptian').val(16 * dollars);
        //     jQuery('input#riyals').val(0.3 * dollars);
        //     jQuery('input#sudanese').val(426 * dollars);
        // });


        jQuery('input.discount').change(function () {
            var discount = jQuery('input.discount').val();

            var price = jQuery('input#prices').val();
            var selecttype = jQuery('select#selecttype').val();
            if(selecttype=='Fixed value')

                jQuery('input#afterdiscount').val(price - discount);


            else

                jQuery('input#afterdiscount').val(price-(price*(discount/100)));




            endif



        });

    </script>

<script src="{{asset('assets/admin/js/jquery.Jcrop.js')}}"></script>
<script src="{{asset('assets/admin/js/jquery.SimpleCropper.js')}}"></script>

<script type="text/javascript">
	// Gallery Section Insert

	$(document).on('click', '.remove-img', function () {
		var id = $(this).find('input[type=hidden]').val();
		$('#galval' + id).remove();
		$(this).parent().parent().remove();
	});

	$(document).on('click', '#prod_gallery', function () {
		$('#uploadgallery').click();
		$('.selected-image .row').html('');
		$('#geniusform').find('.removegal').val(0);
	});


	$("#uploadgallery").change(function () {
		var total_file = document.getElementById("uploadgallery").files.length;
		for (var i = 0; i < total_file; i++) {
			$('.selected-image .row').append('<div class="col-sm-6">' +
				'<div class="img gallery-img">' +
				'<span class="remove-img"><i class="fas fa-times"></i>' +
				'<input type="hidden" value="' + i + '">' +
				'</span>' +
				'<a href="' + URL.createObjectURL(event.target.files[i]) + '" target="_blank">' +
				'<img src="' + URL.createObjectURL(event.target.files[i]) + '" alt="gallery image">' +
				'</a>' +
				'</div>' +
				'</div> '
			);
			$('#geniusform').append('<input type="hidden" name="galval[]" id="galval' + i +
				'" class="removegal" value="' + i + '">')
		}

	});

	// Gallery Section Insert Ends
</script>

<script type="text/javascript">
	$('#imageSource').on('change', function () {
		var file = this.value;
		if (file == "file") {
			$('#f-file').show();
			$('#f-link').hide();
			$('#f-link').find('input').prop('required', false);
		}
		if (file == "link") {
			$('#f-file').hide();
			$('#f-link').show();
			$('#f-link').find('input').prop('required', true);
		}
	});
</script>

<script type="text/javascript">
	$('.cropme').simpleCropper();
</script>

<script src="{{asset('assets/admin/js/product.js')}}"></script>
@endsection
