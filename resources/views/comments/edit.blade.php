@extends('layouts.panel')

@section('title')
    @lang('titles.edit_comment')
@endsection


@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 p-t-30">
                    <form action="{{ route('comments.update' , compact('post' , 'comment')) }}" enctype="multipart/form-data" method="post" class="">

                        @csrf
                        @method('put')

                        <div class="card">
                            <div class="card-body card-block">


                                <div class="form-group">
                                    <label for="comment" class=" form-control-label">@lang('labels.info')</label>
                                    <textarea  id="comment" name="comment"
                                               rows="9"
                                              class=" form-control" placeholder="@lang('placeholders.info')">{!! $comment->comment !!}</textarea>
                                </div>


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
