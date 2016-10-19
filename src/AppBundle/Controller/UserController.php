<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcherInterface;

class UserController extends FOSRestController
{

	/**
	 * List all users.
	 *
	 * @ApiDoc(
	 *   resource = true,
	 *   statusCodes = {
	 *     200 = "Returned when successful"
	 *   }
	 * )
	 *
	 * @Annotations\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing users.")
	 * @Annotations\QueryParam(name="limit", requirements="\d+", default="5", description="How many users to return.")
	 *
	 * @Annotations\View()
	 *
	 * @param ParamFetcherInterface $paramFetcher param fetcher service
	 *
	 * @return array
	 */
	public function getUsers(ParamFetcherInterface $paramFetcher)
	{
		$offset = $paramFetcher->get('offset');
		$start = null == $offset ? 0 : $offset + 1;
		$limit = $paramFetcher->get('limit');
		//$notes = $this->getNoteManager()->fetch($start, $limit);

		return new NoteCollection($notes, $offset, $limit);
	}
}