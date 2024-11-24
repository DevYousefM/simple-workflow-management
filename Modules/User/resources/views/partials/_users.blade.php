@foreach ($users as $user)
    @include('user::partials._user', compact('user'))
@endforeach
