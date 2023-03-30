@extends('layouts.main')     
@section('title', 'Validação')

@section('content')

@if($resultado_formulario)

<h2>FORMULÁRIO PREENCHIDO COM SUCESSO!</h2>

<h2>ALUNOS CADASTRADOS</h2>

<table class="cadastros">
    <tr>
        <td style="text-align:center;">ALUNOS</td>
    </tr>
    <tr>
        <td>{{ $alunos[1] }}</td>
    </tr>
</table>

@else

<h2>FORMULÁRIO NÃO PREENCHIDO CORRETAMENTE</h2>

<table class="result">
    <tr>
        <td>
            @if(is_null($nome_aluno))
            <p class="error">Nome do aluno: {{ $erros[0] }}</p>
            @elseif($nome_validado)
            <p>Nome do aluno: {{ $nome_aluno }}</p>
            @else
            <p class="error">Nome do aluno: {{ $erros[1] }}</p>
            @endif
        </td>
    </tr>
    <tr>
        <td>
            @if(is_null($nascimento_aluno))
            <p class="error">Nascimento: {{ $erros[0] }}</p>
            @elseif($nascimento_validado)
            <p>Nascimento: {{ $nascimento_aluno }}</p>
            @else
            <p class="error">Nascimento: {{ $erros[1] }}</p>
            @endif
        </td>
    </tr>
    <tr>
        <td>
            @if(is_null($nome_mae))
            <p class="error">Nome da mãe: {{ $erros[0] }}</p>
            @elseif($nome_mae_validado)
            <p>Nome da mãe: {{ $nome_mae }}</p>
            @else
            <p class="error">Nome da mãe: {{ $erros[1] }}</p>
            @endif
        </td>
    </tr>
    <tr>
        <td>
            @if(is_null($nome_pai))
            <p class="error">Nome do pai {{ $erros[0] }}</p>
            @elseif($nome_pai_validado)
            <p>Nome do pai: {{ $nome_pai }}</p>
            @else
            <p class="error">Nome do pai: {{ $erros[1] }}</p>
            @endif
        </td>
    </tr>
    <tr>
        <td>
            @if(is_null($ddd_aluno))
            <p class="error">DDD: {{ $erros[0] }}</p>
            @elseif($ddd_validado)
            <p>DDD: {{ $ddd_aluno }}</p>
            @else
            <p class="error">DDD: {{ $erros[1] }}</p>
            @endif
        </td>
    </tr>
    <tr>
        <td>
            @if(is_null($telefone_aluno))
            <p class="error">Telefone: {{ $erros[0] }}</p>
            @elseif($telefone_validado)
            <p>Telefone: {{ $telefone_aluno }}</p>
            @else
            <p class="error">Telefone: {{ $erros[1] }}</p>
            @endif
        </td>
    </tr>
    <tr>
        <td>
            @if(is_null($email_aluno))
            <p class="error">E-mail: {{ $erros[0] }}</p>
            @elseif($email_validado)
            <p>E-mail: {{ $email_aluno }}</p>
            @else
            <p class="error">E-mail: {{ $erros[1] }}</p>
            @endif
        </td>
    </tr>
    <tr>
        <td>
            @if(!empty($_POST['series']))
            <p>Turno: {{ $_POST['series'] }}</p>
            @else
            <p class="error"> ESTE CAMPO É OBRIGATÓRIO</p>
            @endif
        </td>
    </tr>
    <tr>
        <td>
            @if(!empty($_POST['turno']))
            <p>Turno: {{ $_POST['turno'] }}</p>
            @else
            <p class="error">Turno: ESTE CAMPO É OBRIGATÓRIO</p>
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

<a href='/form?nome={{$nome_aluno}}&data={{$nascimento_aluno}}&mae={{$nome_mae}}&pai={{$nome_pai}}&ddd={{$ddd_aluno}}&tel={{$telefone_aluno}}&email={{$email_aluno}}'>VOLTAR PARA O FORMULÁRIO</a>

@endif

@endsection