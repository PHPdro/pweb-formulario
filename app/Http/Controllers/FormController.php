<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller {

    private static $contador_erros = 0;

    public function validacoes() {

        // PEGANDO OS DADOS ENVIADOS NO FORMULÁRIO

        $nome_aluno = request()->input('nome_aluno');
        $nascimento_aluno = request()->input('nascimento_aluno');
        $nome_mae = request()->input('nome_mae');
        $nome_pai = request()->input('nome_pai');
        $ddd_aluno = request()->input('ddd');
        $telefone_aluno= request()->input('telefone');
        $email_aluno = request()->input('email_aluno');

        // VALIDANDO NOMES

        $nome_validado = self::validar_nomes($nome_aluno);
        $nome_mae_validado = self::validar_nomes($nome_mae);
        $nome_pai_validado = self::validar_nomes($nome_pai);

        // VALIDANDO DATA

        $nascimento_validado = self::validar_data($nascimento_aluno);

        // VALIDANDO DDD E TELEFONE

        $ddd_validado = self::validar_ddd($ddd_aluno);
        $telefone_validado = self::validar_telefone($telefone_aluno);

        // VALIDANDO E-MAIL

        $email_validado = self::validar_email($email_aluno);

        $resultado_formulario = self::validar_formulario(self::$contador_erros);
        
        return view('validacao', 
        compact('nome_validado',
                'nascimento_validado',
                'nome_mae_validado',
                'nome_pai_validado',
                'ddd_validado',
                'telefone_validado',
                'email_validado',
                'resultado_formulario', ));
    }

    public function validar_nomes($nome) {

        if (is_null($nome)) {
            $nome = "ESTE CAMPO É OBRIGATÓRIO.";
            self::$contador_erros += 1;
        } else {
            foreach(str_split($nome) as $i) {
                if(is_numeric($i)) {
                    $nome = "ESTE CAMPO NÃO PODE POSSUIR NÚMEROS.";
                    self::$contador_erros += 1;
                    break;
                }else {
                    $nome = $nome;
                }
            }
        }

        return $nome;
    }

    public function validar_data($data) {

        if(is_null($data)) {
            $data = "ESTE CAMPO É OBRIGATÓRIO.";
            self::$contador_erros += 1;
        } elseif ($data > date("Y/m/d")) {
            $data = "INVÁLIDO.";
            self::$contador_erros += 1;
        } else {
            $data = date_create($data);
            $data = date_format($data, "d/m/Y");
        }

        return $data;
    }

    public function validar_ddd($ddd) {
        $contador = 0;
        $ddds = array('61', '62', '64', '65', '66', '67', '71', '73', '74', '75', '77',
                      '85', '88', '98', '99', '82', '81', '87', '86', '89', '84', '79',
                      '68', '96', '92', '97', '91', '93', '94', '69', '95', '63', '27',
                      '28', '31', '32', '33', '34', '35', '37', '38', '21', '22', '24',
                      '11', '12', '13', '14', '15', '16', '17', '18', '19', '41', '42',
                      '43', '44', '45', '46', '51', '53', '54', '55', '47', '48', '49');

        if(is_null($ddd)){
            $ddd = "ESTE CAMPO É OBRIGATÓRIO.";
            self::$contador_erros += 1;
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
            } else {
                $ddd = "INVÁLIDO.";
                self::$contador_erros += 1;
            }
        }

        return $ddd;
    }

    public function validar_telefone($telefone) {

        if (is_null($telefone)) {
            $telefone = "ESTE CAMPO É OBRIGATÓRIO.";
            self::$contador_erros += 1;
        } elseif (strlen($telefone) < 9 or strpos($telefone, '9') > 0) {
            $telefone = "INVÁLIDO";
            self::$contador_erros += 1;
        } else {
            $telefone = $telefone;
        }

        return $telefone;

    }

    public function validar_email($email) {

        if (is_null($email)) {
            $email = "ESTE CAMPO É OBRIGATÓRIO.";
            self::$contador_erros += 1;
        } else {

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email = $email;
            } else {
                $email = "INVÁLIDO.";
                self::$contador_erros += 1;
            }
        }
        
        return $email;
    }

    public function validar_formulario($erros) {

        if($erros > 0) {
            $resultado = "FORMULÁRIO NÃO PREENCHIDO CORRETAMENTE";
        } else {
            $resultado = "FORMULÁRIO PREENCHIDO COM SUCESSO!";
        }
        return $resultado;
    }
}