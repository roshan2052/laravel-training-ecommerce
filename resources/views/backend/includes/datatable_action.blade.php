<div style="display:flex">
    <a class="btn btn-primary btn-sm mr-2"
        href="{{ route($params['base_route'].'show', ['id' => $params['id']]) }}">
        <i class="fas fa-folder">
        </i>
        View
    </a>
    <a class="btn btn-info btn-sm mr-2"
        href="{{ route($params['base_route'].'edit', ['id' => $params['id']]) }}">
        <i class="fas fa-pencil-alt">
        </i>
        Edit
    </a>

    <form action="{{ route($params['base_route'].'destroy',['id' => $params['id']]) }}" method="post">
        @csrf
        @method('delete')
        <button class="btn btn-danger btn-sm delete-confirm" type="button">
        <i class="fas fa-trash"></i>
        Delete
    </button>
    </form>
</div>
