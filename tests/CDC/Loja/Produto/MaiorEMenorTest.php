<?php

namespace CDC\Loja\Produto;

require "./vendor/autoload.php";

use CDC\Loja\Carrinho\CarrinhoDeCompras,
    CDC\Loja\Produto\Produto,
    CDC\Loja\Produto\MaiorEMenor;

use PHPUnit\Framework\TestCase as PHPUnit;

class MaiorEMenorTest extends PHPUnit
{
    public function testOrdemDecrescente()
    {
        $carrinho = new CarrinhoDeCompras();

        $carrinho->adiciona(new Produto("Geladeira", 450.00));
        $carrinho->adiciona(new Produto("Liquidificador", 250.00));
        $carrinho->adiciona(new Produto("Jogo de pratos", 70.00));

        $maiorEMenor = new MaiorEMenor();
        $maiorEMenor->encontra($carrinho);

        $this->assertEquals("Jogo de pratos", $maiorEMenor->getMenor()->getNome());
        $this->assertEquals("Geladeira", $maiorEMenor->getMaior()->getNome());
    }

    public function testApenasUmProduto()
    {
        $carrinho = new CarrinhoDeCompras();

        $carrinho->adiciona(new Produto("Geladeira", 450.00));

        $maiorEMenor = new MaiorEMenor();
        $maiorEMenor->encontra($carrinho);

        $this->assertEquals("Geladeira", $maiorEMenor->getMenor()->getNome());
        $this->assertEquals("Geladeira", $maiorEMenor->getMaior()->getNome());

        // $this->assertInstanceOf("CDC\Loja\Produto\Produto", $maiorEMenor->getMenor());
        // $this->assertInternalType("object", $maiorEMenor->getMenor()); // assertInternalType foi descontinuado https://github.com/sebastianbergmann/phpunit/issues/3369#issuecomment-522486250
        // $this->assertIsObject($maiorEMenor->getMenor()); // Método utilizado no lugar do assertInternalType para o tipo "object"
    }
}