@foreach ($courses as $course)
    @include('course::partials._course', compact('course'))
@endforeach
