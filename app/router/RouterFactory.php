<?php

namespace App;

use App\AdminModule\repositories\ArticleRepository;
use App\AdminModule\Repositories\CatalogItemRepository;
use App\AdminModule\Repositories\CatalogRepository;
use App\Router\ProductRoute;
use Nette,
    Nette\Application\Routers\RouteList,
    Nette\Application\Routers\Route;


/**
 * Router factory.
 */
class RouterFactory
{


    function __construct()
    {
    }


    /**
     * @return \Nette\Application\IRouter
     */
    public function createRouter()
    {
        $router   = new RouteList();
        $router[] = new Route('index.php', 'Front:Homepage:default', Route::ONE_WAY);

        $router[]      = $adminRouter = new RouteList('Admin');
        $adminRouter[] = new Route('admin/[<locale=cs cs|en>/]<presenter>/<action>[/<id>]', 'Dashboard:default');

        $router[] = $frontRouter = new RouteList('Front');

        $frontRouter[] = new Route('sitemap.xml', array(
            'presenter' => 'Sitemap',
            'action'    => 'sitemap',
        ));

        $frontRouter[] = new Route('<presenter>/<action>[/<id>]', array(
                'presenter' => array(
                    Route::VALUE        => 'Homepage',
                    Route::FILTER_TABLE => array(
                        'kontakt' => 'Contact'
                    ),
                ),
                'action'    => 'default',
            )
        );

        return $router;
    }

}
