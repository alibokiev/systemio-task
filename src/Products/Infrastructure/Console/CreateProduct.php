<?php

namespace App\Products\Infrastructure\Console;

use App\Products\Domain\Factory\ProductFactory;
use App\Products\Infrastructure\Repository\ProductRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Webmozart\Assert\Assert;

#[AsCommand(
    name: 'app:products:create-product',
    description: 'create product',
)]
final class CreateProduct extends Command
{
    public function __construct(
        private readonly ProductRepository $productRepository,
        private readonly ProductFactory $productFactory,
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $name = $io->ask(
            'name',
            null,
            function (?string $input) {
                Assert::string($input, 'Name is invalid');

                return $input;
            }
        );

        $price = $io->askHidden(
            'price',
            function (?string $input) {
                Assert::float($input, 'Price is invalid');

                return $input;
            }
        );

        $user = $this->productFactory->create($name, $price);
        $this->productRepository->add($user);

        return Command::SUCCESS;
    }
}
