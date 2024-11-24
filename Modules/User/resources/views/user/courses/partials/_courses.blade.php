@foreach ($courses as $course)
    @include('user::user.courses.partials._course', compact('course'))
@endforeach
