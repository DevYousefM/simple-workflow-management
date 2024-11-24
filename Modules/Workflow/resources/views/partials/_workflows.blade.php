@foreach ($workflows as $workflow)
    @include('workflow::partials._workflow', compact('workflow'))
@endforeach
