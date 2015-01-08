<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Edgji\Bundle\SyliusQuickStartBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Sylius\Bundle\FixturesBundle\DataFixtures\ORM\LoadCountriesData as DataFixture;
use Sylius\Component\Addressing\Model\CountryInterface;
use Symfony\Component\Intl\Intl;

/**
 * Default country fixtures.
 *
 * @author Paweł Jędrzejewski <pawel@sylius.org>
 */
class LoadCountriesData extends DataFixture
{
}
