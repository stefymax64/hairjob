<?php

namespace App\Entity;

use App\Repository\AdvertSkillRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdvertSkillRepository::class)
 * @ORM\Table(name="advert_skill")
 */
class AdvertSkill
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="level", type="string", length=255)
     */
    private $level;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Advert")
     * @ORM\JoinColumn(nullable=false)
     */
    private $advert;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Skill")
     * @ORM\JoinColumn(nullable=false)
     */
    private $skill;

    public function getId()
    {
        return $this->id;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel(string $level)
    {
        $this->level = $level;

        return $this;
    }

    public function getAdvert()
    {
        return $this->advert;
    }

    public function setAdvert(Advert $advert)
    {
        $this->advert = $advert;

        return $this;
    }

    public function getSkill()
    {
        return $this->skill;
    }

    public function setSkill(Skill $skill)
    {
        $this->skill = $skill;

        return $this;
    }
}
