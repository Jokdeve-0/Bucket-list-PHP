<?php

namespace App\Entity;

use App\Repository\WishRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=WishRepository::class)
 */
class Wish
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=250)
     * @Assert\NotBlank(message="veuillez entrer un titre")
     * @Assert\Regex("#^([\s0-9A-Za-zÀ-ÖØ-öø-ÿ-]){2,}$#",
     *     message="Entre 2 et 250 caractères ou certains caratères ne sont pas autorisés !"
     * )
     * @Assert\Length(
     *     min = 2,
     *     max = 250,
     *     minMessage = "MIN 2",
     *     maxMessage = "MAX 250"
     * )
     */
    private $title;

    /**
     * @ORM\Column(type="text",nullable=true)
     * @Assert\Length(
     *     min = 2,
     *     minMessage = "MIN 2"
     * )
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Please provide a title for the serie!")
     * @Assert\Regex("#^[\sA-Za-zÀ-ÖØ-öø-ÿ-]{2,50}$#",
     *     message="Entre 2 et 50 caractères ou certains caratères ne sont pas autorisés !"
     * )
     * @Assert\Length(
     *     min = 2,
     *     max = 50,
     *     minMessage = "MIN 2",
     *     maxMessage = "MAX 50"
     * )
     */
    private $author;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPublished;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreated;

    /**
     * @ORM\OneToMany(targetEntity=Category::class, mappedBy="wish")
     */
    private $categories;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function isIsPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): self
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->dateCreated;
    }

    public function setDateCreated(\DateTimeInterface $dateCreated): self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;
        return $this;
    }
}
