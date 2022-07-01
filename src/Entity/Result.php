<?php

namespace App\Entity;

use App\Repository\ResultRepository;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=ResultRepository::class)
 */
class Result
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $object_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $object_name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $object_confidence;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $object_position_x;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $object_position_y;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $object_width;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $object_height;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $object_size;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $camera_url;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $camera_focal;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $camera_sensor_width;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $camera_sensor_length;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $camera_position;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $timestamp;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $object_dominant_colors_1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $object_dominant_color_2;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $object_dominant_colors_3;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObjectId(): ?int
    {
        return $this->object_id;
    }

    public function setObjectId(?int $object_id): self
    {
        $this->object_id = $object_id;

        return $this;
    }

    public function getObjectName(): ?string
    {
        return $this->object_name;
    }

    public function setObjectName(?string $object_name): self
    {
        $this->object_name = $object_name;

        return $this;
    }

    public function getObjectConfidence(): ?int
    {
        return $this->object_confidence;
    }

    public function setObjectConfidence(?int $object_confidence): self
    {
        $this->object_confidence = $object_confidence;

        return $this;
    }

    public function getObjectPositionX(): ?int
    {
        return $this->object_position_x;
    }

    public function setObjectPositionX(?int $object_position_x): self
    {
        $this->object_position_x = $object_position_x;

        return $this;
    }

    public function getObjectPositionY(): ?int
    {
        return $this->object_position_y;
    }

    public function setObjectPositionY(?int $object_position_y): self
    {
        $this->object_position_y = $object_position_y;

        return $this;
    }

    public function getObjectWidth(): ?int
    {
        return $this->object_width;
    }

    public function setObjectWidth(?int $object_width): self
    {
        $this->object_width = $object_width;

        return $this;
    }

    public function getObjectHeight(): ?int
    {
        return $this->object_height;
    }

    public function setObjectHeight(?int $object_height): self
    {
        $this->object_height = $object_height;

        return $this;
    }

    public function getObjectSize(): ?int
    {
        return $this->object_size;
    }

    public function setObjectSize(?int $object_size): self
    {
        $this->object_size = $object_size;

        return $this;
    }

    public function getCameraUrl(): ?string
    {
        return $this->camera_url;
    }

    public function setCameraUrl(?string $camera_url): self
    {
        $this->camera_url = $camera_url;

        return $this;
    }

    public function getCameraFocal(): ?int
    {
        return $this->camera_focal;
    }

    public function setCameraFocal(?int $camera_focal): self
    {
        $this->camera_focal = $camera_focal;

        return $this;
    }

    public function getCameraSensorWidth(): ?int
    {
        return $this->camera_sensor_width;
    }

    public function setCameraSensorWidth(?int $camera_sensor_width): self
    {
        $this->camera_sensor_width = $camera_sensor_width;

        return $this;
    }

    public function getCameraSensorLength(): ?int
    {
        return $this->camera_sensor_length;
    }

    public function setCameraSensorLength(?int $camera_sensor_length): self
    {
        $this->camera_sensor_length = $camera_sensor_length;

        return $this;
    }

    public function getCameraPosition(): ?int
    {
        return $this->camera_position;
    }

    public function setCameraPosition(?int $camera_position): self
    {
        $this->camera_position = $camera_position;

        return $this;
    }

    public function getTimestamp(): ?string
    {
        return $this->timestamp;
    }

    public function setTimestamp(?string $timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getObjectDominantColors1(): ?int
    {
        return $this->object_dominant_colors_1;
    }

    public function setObjectDominantColors1(?int $object_dominant_colors_1): self
    {
        $this->object_dominant_colors_1 = $object_dominant_colors_1;

        return $this;
    }

    public function getObjectDominantColor2(): ?int
    {
        return $this->object_dominant_color_2;
    }

    public function setObjectDominantColor2(?int $object_dominant_color_2): self
    {
        $this->object_dominant_color_2 = $object_dominant_color_2;

        return $this;
    }

    public function getObjectDominantColors3(): ?int
    {
        return $this->object_dominant_colors_3;
    }

    public function setObjectDominantColors3(?int $object_dominant_colors_3): self
    {
        $this->object_dominant_colors_3 = $object_dominant_colors_3;

        return $this;
    }
}
