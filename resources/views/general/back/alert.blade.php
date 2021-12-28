@if(session()->has('message_type'))

    @if (session()->has('errors_messages'))
        <div class="alert alert-{{ session('message_type') }} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @foreach(session('errors_messages') as $code=>$errors)
                @foreach ($errors as $error)
                    <p>Product Code: {{ $code }} - {{ $error }}</p>
                @endforeach
            @endforeach
        </div>
    @else
        <div class="alert alert-{{ session('message_type') }} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('message') }}
        </div>
    @endif

@endif
