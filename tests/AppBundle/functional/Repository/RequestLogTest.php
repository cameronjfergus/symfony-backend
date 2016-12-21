<?php
declare(strict_types = 1);
/**
 * /tests/AppBundle/functional/Repository/RequestLogTest.php
 *
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
namespace AppBundle\functional\Repository;

use App\Entity\RequestLog as Entity;
use App\Repository\RequestLog as Repository;
use App\Tests\RepositoryTestCase;

/**
 * Class AuthorTest
 *
 * @package AppBundle\Entity
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
class RequestLogTest extends RepositoryTestCase
{
    /**
     * @var Entity
     */
    protected $entity;

    /**
     * @var Repository
     */
    protected $repository;

    /**
     * @var string
     */
    protected $entityName = 'App\Entity\RequestLog';

    /**
     * @var array
     */
    protected $associations = [
        'user',
    ];

    /**
     * @var bool
     */
    protected $skipUserAssociations = true;
}
