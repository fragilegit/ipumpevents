<table class="table table-bordered">
    <thead>
        <tr>
            <td width="80">Action</td>
            <td>Name</td>
            <td>Email</td>
            <td>Role</td>
            <td>Events</td>
            
        </tr>
    </thead> 
    <tbody>
        <?php  $currentUser = auth()->user();
            // echo $currentUser->roles->first()->id;
        ?>
        @foreach($users as $user)
        <tr>
            <td>    
                @if(config('cms.default_user_id') == $currentUser->id)
                    <a href="{{ route('users.edit', $user->id)}}" class="btn btn-xs btn-default">
                        <i class="fa fa-edit"></i>
                    </a>
                @else
                    <a href="{{ route('users.edit', $user->id)}}" class="btn btn-xs btn-default">
                        <i class="fa fa-edit"></i>
                    </a>
                @endif
                @if($user->id == config('cms.default_user_id') || $user->id == $currentUser->id)
                    <button onclick = "return false" type="submit" class="btn btn-xs btn-danger disabled">
                        <i class="fa fa-times"></i>
                    </button>
                @else
                    <a href="{{ route('admin.users.confirm', $user->id)}}" type="submit" class="btn btn-xs btn-danger">
                        <i class="fa fa-times"></i>
                    </a>
                @endif
                
            
            </td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->roles->first()->display_name }}</td>
            <td>{{ $user->events->count() }}</td>
        </tr>
        @endforeach
        
    </tbody>  
</table>