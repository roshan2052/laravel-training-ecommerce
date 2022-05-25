<html>
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Slug</th>
            <th>Rank</th>
            <th>Created By</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->rank }}</td>
                <td>{{ $category->created_by }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</html>
