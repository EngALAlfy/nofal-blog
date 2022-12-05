@extends('layouts.panel')

@section('title')
    @lang('routes.comments.index')
@endsection

@push('actions')
    <div class="col-2 text-right p-0"> <a href="{{route('comments.create' , $post)}}" class="au-btn au-btn-icon au-btn--green au-btn--small"> <i class="zmdi zmdi-plus"></i>@lang('buttons.add')</a> </div>
@endpush

@section('content')
    <section>
        <div class="container p-l-30 p-r-30">
            <div class="row">
                    <div class="col-md-12">
                <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th >@lang('labels.user')</th>
                                        <th class="sort filter" data-name="name">@lang('labels.comment')</th>
                                        <th >@lang('labels.date')</th>
                                        <th>@lang('labels.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comments as $comment)
                                        <tr class="tr-shadow">


                                            <td>
                                                <span class="block-email"><a href="{{route('users.show' , $comment->user )}}">{{ $comment->user->name }}</a></span>
                                            </td>
                                            <td >{{ $comment->comment }}</td>
                                            <td>
                                               {{ $comment->created_at}}</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <a href="{{ route('comments.edit',  compact('post' , 'comment')) }}" class="item"
                                                       data-toggle="tooltip" data-placement="top"
                                                       title="@lang('buttons.edit')">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                    <form action="{{ route('comments.destroy', compact('post' , 'comment')) }}" method="POST">
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
