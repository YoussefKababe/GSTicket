@extends('layouts.default')

@section('content')
  <div class="jumbotron">
    <div class="intro col-xs-8">
      <h2>Comment pouvons-nous vous aider?</h2>
      <p>Lancez une discussion avec n'importe quelles questions ou préoccupations.</p>
      <p>Vous pouvez parcourir les discussions publics sur nos produits, et trouver des réponses aux questions fréquemment posées dans notre base de connaissances.</p>
      <p>Vos commentaires sont précieux pour nous aider à construire un meilleur service pour vous.</p>
    </div>
    <div class="links col-xs-12">
      <a href="{{ route('tickets.index') }}" class="btn btn-info btn-lg" role="button">
        Discussions recentes <i class="glyphicon glyphicon-list-alt pull-right"></i>
      </a>
      <a href="{{ route('tickets.create') }}" class="btn btn-info btn-lg" role="button">
        Ouvrir une nouvelle discussion <i class="glyphicon glyphicon-pencil pull-right"></i>
      </a>
    </div>
  </div>
@stop