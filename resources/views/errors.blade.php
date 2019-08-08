@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show text-left list-unstyled" role="alert">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
    </div>
@endif
