@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Enviar Mensaje</div>
                <form method="POST" action="{{ route('mensajes.store') }}">
                    {{ csrf_field() }}
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="form-group {{ $errors->has('recipient_id') ? 'has-error' : '' }}">
                            <select name="recipient_id" class="form-control" >
                                <option value="">Selecciona un usuario</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('recipient_id', '<span class=help-block>:message</span>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                            <textarea name="body" class="form-control" placeholder="Escribe tu mensaje aqui" ></textarea>
                            {!! $errors->first('body', '<span class=help-block>:message</span>') !!}
                        </div>

                         <div class="form-group">
                            <button class="btn btn-primary btn-block">Enviar Mensaje</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
