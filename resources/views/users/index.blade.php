@extends('layouts.panel')

@section('title')
    @lang('titles.users')
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
                                {{-- <th>
                                    <label class="au-checkbox">
                                        <input type="checkbox">
                                        <span class="au-checkmark"></span>
                                    </label>
                                </th> --}}
                                <th class="">@lang('labels.photo')</th>

                                <th class="sort" data-name="name">@lang('labels.name')
                                </th>
                                {{-- <th>@lang('labels.email')</th> --}}
                                {{-- <th class="sort" data-name="job_title">@lang('labels.job_title')</th> --}}
                                {{-- <th class="sort" data-name="salary">@lang('labels.salary')</th> --}}
                                <th>@lang('labels.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr class="tr-shadow">
                                    {{-- <td>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </td> --}}
                                    <td>
                                        <a href="{{ route('users.show', $user) }}"> <img
                                                src="{{ asset("storage/photos/users/$user->photo") }}"
                                                onerror="this.src='{{ asset('assets/common/img/user.png') }}'"
                                                alt="@lang('labels.photo') : {{ $user->name }}">
                                        </a>
                                    </td>
                                    <td><a href="{{ route('users.show', $user) }}">
                                            <div class="table-data__info">
                                                <h6>{{ $user->name }}</h6>

                                            </div>
                                        </a></td>
                                    {{-- <td>
                                        <span class="block-email">{{ $user->email }}</span>
                                    </td> --}}
                                    {{-- <td class="desc">{{ $user->job_title }}</td> --}}

                                    {{-- <td>
                                        <span class="block-email">{{ $user->salary }}</span>
                                    </td> --}}


                                    <td>
                                        <div class="table-data-feature">

                                            <a href="{{ route('users.edit', $user) }}" class="item"
                                               data-toggle="tooltip" data-placement="top" title="@lang('buttons.edit')">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <form action="{{ route('users.destroy', $user) }}" method="POST">
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
    <!-- table library -->
    @include('includes.larafy-table', ['items' => $users, 'enableAddRoute' => true])

    <script>
        larafy('table', {
            filter: false
        });
    </script>
@endpush
