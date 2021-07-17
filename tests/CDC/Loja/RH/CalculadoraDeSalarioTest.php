<?php

namespace CDC\Loja\RH;

require "./vendor/autoload.php";

use PHPUnit\Framework\TestCase as PHPUnit;
use CDC\Loja\RH\CalculadoraDeSalario,
    CDC\Loja\RH\Funcionario;;

class CalculadoraDeSalarioTest extends PHPUnit
{
    public function testCalculoSalarioDesenvolvedoresComSalarioAbaixoDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $desenvolvedor = new Funcionario(
            "Andre", 1500.00, "desenvolvedor"
        );

        $salario = $calculadora->calculaSalario($desenvolvedor);

        $this->assertEquals(1500.00 * 0.9, $salario);
    }

    public function testCalculoSalarioDesenvolvedorComSalarioAcimaDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $desenvolvedor = new Funcionario(
            "Andre", 4000.00, "desenvolvedor"
        );

        $salario = $calculadora->calculaSalario($desenvolvedor);

        $this->assertEquals(4000.00 * 0.8, $salario);
    }

    public function testDeveCalcularSalarioParaDBAsComSalarioAbaixoDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $dba = new Funcionario("Mauricio", 1500.00, "dba");

        $salario = $calculadora->calculaSalario($dba);

        $this->assertEquals(1500.00 * 0.85, $salario);
    }

    public function testDeveCalcularSalarioParaDBAsComSalarioAcimaDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $dba = new Funcionario("Mauricio", 4500.00, "dba");

        $salario = $calculadora->calculaSalario($dba);

        $this->assertEquals(4500.00 * 0.75, $salario);
    }
}