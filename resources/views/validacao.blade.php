@extends('layouts.main')     
@section('title', 'Validação')

@section('content')

<h2>{{ $resultado_formulario }}</h2>

<table class="result">
    <tr>
        <td>
            @if($nome_validado == "ESTE CAMPO É OBRIGATÓRIO." or $nome_validado == "ESTE CAMPO NÃO PODE POSSUIR NÚMEROS.")
            <p style="color:red;">Nome do aluno: {{$nome_validado }}</p>
            @else
            <p>Nome do aluno: {{$nome_validado }}</p>
            @endif
        </td>
    </tr>
    <tr>
        <td>
            @if($nascimento_validado == "ESTE CAMPO É OBRIGATÓRIO." or $nascimento_validado == "INVÁLIDO.")
            <p style="color:red;">Nascimento: {{ $nascimento_validado }}</p>
            @else
            <p>Nascimento: {{ $nascimento_validado }}</p>
            @endif
        </td>
    </tr>
    <tr>
        <td>
            @if($nome_mae_validado == "ESTE CAMPO É OBRIGATÓRIO." or $nome_mae_validado == "ESTE CAMPO NÃO PODE POSSUIR NÚMEROS.")
            <p style="color:red;">Nome da mãe: {{$nome_mae_validado }}</p>
            @else
            <p>Nome da mãe: {{$nome_mae_validado }}</p>
            @endif
        </td>
    </tr>
    <tr>
        <td>
            @if($nome_pai_validado == "ESTE CAMPO É OBRIGATÓRIO." or $nome_pai_validado == "ESTE CAMPO NÃO PODE POSSUIR NÚMEROS.")
            <p style="color:red;">Nome do pai: {{$nome_pai_validado }}</p>
            @else
            <p>Nome do pai: {{$nome_pai_validado }}</p>
            @endif
        </td>
    </tr>
    <tr>
        <td>
            @if($ddd_validado == "ESTE CAMPO É OBRIGATÓRIO." or $ddd_validado == "INVÁLIDO.")
            <p style="color:red;">DDD: {{ $ddd_validado }}</p>
            @else
            <p>DDD: {{ $ddd_validado }}</p>
            @endif
        </td>
    </tr>
    <tr>
        <td>
            @if($telefone_validado == "ESTE CAMPO É OBRIGATÓRIO." or $telefone_validado == "INVÁLIDO.")
            <p style="color:red;">Telefone: {{ $telefone_validado }}</p>
            @else
            <p>Telefone: {{ $telefone_validado }}</p>
            @endif
        </td>
    </tr>
    <tr>
        <td>
            @if($email_validado == "ESTE CAMPO É OBRIGATÓRIO." or $email_validado == "INVÁLIDO.")
            <p style="color:red;">E-mail: {{ $email_validado }}</p>
            @else
            <p>E-mail: {{ $email_validado }}</p>
            @endif
        </td>
    </tr>
    <tr>
        <td>
            @if(!empty($_POST['series']))
            <p>Turno: {{ $_POST['series'] }}</p>
            @else
            <p style="color:red;"> ESTE CAMPO É OBRIGATÓRIO</p>
            @endif
        </td>
    </tr>
    <tr>
        <td>
            @if(!empty($_POST['turno']))
            <p>Turno: {{ $_POST['turno'] }}</p>
            @else
            <p style="color:red;">Turno: ESTE CAMPO É OBRIGATÓRIO</p>
            @endif
        </td>
    </tr>
    <tr>
        <td>
            <p>Atividades Extracurriculares:</p>
            @if(!empty($_POST['extra']))
            @foreach($_POST['extra'] as $selecionadas)
            <p>{{ $selecionadas }}</p>
            @endforeach
            @else
            <p>Nenhuma atividade foi selecionada.</p>
            @endif

        </td>
    </tr>
</table>

@endsection