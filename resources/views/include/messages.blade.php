@if(session()->has('success'))
    <div class="alert alert-success">{{ session()->get('success') }}</div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger">{{ session()->get('error') }}</div>
@endif

@if($errors->any())
    @foreach($errors as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
@endif
