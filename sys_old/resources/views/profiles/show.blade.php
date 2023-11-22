@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Profile' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('profiles.profile.destroy', $profile->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('profiles.profile.index') }}" class="btn btn-primary" title="Show All Profile">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('profiles.profile.create') }}" class="btn btn-success" title="Create New Profile">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('profiles.profile.edit', $profile->id ) }}" class="btn btn-primary" title="Edit Profile">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Profile" onclick="return confirm(&quot;Click Ok to delete Profile.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>User</dt>
            <dd>{{ optional($profile->User)->id }}</dd>
            <dt>Profile Uuid</dt>
            <dd>{{ $profile->profile_uuid }}</dd>
            <dt>Profile Image</dt>
            <dd>{{ $profile->profile_image }}</dd>
            <dt>Created At</dt>
            <dd>{{ $profile->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $profile->updated_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $profile->deleted_at }}</dd>
            <dt>Profile Cpf</dt>
            <dd>{{ $profile->profile_cpf }}</dd>
            <dt>Profile Rg</dt>
            <dd>{{ $profile->profile_rg }}</dd>
            <dt>Profile Rg Emissor</dt>
            <dd>{{ $profile->profile_rg_emissor }}</dd>
            <dt>Profile Endereco</dt>
            <dd>{{ $profile->profile_endereco }}</dd>
            <dt>Profile Numero</dt>
            <dd>{{ $profile->profile_numero }}</dd>
            <dt>Profile Bairro</dt>
            <dd>{{ $profile->profile_bairro }}</dd>
            <dt>Profile Cidade</dt>
            <dd>{{ $profile->profile_cidade }}</dd>
            <dt>Profile Estado</dt>
            <dd>{{ $profile->profile_estado }}</dd>
            <dt>Profile Pais</dt>
            <dd>{{ $profile->profile_pais }}</dd>
            <dt>Profile Cep</dt>
            <dd>{{ $profile->profile_cep }}</dd>
            <dt>Profile Fone1</dt>
            <dd>{{ $profile->profile_fone1 }}</dd>
            <dt>Profile Fone2</dt>
            <dd>{{ $profile->profile_fone2 }}</dd>
            <dt>Profile Fone3</dt>
            <dd>{{ $profile->profile_fone3 }}</dd>
            <dt>Profile Fone4</dt>
            <dd>{{ $profile->profile_fone4 }}</dd>
            <dt>Profile Obs</dt>
            <dd>{{ $profile->profile_obs }}</dd>

        </dl>

    </div>
</div>

@endsection