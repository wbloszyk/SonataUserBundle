<?php

declare(strict_types=1);

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\UserBundle\Controller\Api\Legacy;

use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sonata\DatagridBundle\Pager\PagerInterface;
use Sonata\UserBundle\Controller\Api\BaseUserController;
use Sonata\UserBundle\Model\UserInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @author Hugo Briand <briand@ekino.com>
 */
class UserController extends BaseUserController
{
    /**
     * Returns a paginated list of users.
     *
     * @ApiDoc(
     *  resource=true,
     *  output={"class"="Sonata\DatagridBundle\Pager\PagerInterface", "groups"={"sonata_api_read"}}
     * )
     *
     * @QueryParam(name="page", requirements="\d+", default="1", description="Page for users list pagination (1-indexed)")
     * @QueryParam(name="count", requirements="\d+", default="10", description="Number of users per page")
     * @QueryParam(name="orderBy", map=true, requirements="ASC|DESC", nullable=true, strict=true, description="Query users order by clause (key is field, value is direction)")
     * @QueryParam(name="enabled", requirements="0|1", nullable=true, strict=true, description="Enables or disables the users only?")
     *
     * @View(serializerGroups={"sonata_api_read"}, serializerEnableMaxDepthChecks=true)
     *
     * @return PagerInterface
     */
    public function getUsersAction(ParamFetcherInterface $paramFetcher)
    {
        return parent::getUsersAction($paramFetcher);
    }

    /**
     * Retrieves a specific user.
     *
     * @ApiDoc(
     *  requirements={
     *      {"name"="id", "dataType"="string", "description"="User identifier"}
     *  },
     *  output={"class"="Sonata\UserBundle\Model\UserInterface", "groups"={"sonata_api_read"}},
     *  statusCodes={
     *      200="Returned when successful",
     *      404="Returned when user is not found"
     *  }
     * )
     *
     * @View(serializerGroups={"sonata_api_read"}, serializerEnableMaxDepthChecks=true)
     *
     * @param string $id
     *
     * @return UserInterface
     */
    public function getUserAction($id)
    {
        return parent::getUserAction($id);
    }

    /**
     * Adds an user.
     *
     * @ApiDoc(
     *  input={"class"="sonata_user_api_form_user", "name"="", "groups"={"sonata_api_write"}},
     *  output={"class"="Sonata\UserBundle\Model\User", "groups"={"sonata_api_read"}},
     *  statusCodes={
     *      200="Returned when successful",
     *      400="Returned when an error has occurred during the user creation",
     *  }
     * )
     *
     * @param Request $request A Symfony request
     *
     * @throws NotFoundHttpException
     *
     * @return UserInterface
     */
    public function postUserAction(Request $request)
    {
        return parent::postUserAction($request);
    }

    /**
     * Updates an user.
     *
     * @ApiDoc(
     *  requirements={
     *      {"name"="id", "dataType"="string", "description"="User identifier"}
     *  },
     *  input={"class"="sonata_user_api_form_user", "name"="", "groups"={"sonata_api_write"}},
     *  output={"class"="Sonata\UserBundle\Model\User", "groups"={"sonata_api_read"}},
     *  statusCodes={
     *      200="Returned when successful",
     *      400="Returned when an error has occurred during the user creation",
     *      404="Returned when unable to find user"
     *  }
     * )
     *
     * @param string  $id      User id
     * @param Request $request A Symfony request
     *
     * @throws NotFoundHttpException
     *
     * @return UserInterface
     */
    public function putUserAction($id, Request $request)
    {
        return parent::putUserAction($id, $request);
    }

    /**
     * Deletes an user.
     *
     * @ApiDoc(
     *  requirements={
     *      {"name"="id", "dataType"="string", "description"="User identifier"}
     *  },
     *  statusCodes={
     *      200="Returned when user is successfully deleted",
     *      400="Returned when an error has occurred during the user deletion",
     *      404="Returned when unable to find user"
     *  }
     * )
     *
     * @param string $id An User identifier
     *
     * @throws NotFoundHttpException
     *
     * @return \FOS\RestBundle\View\View
     */
    public function deleteUserAction($id)
    {
        return parent::deleteUserAction($id);
    }

    /**
     * Attach a group to a user.
     *
     * @ApiDoc(
     *  requirements={
     *      {"name"="userId", "dataType"="string", "description"="User identifier"},
     *      {"name"="groupId", "dataType"="string", "description"="Group identifier"}
     *  },
     *  output={"class"="Sonata\UserBundle\Model\User", "groups"={"sonata_api_read"}},
     *  statusCodes={
     *      200="Returned when successful",
     *      400="Returned when an error has occurred while user/group attachment",
     *      404="Returned when unable to find user or group"
     *  }
     * )
     *
     * @param string $userId  A User identifier
     * @param string $groupId A Group identifier
     *
     * @throws NotFoundHttpException
     * @throws \RuntimeException
     *
     * @return UserInterface
     */
    public function postUserGroupAction($userId, $groupId)
    {
        return parent::postUserGroupAction($userId, $groupId);
    }

    /**
     * Detach a group to a user.
     *
     * @ApiDoc(
     *  requirements={
     *      {"name"="userId", "dataType"="string", "description"="User identifier"},
     *      {"name"="groupId", "dataType"="string", "description"="Group identifier"}
     *  },
     *  output={"class"="Sonata\UserBundle\Model\User", "groups"={"sonata_api_read"}},
     *  statusCodes={
     *      200="Returned when successful",
     *      400="Returned when an error occurred while detaching the user from the group",
     *      404="Returned when unable to find user or group"
     *  }
     * )
     *
     * @param string $userId  A User identifier
     * @param string $groupId A Group identifier
     *
     * @throws NotFoundHttpException
     * @throws \RuntimeException
     *
     * @return UserInterface
     */
    public function deleteUserGroupAction($userId, $groupId)
    {
        return parent::deleteUserGroupAction($userId, $groupId);
    }
}
