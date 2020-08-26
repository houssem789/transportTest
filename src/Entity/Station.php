<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Station
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
    private $nomGare;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomlong;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomIv;

    /**
     * @ORM\ManyToMany(targetEntity=ModeTransport::class, inversedBy="stations")
     */
    private $ModeTransports;



    /**
     * @ORM\ManyToMany(targetEntity=Terminus::class, mappedBy="stations")
     */
    private $Terminus;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $garesid;

    /**
     * @ORM\OneToMany(targetEntity=Correspondance::class, mappedBy="station")
     */
    private $correspondances;

    public function __construct()
    {
        $this->ModeTransports = new ArrayCollection();
        $this->Terminus = new ArrayCollection();
        $this->correspondances = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomGare(): ?string
    {
        return $this->nomGare;
    }

    public function setNomGare(string $nomGare): self
    {
        $this->nomGare = $nomGare;

        return $this;
    }

    public function getNomlong(): ?string
    {
        return $this->nomlong;
    }

    public function setNomlong(string $nomlong): self
    {
        $this->nomlong = $nomlong;

        return $this;
    }

    public function getNomIv(): ?string
    {
        return $this->nomIv;
    }

    public function setNomIv(string $nomIv): self
    {
        $this->nomIv = $nomIv;

        return $this;
    }

    /**
     * @return Collection|ModeTransport[]
     */
    public function getModeTransports(): Collection
    {
        return $this->ModeTransports;
    }

    public function addModeTransport(ModeTransport $modeTransport): self
    {
        if (!$this->ModeTransports->contains($modeTransport)) {
            $this->ModeTransports[] = $modeTransport;
        }

        return $this;
    }

    public function removeModeTransport(ModeTransport $modeTransport): self
    {
        if ($this->ModeTransports->contains($modeTransport)) {
            $this->ModeTransports->removeElement($modeTransport);
        }

        return $this;
    }


    /**
     * @return Collection|Terminus[]
     */
    public function getTerminus(): Collection
    {
        return $this->Terminus;
    }

    public function addTerminu(Terminus $terminu): self
    {
        if (!$this->Terminus->contains($terminu)) {
            $this->Terminus[] = $terminu;
            $terminu->addStation($this);
        }

        return $this;
    }

    public function removeTerminu(Terminus $terminu): self
    {
        if ($this->Terminus->contains($terminu)) {
            $this->Terminus->removeElement($terminu);
            $terminu->removeStation($this);
        }

        return $this;
    }

    public function getGaresid(): ?string
    {
        return $this->garesid;
    }

    public function setGaresid(string $garesid): self
    {
        $this->garesid = $garesid;

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
            $correspondance->setStation($this);
        }

        return $this;
    }

    public function removeCorrespondance(Correspondance $correspondance): self
    {
        if ($this->correspondances->contains($correspondance)) {
            $this->correspondances->removeElement($correspondance);
            // set the owning side to null (unless already changed)
            if ($correspondance->getStation() === $this) {
                $correspondance->setStation(null);
            }
        }

        return $this;
    }
}
