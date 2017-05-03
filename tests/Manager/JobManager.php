<?php

namespace Smalot\Cups\Tests\Units\Manager;

use mageekguy\atoum;
use Smalot\Cups\Model\Job;
use Smalot\Cups\Model\Printer;
use Smalot\Cups\Transport\Client;

/**
 * Class JobManager
 *
 * @package Smalot\Cups\Tests\Units\Manager
 */
class JobManager extends atoum\test
{
    public function testJobManager()
    {
        $client = Client::create();

        $jobManager = new \Smalot\Cups\Manager\JobManager($client);
        $jobManager->setCharset('utf-8');
        $jobManager->setLanguage('fr-fr');
        $jobManager->setOperationId(5);
        $jobManager->setUsername('testuser');

        $this->string($jobManager->getCharset())->isEqualTo('utf-8');
        $this->string($jobManager->getLanguage())->isEqualTo('fr-fr');
        $this->integer($jobManager->getOperationId())->isEqualTo(5);
        $this->string($jobManager->getUsername())->isEqualTo('testuser');

        $this->integer($jobManager->getOperationId('current'))->isEqualTo(5);
        $this->integer($jobManager->getOperationId('new'))->isEqualTo(6);
    }

    public function testGetListEmpty()
    {
        $printerUri = 'ipp://localhost:631/printers/PDF';

        $client = Client::create();

        $printer = new Printer();
        $printer->setUri($printerUri);

        $jobManager = new \Smalot\Cups\Manager\JobManager($client);
        $jobs = $jobManager->getList($printer, false);

        $this->array($jobs)->isEmpty();
    }

    public function testCreateJob()
    {
        $user = getenv('USER');
        $printerUri = 'ipp://localhost:631/printers/PDF';

        $client = Client::create();

        $printer = new Printer();
        $printer->setUri($printerUri);

        $jobManager = new \Smalot\Cups\Manager\JobManager($client);
        $jobs = $jobManager->getList($printer, false);
        $this->array($jobs)->isEmpty();

        // Create new Job.
        $job = new Job();
        $job->setName('Job create test');
        $job->setUsername($user);
        $job->setCopies(1);
        $job->setPageRanges('1');
        $job->addText('hello world', 'hello');
        $jobManager->create($job);

        $jobs = $jobManager->getList($printer, false);
        $this->array($jobs)->isNotEmpty();
    }

    public function testGetList()
    {
        $printerUri = 'ipp://localhost:631/printers/PDF';

        $client = Client::create();

        $printer = new Printer();
        $printer->setUri($printerUri);

        $jobManager = new \Smalot\Cups\Manager\JobManager($client);
        $jobs = $jobManager->getList($printer, false);

        $this->array($jobs)->isEmpty();
    }
}