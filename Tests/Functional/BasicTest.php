<?php

declare(strict_types=1);

namespace Zz\ZzBills\Tests\Functional;

use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

/**
 * Test case
 *
 * @author Lukas Reeg <lukas@reeg.one>
 */
class BasicTest extends FunctionalTestCase
{
    /**
     * @var array
     */
    protected $testExtensionsToLoad = [
        'typo3conf/ext/zz_bills',
    ];

    /**
     * Just a dummy to show that at least one test is actually executed
     *
     * @test
     */
    public function dummy(): void
    {
        $this->assertTrue(true);
    }
}
