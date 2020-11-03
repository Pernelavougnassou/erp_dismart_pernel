<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th>Prenom</th>
        <th>Nom</th>
        <th>Email</th>
        <!-- <th>Password</th> -->
        <th>Fonction</th>
        <th>Role Id</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->prenom }}</td>
                <td>{{ $user->nom }}</td>
                <td>{{ $user->email }}</td>
                <!-- <td>{{ $user->password }}</td> -->
                <td>{{ $user->fonction }}</td>
                @foreach($roles as $role)
                     @if($user->role_id == $role->id)
                        <td>{{ $role->nom_role }}</td>
                    @endif
                @endforeach
                <td>
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('users.show', [$user->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('users.edit', [$user->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Etes-vous sûr?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
