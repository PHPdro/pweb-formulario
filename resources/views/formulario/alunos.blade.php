@extends('layouts.main')

@section('title', 'Validação')

@section('content')

<h2>FORMULÁRIO PREENCHIDO COM SUCESSO!</h2>

<h2>ALUNOS CADASTRADOS</h2>

<table class="cadastros">

    <tr>
        <th>Id</th> 
        <th>Aluno</th>
        <th>Nascimento</th>
        <th>Mãe</th>
        <th>Pai</th>
        <th>Telefone</th>
        <th>E-mail</th>
        <th>Série</th>
        <th>Turno</th>
    </tr>

    @foreach($alunos as $aluno)
    <tr>
        @foreach($aluno as $informacoes)
        <td>{{ $informacoes }}</td>
        @endforeach
    </tr>
    @endforeach

</table>

<br>
<a href="/form">VOLTAR PARA O FORMULÁRIO</a>

@endsection