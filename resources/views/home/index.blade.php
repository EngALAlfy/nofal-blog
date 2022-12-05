@extends('layouts.panel')

@section('title')
    @lang('routes.home')
@endsection

@push('actions')
    <style>
        .table-data {
            height: unset;
        }

        .statistic__item {
            min-height: unset;
        }

        .title-3,
        .display-6 {
            font-size: unset;
        }
    </style>
@endpush
@section('content')
    <section class="statistic statistic2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="statistic__item statistic__item--orange">
                        <a href="{{ route('users.index') }}">
                            <h2 class="number">{{ $users_count }}</h2>
                            <span class="desc">@lang('titles.users')</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="statistic__item statistic__item--blue">
                        <a href="{{ route('posts.index') }}">
                            <h2 class="number">{{ $posts_count }}</h2>
                            <span class="desc">@lang('titles.posts')</span>
                        </a>
                    </div>

                </div>


            </div>
        </div>
    </section>
@endsection
