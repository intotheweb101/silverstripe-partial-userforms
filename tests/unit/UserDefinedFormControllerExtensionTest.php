<?php

namespace Firesphere\PartialUserforms\Tests;

use Firesphere\PartialUserforms\Extensions\UserDefinedFormControllerExtension;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\View\Requirements;

class UserDefinedFormControllerExtensionTest extends SapphireTest
{
    public function testInit()
    {
        /** @var UserDefinedFormControllerExtension $extension */
        $extension = Injector::inst()->get(UserDefinedFormControllerExtension::class);
        $extension->onBeforeInit();

        $scripts = Requirements::backend()->getJavascript();
        // Note, for CircleCI, we need this key. Your local result may vary
        $this->assertArrayHasKey('client/dist/main.js', $scripts);
    }
}
