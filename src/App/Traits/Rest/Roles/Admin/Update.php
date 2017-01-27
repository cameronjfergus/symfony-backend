<?php
declare(strict_types=1);
/**
 * /src/App/Traits/Rest/Roles/Admin/Update.php
 *
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
namespace App\Traits\Rest\Roles\Admin;

use App\Annotation\RestApiDoc;
use App\Traits\Rest\Methods\Update as UpdateMethod;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMInvalidArgumentException;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Exception\ValidatorException;

/**
 * Trait to add 'Update' action for REST resources for 'ROLE_ADMIN' users.
 *
 * @see \App\Traits\Rest\Methods\Update for detailed documents.
 *
 * @package App\Traits\Rest
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
trait Update
{
    use UpdateMethod;

    /**
     * Update action for current resource.
     *
     * @Route(
     *      "/{id}",
     *      requirements={
     *          "id" = "^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$"
     *      }
     *  )
     *
     * @Method({"PUT"})
     *
     * @Security("has_role('ROLE_ADMIN')")
     *
     * @ApiDoc
     * @RestApiDoc
     *
     * @throws  \LogicException
     * @throws  MethodNotAllowedHttpException
     * @throws  HttpException
     *
     * @param   Request $request
     * @param   string  $id         Entity id as V4 uuid
     *
     * @return  Response
     */
    public function update(Request $request, string $id): Response
    {
        return $this->updateMethod($request, $id);
    }
}
