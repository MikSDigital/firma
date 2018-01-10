<?php
declare(strict_types = 1);

namespace App\Product\Domain\Model;

use App\Product\Domain\Entity\Product;
use App\Product\Domain\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;

final class ProductModel
{
    const ENTITY_CLASS = Product::class;

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function listProducts(): array
    {
        return $this->getRepository()->findAll();
    }

    private function getRepository(): ProductRepository
    {
        return $this->entityManager->getRepository(self::ENTITY_CLASS);
    }
}
