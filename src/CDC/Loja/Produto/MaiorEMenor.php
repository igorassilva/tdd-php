<?php

namespace CDC\Loja\Produto;

use CDC\Loja\Carrinho\CarrinhoDeCompras;

class MaiorEMenor
{
    private $menor;
    private $maior;

    public function encontra(CarrinhoDeCompras $carrinho)
    {
        foreach ($carrinho->getProdutos() as $produto) {
            if (empty($this->menor) || $produto->getValorTotal() < $this->menor->getValorTotal()) {
                $this->menor = $produto;
            }

            if (empty($this->maior) || $produto->getValorTotal() > $this->maior->getValorTotal()) {
                $this->maior = $produto;
            }
        }
    }

    public function getMenor()
    {
        return $this->menor;
    }

    public function getMaior()
    {
        return $this->maior;
    }
}