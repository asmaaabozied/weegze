@extends('layouts.admin')
@section('title')
    {{ __("site.Vendors") }}
@endsection
@section('content')

						<div class="content-area">
							<div class="add-product-content1">
								<div class="row">
									<div class="col-lg-12">
										<div class="product-description">
											<div class="body-area">
											@include('includes.admin.form-error')
											<form action="{{route('admin-vendor-verify-submit',$data->id)}}" method="POST" enctype="multipart/form-data">
												{{csrf_field()}}
												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __('site.details') }} *</h4>
{{--																<p class="sub-heading">{{ __('(In Any Language)') }}</p>--}}
														</div>
													</div>
                                                    <div class="col-lg-7">
                                                        <textarea class="input-field" name="details" required="" placeholder="{{ __('site.details') }}" rows="5"></textarea>
                                                    </div>
												</div>
                                                <input type="hidden" name="user_id" value="{{ $data->id }}">

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">

														</div>
													</div>
													<div class="col-lg-7">
														<button class="addProductSubmit-btn" type="submit">{{ __('site.send') }}</button>
													</div>
												</div>
											</form>


											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

@endsection
