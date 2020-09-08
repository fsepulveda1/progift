@extends('admin.layout')

@section('content')
    <div class="page-content container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4 style="margin: 0; padding: 10px">Importación</h4></div>

                    <div class="panel-body" style="padding-top: 10px">
                        <form method='post' action='{{ route('importa') }}' enctype='multipart/form-data' class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="csv_file" class="col-md-4 control-label">Importar un archivo CSV</label>

                                <div class="col-md-6">
                                    <input type='file' name='file' required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <label>
                                        El archivo no debe contener cabeceras.
                                    </label>
                                    <label>
                                        <a href="/ejemplo.csv" target="_blank">Archivo de ejemplo</a>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Importar CSV
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ voyager_asset('js/app.js') }}"></script>
    <script>
        @if($errors->has('file'))
          let alerts = {!! json_encode($errors->first('file')) !!};
          toastr.error(alerts)
        @endif
    </script>
@endsection