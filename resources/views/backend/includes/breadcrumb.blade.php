<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ $panel ?? 'Dashboard' }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @if(Route::has($base_route . 'index'))
                        <li class="breadcrumb-item"><a href="{{ route($base_route . 'index') }}">{{ $panel }}</a>
                        </li>
                    @endif
                    <li class="breadcrumb-item active">{{ $page }} {{ $panel }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
