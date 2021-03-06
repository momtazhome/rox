<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Translations
 *
 * @ORM\Table(name="translations")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity
 */
class Translation
{
    /**
     * @var Language
     *
     * @ORM\ManyToOne(targetEntity="Language")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdLanguage", referencedColumnName="id")
     * })
     */
    private $language;

    /**
     * @var Member
     *
     * @ORM\ManyToOne(targetEntity="Member")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdOwner", referencedColumnName="id")
     * })
     */
    private $owner;

    /**
     * @var integer
     *
     * @ORM\Column(name="IdTrad", type="integer", nullable=false)
     */
    private $idtrad;

    /**
     * @var Member
     *
     * @ORM\ManyToOne(targetEntity="Member")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdTranslator", referencedColumnName="id")
     * })
     */
    private $translator;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=false)
     */
    private $updated;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="Sentence", type="text", length=65535, nullable=false)
     */
    private $sentence;

    /**
     * @var integer
     *
     * @ORM\Column(name="IdRecord", type="integer", nullable=false)
     */
    private $idrecord;

    /**
     * @var string
     *
     * @ORM\Column(name="TableColumn", type="string", length=200, nullable=false)
     */
    private $tablecolumn = 'NotSet';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * Set language
     *
     * @param Language $language
     *
     * @return Translation
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return Language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set owner
     *
     * @param Member $owner
     *
     * @return Translation
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return Member
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set idtrad
     *
     * @param int $idtrad
     *
     * @return Translation
     */
    public function setIdtrad($idtrad)
    {
        $this->idtrad = $idtrad;

        return $this;
    }

    /**
     * Get idtrad
     *
     * @return int
     */
    public function getIdtrad()
    {
        return $this->idtrad;
    }

    /**
     * Set translator
     *
     * @param Member $translator
     *
     * @return Translation
     */
    public function setTanslator($translator)
    {
        $this->translator = $translator;

        return $this;
    }

    /**
     * Get translator
     *
     * @return Member
     */
    public function getTranslator()
    {
        return $this->translator;
    }

    /**
     * Set updated
     *
     * @param DateTime $updated
     *
     * @return Translation
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set created
     *
     * @param DateTime $created
     *
     * @return Translation
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Translation
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set sentence
     *
     * @param string $sentence
     *
     * @return Translation
     */
    public function setSentence($sentence)
    {
        $this->sentence = $sentence;

        return $this;
    }

    /**
     * Get sentence
     *
     * @return string
     */
    public function getSentence()
    {
        return $this->sentence;
    }

    /**
     * Set idrecord
     *
     * @param int $idrecord
     *
     * @return Translation
     */
    public function setIdrecord($idrecord)
    {
        $this->idrecord = $idrecord;

        return $this;
    }

    /**
     * Get idrecord
     *
     * @return int
     */
    public function getIdrecord()
    {
        return $this->idrecord;
    }

    /**
     * Set tablecolumn
     *
     * @param string $tablecolumn
     *
     * @return Translation
     */
    public function setTablecolumn($tablecolumn)
    {
        $this->tablecolumn = $tablecolumn;

        return $this;
    }

    /**
     * Get tablecolumn
     *
     * @return string
     */
    public function getTablecolumn()
    {
        return $this->tablecolumn;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Triggered on insert.
     *
     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->created = new DateTime('now');
        $this->updated = new DateTime('now');
    }

    /**
     * Triggered on update.
     *
     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        $this->updated = new DateTime('now');
    }

    public function setTranslator(?Member $translator): self
    {
        $this->translator = $translator;

        return $this;
    }
}
