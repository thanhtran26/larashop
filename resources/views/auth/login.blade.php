@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"style="
    padding: 150px;
    background: #fff;
    border-radius: 5px;
    border-top: 5px solid #ff656c;
    margin: 0 auto;">
            <div class="card">
                <div class="card-header">{{ __('Đăng nhập') }}</div>

                <div class="card-body">
					@if(session('warning'))
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							<span class="font-weight-bold text-danger">
								<i class="fal fa-exclamation-triangle"></i> {{ session('warning') }}
							</span>
						</div>
					@endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right" for="email">Tài khoản</label>
							<div class="col-md-6">
								<input type="text"
									class="form-control{{ ($errors->has('email') || $errors->has('username')) ? ' is-invalid' : '' }}"
									id="email" name="email" value="{{ old('email') }}"
									placeholder="Email hoặc Tên đăng nhập" required />
								@if ($errors->has('email') || $errors->has('username'))
									<span class="invalid-feedback" role="alert">
										<strong>
											{{ empty($errors->first('email')) ? $errors->first('username') : $errors->first('email') }}
										</strong>
									</span>
								@endif
							</div>
						</div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<!-- <div class="form-group row">
							<label class="form-label" for="feedback-recaptcha">Xác thực đăng nhập</label>
							<div class="g-recaptcha @error('g-recaptcha-response') is-invalid @enderror"
								data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"
								data-size="normal"
								data-theme="light">
							</div>
							@error('g-recaptcha-response')
								<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
							@enderror
						</div>
						-->
						
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Ghi nhớ') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Đăng nhập') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Quên mật khẩu?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
	<script src="https://www.google.com/recaptcha/api.js?hl=vi" async defer></script>
@endsection