
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id" required="true">
        	    <option value="" style="display: none;" {{ old('user_id', optional($profile)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($Users as $key => $User)
			    <option value="{{ $key }}" {{ old('user_id', optional($profile)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $User }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('profile_uuid') ? 'has-error' : '' }}">
    <label for="profile_uuid" class="col-md-2 control-label">Profile Uuid</label>
    <div class="col-md-10">
        <input class="form-control" name="profile_uuid" type="text" id="profile_uuid" value="{{ old('profile_uuid', optional($profile)->profile_uuid) }}" maxlength="36" placeholder="Enter profile uuid here...">
        {!! $errors->first('profile_uuid', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('profile_image') ? 'has-error' : '' }}">
    <label for="profile_image" class="col-md-2 control-label">Profile Image</label>
    <div class="col-md-10">
        <input class="form-control" name="profile_image" type="text" id="profile_image" value="{{ old('profile_image', optional($profile)->profile_image) }}" min="1" max="4294967295" required="true" placeholder="Enter profile image here...">
        {!! $errors->first('profile_image', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('profile_cpf') ? 'has-error' : '' }}">
    <label for="profile_cpf" class="col-md-2 control-label">Profile Cpf</label>
    <div class="col-md-10">
        <input class="form-control" name="profile_cpf" type="text" id="profile_cpf" value="{{ old('profile_cpf', optional($profile)->profile_cpf) }}" maxlength="40" placeholder="Enter profile cpf here...">
        {!! $errors->first('profile_cpf', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('profile_rg') ? 'has-error' : '' }}">
    <label for="profile_rg" class="col-md-2 control-label">Profile Rg</label>
    <div class="col-md-10">
        <input class="form-control" name="profile_rg" type="text" id="profile_rg" value="{{ old('profile_rg', optional($profile)->profile_rg) }}" maxlength="40" placeholder="Enter profile rg here...">
        {!! $errors->first('profile_rg', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('profile_rg_emissor') ? 'has-error' : '' }}">
    <label for="profile_rg_emissor" class="col-md-2 control-label">Profile Rg Emissor</label>
    <div class="col-md-10">
        <input class="form-control" name="profile_rg_emissor" type="text" id="profile_rg_emissor" value="{{ old('profile_rg_emissor', optional($profile)->profile_rg_emissor) }}" maxlength="40" placeholder="Enter profile rg emissor here...">
        {!! $errors->first('profile_rg_emissor', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('profile_endereco') ? 'has-error' : '' }}">
    <label for="profile_endereco" class="col-md-2 control-label">Profile Endereco</label>
    <div class="col-md-10">
        <input class="form-control" name="profile_endereco" type="text" id="profile_endereco" value="{{ old('profile_endereco', optional($profile)->profile_endereco) }}" maxlength="191" placeholder="Enter profile endereco here...">
        {!! $errors->first('profile_endereco', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('profile_numero') ? 'has-error' : '' }}">
    <label for="profile_numero" class="col-md-2 control-label">Profile Numero</label>
    <div class="col-md-10">
        <input class="form-control" name="profile_numero" type="text" id="profile_numero" value="{{ old('profile_numero', optional($profile)->profile_numero) }}" maxlength="40" placeholder="Enter profile numero here...">
        {!! $errors->first('profile_numero', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('profile_bairro') ? 'has-error' : '' }}">
    <label for="profile_bairro" class="col-md-2 control-label">Profile Bairro</label>
    <div class="col-md-10">
        <input class="form-control" name="profile_bairro" type="text" id="profile_bairro" value="{{ old('profile_bairro', optional($profile)->profile_bairro) }}" maxlength="40" placeholder="Enter profile bairro here...">
        {!! $errors->first('profile_bairro', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('profile_cidade') ? 'has-error' : '' }}">
    <label for="profile_cidade" class="col-md-2 control-label">Profile Cidade</label>
    <div class="col-md-10">
        <input class="form-control" name="profile_cidade" type="text" id="profile_cidade" value="{{ old('profile_cidade', optional($profile)->profile_cidade) }}" maxlength="40" placeholder="Enter profile cidade here...">
        {!! $errors->first('profile_cidade', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('profile_estado') ? 'has-error' : '' }}">
    <label for="profile_estado" class="col-md-2 control-label">Profile Estado</label>
    <div class="col-md-10">
        <input class="form-control" name="profile_estado" type="text" id="profile_estado" value="{{ old('profile_estado', optional($profile)->profile_estado) }}" maxlength="2" placeholder="Enter profile estado here...">
        {!! $errors->first('profile_estado', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('profile_pais') ? 'has-error' : '' }}">
    <label for="profile_pais" class="col-md-2 control-label">Profile Pais</label>
    <div class="col-md-10">
        <input class="form-control" name="profile_pais" type="text" id="profile_pais" value="{{ old('profile_pais', optional($profile)->profile_pais) }}" maxlength="40" placeholder="Enter profile pais here...">
        {!! $errors->first('profile_pais', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('profile_cep') ? 'has-error' : '' }}">
    <label for="profile_cep" class="col-md-2 control-label">Profile Cep</label>
    <div class="col-md-10">
        <input class="form-control" name="profile_cep" type="text" id="profile_cep" value="{{ old('profile_cep', optional($profile)->profile_cep) }}" maxlength="10" placeholder="Enter profile cep here...">
        {!! $errors->first('profile_cep', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('profile_fone1') ? 'has-error' : '' }}">
    <label for="profile_fone1" class="col-md-2 control-label">Profile Fone1</label>
    <div class="col-md-10">
        <input class="form-control" name="profile_fone1" type="text" id="profile_fone1" value="{{ old('profile_fone1', optional($profile)->profile_fone1) }}" maxlength="15" placeholder="Enter profile fone1 here...">
        {!! $errors->first('profile_fone1', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('profile_fone2') ? 'has-error' : '' }}">
    <label for="profile_fone2" class="col-md-2 control-label">Profile Fone2</label>
    <div class="col-md-10">
        <input class="form-control" name="profile_fone2" type="text" id="profile_fone2" value="{{ old('profile_fone2', optional($profile)->profile_fone2) }}" maxlength="15" placeholder="Enter profile fone2 here...">
        {!! $errors->first('profile_fone2', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('profile_fone3') ? 'has-error' : '' }}">
    <label for="profile_fone3" class="col-md-2 control-label">Profile Fone3</label>
    <div class="col-md-10">
        <input class="form-control" name="profile_fone3" type="text" id="profile_fone3" value="{{ old('profile_fone3', optional($profile)->profile_fone3) }}" maxlength="15" placeholder="Enter profile fone3 here...">
        {!! $errors->first('profile_fone3', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('profile_fone4') ? 'has-error' : '' }}">
    <label for="profile_fone4" class="col-md-2 control-label">Profile Fone4</label>
    <div class="col-md-10">
        <input class="form-control" name="profile_fone4" type="text" id="profile_fone4" value="{{ old('profile_fone4', optional($profile)->profile_fone4) }}" maxlength="15" placeholder="Enter profile fone4 here...">
        {!! $errors->first('profile_fone4', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('profile_obs') ? 'has-error' : '' }}">
    <label for="profile_obs" class="col-md-2 control-label">Profile Obs</label>
    <div class="col-md-10">
        <input class="form-control" name="profile_obs" type="text" id="profile_obs" value="{{ old('profile_obs', optional($profile)->profile_obs) }}" maxlength="4294967295" placeholder="Enter profile obs here...">
        {!! $errors->first('profile_obs', '<p class="help-block">:message</p>') !!}
    </div>
</div>

