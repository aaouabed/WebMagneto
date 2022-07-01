<?php

namespace App\Entity;

use App\Repository\ObjetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ObjetRepository::class)]
class Objet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    public $name;

    #[ORM\Column(type: 'integer')]
    private $objet_id;

    #[ORM\Column(type: 'float', nullable: true)]
    private $confidence;

    //#[ORM\OneToOne(inversedBy: 'objet', targetEntity: Position::class, cascade: ['persist', 'remove'])]
    #[ORM\Column(type: 'array', nullable: true)]
    private $position;

    #[ORM\Column(type: 'float', nullable: true)]
    private $size;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $dominant_color;

    #[ORM\Column(type: 'array', length: 255, nullable: true)]
    private $links;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $associated;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getObjetId(): ?int
    {
        return $this->objet_id;
    }

    public function setObjetId(int $objet_id): self
    {
        $this->objet_id = $objet_id;

        return $this;
    }

    public function getConfidence(): ?float
    {
        return $this->confidence;
    }

    public function setConfidence(?float $confidence): self
    {
        $this->confidence = $confidence;

        return $this;
    }

    public function getPosition(): ?array
    {
        return $this->position;
    }

    public function setPosition(?array $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getSize(): ?float
    {   
        if($this->size == null){
            return 0;
        }else{
            return $this->size;
        }
    }


    public function getDominantColor(): ?string
    {   if($this->dominant_color == null){
            return 0;
        }else{
            return $this->dominant_color;
        }
        
    }

    public function setDominantColor(?string $dominant_color): self
    {
        $this->dominant_color = $dominant_color;

        return $this;
    }

    public function getLinks(): ?array
    {
        return $this->links;
    }

    public function setLinks(?array $links): self
    {
        $this->links = $links;

        return $this;
    }

    public function getAssociated(): ?string
    {
        return $this->associated;
    }

    public function setAssociated(?string $associated): self
    {
        $this->associated = $associated;

        return $this;
    }
}
