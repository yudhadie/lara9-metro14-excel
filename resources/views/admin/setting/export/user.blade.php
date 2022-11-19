<table>
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>password</th>
            <th>current_team_id</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td></td>
            <td>{{ $user->current_team_id }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
