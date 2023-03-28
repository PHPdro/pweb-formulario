@extends('layouts.main')

@section('title', 'Formulário')

@section('content')

<h1>Escola Virtual</h1>
<h2>Formulário de Pré-Matrícula</h2>

<form action="{{ url('/validacao') }}" method="POST">
    @csrf
    
    <table>

        <tr>
            <th><h3>Dados Pessoais:</h3></th>
        </tr>
        <tr>
            <td class="title"><label>Nome do Aluno:</label></td>
            <td class="input"><input type="text" name="nome_aluno"></td>
        </tr>
        <tr>
            <td class="title"><label>Nascimento:</label></td>
            <td class="input"><input type="date" name="nascimento_aluno"></td>
        </tr>
        <tr>
            <td class="title"><label>Nome da Mãe:</label></td>
            <td class="input"><input type="text" name="nome_mae"></td>
        </tr>
        <tr>
            <td class="title"><label>Nome do pai:</label></td>
            <td class="input"><input type="text" name="nome_pai"></td>
        </tr>
        <tr>
            <td class="title"><label>Telefone:</label> <input type="text" name="ddd" id="ddd" maxlength="2"> </td>
            <td class="input"><input type="tel" name="telefone" maxlength="9"> <small>Formato: (XX) 9XXXXXXXX</small></td>
        </tr>
        <tr>
            <td class="title"><label>E-mail:</label></td>
            <td><input type="text" name="email_aluno"></td>
        </tr>

    </table>

    <table>
        <tr>
            <th><h3>Informações de Matrícula:</h3></th>
        </tr>
        <tr>
            <td>
                <div id="serie">
                    Série: <br>
                    <select name="series">
                        <option value="Ensino Fundamental">Ensino Fundamental</option>
                        <option value="Ensino Médio">Ensino Médio</option>
                    </select>
                </div>
            <td>
                <div id="turno">
                    Turno: <br>
                    <input type="radio" name="turno" value="Manhã">Manhã <br>
                    <input type="radio" name="turno" value="Tarde">Tarde
                </div>
            </td>
            <td>
                <div id="atividadesExtra">
                    Atividades Extracurriculares: <br>
                    <input type="checkbox" class="check" name="extra[]" value="Informática">Informática <br>
                    <input type="checkbox" class="check" name="extra[]" value="Música">Música <br>
                    <input type="checkbox" class="check" name="extra[]" value="Balet">Balet <br>
                    <input type="checkbox" class="check" name="extra[]" value="Pintura">Pintura <br>
                    <input type="checkbox" class="check" name="extra[]" value="Judô">Judô <br>
                    <input type="checkbox" class="check" name="extra[]" value="Futebol">Futebol <br>
                </div>
            </td>
        </tr>
    </table>
    <div id="botoes">
    <button type="submit">Enviar Formulário</button> <button type="reset">Limpar Campos</button>
    </div>
</form>

<script>

var campos = document.querySelectorAll(".check");
var limite = 3;
for (var i = 0; i < campos.length; i++)
  campos[i].onclick = limiteEscolhas;

function limiteEscolhas(event){
  var escolhidos = document.querySelectorAll(".check:checked");
  if (escolhidos.length >= limite + 1)
    return false;
}

</script>

<footer>
    <p>IFAL &copy; 2023</p>
</footer>

@endsection