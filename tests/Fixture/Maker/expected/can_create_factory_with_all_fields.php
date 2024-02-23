<?php

/*
 * This file is part of the zenstruck/foundry package.
 *
 * (c) Kevin Bond <kevinbond@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Factory;

use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;
use Zenstruck\Foundry\Persistence\Proxy;
use Zenstruck\Foundry\Persistence\ProxyRepositoryDecorator;
use Zenstruck\Foundry\Tests\Fixture\Entity\GenericEntity;
use Zenstruck\Foundry\Tests\Fixture\Entity\Repository\GenericEntityRepository;

/**
 * @extends PersistentProxyObjectFactory<GenericEntity>
 *
 * @method        GenericEntity|Proxy                              create(array|callable $attributes = [])
 * @method static GenericEntity|Proxy                              createOne(array $attributes = [])
 * @method static GenericEntity|Proxy                              find(object|array|mixed $criteria)
 * @method static GenericEntity|Proxy                              findOrCreate(array $attributes)
 * @method static GenericEntity|Proxy                              first(string $sortedField = 'id')
 * @method static GenericEntity|Proxy                              last(string $sortedField = 'id')
 * @method static GenericEntity|Proxy                              random(array $attributes = [])
 * @method static GenericEntity|Proxy                              randomOrCreate(array $attributes = [])
 * @method static GenericEntityRepository|ProxyRepositoryDecorator repository()
 * @method static GenericEntity[]|Proxy[]                          all()
 * @method static GenericEntity[]|Proxy[]                          createMany(int $number, array|callable $attributes = [])
 * @method static GenericEntity[]|Proxy[]                          createSequence(iterable|callable $sequence)
 * @method static GenericEntity[]|Proxy[]                          findBy(array $attributes)
 * @method static GenericEntity[]|Proxy[]                          randomRange(int $min, int $max, array $attributes = [])
 * @method static GenericEntity[]|Proxy[]                          randomSet(int $number, array $attributes = [])
 */
final class GenericEntityFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return GenericEntity::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'date' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
            'prop1' => self::faker()->text(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(GenericEntity $genericEntity): void {})
        ;
    }
}
