<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CorrespondanceRepository")
 */
class Correspondance
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ModeTransport::class, inversedBy="correspondances")
     */
    private $modeTransport;

    /**
     * @ORM\ManyToOne(targetEntity=Station::class, inversedBy="correspondances")
     */
    private $station;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModeTransport(): ?ModeTransport
    {
        return $this->modeTransport;
    }

    public function setModeTransport(?ModeTransport $modeTransport): self
    {
        $this->modeTransport = $modeTransport;

        return $this;
    }

    public function getStation(): ?Station
    {
        return $this->station;
    }

    public function setStation(?Station $station): self
    {
        $this->station = $station;

        return $this;
    }
}
