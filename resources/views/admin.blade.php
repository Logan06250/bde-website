@section('content')


<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Liste des étudiants</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Adresse Mail</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                {{$user->id}}
                            </td>
                            <td>
                                {{$user->name}}
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                @if($user->isAdmin())
                                    {{"Administrateur"}}
                                @elseif($user->isBDE())
                                    {{"BDE"}}
                                @elseif($user->isCesi())
                                    {{"Cesi"}}
                                @else()
                                    {{"Etudiant"}}
                                @endif
                            </td>
                            <td>
                                    <a  type="button" href="{{action('AdminController@beStudent', $user->id)}}" class="btn btn-success">Étudiant</a>
                                    <a  type="button" href="{{action('AdminController@beCesi', $user->id)}}" class="btn btn-info">Cesi</a>
                                    <a  type="button" href="{{action('AdminController@beBDE', $user->id)}}" class="btn btn-warning">BDE</a>
                                    <a  type="button" href="{{action('AdminController@beAdmin', $user->id)}}" class="btn btn-danger">Admin</a>
                            </td>
                        </tr>
                    @endforeach
                    
                </table>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection