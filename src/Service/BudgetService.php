<?php


namespace Budget\Service;



use Pimple\Container;
use Budget\Service\ValidatorService;

class BudgetService
{
    use ContainerTrait;

    private $validator;

    public function __construct(ValidatorService $validator)
    {
        $this->validator = $validator;
    }

    public function addRecord(string $title, $amount, int $typeId, string $description = null)
    {
        $typeId= 1;

        /** @var \PDO $pdo */
        $pdo = $this->getContainer()['db'];
        $this->validator->validate('title', $title);

        /**
         * Save date base
         */
        $data = [
            'title' => $title,
            'amount' => $amount,
            'typeId'=> $typeId,
            'description'=> $description
        ];
        $sql = "INSERT INTO budget (title, amount,type_id,description) 
        VALUES (:title, :amount,:typeId,:description)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);


    }
}