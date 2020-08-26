<?php

namespace App\Entity;

use App\Repository\FullfidesioRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Fullfidesio
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
    private $geoPoint;

    /**
     * @ORM\Column(type="text")
     */
    private $geoShape;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $objectid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $idrefzdl;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $garesid;

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
     * @ORM\Column(type="string", length=255)
     */
    private $numMod;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mode_;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $train;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $metro;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tramway;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $navette;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $val;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $terfer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tertrain;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $terrer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $termetro;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tertram;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ternavette;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $terval;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $iderefliga;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $idrefligc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ligne;

    /**
     * @ORM\Column(type="float")
     */
    private $codLigf;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ligneCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $indiceLig;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reseau;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $resCom;

    /**
     * @ORM\Column(type="float")
     */
    private $codeResf;

    /**
     * @ORM\Column(type="float")
     */
    private $resStif;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $exploitant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numPsr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $idf;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $principal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $xelement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $yelement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGeoPoint(): ?string
    {
        return $this->geoPoint;
    }

    public function setGeoPoint(string $geoPoint)
    {
        $this->geoPoint = $geoPoint;

        return $this;
    }

    public function getGeoShape(): ?string
    {
        return $this->geoShape;
    }

    public function setGeoShape(string $geoShape)
    {
        $this->geoShape = $geoShape;

        return $this;
    }

    public function getObjectid(): ?string
    {
        return $this->objectid;
    }

    public function setObjectid(string $objectid)
    {
        $this->objectid = $objectid;

        return $this;
    }

    public function getIdrefzdl(): ?string
    {
        return $this->idrefzdl;
    }

    public function setIdrefzdl(string $idrefzdl)
    {
        $this->idrefzdl = $idrefzdl;

        return $this;
    }

    public function getGaresid(): ?string
    {
        return $this->garesid;
    }

    public function setGaresid(string $garesid)
    {
        $this->garesid = $garesid;

        return $this;
    }

    public function getNomGare(): ?string
    {
        return $this->nomGare;
    }

    public function setNomGare(string $nomGare)
    {
        $this->nomGare = $nomGare;

        return $this;
    }

    public function getNomlong(): ?string
    {
        return $this->nomlong;
    }

    public function setNomlong(string $nomlong)
    {
        $this->nomlong = $nomlong;

        return $this;
    }

    public function getNomIv(): ?string
    {
        return $this->nomIv;
    }

    public function setNomIv(string $nomIv)
    {
        $this->nomIv = $nomIv;

        return $this;
    }

    public function getNumMod(): ?string
    {
        return $this->numMod;
    }

    public function setNumMod(string $numMod)
    {
        $this->numMod = $numMod;

        return $this;
    }

    public function getMode(): ?string
    {
        return $this->mode_;
    }

    public function setMode(string $mode_)
    {
        $this->mode_ = $mode_;

        return $this;
    }

    public function getFer(): ?string
    {
        return $this->fer;
    }

    public function setFer(string $fer)
    {
        $this->fer = $fer;

        return $this;
    }

    public function getTrain(): ?string
    {
        return $this->train;
    }

    public function setTrain(string $train)
    {
        $this->train = $train;

        return $this;
    }

    public function getRer(): ?string
    {
        return $this->rer;
    }

    public function setRer(string $rer)
    {
        $this->rer = $rer;

        return $this;
    }

    public function getMetro(): ?string
    {
        return $this->metro;
    }

    public function setMetro(string $metro)
    {
        $this->metro = $metro;

        return $this;
    }

    public function getTramway(): ?string
    {
        return $this->tramway;
    }

    public function setTramway(string $tramway)
    {
        $this->tramway = $tramway;

        return $this;
    }

    public function getNavette(): ?string
    {
        return $this->navette;
    }

    public function setNavette(string $navette)
    {
        $this->navette = $navette;

        return $this;
    }

    public function getVal(): ?string
    {
        return $this->val;
    }

    public function setVal(string $val)
    {
        $this->val = $val;

        return $this;
    }

    public function getTerfer(): ?string
    {
        return $this->terfer;
    }

    public function setTerfer(string $terfer)
    {
        $this->terfer = $terfer;

        return $this;
    }

    public function getTertrain(): ?string
    {
        return $this->tertrain;
    }

    public function setTertrain(string $tertrain)
    {
        $this->tertrain = $tertrain;

        return $this;
    }

    public function getTerrer(): ?string
    {
        return $this->terrer;
    }

    public function setTerrer(string $terrer)
    {
        $this->terrer = $terrer;

        return $this;
    }

    public function getTermetro(): ?string
    {
        return $this->termetro;
    }

    public function setTermetro(string $termetro)
    {
        $this->termetro = $termetro;

        return $this;
    }

    public function getTertram(): ?string
    {
        return $this->tertram;
    }

    public function setTertram(string $tertram)
    {
        $this->tertram = $tertram;

        return $this;
    }

    public function getTernavette(): ?string
    {
        return $this->ternavette;
    }

    public function setTernavette(string $ternavette)
    {
        $this->ternavette = $ternavette;

        return $this;
    }

    public function getTerval(): ?string
    {
        return $this->terval;
    }

    public function setTerval(string $terval)
    {
        $this->terval = $terval;

        return $this;
    }

    public function getIderefliga(): ?string
    {
        return $this->iderefliga;
    }

    public function setIderefliga(string $iderefliga)
    {
        $this->iderefliga = $iderefliga;

        return $this;
    }

    public function getIdrefligc(): ?string
    {
        return $this->idrefligc;
    }

    public function setIdrefligc(?string $idrefligc)
    {
        $this->idrefligc = $idrefligc;

        return $this;
    }

    public function getLigne(): ?string
    {
        return $this->ligne;
    }

    public function setLigne(?string $ligne)
    {
        $this->ligne = $ligne;

        return $this;
    }

    public function getCodLigf(): ?float
    {
        return $this->codLigf;
    }

    public function setCodLigf(float $codLigf)
    {
        $this->codLigf = $codLigf;

        return $this;
    }

    public function getLigneCode(): ?string
    {
        return $this->ligneCode;
    }

    public function setLigneCode(string $ligneCode)
    {
        $this->ligneCode = $ligneCode;

        return $this;
    }

    public function getIndiceLig(): ?string
    {
        return $this->indiceLig;
    }

    public function setIndiceLig(string $indiceLig)
    {
        $this->indiceLig = $indiceLig;

        return $this;
    }

    public function getReseau(): ?string
    {
        return $this->reseau;
    }

    public function setReseau(string $reseau)
    {
        $this->reseau = $reseau;

        return $this;
    }

    public function getResCom(): ?string
    {
        return $this->resCom;
    }

    public function setResCom(string $resCom)
    {
        $this->resCom = $resCom;

        return $this;
    }

    public function getCodeResf(): ?float
    {
        return $this->codeResf;
    }

    public function setCodeResf(float $codeResf)
    {
        $this->codeResf = $codeResf;

        return $this;
    }

    public function getResStif(): ?float
    {
        return $this->resStif;
    }

    public function setResStif(float $resStif)
    {
        $this->resStif = $resStif;

        return $this;
    }

    public function getExploitant(): ?string
    {
        return $this->exploitant;
    }

    public function setExploitant(string $exploitant)
    {
        $this->exploitant = $exploitant;

        return $this;
    }

    public function getNumPsr(): ?string
    {
        return $this->numPsr;
    }

    public function setNumPsr(string $numPsr)
    {
        $this->numPsr = $numPsr;

        return $this;
    }

    public function getIdf(): ?string
    {
        return $this->idf;
    }

    public function setIdf(string $idf)
    {
        $this->idf = $idf;

        return $this;
    }

    public function getPrincipal(): ?string
    {
        return $this->principal;
    }

    public function setPrincipal(string $principal)
    {
        $this->principal = $principal;

        return $this;
    }

    /**
     * Get the value of xelement
     */
    public function getXelement()
    {
        return $this->xelement;
    }

    /**
     * Set the value of xelement
     *
     * @return  self
     */
    public function setXelement($xelement)
    {
        $this->xelement = $xelement;

        return $this;
    }

    /**
     * Get the value of yelement
     */
    public function getYelement()
    {
        return $this->yelement;
    }

    /**
     * Set the value of yelement
     *
     * @return  self
     */
    public function setYelement($yelement)
    {
        $this->yelement = $yelement;

        return $this;
    }
}
