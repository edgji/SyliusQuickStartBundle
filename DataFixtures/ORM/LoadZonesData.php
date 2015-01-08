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
use Sylius\Bundle\FixturesBundle\DataFixtures\ORM\LoadZonesData as DataFixture;
use Sylius\Component\Addressing\Model\ZoneInterface;
use Sylius\Component\Addressing\Model\ZoneMemberInterface;
use Symfony\Component\Intl\Intl;

/**
 * Default zone fixtures.
 *
 * @author Saša Stamenković <umpirsky@gmail.com>
 */
class LoadZonesData extends DataFixture
{
}
