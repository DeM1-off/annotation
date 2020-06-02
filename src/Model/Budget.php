<?php

namespace Budget\Model;

use Budget\Annotation\Validator as Validator;

class Budget
{
    /** @var int */
    private $id;

    /**
     * @var string
     *
     * @Validator\Length(min="5", max="255")
     */
    private $title;

    /** @var int */
    private $typeId;

    /**
     * @var float
     *
     * @Validator\EmptyValue(message="Amount cannot be empty")
     * @Validator\FloarValue(floatmessage="Value is not have  point")
     */
    private $amount;

    /**
     * @var string
     */
    private $description;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Budget
     */
    public function setId(int $id): Budget
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Budget
     */
    public function setTitle(string $title): Budget
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return int
     */
    public function getTypeId(): int
    {
        return $this->typeId;
    }

    /**
     * @param int $typeId
     * @return Budget
     */
    public function setTypeId(int $typeId): Budget
    {
        $this->typeId = $typeId;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return Budget
     */
    public function setAmount(float $amount): Budget
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Budget
     */
    public function setDescription(string $description): Budget
    {
        $this->description = $description;
        return $this;
    }
}