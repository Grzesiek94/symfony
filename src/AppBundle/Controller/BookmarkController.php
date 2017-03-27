<?php
/**
 * Bookmark controller.
 */

namespace AppBundle\Controller;

use AppBundle\Repository\BookmarkRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class BookmarkController.
 *
 * @package AppBundle\Controller
 *
 * @Route("/bookmark")
 */
class BookmarkController extends Controller
{
    /**
     * Index action.
     *
     * @return \Symfony\Component\HttpFoundation\Response Response
     *
     * @Route(
     *     "/",
     *     name="bookmark_index"
     * )
     */
    public function indexAction()
    {
        $bookmarkRepository = new BookmarkRepository();
        $bookmarks = $bookmarkRepository->findAll();

        return $this->render(
            'bookmark/index.html.twig',
            compact('bookmarks')
        );
    }

    /**
     * Index action.
     *
     * @return \Symfony\Component\HttpFoundation\Response Response
     *
     * @Route(
     *     "/view/{id}",
     *     name="bookmark_show"
     * )
     */
    public function showAction($id)
    {
        $bookmarkRepository = new BookmarkRepository();
        $bookmark = $bookmarkRepository->findOneById($id);

        return $this->render(
            'bookmark/show.html.twig',
            compact('bookmark')
        );
    }

}
