<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use \RonasIT\Support\AutoDoc\Tests\AutoDocTestCaseTrait;


abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
}
