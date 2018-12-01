@extends('layouts.blank')

@section('pageStyleSheets')
<style>
        .azul, html, body {
            background-color: #2c3e50;
            color: #fff;
        }
    
    </style>
@endsection


@section('content')

<div class="container-fluid azul">
    <br>
<button class="btn btn-outline-default disabled">Olá, {{ Auth::user()->name }}!</button>
        <br><br>
        <div class="row animated fadeIn">
                <div class="col-sm-6 col-12 text-dark">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Importe seus Clientes</h5>
                      <p class="card-text">Aqui você consegue fazer a importação dos seus Clientes. </p>
                      <button id="enviar_arquivo" class="btn btn-primary float-right">Enviar arquivo <i class="fa fa-share" aria-hidden="true"></i></button>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-12 text-dark">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Entregas</h5>
                      <p class="card-text">Aqui você consegue Visualizar as Entregas.</p>
                    <a href="{{url('entregas')}}" class="btn btn-primary float-right">Visualizar Entregas <i class="fa fa-map" aria-hidden="true"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div class="row animated fadeIn">
                    <div class="col-sm-12 col-12 text-dark">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Gerencie seu Clientes</h5>
                          <p class="card-text">Aqui você consegue gerenciar seus Clientes. </p>
                          <button class="btn btn-primary float-right" id="clientes">Visualizar Clientes <i class="fa fa-user-circle"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        
<!-- Modal -->
<div class="modal fade" id="modal_enviar_arquivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Upload de Clientes</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{url('upload-clientes')}}" enctype="multipart/form-data">
              <p>Faça o upload do seus clientes em <code>.CSV</code></p>
              <div class="custom-file">
                    <input type="file" name="arquivo" accept=".csv" class="custom-file-input" id="validatedCustomFile" required>
                    <label class="custom-file-label" for="validatedCustomFile">Selecione o Arquivo ...</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
               </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
              <button type="submit" class="btn btn-primary">Fazer upload</button>
            </div>
          </form>
          </div>
        </div>
      </div>

<!-- clientes -->

<div class="modal fade" id="modal_clientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Clientes</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h4>Clientes Cadastrados</h4>
              <table class="table table-striped">
                <thead>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Data nasc</th>
                  <th>CPF</th>
                  <th>Ação</th>
                </thead>
                <tbody>
                  @foreach($clientes as $cliente)
                  <tr>
                  <td>{{$cliente->nome}}</td>
                  <td>{{$cliente->email}}</td>
                  <td>{{$cliente->data_nascimento}}</td>
                  <td>{{$cliente->cpf}}</td>
                  <td>
                  <a href="{{url('remove-cliente/'.$cliente->id)}}">
                    <button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                  </a>
                  </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
              <button type="submit" class="btn btn-primary">Fazer upload</button>
            </div>
          </div>
        </div>
      </div>

<script type="text/javascript">

    $("#enviar_arquivo").click(() => {
        $("#modal_enviar_arquivo").modal('show');
    });

    $("#clientes").click(() => {
        $("#modal_clientes").modal('show');
    });

</script>



@endsection