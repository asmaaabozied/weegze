@extends('layouts.vendor')
@section('title')
    @lang('site.catalogs')
@endsection
@section('content')
					<input type="hidden" id="headerdata" value="PRODUCT">
					<div class="content-area">
						<div class="mr-breadcrumb">
							<div class="row">
								<div class="col-lg-12">
										<h4 class="heading">@lang('site.catalogs')</h4>
										<ul class="links">
											<li>
												<a href="{{ route('vendor-dashboard') }}">@lang('site.vendor-dashboard') </a>
											</li>
											<li>
												<a href="javascript:;">@lang('site.catalogs') </a>
											</li>
											<li>
												<a href="{{ route('admin-vendor-catalog-index') }}">@lang('site.catalogs')</a>
											</li>
										</ul>
								</div>
							</div>
						</div>
						<div class="product-area">
							<div class="row">
								<div class="col-lg-12">
									<div class="mr-table allproduct">

                        @include('includes.vendor.form-success')

										<div class="table-responsiv">
												<table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
													<thead>
														<tr>
									                        <th>{{ trans('site.name')}}</th>
									                        <th>{{ trans('site.type') }}</th>
									                        <th>{{trans('site.price')}}</th>
									                        <th>{{ trans('site.action') }}</th>
														</tr>
													</thead>
												</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

{{-- HIGHLIGHT MODAL --}}
										<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modal2" aria-hidden="true">


										<div class="modal-dialog highlight" role="document">
										<div class="modal-content">
												<div class="submit-loader">
														<img  src="{{asset('assets/images/'.$gs->admin_loader)}}" alt="">
												</div>
											<div class="modal-header">
											<h5 class="modal-title"></h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											</div>
											<div class="modal-body">

											</div>
											<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('site.submit') }}</button>
											</div>
										</div>
										</div>
</div>

{{-- HIGHLIGHT ENDS --}}

{{-- DELETE MODAL --}}

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

	<div class="modal-header d-block text-center">
		<h4 class="modal-title d-inline-block">langg->lang614 }}</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
	</div>

      <!-- Modal body -->
      <div class="modal-body">
            <p class="text-center">langg->lang615 }}</p>
            <p class="text-center">langg->lang616 }}</p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('site.submit') }}</button>
{{--            <a class="btn btn-danger btn-ok">{{ $langg->lang618 }}</a>--}}
      </div>

    </div>
  </div>
</div>

{{-- DELETE MODAL ENDS --}}

{{-- GALLERY MODAL --}}

		<div class="modal fade" id="setgallery" tabindex="-1" role="dialog" aria-labelledby="setgallery" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">{{ trans('site.image') }}</h5>
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
											<label for="image-upload" id="prod_gallery"><i class="icofont-upload-alt"></i>{{ trans('site.image') }}</label>
									</form>
								</div>
							</div>
							<div class="col-sm-6">
								<a href="javascript:;" class="upload-done" data-dismiss="modal"> <i class="fas fa-check"></i> {{ trans('site.image') }}</a>
							</div>
{{--							<div class="col-sm-12 text-center">( <small>{{ $langg->lang622 }}</small> )</div>--}}
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


{{-- GALLERY MODAL ENDS --}}

@endsection

@section('scripts')

    <script src="{{asset('assets/admin/js/jquery.Jcrop.js')}}"></script>
    <script src="{{asset('assets/admin/js/jquery.SimpleCropper.js')}}"></script>

    <script type="text/javascript">

        // Gallery Section Insert

        $(document).on('click', '.remove-img' ,function() {
            var id = $(this).find('input[type=hidden]').val();
            $('#galval'+id).remove();
            $(this).parent().parent().remove();
        });

        $(document).on('click', '#prod_gallery' ,function() {
            $('#uploadgallery').click();
            $('.selected-image .row').html('');
            $('#geniusform').find('.removegal').val(0);
        });


        $("#uploadgallery").change(function(){
            var total_file=document.getElementById("uploadgallery").files.length;
            for(var i=0;i<total_file;i++)
            {
                $('.selected-image .row').append('<div class="col-sm-6">'+
                    '<div class="img gallery-img">'+
                    '<span class="remove-img"><i class="fas fa-times"></i>'+
                    '<input type="hidden" value="'+i+'">'+
                    '</span>'+
                    '<a href="'+URL.createObjectURL(event.target.files[i])+'" target="_blank">'+
                    '<img src="'+URL.createObjectURL(event.target.files[i])+'" alt="gallery image">'+
                    '</a>'+
                    '</div>'+
                    '</div> '
                );
                $('#geniusform').append('<input type="hidden" name="galval[]" id="galval'+i+'" class="removegal" value="'+i+'">')
            }

        });

        // Gallery Section Insert Ends

    </script>



    <script src="{{asset('assets/admin/js/product.js')}}"></script>
@endsection
