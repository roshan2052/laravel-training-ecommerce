<html>
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Slug</th>
            <th>Rank</th>
            <th>Created Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->rank }}</td>
                <td>{{ $category->created_at->format('Y-m-d') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</html>