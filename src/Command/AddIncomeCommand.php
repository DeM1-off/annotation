<?php


namespace Budget\Command;


use Budget\Model\TypeEnum;
use Budget\Service\BudgetService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddIncomeCommand extends Command
{
    /** @var BudgetService  */
    private $budgetService;

    public function __construct(BudgetService $budgetService, string $name = null)
    {
        parent::__construct($name);
        $this->budgetService = $budgetService;
    }

    protected function configure()
    {
        $this->setName('add:income')
            ->setDescription('Add new income')
            ->addArgument('title', InputArgument::REQUIRED)
            ->addArgument('amount', InputArgument::REQUIRED)
            ->addArgument('description', InputArgument::OPTIONAL);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $title = $input->getArgument('title');
        $amount = $input->getArgument('amount');
        $description = $input->getArgument('description');

        $this->budgetService->addRecord($title, $amount, TypeEnum::INCOME, $description);
        $output->writeln('Data saved');
        return 0;
    }
}