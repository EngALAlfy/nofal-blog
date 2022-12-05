@extends('layouts.panel')

@section('title')
    @lang('titles.add_user')
@endsection


@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 p-t-30">
                    <form action="{{ route('users.store') }}" enctype="multipart/form-data" method="post" class="">

                        @csrf
                        @method('post')

                        <div class="card">
                            <div class="card-body card-block">

                                <div class="form-group">
                                    <label for="name" class=" form-control-label">@lang('labels.name')</label>
                                    <input type="text" value="{{ old('name') }}" id="name" name="name"
                                        class=" form-control" placeholder="@lang('placeholders.name')">
                                </div>

                                <div class="form-group">
                                    <label for="email" class=" form-control-label">@lang('labels.email')</label>
                                    <input type="email" value="{{ old('email') }}" id="email" name="email"
                                        class=" form-control" placeholder="@lang('placeholders.email')">
                                </div>
                                <div class="form-group">
                                    <label for="password" class=" form-control-label">@lang('labels.password')</label>
                                    <input type="text" value="{{ old('password') ?? '123456' }}" id="password"
                                        name="password" class=" form-control" placeholder="@lang('placeholders.password')">
                                </div>


                                @include('includes.image-copper', ['hight' => 200, 'width' => 200])


                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> @lang('buttons.save')
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> @lang('buttons.reset')
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
