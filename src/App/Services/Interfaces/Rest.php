<?php
/**
 * /src/App/Services/Interfaces/Rest.php
 *
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
namespace App\Services\Interfaces;

// Application components
use App\Entity\Base as Entity;
use App\Entity\Interfaces\Base as EntityInterface;
use App\Repository\Base as AppEntityRepository;

// Doctrine components
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

// Symfony components
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Validator\Exception\ValidatorException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Interface for REST based services.
 *
 * @category    Interfaces
 * @package     App\Services\Interfaces
 * @author      TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
interface Rest
{
    /**
     * Class constructor.
     *
     * @param   EntityRepository    $repository
     * @param   ValidatorInterface  $validator
     */
    public function __construct(EntityRepository $repository, ValidatorInterface $validator);

    /**
     * Getter method for entity manager.
     *
     * @return EntityManager
     */
    public function getEntityManager();

    /**
     * Getter method for current repository.
     *
     * @return  AppEntityRepository
     */
    public function getRepository();

    /**
     * Gets a reference to the entity identified by the given type and identifier without actually loading it,
     * if the entity is not yet loaded.
     *
     * @throws  \Doctrine\ORM\ORMException
     *
     * @param   mixed   $id The entity identifier.
     *
     * @return  bool|\Doctrine\Common\Proxy\Proxy|null|object
     */
    public function getReference($id);

    /**
     * Getter method for all associations that current entity contains.
     *
     * @return array
     */
    public function getAssociations();

    /**
     * Generic find method to return an array of items from database. Return value is an array of specified repository
     * entities.
     *
     * @param   array           $criteria
     * @param   null|array      $orderBy
     * @param   null|integer    $limit
     * @param   null|integer    $offset
     * @param   null|array      $search
     *
     * @return  Entity[]
     */
    public function find(
        array $criteria = [],
        array $orderBy = null,
        $limit = null,
        $offset = null,
        array $search = null
    );

    /**
     * Generic findOne method to return single item from database. Return value is single entity from specified
     * repository.
     *
     * @param   integer $id
     *
     * @return  null|Entity
     */
    public function findOne($id);

    /**
     * Generic findOneBy method to return single item from database by given criteria. Return value is single entity
     * from specified repository or null if entity was not found.
     *
     * @param   array       $criteria
     * @param   null|array  $orderBy
     *
     * @return  null|Entity
     */
    public function findOneBy(array $criteria, array $orderBy = null);

    /**
     * Generic method to create new item (entity) to specified database repository. Return value is created entity for
     * specified repository.
     *
     * @throws  ValidatorException
     *
     * @param   \stdClass   $data
     *
     * @return  Entity
     */
    public function create(\stdClass $data);

    /**
     * Generic method to save given entity to specified repository. Return value is created entity.
     *
     * @throws  ValidatorException
     *
     * @param   EntityInterface $entity
     * @param   boolean         $skipValidation
     *
     * @return  Entity
     */
    public function save(EntityInterface $entity, $skipValidation = false);

    /**
     * Generic method to update specified entity with new data.
     *
     * @throws  HttpException
     * @throws  ValidatorException
     *
     * @param   integer     $id
     * @param   \stdClass   $data
     *
     * @return  Entity
     */
    public function update($id, \stdClass $data);

    /**
     * Generic method to delete specified entity from database.
     *
     * @param   integer $id
     *
     * @return  Entity
     */
    public function delete($id);

    /**
     * Before lifecycle method for find method.
     *
     * @param   array           $criteria
     * @param   null|array      $orderBy
     * @param   null|integer    $limit
     * @param   null|integer    $offset
     */
    public function beforeFind(array &$criteria = [], array &$orderBy = null, &$limit = null, &$offset = null);

    /**
     * After lifecycle method for find method.
     *
     * @param   array        $criteria
     * @param   null|array   $orderBy
     * @param   null|integer $limit
     * @param   null|integer $offset
     * @param   Entity[]     $entities
     */
    public function afterFind(
        array &$criteria = [],
        array &$orderBy = null,
        &$limit = null,
        &$offset = null,
        array &$entities = []
    );

    /**
     * Before lifecycle method for findOne method.
     *
     * @param   integer $id
     */
    public function beforeFindOne(&$id);

    /**
     * After lifecycle method for findOne method.
     *
     * @param   integer     $id
     * @param   null|Entity $entity
     */
    public function afterFindOne(&$id, Entity $entity = null);

    /**
     * Before lifecycle method for findOneBy method.
     *
     * @param   array       $criteria
     * @param   null|array  $orderBy
     */
    public function beforeFindOneBy(array &$criteria, array &$orderBy = null);

    /**
     * After lifecycle method for findOneBy method.
     *
     * @param   array       $criteria
     * @param   null|array  $orderBy
     * @param   null|Entity $entity
     */
    public function afterFindOneBy(array &$criteria, array &$orderBy = null,  Entity $entity = null);

    /**
     * Before lifecycle method for create method.
     *
     * @param   \stdClass   $data
     * @param   Entity      $entity
     */
    public function beforeCreate(\stdClass $data, Entity $entity);

    /**
     * After lifecycle method for create method.
     *
     * @param   \stdClass   $data
     * @param   Entity      $entity
     */
    public function afterCreate(\stdClass $data, Entity $entity);

    /**
     * Before lifecycle method for save method.
     *
     * @param   EntityInterface $entity
     */
    public function beforeSave(EntityInterface $entity);

    /**
     * After lifecycle method for save method.
     *
     * @param   EntityInterface $entity
     */
    public function afterSave(EntityInterface $entity);

    /**
     * Before lifecycle method for update method.
     *
     * @param   integer         $id
     * @param   \stdClass       $data
     * @param   EntityInterface $entity
     */
    public function beforeUpdate(&$id, \stdClass $data, EntityInterface $entity);

    /**
     * After lifecycle method for update method.
     *
     * @param   integer         $id
     * @param   \stdClass       $data
     * @param   EntityInterface $entity
     */
    public function afterUpdate(&$id, \stdClass $data, EntityInterface $entity);

    /**
     * Before lifecycle method for delete method.
     *
     * @param   integer         $id
     * @param   EntityInterface $entity
     */
    public function beforeDelete(&$id, EntityInterface $entity);

    /**
     * After lifecycle method for delete method.
     *
     * @param   integer         $id
     * @param   EntityInterface $entity
     */
    public function afterDelete(&$id, EntityInterface $entity);
}
