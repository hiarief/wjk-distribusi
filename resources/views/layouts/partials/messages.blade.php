{{--  @if (Session::get('success', false))
    <?php $data = Session::get('success'); ?>
    @if (is_array($data))
        @foreach ($data as $msg)
            <div class="alert alert-success" role="alert">
                <i class="fa fa-check"></i>
                {{ $msg }}
            </div>
        @endforeach
    @else
        <div class="alert alert-danger" role="alert">
            <i class="icon fas fa-ban"></i>
            {{ $data }}
        </div>
    @endif
@endif  --}}
@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        <i class="fa fa-check"></i>{{ session('success') }}
    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close btn-sm btn" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fas fa-ban"></i>{{ session('error') }}
    </div>
@endif
