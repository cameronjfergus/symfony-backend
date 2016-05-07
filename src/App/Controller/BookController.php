<?php
/**
 * /src/App/Controller/BookController.php
 *
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
namespace App\Controller;

// Application components
use App\Services\Book;

// Sensio components
use /** @noinspection PhpUnusedAliasInspection */ Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use /** @noinspection PhpUnusedAliasInspection */ Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use /** @noinspection PhpUnusedAliasInspection */ Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

// Symfony components
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AuthorController
 *
 * @Route("/book")
 *
 * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
 *
 * @category    Controller
 * @package     App\Controller
 * @author      TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
class BookController extends Rest
{
    /**
     * Service object for controller.
     *
     * @var Book
     */
    protected $service;

    /**
     * Name of the service that controller uses. This is used on setContainer method to invoke specified service to
     * class context.
     *
     * @var string
     */
    protected $serviceName = 'app.services.book';

    /**
     * Route action to get array of authors.
     *
     * @Route("/")
     *
     * @Method({"GET"})
     *
     * @Security("has_role('ROLE_USER')")
     *
     * @param   Request $request
     *
     * @return  Response
     */
    public function find(Request $request)
    {
        return parent::find($request);
    }

    /**
     * Route action to get specified author.
     *
     * @Route(
     *      "/{id}",
     *      requirements={"id" = "\d+"}
     *  )
     *
     * @Method({"GET"})
     *
     * @Security("has_role('ROLE_USER')")
     *
     * @param   Request $request
     * @param   integer $id
     *
     * @return  Response
     */
    public function findOne(Request $request, $id = 0)
    {
        return parent::findOne($request, $id);
    }

    /**
     * Route action to create new author.
     *
     * @Route("")
     * @Route("/")
     *
     * @Method({"POST"})
     *
     * @Security("has_role('ROLE_ADMIN')")
     *
     * @param   Request $request
     *
     * @return  Response
     */
    public function create(Request $request)
    {
        return parent::create($request);
    }

    /**
     * Route action to update author data.
     *
     * @Route(
     *      "/{id}",
     *      requirements={"id" = "\d+"}
     *  )
     *
     * @Method({"PUT"})
     *
     * @Security("has_role('ROLE_ADMIN')")
     *
     * @param   Request $request
     * @param   integer $id
     *
     * @return  Response
     */
    public function update(Request $request, $id)
    {
        return parent::update($request, $id);
    }

    /**
     * Route action to delete specified author.
     *
     * @Route(
     *      "/{id}",
     *      requirements={"id" = "\d+"}
     *  )
     *
     * @Method({"DELETE"})
     *
     * @Security("has_role('ROLE_ADMIN')")
     *
     * @param   Request $request
     * @param   integer $id
     *
     * @return  Response
     */
    public function delete(Request $request, $id)
    {
        return parent::delete($request, $id);
    }
}
