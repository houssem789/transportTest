<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Terminus
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Station::class, inversedBy="Terminus")
     */
    private $stations;

    /**
     * @ORM\ManyToMany(targetEntity=ModeTransport::class, inversedBy="Terminuses")
     */
    private $ModeTransport;

    public function __construct()
    {
        $this->stations = new ArrayCollection();
        $this->ModeTransport = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Station[]
     */
    public function getStations(): Collection
    {
        return $this->stations;
    }

    public function addStation(Station $station): self
    {
        if (!$this->stations->contains($station)) {
            $this->stations[] = $station;
        }

        return $this;
    }

    public function removeStation(Station $station): self
    {
        if ($this->stations->contains($station)) {
            $this->stations->removeElement($station);
        }

        return $this;
    }

    /**
     * @return Collection|ModeTransport[]
     */
    public function getModeTransport(): Collection
    {
        return $this->ModeTransport;
    }

    public function addModeTransport(ModeTransport $modeTransport): self
    {
        if (!$this->ModeTransport->contains($modeTransport)) {
            $this->ModeTransport[] = $modeTransport;
        }

        return $this;
    }

    public function removeModeTransport(ModeTransport $modeTransport): self
    {
        if ($this->ModeTransport->contains($modeTransport)) {
            $this->ModeTransport->removeElement($modeTransport);
        }

        return $this;
    }
    //
}
