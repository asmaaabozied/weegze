@extends('layouts.vendor')
@section('title')
    {{trans('site.physical')}}
@endsection
@section('styles')

<link href="{{asset('assets/vendor/css/product.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/admin/css/jquery.Jcrop.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/admin/css/Jcrop-style.css')}}" rel="stylesheet"/>

@endsection
@section('content')

	<div class="content-area">
		<div class="mr-breadcrumb">
			<div class="row">
				<div class="col-lg-12">
						<h4 class="heading">  {{trans('site.edit')}} <a class="add-btn" href="{{ route('vendor-prod-index') }}"><i class="fas fa-arrow-left"></i> {{ trans('site.back')}}</a></h4>
						<ul class="links">
							<li>
							<a href="{{ route('vendor-dashboard') }}">{{ trans('site.dashboard') }}</a>
							</li>
							<li>
							<a href="javascript:;"> {{trans('site.physical')}} </a>
							</li>
							<li>
								<a href="javascript:;"> {{trans('site.physical')}}</a>
							</li>
							<li>
								<a href="{{ route('vendor-prod-edit',$data->id) }}"> {{trans('site.edit')}}</a>
							</li>
						</ul>
				</div>
			</div>
		</div>
        {{ BsForm::resource('prod')->putModel($data, route('vendor-prod-update', $data)) }}

