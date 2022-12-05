@extends('layouts.panel')

@section('title')
    @lang('titles.add_post')
@endsection


@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 p-t-30">
                    <form action="{{ route('posts.store') }}" enctype="multipart/form-data" method="post" class="">

                        @csrf
                        @method('post')

                        <div class="card">
                            <div class="card-body card-block">

                                <div class="form-group">
                                    <label for="title" class=" form-control-label">@lang('labels.title')</label>
                                    <input type="text" value="{{ old('title') }}" id="title" name="title"
                                        class=" form-control" placeholder="@lang('placeholders.title')">
                                </div>

                                <div class="form-group">
                                    <label for="content" class=" form-control-label">@lang('labels.info')</label>
                                    <textarea  id="content" name="content"
                                               rows="9"
                                              class=" form-control" placeholder="@lang('placeholders.info')">{!! old('content') !!}</textarea>
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
