#!/usr/bin/env php
<?php
  $loader = require __DIR__ . '/../vendor/autoload.php';

  use Symfony\Component\Console\Application;
  use Budget\Application as BudgetApplication;
  use Doctrine\Common\Annotations\AnnotationRegistry;

  use Budget\Command\AddIncomeCommand;
  use Budget\Service\BudgetService;
  use Budget\Service\ValidatorService;

  AnnotationRegistry::registerLoader([$loader, 'loadClass']);

  $application = new Application();
  $budgetApplication = new BudgetApplication();


  $validatorService = new ValidatorService();
  $validatorService->setContainer($budgetApplication->getContainer());

  $budgetService = new BudgetService($validatorService);
  $budgetService->setContainer($budgetApplication->getContainer());

  $addIncome = new AddIncomeCommand($budgetService);

  $application->add(new AddIncomeCommand($budgetService));

try {
    $application->run();
} catch (Exception $e) {
    echo $e->getMessage();
    exit(100);
}

