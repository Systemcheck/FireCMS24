<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Widgets;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WidgetPositionsRepository")
 */
class WidgetPositions
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * 
     * 
     */
    private $widgetId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $position;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $active;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $route;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWidgetId(): ?int
    {
        return $this->widgetId;
    }

    public function setWidgetId(int $widgetId): self
    {
        $this->widgetId = $widgetId;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getRoute(): ?string
    {
        return $this->route;
    }

    public function setRoute(string $route): self
    {
        $this->route = $route;

        return $this;
    }
}
