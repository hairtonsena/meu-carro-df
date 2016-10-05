<?php

namespace Hm\CarroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\Column(name="marca", type="string", length=50)
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", length=50)
     */
    private $modelo;

    /**
     * @var string
     *
     * @ORM\Column(name="combustivel", type="string", length=50)
     */
    private $combustivel;

    /**
     * @var int
     *
     * @ORM\Column(name="ano_fabricacao", type="integer")
     */
    private $anoFabricacao;

    /**
     * @var int
     *
     * @ORM\Column(name="ano_modelo", type="integer")
     */
    private $anoModelo;

    /**
     * @var string
     *
     * @ORM\Column(name="cor_predominante", type="string", length=20)
     */
    private $corPredominante;

    /**
     * @var int
     *
     * @ORM\Column(name="estoque", type="integer")
     */
    private $estoque;


      /**

     * @var bool
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @Assert\File(maxSize = "5M",
     *     mimeTypes = {"image/jpeg", "image/gif", "image/png", "image/tiff"},
     *     maxSizeMessage = "The maxmimum allowed file size is 5MB.",
     *     mimeTypesMessage = "Only the filetypes image are allowed.")
     */
    private $image;

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return float
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * @param float $preco
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }


    /**
     * @var float
     *
     * @ORM\Column(name="preco", type="decimal")
     */
    private $preco;

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
     * Set combustivel
     *
     * @param string $combustivel
     *
     * @return Carro
     */
    public function setCombustivel($combustivel)
    {
        $this->combustivel = $combustivel;

        return $this;
    }

    /**
     * Get combustivel
     *
     * @return string
     */
    public function getCombustivel()
    {
        return $this->combustivel;
    }

    /**
     * Set anoFabricacao
     *
     * @param integer $anoFabricacao
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
     * @return int
     */
    public function getAnoFabricacao()
    {
        return $this->anoFabricacao;
    }

    /**
     * Set anoModelo
     *
     * @param integer $anoModelo
     *
     * @return Carro
     */
    public function setAnoModelo($anoModelo)
    {
        $this->anoModelo = $anoModelo;

        return $this;
    }

    /**
     * Get anoModelo
     *
     * @return int
     */
    public function getAnoModelo()
    {
        return $this->anoModelo;
    }

    /**
     * Set corPredominante
     *
     * @param string $corPredominante
     *
     * @return Carro
     */
    public function setCorPredominante($corPredominante)
    {
        $this->corPredominante = $corPredominante;

        return $this;
    }

    /**
     * Get corPredominante
     *
     * @return string
     */
    public function getCorPredominante()
    {
        return $this->corPredominante;
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

