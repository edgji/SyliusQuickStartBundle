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
use Sylius\Bundle\FixturesBundle\DataFixtures\ORM\LoadPaymentMethodsData as DataFixture;
use Sylius\Component\Payment\Model\PaymentMethodInterface;

/**
 * Sample payment methods.
 *
 * @author Paweł Jędrzejewski <pawel@sylius.org>
 */
class LoadPaymentMethodsData extends DataFixture
{
}
