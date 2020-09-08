@extends('admin.layout')

@section('content')
    <div class="page-content container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4 style="margin: 0; padding: 10px">Errores en la importación</h4></div>
                    <div class="panel-body">
                        <form action="{{route('import.process.failures')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" style="margin-top:2rem">
                                    <thead>
                                    <tr>
                                        <th>Rut</th>
                                        <th>Vendedor Actual</th>
                                        <th>Vendedor Nuevo</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($values as $value)
                                        <tr>
                                            <td>{{ $value['rut'] }}</td>
                                            <td>
                                                <label for="old_{{ $value['rut'] }}">
                                                    <input
                                                            id="old_{{ $value['rut'] }}"
                                                            type="radio"
                                                            name="vendedor[{{ $value['rut'] }}]"
                                                            value="{{ $value['old'] }}">
                                                    {{ $value['old'] }}
                                                </label>
                                            </td>
                                            <td>
                                                <label for="new_{{ $value['rut'] }}">
                                                    <input
                                                            id="new_{{ $value['rut'] }}"
                                                            type="radio"
                                                            checked
                                                            name="vendedor[{{ $value['rut'] }}]"
                                                            value="{{ $value['new'] }}">
                                                    {{ $value['new'] }}
                                                </label>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-row">
                                <input class="btn btn-primary pull-right" type="submit" value="Guardar Cambios">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection