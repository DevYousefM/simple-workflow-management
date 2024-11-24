@foreach ($departments as $department)
    @include('department::partials._department', compact('department'))
@endforeach
