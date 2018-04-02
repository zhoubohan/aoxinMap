@if(count($errors) > 0)
    <div class="alert alert-danger alert-dismissible" role="alert">
        <ul>
            @foreach( $errors->all() as $error)
            <li>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{{ $error }}</strong>
            </li>
            @endforeach
        </ul>

    </div>
@endif