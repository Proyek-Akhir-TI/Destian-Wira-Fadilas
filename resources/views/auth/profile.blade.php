@extends('themes.ezone.layout')

@section('content')
	<!-- <div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url({{ asset('themes/ezone/assets/img/bg/breadcrumb.jpg') }})">
		<div class="container-fluid">
			<div class="breadcrumb-content text-center">
				<h2>Register</h2>
				<ul>
					<li><a href="#">home</a></li>
					<li>register</li>
				</ul>
			</div>
		</div>
	</div> -->
	<div class="shop-page-wrapper shop-page-padding ptb-50">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3">
					@include('themes.ezone.partials.user_menu')
				</div>
				<div class="col-lg-9">
					@include('admin.partials.flash')
					<div class="login">
						<div class="login-form-container">
							<div class="login-form">
									{!! Form::model($user, ['url' => ['profile']]) !!}
									@csrf

									<div class="form-group row">
										<div class="col-md-6">
											{!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Nama depan', 'required' => true]) !!}
											@error('first_name')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
										<div class="col-md-6">
											{!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Nama belakang', 'required' => true]) !!}
											@error('last_name')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-12">
											{!! Form::text('company', null, ['placeholder' => 'Perusahaan']) !!}
											@error('company')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-12">
											{!! Form::text('address1', null, ['required' => true, 'placeholder' => 'Nomor rumah dan nama jalan']) !!}
											@error('address1')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-12">
											{!! Form::text('address2', null, ['placeholder' => 'Apartemen, Hotel, dsb. (opsional)']) !!}
											@error('address2')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-6">
											{!! Form::select('province_id', $provinces, Auth::user()->province_id, ['id' => 'user-province-id', 'placeholder' => '- Provinsi - ', 'required' => true]) !!}
											@error('province_id')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
										<div class="col-md-6">
											{!! Form::select('city_id', $cities, null, ['id' => 'user-city-id', 'placeholder' => '- Kota/Kabupaten -', 'required' => true])!!}
											@error('city_id')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-6">
											{!! Form::number('postcode', null, ['required' => true, 'placeholder' => 'Kode pos']) !!}
											@error('postcode')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
										<div class="col-md-6">
											{!! Form::text('phone', null, ['required' => true, 'placeholder' => 'Nomor telepon']) !!}
											@error('phone')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-12">
											{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required' => true]) !!}
											@error('email')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
									<div class="button-box">
										<button type="submit" class="default-btn float-right">Perbarui Profil</button>
									</div>
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- register-area end -->
@endsection