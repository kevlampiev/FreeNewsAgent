<div class="form-group row">
    <label for="name"
           class="col-md-4 col-form-label text-md-right">Имя</label>

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
           class="col-md-4 col-form-label text-md-right">E-Mail</label>

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