{{--		<form  action="{{route('vendor-prod-update',$data->id)}}" method="POST" enctype="multipart/form-data">--}}
{{--			{{csrf_field()}}--}}

		<div class="row">
			<div class="col-lg-8">
				<div class="add-product-content">
					<div class="row">
						<div class="col-lg-12">
							<div class="product-description">
								<div class="body-area">

							  <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>

								@include('includes.vendor.form-both')

                                    @bsMultilangualFormTabs
                                    <div class="row">
                                        <div class="col-lg-12">


                                            {{ BsForm::text('name')->label(trans('site.name'))}}


                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-lg-12">
                                            <div class="text-editor">

                                                {{ BsForm::textarea('details')->attribute('class', 'nic-edit-p')->label(trans('site.description')) }}
                                                {{--                                            <textarea class="nic-edit-p" name="details"></textarea>--}}
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">

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
													<h4 class="heading">{{ trans('site.sku') }}* </h4>
											</div>
										</div>
										<div class="col-lg-12">
											<input type="text" class="input-field" placeholder="{{ trans('site.sku') }}" name="sku" required="" value="{{ $data->sku }}">

											<div class="checkbox-wrapper">
											  <input type="checkbox" name="product_condition_check" class="checkclick" id="conditionCheck" value="1" {{ $data->product_condition != 0 ? "checked":"" }}>
											  <label for="conditionCheck">{{ trans('site.conditionCheck') }}</label>
											</div>

										</div>
									</div>

									<div class="{{ $data->product_condition == 0 ? "showbox":"" }}">




									</div>

									<div class="row">
										<div class="col-lg-12">
											<div class="left-area">
													<h4 class="heading">{{ trans('site.categories') }}*</h4>
											</div>
										</div>
										<div class="col-lg-12">
												<select id="cat" name="category_id" required="">
														<option>{{trans('site.select')}}</option>

								  @foreach($cats as $cat)
									  <option data-href="{{ route('vendor-subcat-load',$cat->id) }}" value="{{$cat->id}}" {{$cat->id == $data->category_id ? "selected":""}} >{{$cat->name}}</option>
								  @endforeach
												 </select>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-12">
											<div class="left-area">
													<h4 class="heading">{{ trans('site.subcategory') }}*</h4>
											</div>
										</div>
										<div class="col-lg-12">
												<select id="subcat" name="subcategory_id">
													<option value="">{{ trans('site.select')}}</option>
										  @if($data->subcategory_id == null)
										  @foreach($data->category->subs as $sub)
										  <option data-href="{{ route('vendor-childcat-load',$sub->id) }}" value="{{$sub->id}}" >{{$sub->name}}</option>
										  @endforeach
										  @else
										  @foreach($data->category->subs as $sub)
										  <option data-href="{{ route('vendor-childcat-load',$sub->id) }}" value="{{$sub->id}}" {{$sub->id == $data->subcategory_id ? "selected":""}} >{{$sub->name}}</option>
										  @endforeach
										  @endif


												</select>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-12">
											<div class="left-area">
													<h4 class="heading">{{ trans('site.childcategory') }}*</h4>
											</div>
										</div>
										<div class="col-lg-12">
												<select id="childcat" name="childcategory_id" {{$data->subcategory_id == null ? "disabled":""}}>
													  <option value="">{{trans('site.select') }}</option>
										  @if($data->subcategory_id != null)
										  @if($data->childcategory_id == null)
										  @foreach($data->subcategory->childs as $child)
										  <option value="{{$child->id}}" >{{$child->name}}</option>
										  @endforeach
										  @else
										  @foreach($data->subcategory->childs as $child)
										  <option value="{{$child->id}} " {{$child->id == $data->childcategory_id ? "selected":""}}>{{$child->name}}</option>
										  @endforeach
										  @endif
										  @endif
												</select>
										</div>
									</div>


									@php
										$selectedAttrs = json_decode($data->attributes, true);
										// dd($selectedAttrs);
									@endphp


									{{-- Attributes of category starts --}}
									<div id="catAttributes">
										@php
											$catAttributes = !empty($data->category->attributes) ? $data->category->attributes : '';
										@endphp
										@if (!empty($catAttributes))
											@foreach ($catAttributes as $catAttribute)
												<div class="row">
													 <div class="col-lg-12">
															<div class="left-area">
																 <h4 class="heading">{{ $catAttribute->name }} *</h4>
															</div>
													 </div>
													 <div class="col-lg-12">
														 @php
															 $i = 0;
														 @endphp
														 @foreach ($catAttribute->attribute_options as $optionKey => $option)
															 @php
																$inName = $catAttribute->input_name;
																$checked = 0;
															 @endphp


															 <div class="row">
																 <div class="col-lg-5">
																	 <div class="custom-control custom-checkbox">
																		  <input type="checkbox" id="{{ $catAttribute->input_name }}{{$option->id}}" name="{{ $catAttribute->input_name }}[]" value="{{$option->name}}" class="custom-control-input attr-checkbox"
																		  @if (is_array($selectedAttrs) && array_key_exists($catAttribute->input_name,$selectedAttrs))
																			  @if (is_array($selectedAttrs["$inName"]["values"]) && in_array($option->name, $selectedAttrs["$inName"]["values"]))
																				  checked
																				 @php
																					 $checked = 1;
																				 @endphp
																			  @endif
																		  @endif
																		  >
																		  <label class="custom-control-label" for="{{ $catAttribute->input_name }}{{$option->id}}">{{ $option->name }}</label>
																	 </div>
																 </div>

																 <div class="col-lg-7 {{ $catAttribute->price_status == 0 ? 'd-none' : '' }}">
																		<div class="row">
																			 <div class="col-2">
																					+
																			 </div>
																			 <div class="col-10">
																					<div class="price-container">
																						 <span class="price-curr">{{ $sign->sign }}</span>
																						 <input type="text" class="input-field price-input" id="{{ $catAttribute->input_name }}{{$option->id}}_price" data-name="{{ $catAttribute->input_name }}_price[]" placeholder="0.00 (Additional Price)" value="{{ !empty($selectedAttrs["$inName"]['prices'][$i]) && $checked == 1 ? $selectedAttrs["$inName"]['prices'][$i] : '' }}">
																					</div>
																			 </div>
																		</div>
																 </div>
															 </div>


															 @php
																 if ($checked == 1) {
																	 $i++;
																 }
															 @endphp
															@endforeach
													 </div>

												</div>
											@endforeach
										@endif
									</div>
									{{-- Attributes of category ends --}}


									{{-- Attributes of subcategory starts --}}
									<div id="subcatAttributes">
										@php
											$subAttributes = !empty($data->subcategory->attributes) ? $data->subcategory->attributes : '';
										@endphp
										@if (!empty($subAttributes))
											@foreach ($subAttributes as $subAttribute)
												<div class="row">
													 <div class="col-lg-12">
															<div class="left-area">
																 <h4 class="heading">{{ $subAttribute->name }} *</h4>
															</div>
													 </div>
													 <div class="col-lg-12">
															 @php
																 $i = 0;
															 @endphp
															 @foreach ($subAttribute->attribute_options as $option)
																 @php
																	$inName = $subAttribute->input_name;
																	$checked = 0;
																 @endphp

																 <div class="row">
																	<div class="col-lg-5">
																	   <div class="custom-control custom-checkbox">
																		  <input type="checkbox" id="{{ $subAttribute->input_name }}{{$option->id}}" name="{{ $subAttribute->input_name }}[]" value="{{$option->name}}" class="custom-control-input attr-checkbox"
																		  @if (is_array($selectedAttrs) && array_key_exists($subAttribute->input_name,$selectedAttrs))
																		  @php
																		  $inName = $subAttribute->input_name;
																		  @endphp
																		  @if (is_array($selectedAttrs["$inName"]["values"]) && in_array($option->name, $selectedAttrs["$inName"]["values"]))
																		  checked
																		  @php
																			 $checked = 1;
																		  @endphp
																		  @endif
																		  @endif
																		  >
																		  <label class="custom-control-label" for="{{ $subAttribute->input_name }}{{$option->id}}">{{ $option->name }}</label>
																	   </div>
																	</div>
																	<div class="col-lg-7 {{ $subAttribute->price_status == 0 ? 'd-none' : '' }}">
																	   <div class="row">
																		  <div class="col-2">
																			 +
																		  </div>
																		  <div class="col-10">
																			 <div class="price-container">
																				<span class="price-curr">{{ $sign->sign }}</span>
																				<input type="text" class="input-field price-input" id="{{ $subAttribute->input_name }}{{$option->id}}_price" data-name="{{ $subAttribute->input_name }}_price[]" placeholder="0.00 (Additional Price)" value="{{ !empty($selectedAttrs["$inName"]['prices'][$i]) && $checked == 1 ? $selectedAttrs["$inName"]['prices'][$i] : '' }}">
																			 </div>
																		  </div>
																	   </div>
																	</div>
																 </div>
																 @php
																	 if ($checked == 1) {
																		 $i++;
																	 }
																 @endphp
																@endforeach

													 </div>
												</div>
											@endforeach
										@endif
									</div>
									{{-- Attributes of subcategory ends --}}


									{{-- Attributes of child category starts --}}
									<div id="childcatAttributes">
										@php
											$childAttributes = !empty($data->childcategory->attributes) ? $data->childcategory->attributes : '';
										@endphp
										@if (!empty($childAttributes))
											@foreach ($childAttributes as $childAttribute)
												<div class="row">
													 <div class="col-lg-12">
															<div class="left-area">
																 <h4 class="heading">{{ $childAttribute->name }} *</h4>
															</div>
													 </div>
													 <div class="col-lg-12">
														 @php
															 $i = 0;
														 @endphp
														 @foreach ($childAttribute->attribute_options as $optionKey => $option)
															 @php
																$inName = $childAttribute->input_name;
																$checked = 0;
															 @endphp
															 <div class="row">
																	 <div class="col-lg-5">
																		 <div class="custom-control custom-checkbox">
																			  <input type="checkbox" id="{{ $childAttribute->input_name }}{{$option->id}}" name="{{ $childAttribute->input_name }}[]" value="{{$option->name}}" class="custom-control-input attr-checkbox"
																			  @if (is_array($selectedAttrs) && array_key_exists($childAttribute->input_name,$selectedAttrs))
																				  @php
																					 $inName = $childAttribute->input_name;
																				  @endphp
																				  @if (is_array($selectedAttrs["$inName"]["values"]) && in_array($option->name, $selectedAttrs["$inName"]["values"]))
																					  checked
																					 @php
																						 $checked = 1;
																					 @endphp
																				  @endif
																			  @endif
																			  >
																			  <label class="custom-control-label" for="{{ $childAttribute->input_name }}{{$option->id}}">{{ $option->name }}</label>
																		 </div>
																  </div>


																	<div class="col-lg-7 {{ $childAttribute->price_status == 0 ? 'd-none' : '' }}">
																		 <div class="row">
																				<div class="col-2">
																					 +
																				</div>
																				<div class="col-10">
																					 <div class="price-container">
																							<span class="price-curr">{{ $sign->sign }}</span>
																							<input type="text" class="input-field price-input" id="{{ $childAttribute->input_name }}{{$option->id}}_price" data-name="{{ $childAttribute->input_name }}_price[]" placeholder="0.00 (Additional Price)" value="{{ !empty($selectedAttrs["$inName"]['prices'][$i]) && $checked == 1 ? $selectedAttrs["$inName"]['prices'][$i] : '' }}">
																					 </div>
																				</div>
																		 </div>
																	</div>
															 </div>
															 @php
																 if ($checked == 1) {
																	 $i++;
																 }
															 @endphp
															@endforeach
													 </div>

												</div>
											@endforeach
										@endif
									</div>
									{{-- Attributes of child category ends --}}



									<div class="row">
										<div class="col-lg-12">
											<div class="left-area">

											</div>
										</div>
										<div class="col-lg-12">
											<ul class="list">
												<li>
													<input class="checkclick1" name="shipping_time_check" type="checkbox" id="check1" value="1" {{$data->ship != null ? "checked":""}}>
													<label for="check1">{{ trans('site.ship') }}</label>
												</li>
											</ul>
										</div>
									</div>



									<div class="{{ $data->ship != null ? "":"showbox" }}">

									<div class="row">
										<div class="col-lg-12">
											<div class="left-area">
													<h4 class="heading">{{ trans('site.ship')}}* </h4>
											</div>
										</div>
										<div class="col-lg-12">
											<input type="text" class="input-field" placeholder="{{ trans('site.ship')}}" name="ship" value="{{ $data->ship == null ? "" : $data->ship }}">
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
													<input name="size_check" type="checkbox" id="size-check" value="1" {{ !empty($data->size) ? "checked":"" }}>
													<label for="size-check">{{ trans('site.size')}}</label>
												</li>
											</ul>
										</div>
									</div>
										<div class="{{ !empty($data->size) ? "":"showbox" }}" id="size-display">
										<div class="row">
												<div  class="col-lg-12">
												</div>
												<div  class="col-lg-12">
													<div class="product-size-details" id="size-section">
														@if(!empty($data->size))
														 @foreach($data->size as $key => $data1)
															<div class="size-area">
															<span class="remove size-remove"><i class="fas fa-times"></i></span>
															<div  class="row">
																	<div class="col-md-4 col-sm-6">
																		<label>

																		</label>
																		<input type="text" name="size[]" class="input-field" placeholder="{{trans('site.size') }}" value="{{ $data->size[$key] }}">
																	</div>
																	<div class="col-md-4 col-sm-6">
																			<label>
{{--																				{{ $langg->lang651 }} :--}}
{{--																				<span>--}}
{{--																					{{ $langg->lang652 }}--}}
{{--																				</span>--}}
																			</label>
																		<input type="number" name="size_qty[]" class="input-field" placeholder="{{trans('site.quantity') }}" min="1" value="{{ $data->size_qty[$key] }}">
																	</div>
																	<div class="col-md-4 col-sm-6">
																			<label>
{{--																				{{ $langg->lang653 }} :--}}
{{--																				<span>--}}
{{--																					{{ $langg->lang654 }}--}}
{{--																				</span>--}}
																			</label>
																		<input type="number" name="size_price[]" class="input-field" placeholder="{{ trans('site.price') }}" min="0" value="{{ $data->size_price[$key] }}">
																	</div>
																</div>
															</div>
														 @endforeach
														@else
															<div class="size-area">
															<span class="remove size-remove"><i class="fas fa-times"></i></span>
															<div  class="row">
																	<div class="col-md-4 col-sm-6">
																		<label>
{{--																			{{ $langg->lang649 }} :--}}
{{--																			<span>--}}
{{--																				{{ $langg->lang650 }}--}}
{{--																			</span>--}}
																		</label>
																		<input type="text" name="size[]" class="input-field" placeholder="{{ trans('site.size') }}">
																	</div>
																	<div class="col-md-4 col-sm-6">
																			<label>
                                                                                langg	 :
																				<span>

																				</span>
																			</label>
																		<input type="number" name="size_qty[]" class="input-field" placeholder="{{ trans('site.quantity') }}" value="1" min="1">
																	</div>
																	<div class="col-md-4 col-sm-6">
																			<label>
{{--																				{{ $langg->lang653 }} :--}}
{{--																				<span>--}}
{{--																					{{ $langg->lang654 }}--}}
{{--																				</span>--}}
																			</label>
																		<input type="number" name="size_price[]" class="input-field" placeholder="{{ trans('site.price') }}" value="0" min="0">
																	</div>
																</div>
															</div>
														@endif
													</div>

													<a href="javascript:;" id="size-btn" class="add-more"><i class="fas fa-plus"></i>{{ trans('site.add') }} </a>
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
													<input class="checkclick1" name="color_check" type="checkbox" id="check3" value="1" {{ !empty($data->color) ? "checked":"" }}>
													<label for="check3">{{trans('site.color') }}</label>
												</li>
											</ul>
										</div>
									</div>



									<div class="{{ !empty($data->color) ? "":"showbox" }}">

										<div class="row">
											@if(!empty($data->color))
												<div  class="col-lg-12">
													<div class="left-area">
{{--														<h4 class="heading">--}}
{{--															{{ $langg->lang657 }}*--}}
{{--														</h4>--}}
{{--														<p class="sub-heading">--}}
{{--															{{ $langg->lang658 }}--}}
{{--														</p>--}}
													</div>
												</div>
												<div  class="col-lg-12">
														<div class="select-input-color" id="color-section">
															@foreach($data->color as $key => $data1)
															<div class="color-area">
																<span class="remove color-remove"><i class="fas fa-times"></i></span>
																<div class="input-group colorpicker-component cp">
																  <input type="text" name="color[]" value="{{ $data->color[$key] }}"  class="input-field cp"/>
																  <span class="input-group-addon"><i></i></span>
																</div>
															 </div>
															 @endforeach
														 </div>
														<a href="javascript:;" id="color-btn" class="add-more mt-4 mb-3"><i class="fas fa-plus"></i>{{ trans('site.add') }} </a>
												</div>
											@else
												<div  class="col-lg-12">
													<div class="left-area">
{{--														<h4 class="heading">--}}
{{--															{{ $langg->lang657 }}*--}}
{{--														</h4>--}}
{{--														<p class="sub-heading">--}}
{{--															{{ $langg->lang658 }}--}}
{{--														</p>--}}
													</div>
												</div>
												<div  class="col-lg-12">
														<div class="select-input-color" id="color-section">
															<div class="color-area">
																<span class="remove color-remove"><i class="fas fa-times"></i></span>
																<div class="input-group colorpicker-component cp">
																  <input type="text" name="color[]" value="#000000"  class="input-field cp"/>
																  <span class="input-group-addon"><i></i></span>
																</div>
															 </div>
														 </div>
														<a href="javascript:;" id="color-btn" class="add-more mt-4 mb-3"><i class="fas fa-plus"></i>{{ trans('site.add') }} </a>
												</div>


											@endif
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
													<input class="checkclick1" name="whole_check" type="checkbox" id="whole_check" value="1" {{ !empty($data->whole_sell_qty) ? "checked":"" }}>
													<label for="whole_check">{{ trans('site.sell')}}</label>
												</li>
											</ul>
										</div>
									</div>

								<div class="{{ !empty($data->whole_sell_qty) ? "":"showbox" }}">
									<div class="row">
										<div class="col-lg-12">
											<div class="left-area">

											</div>
										</div>
										<div class="col-lg-12">
											<div class="featured-keyword-area">
												<div class="feature-tag-top-filds" id="whole-section">
													@if(!empty($data->whole_sell_qty))

														 @foreach($data->whole_sell_qty as $key => $data1)

													<div class="feature-area">
														<span class="remove whole-remove"><i class="fas fa-times"></i></span>
														<div class="row">
															<div class="col-lg-6">
															<input type="number" name="whole_sell_qty[]" class="input-field" placeholder="{{ trans('site.quantity') }}" min="0" value="{{ $data->whole_sell_qty[$key] }}" required="">
															</div>

															<div class="col-lg-6">
															<input type="number" name="whole_sell_discount[]" class="input-field" placeholder="{{ trans('site.discount') }}" min="0" value="{{ $data->whole_sell_discount[$key] }}" required="">
															</div>
														</div>
													</div>


															@endforeach
													@else


													<div class="feature-area">
														<span class="remove whole-remove"><i class="fas fa-times"></i></span>
														<div class="row">
															<div class="col-lg-6">
															<input type="number" name="whole_sell_qty[]" class="input-field" placeholder="{{ trans('site.quantity') }}" min="0">
															</div>

															<div class="col-lg-6">
															<input type="number" name="whole_sell_discount[]" class="input-field" placeholder="{{ trans('site.discount') }}" min="0" />
															</div>
														</div>
													</div>

													@endif
												</div>

												<a href="javascript:;" id="whole-btn" class="add-fild-btn"><i class="icofont-plus"></i> {{ trans('site.add') }}</a>
											</div>
										</div>
									</div>
								</div>


									<div class="{{ !empty($data->size) ? "showbox":"" }}" id="stckprod">
									<div class="row">
										<div class="col-lg-12">
											<div class="left-area">
{{--													<h4 class="heading">{{ $langg->lang669 }}*</h4>--}}
{{--													<p class="sub-heading">{{ $langg->lang670 }}</p>--}}
											</div>
										</div>
										<div class="col-lg-12">
											<input name="stock" type="text" class="input-field" placeholder="{{ trans('site.stock') }}" value="{{ $data->stock }}">
											<div class="checkbox-wrapper">
												<input type="checkbox" name="measure_check" class="checkclick1" id="allowProductMeasurement" value="1" {{ $data->measure == null ? '' : 'checked' }}>
												<label for="allowProductMeasurement">{{ trans('site.allowProductMeasurement') }}</label>
											</div>
										</div>
									</div>

									</div>

								<div class="{{ $data->measure == null ? 'showbox' : '' }}">

									<div class="row">
										<div class="col-lg-12">
											<div class="left-area">
{{--													<h4 class="heading">{{ $langg->lang672 }}*</h4>--}}
											</div>
										</div>
										<div class="col-lg-12">
												<select id="product_measure">
												  <option value="" {{$data->measure == null ? 'selected':''}}></option>
												  <option value="Gram" {{$data->measure == 'Gram' ? 'selected':''}}>{{ trans('site.Gram')}}</option>
												  <option value="Kilogram" {{$data->measure == 'Kilogram' ? 'selected':''}}>{{ trans('site.Kilogram') }}</option>
												  <option value="Litre" {{$data->measure == 'Litre' ? 'selected':''}}>{{ trans('site.Litre') }}</option>
												  <option value="Pound" {{$data->measure == 'Pound' ? 'selected':''}}>{{ trans('site.Pound') }}</option>
												  <option value="Custom" {{ in_array($data->measure,explode(',', 'Gram,Kilogram,Litre,Pound')) ? '' : 'selected' }}>{{trans('site.all ')}}</option>
												 </select>
										</div>
										<div class="col-lg-1"></div>
										<div class="col-lg-3 {{ in_array($data->measure,explode(',', 'Gram,Kilogram,Litre,Pound')) ? 'hidden' : '' }}" id="measure">
											<input name="measure" type="text" id="measurement" class="input-field" placeholder="{{ trans('site.measure') }}" value="{{$data->measure}}">
										</div>
									</div>

								</div>




									<div class="row">
										<div class="col-lg-12">
										<div class="checkbox-wrapper">
										  <input type="checkbox" name="seo_check" value="1" class="checkclick" id="allowProductSEO" {{ ($data->meta_tag != null || strip_tags($data->meta_description) != null) ? 'checked':'' }}>
										  <label for="allowProductSEO">{{ trans('site.meta_tag') }}</label>
										</div>
										</div>
									</div>



									<div class="{{ ($data->meta_tag == null && strip_tags($data->meta_description) == null) ? "showbox":"" }}">
									  <div class="row">
										<div class="col-lg-12">
										  <div class="left-area">
											  <h4 class="heading">{{ trans('site.meta_tag') }} *</h4>
										  </div>
										</div>
										<div class="col-lg-12">
										  <ul id="metatags" class="myTags">
											  @if(!empty($data->meta_tag))
												@foreach ($data->meta_tag as $element)
												  <li>{{  $element }}</li>
												@endforeach
											@endif
										  </ul>
										</div>
									  </div>

									  <div class="row">
										<div class="col-lg-12">
										  <div class="left-area">
											<h4 class="heading">
												{{ trans('site.meta_description') }} *
											</h4>
										  </div>
										</div>
										<div class="col-lg-12">
										  <div class="text-editor">
											<textarea name="meta_description" class="input-field" placeholder="{{ trans('site.meta_description') }}">{{ $data->meta_description }}</textarea>
										  </div>
										</div>
									  </div>
									</div>




									<div class="row">
										<div class="col-lg-12 text-center">
											<button class="addProductSubmit-btn" type="submit">{{ trans('site.submit') }}</button>
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
                                                            <h4 class="heading">{{ __("site.Feature Image") }} *</h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="panel panel-body">
                                                            <div class="span4 cropme text-center" id="landscape"
                                                                 style="width: 100%; height: 285px; border: 1px dashed #ddd; background: #f1f1f1;">
                                                                <a href="javascript:;" id="crop-image"
                                                                   class="d-inline-block mybtn1">
                                                                    <i class="icofont-upload-alt"></i> {{ __("Upload Image Here") }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <input type="hidden" id="feature_photo" name="photo" value="{{ $data->photo }}">

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="left-area">
                                                            <h4 class="heading">
                                                                {{ __("site.images") }} *
                                                            </h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <a href="javascript" class="set-gallery" data-toggle="modal"
                                                           data-target="#setgallery">
                                                            <input type="hidden" value="{{$data->id}}">
                                                            <i class="icofont-plus"></i> {{ __("site.Set Gallery") }}
                                                        </a>
                                                    </div>
                                                </div>


												<div class="row">
													<div class="col-lg-12">
														<div class="left-area">
															<h4 class="heading">
																{{ trans('site.price') }}*
															</h4>
														</div>
													</div>
													<div class="col-lg-12">
														<input name="price" step="0.1" type="number" class="input-field form-control" placeholder="{{ trans('site.price') }}" value="{{round($data->price * $sign->value , 2)}}" required="" min="0" id="prices">
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

                                                        {{ BsForm::number('discount discount')->attribute('class', 'input-field discount')->placeholder(trans('site.discount'))->value($data->discount) }}

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="left-area">
                                                            <h4 class="heading">@lang('site.Productdiscount')*</h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <input name="previous_price" step="0.01" type="number"
                                                               class="input-field"
                                                               placeholder="" min="0" id="afterdiscount" value="{{$data->previous_price}}">
                                                    </div>
                                                </div>

{{--												<div class="row">--}}
{{--													<div class="col-lg-12">--}}
{{--														<div class="left-area">--}}
{{--																<h4 class="heading">{{ trans('site.Product Previous Price') }}*</h4>--}}
{{--																<p class="sub-heading">{{ $langg->lang668 }}</p>--}}
{{--														</div>--}}
{{--													</div>--}}
{{--													<div class="col-lg-7">--}}
{{--														<input name="previous_price" step="0.1" type="number" class="input-field form-control" placeholder="{{ trans('site.previous_price')}}" value="{{round($data->previous_price * $sign->value , 2)}}" min="0">--}}
{{--													</div>--}}
{{--												</div>--}}



												<div class="row">
													<div class="col-lg-12">
														<div class="left-area">
														</div>
													</div>
													<div class="col-lg-12">
														<input  name="youtube" type="text" class="input-field" placeholder="{{ trans('site.youtube') }}" value="{{$data->youtube}}">
													</div>
												</div>


												<div class="row">
													<div class="col-lg-12">
														<div class="left-area">

														</div>
													</div>
													<div class="col-lg-12">
														<div class="featured-keyword-area">
															<div class="left-area">
																<h4 class="heading">{{ trans('site.features') }}</h4>
															</div>

															<div class="feature-tag-top-filds" id="feature-section">
																@if(!empty($data->features))

																	 @foreach($data->features as $key => $data1)

																<div class="feature-area">
																	<span class="remove feature-remove"><i class="fas fa-times"></i></span>
																	<div class="row">
																		<div class="col-lg-6">
																		<input type="text" name="features[]" class="input-field" placeholder="{{ trans('site.features') }}" value="{{ $data->features[$key] }}">
																		</div>

																		<div class="col-lg-6">
											                                <div class="input-group colorpicker-component cp">
											                                  <input type="text" name="colors[]" value="{{ $data->colors[$key] ?? '' }}" class="input-field cp"/>
											                                  <span class="input-group-addon"><i></i></span>
											                                </div>
																		</div>
																	</div>
																</div>


																		@endforeach
																@else

																<div class="feature-area">
																	<span class="remove feature-remove"><i class="fas fa-times"></i></span>
																	<div class="row">
																		<div class="col-lg-6">
																		<input type="text" name="features[]" class="input-field" placeholder="{{ trans('site.features') }}">
																		</div>

																		<div class="col-lg-6">
											                                <div class="input-group colorpicker-component cp">
											                                  <input type="text" name="colors[]" value="#000000" class="input-field cp"/>
											                                  <span class="input-group-addon"><i></i></span>
											                                </div>
																		</div>
																	</div>
																</div>

																@endif
															</div>

															<a href="javascript:;" id="feature-btn" class="add-fild-btn"><i class="icofont-plus"></i> {{ trans('site.add') }}</a>
														</div>
													</div>
												</div>


						                        <div class="row">
						                          <div class="col-lg-12">
						                            <div class="left-area">
						                                <h4 class="heading">{{ trans('site.tags') }} *</h4>
						                            </div>
						                          </div>
						                          <div class="col-lg-12">
						                            <ul id="tags" class="myTags">
						                            	@if(!empty($data->tags))
							                                @foreach ($data->tags as $element)
							                                  <li>{{  $element }}</li>
							                                @endforeach
						                                @endif
						                            </ul>
						                          </div>
						                        </div>

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
                                                                   class="form-control currecny" data-key="{{$currency->key}}" onkeyup="Checkedkeyed(this)" value="{{$data->showProductCurrency($currency->id)}}">
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
                                                            <input type="checkbox" name="status" value="1" @if($data->status) checked @endif>
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
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">langg->lang619 }}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="top-area">
						<div class="row">
							<div class="col-sm-6 text-right">
								<div class="upload-img-btn">
									<form  method="POST" enctype="multipart/form-data" id="form-gallery">
										{{ csrf_field() }}
									<input type="hidden" id="pid" name="product_id" value="">
									<input type="file" name="gallery[]" class="hidden" id="uploadgallery" accept="image/*" multiple>
											<label id="prod_gallery"><i class="icofont-upload-alt"></i>{{ trans('site.image') }}</label>
									</form>
								</div>
							</div>
							<div class="col-sm-6">
								<a href="javascript:;" class="upload-done" data-dismiss="modal"> <i class="fas fa-check"></i> {{ trans('site.image') }}</a>
							</div>
							<div class="col-sm-12 text-center">( <small>{{ trans('site.image') }}</small> )</div>
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
        $('.cropme').simpleCropper();
    </script>


    <script type="text/javascript">
        $(document).ready(function () {

            let html =
                `<img src="{{ empty($data->photo) ? asset('assets/images/noimage.png') : asset('assets/images/products/'.$data->photo) }}" alt="">`;
            $(".span4.cropme").html(html);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        });


        $('.ok').on('click', function () {

            setTimeout(
                function () {


                    var img = $('#feature_photo').val();

                    $.ajax({
                        url: "{{route('admin-prod-upload-update',$data->id)}}",
                        type: "POST",
                        data: {
                            "image": img
                        },
                        success: function (data) {
                            if (data.status) {
                                $('#feature_photo').val(data.file_name);
                            }
                            if ((data.errors)) {
                                for (var error in data.errors) {
                                    $.notify(data.errors[error], "danger");
                                }
                            }
                        }
                    });

                }, 1000);


        });
    </script>

    <script src="{{asset('assets/admin/js/product.js')}}"></script>
@endsection
