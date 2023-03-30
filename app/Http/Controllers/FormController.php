<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormController extends Controller {

    private static $contador_erros = 0;
    private static $alunos_cadastrados = array();

    public function index() {

        // PEGANDO OS DADOS PREENCHIDOS

        $nome_aluno = request()->input('nome_aluno');
        $nascimento_aluno = request()->input('nascimento_aluno');
        $nome_mae = request()->input('nome_mae');
        $nome_pai = request()->input('nome_pai');
        $ddd_aluno = request()->input('ddd');
        $telefone_aluno= request()->input('telefone');
        $email_aluno = request()->input('email_aluno');

        // VALIDANDO OS CAMPOS

        $erros = array("ESTE CAMPO É OBRIGATÓRIO", "INVÁLIDO");

        $nome_validado = self::validar_nomes($nome_aluno);
        $nome_mae_validado = self::validar_nomes($nome_mae);
        $nome_pai_validado = self::validar_nomes($nome_pai);
        $nascimento_validado = self::validar_data($nascimento_aluno);
        $ddd_validado = self::validar_ddd($ddd_aluno);
        $telefone_validado = self::validar_telefone($telefone_aluno);
        $email_validado = self::validar_email($email_aluno);

        $resultado_formulario = self::validar_formulario(self::$contador_erros);

        if($resultado_formulario) {

            self::inserir_dados($nome_aluno, $nascimento_aluno, $nome_mae, $nome_pai, $ddd_aluno, $telefone_aluno, $email_aluno);

            $alunos = DB::table('alunos')->select(DB::raw('*'))->get();
            foreach($alunos as $aluno) {
                foreach($aluno as $i) {
                    array_push(self::$alunos_cadastrados, $i);
                }   
            }

        }

        $alunos = self::$alunos_cadastrados;

        return view('validacao', 
        compact('nome_validado',
                'nascimento_validado',
                'nome_mae_validado',
                'nome_pai_validado',
                'ddd_validado',
                'telefone_validado',
                'email_validado',
                'resultado_formulario',
                'nome_aluno',
                'nascimento_aluno',
                'nome_mae',
                'nome_pai',
                'ddd_aluno',
                'telefone_aluno',
                'email_aluno',
                'erros',
                'alunos'
             ));
    }

    public function validar_nomes($nome) {

        if (is_null($nome)) {
            self::$contador_erros += 1;
            return false;
        } else {
            foreach(str_split($nome) as $i) {
                if(is_numeric($i)) {
                    self::$contador_erros += 1;
                    return false;
                }else {
                    $nome = $nome;
                }
            }
            return true;
        }
    }

    public function validar_data($data) {

        if(is_null($data)) {
            self::$contador_erros += 1;
            return false;
        } elseif ($data > date("Y/m/d")) {
            self::$contador_erros += 1;
            return false;
        } else {
           return true;
        }
    }

    public function validar_ddd($ddd) {

        $contador = 0;
        $ddds = array('61', '62', '64', '65', '66', '67', '71', '73', '74', '75', '77',
                      '85', '88', '98', '99', '82', '81', '87', '86', '89', '84', '79',
                      '68', '96', '92', '97', '91', '93', '94', '69', '95', '63', '27',
                      '28', '31', '32', '33', '34', '35', '37', '38', '21', '22', '24',
                      '11', '12', '13', '14', '15', '16', '17', '18', '19', '41', '42',
                      '43', '44', '45', '46', '51', '53', '54', '55', '47', '48', '49'
                    );

        if(is_null($ddd)){
            self::$contador_erros += 1;
            return false;
        } else {

            foreach($ddds as $i) {
                if($i == $ddd) {
                    $ddd = $i;
                    $contador+=1;
                } else {
                    $contador = $contador;
                }
            }

            if ($contador > 0) {
                $ddd = $ddd;
                return true;
            } else {
                self::$contador_erros += 1;
                return false;
            }
        }

    }

    public function validar_telefone($telefone) {

        if (is_null($telefone)) {
            self::$contador_erros += 1;
            return false;
        } elseif (strlen($telefone) < 9 or strpos($telefone, '9') > 0) {
            self::$contador_erros += 1;
            return false;
        } else {
            return true;
        }
    }

    public function validar_email($email) {

        if (is_null($email)) {
            self::$contador_erros += 1;
            return false;
        } else {

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return true;
            } else {
                self::$contador_erros += 1;
                return false;
            }
        }
    }

    public function validar_formulario($erros) {

        if($erros > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function inserir_dados($nome, $data, $mae, $pai, $ddd, $tel, $email) {

        DB::table('alunos') -> insert([
            'nome_aluno' => $nome,
            'nascimento' => $data,
            'nome_mae' => $mae,
            'nome_pai' => $pai,
            'ddd' => $ddd,
            'telefone' => $tel,
            'email' => $email       
        ]);
    }
}