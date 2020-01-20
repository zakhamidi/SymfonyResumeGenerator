<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
//verify string
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User 
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(min=5,minMessage = "At least 5 characters ")
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Url
     */
    private $website;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Language", mappedBy="user", orphanRemoval=true)
     */
    private $languages;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TheRepos", mappedBy="user", orphanRemoval=true)
     */
    private $theRepos;


    public function __construct()
    {
        $this->languages = new ArrayCollection();
        $this->theRepos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): self
    {
        $this->website = $website;

        return $this;
    }
    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection|Language[]
     */
    public function getLanguages(): Collection
    {
        return $this->languages;
    }

    public function addLanguage(Language $language): self
    {
        if (!$this->languages->contains($language)) {
            $this->languages[] = $language;
            $language->setUser($this);
        }

        return $this;
    }

    public function removeLanguage(Language $language): self
    {
        if ($this->languages->contains($language)) {
            $this->languages->removeElement($language);
            // set the owning side to null (unless already changed)
            if ($language->getUser() === $this) {
                $language->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Repository[]
     */
    public function getRepositories(): Collection
    {
        return $this->repositories;
    }

    public function addRepository(Repository $repository): self
    {
        if (!$this->repositories->contains($repository)) {
            $this->repositories[] = $repository;
            $repository->setUser($this);
        }

        return $this;
    }

    public function removeRepository(Repository $repository): self
    {
        if ($this->repositories->contains($repository)) {
            $this->repositories->removeElement($repository);
            // set the owning side to null (unless already changed)
            if ($repository->getUser() === $this) {
                $repository->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Myrepository[]
     */
    public function getMyrepositories(): Collection
    {
        return $this->myrepositories;
    }

    public function addMyrepository(Myrepository $myrepository): self
    {
        if (!$this->myrepositories->contains($myrepository)) {
            $this->myrepositories[] = $myrepository;
            $myrepository->setUser($this);
        }

        return $this;
    }

    public function removeMyrepository(Myrepository $myrepository): self
    {
        if ($this->myrepositories->contains($myrepository)) {
            $this->myrepositories->removeElement($myrepository);
            // set the owning side to null (unless already changed)
            if ($myrepository->getUser() === $this) {
                $myrepository->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TheRepos[]
     */
    public function getTheRepos(): Collection
    {
        return $this->theRepos;
    }

    public function addTheRepo(TheRepos $theRepo): self
    {
        if (!$this->theRepos->contains($theRepo)) {
            $this->theRepos[] = $theRepo;
            $theRepo->setUser($this);
        }

        return $this;
    }

    public function removeTheRepo(TheRepos $theRepo): self
    {
        if ($this->theRepos->contains($theRepo)) {
            $this->theRepos->removeElement($theRepo);
            // set the owning side to null (unless already changed)
            if ($theRepo->getUser() === $this) {
                $theRepo->setUser(null);
            }
        }

        return $this;
    }
}
