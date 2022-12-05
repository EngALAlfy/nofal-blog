@extends('layouts.panel')

@section('title')
    @lang('titles.posts')
@endsection


@section('content')
    <section>
        <div class="container p-l-30 p-r-30">
            <div class="row">
                    <div class="col-md-12">
                <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th class="sort filter" data-name="name">@lang('labels.title')</th>
                                        <th>@lang('labels.info')</th>
                                        <th>@lang('labels.photo')</th>
                                        <th >@lang('labels.user')</th>
                                        <th >@lang('labels.date')</th>
                                        <th>@lang('labels.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr class="tr-shadow">

                                            <td >{{ $post->title }}</td>
                                            <td class="desc">{{ $post->content }}</td>

                                            <td class="desc"><img src="{{ $post->image }}"></td>

                                            <td>
                                                <span class="block-email"><a href="{{route('users.show' , $post->user )}}">{{ $post->user->name }}</a></span>
                                            </td>

                                            <td>
                                               {{ $post->created_at}}</td>
                                            <td>
                                                <div class="table-data-feature">

                                                    <a href="{{ route('comments.index', $post) }}" class="item"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="@lang('buttons.comments')">
                                                        <i class="zmdi zmdi-comment"></i>
                                                    </a>
                                                    <a href="{{ route('posts.edit', $post) }}" class="item"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="@lang('buttons.edit')">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>

                                                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="item" data-toggle="tooltip"
                                                            data-placement="top" title="@lang('buttons.delete')">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </form>





                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

            </div>
        </div>
    </section>
@endsection



@push('scripts')

@endpush
