@extends('layouts.app')

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
                                <p>
                                    <a href=""class="button">Editer le role</a>
                                </p>
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