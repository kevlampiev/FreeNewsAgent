@extends('layouts.mainlayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#personal-data">Персональные данные</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#enquieries">Информационные запросы</a>
                    </li>
                </ul>


                <div class="tab-content">
                    <div class="tab-pane fade show active" id="personal-data">
                        <div class="card shadowed-box">

                            <div class="card-body">
                                <form method="POST">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                   class="form-control @error('name') is-invalid @enderror" name="name"
                                                   value="{{ old('name')??$user->name }}" required autocomplete="name"
                                                   autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email"
                                               class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email"
                                                   value="{{ old('email')??$user->email }}" required
                                                   autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password"
                                                   required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="new-password"
                                               class="col-md-4 col-form-label text-md-right">{{ __('new password') }}</label>

                                        <div class="col-md-6">
                                            <input id="new-password" type="password" class="form-control"
                                                   name="newPassword" autocomplete="new-password"
                                                   value="{{old('newPassword')}}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Save') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="enquieries">
                        <div class="card shadowed-box">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur labore quibusdam
                            tenetur. Assumenda deleniti esse eveniet exercitationem magni maiores molestiae numquam
                            placeat ratione, sunt tempora tenetur totam velit. Ab adipisci amet animi, assumenda beatae
                            consequuntur dicta eaque earum ex id ipsam iste molestiae nisi nobis officia perferendis
                            perspiciatis, quidem ratione rem sint suscipit velit voluptates? Architecto assumenda fugit
                            harum hic ipsum laboriosam minus modi molestias nesciunt numquam possimus, praesentium quam
                            qui rem saepe similique vitae. Dignissimos doloremque eum non quis recusandae? Dolor dolorem
                            fugit maxime, porro quia quo recusandae! Adipisci corporis inventore necessitatibus quam!
                            Atque esse ex ipsam laboriosam odio quae repellat saepe sint tempore! Aliquid amet atque
                            autem, dicta dignissimos ea earum, eligendi eum ex exercitationem harum impedit ipsa itaque
                            iusto nesciunt obcaecati, porro quis quisquam rem repellat reprehenderit veniam voluptate.
                            Accusantium at deserunt, dolor dolorem dolores esse, fugit impedit nostrum nulla placeat
                            quae qui recusandae sunt suscipit totam!
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
