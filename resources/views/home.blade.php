@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-danger">
                <div class="panel-heading">FIl d'actualité</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Pas de nouveautées.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
