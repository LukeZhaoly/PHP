@if(count($errors))
<div class="alert alert-danger">
    <strong>some errors</strong>
        <ul>
        @foreach($errors as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
</div>
@endif
