<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class ModeTransport
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeTransport;

    /**
     * @ORM\ManyToMany(targetEntity=Station::class, mappedBy="ModeTransports")
     */
    private $stations;



    /**
     * @ORM\ManyToMany(targetEntity=Terminus::class, mappedBy="ModeTransport")
     */
    private $Terminuses;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ligne;

    /**
     * @ORM\OneToMany(targetEntity=Correspondance::class, mappedBy="modeTransport")
     */
    private $correspondances;

    public function __construct()
    {
        $this->stations = new ArrayCollection();
        $this->Terminuses = new ArrayCollection();
        $this->correspondances = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeTransport(): ?string
    {
        return $this->typeTransport;
    }

    public function setTypeTransport(string $typeTransport): self
    {
        $this->typeTransport = $typeTransport;

        return $this;
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
            $station->addModeTransport($this);
        }

        return $this;
    }

    public function removeStation(Station $station): self
    {
        if ($this->stations->contains($station)) {
            $this->stations->removeElement($station);
            $station->removeModeTransport($this);
        }

        return $this;
    }



    /**
     * @return Collection|Terminus[]
     */
    public function getTerminuses(): Collection
    {
        return $this->Terminuses;
    }

    public function addTerminus(Terminus $terminus): self
    {
        if (!$this->Terminuses->contains($terminus)) {
            $this->Terminuses[] = $terminus;
            $terminus->addModeTransport($this);
        }

        return $this;
    }

    public function removeTerminus(Terminus $terminus): self
    {
        if ($this->Terminuses->contains($terminus)) {
            $this->Terminuses->removeElement($terminus);
            $terminus->removeModeTransport($this);
        }

        return $this;
    }

    public function getLigne(): ?string
    {
        return $this->ligne;
    }

    public function setLigne(string $ligne): self
    {
        $this->ligne = $ligne;

        return $this;
    }

    /**
     * @return Collection|Correspondance[]
     */
    public function getCorrespondances(): Collection
    {
        return $this->correspondances;
    }

    public function addCorrespondance(Correspondance $correspondance): self
    {
        if (!$this->correspondances->contains($correspondance)) {
            $this->correspondances[] = $correspondance;
            $correspondance->setModeTransport($this);
        }

        return $this;
    }

    public function removeCorrespondance(Correspondance $correspondance): self
    {
        if ($this->correspondances->contains($correspondance)) {
            $this->correspondances->removeElement($correspondance);
            // set the owning side to null (unless already changed)
            if ($correspondance->getModeTransport() === $this) {
                $correspondance->setModeTransport(null);
            }
        }

        return $this;
    }
}
