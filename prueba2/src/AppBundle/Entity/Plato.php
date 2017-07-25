<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Plato
 *
 * @ORM\Table(name="plato")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlatoRepository")
 */
class Plato
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
     *@Assert\NotBlank()
     * @ORM\Column(name="nombre", type="string", length=50)
     */
    private $nombre;

    /**
     * @var string
     *@Assert\NotBlank()
     *@Assert\Type(type="integer", message="The value {{ value }} is not a valid {{ type }}.")
     * @ORM\Column(name="precio", type="decimal", precision=10, scale=2)
     */
    private $precio;

    /**
     * @var bool
     *
     * @ORM\Column(name="disponible", type="boolean")
     */
    private $disponible;

    /**
     * @ORM\OneToMany(targetEntity="Pedido", mappedBy="plato")
     */
    private $pedidos1;

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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Plato
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set precio
     *
     * @param string $precio
     *
     * @return Plato
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return string
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set disponible
     *
     * @param boolean $disponible
     *
     * @return Plato
     */
    public function setDisponible($disponible)
    {
        $this->disponible = $disponible;

        return $this;
    }

    /**
     * Get disponible
     *
     * @return bool
     */
    public function getDisponible()
    {
        return $this->disponible;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pedidos1 = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add pedidos1
     *
     * @param \AppBundle\Entity\Pedido $pedidos1
     *
     * @return Plato
     */
    public function addPedidos1(\AppBundle\Entity\Pedido $pedidos1)
    {
        $this->pedidos1[] = $pedidos1;

        return $this;
    }

    /**
     * Remove pedidos1
     *
     * @param \AppBundle\Entity\Pedido $pedidos1
     */
    public function removePedidos1(\AppBundle\Entity\Pedido $pedidos1)
    {
        $this->pedidos1->removeElement($pedidos1);
    }

    /**
     * Get pedidos1
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPedidos1()
    {
        return $this->pedidos1;
    }
}
