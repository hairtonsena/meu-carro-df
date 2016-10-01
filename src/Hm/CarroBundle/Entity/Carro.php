<?php

namespace Hm\CarroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Carro
 *
 * @ORM\Table(name="carro")
 * @ORM\Entity(repositoryClass="Hm\CarroBundle\Repository\CarroRepository")
 */
class Carro
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=50)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", length=50)
     */
    private $modelo;

    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=50)
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="ano_fabricacao", type="string", length=4)
     */
    private $anoFabricacao;

    /**
     * @var int
     *
     * @ORM\Column(name="estoque", type="integer")
     */
    private $estoque;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", length=100)
     */
    private $foto;

    /**
     * @var bool
     *
     * @ORM\Column(name="situacao", type="boolean")
     */
    private $situacao;

    /**
     * @var bool
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Carro
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     *
     * @return Carro
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set marca
     *
     * @param string $marca
     *
     * @return Carro
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set anoFabricacao
     *
     * @param string $anoFabricacao
     *
     * @return Carro
     */
    public function setAnoFabricacao($anoFabricacao)
    {
        $this->anoFabricacao = $anoFabricacao;

        return $this;
    }

    /**
     * Get anoFabricacao
     *
     * @return string
     */
    public function getAnoFabricacao()
    {
        return $this->anoFabricacao;
    }

    /**
     * Set estoque
     *
     * @param integer $estoque
     *
     * @return Carro
     */
    public function setEstoque($estoque)
    {
        $this->estoque = $estoque;

        return $this;
    }

    /**
     * Get estoque
     *
     * @return int
     */
    public function getEstoque()
    {
        return $this->estoque;
    }

    /**
     * Set foto
     *
     * @param string $foto
     *
     * @return Carro
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set situacao
     *
     * @param boolean $situacao
     *
     * @return Carro
     */
    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;

        return $this;
    }

    /**
     * Get situacao
     *
     * @return bool
     */
    public function getSituacao()
    {
        return $this->situacao;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return Carro
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }
}

