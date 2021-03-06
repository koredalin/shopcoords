<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // acme_store_homepage
        if (0 === strpos($pathinfo, '/store/hello') && preg_match('#^/store/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'acme_store_homepage')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\DefaultController::indexAction',));
        }

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }

            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_welcome',);
        }

        if (0 === strpos($pathinfo, '/demo')) {
            if (0 === strpos($pathinfo, '/demo/secured')) {
                if (0 === strpos($pathinfo, '/demo/secured/log')) {
                    if (0 === strpos($pathinfo, '/demo/secured/login')) {
                        // _demo_login
                        if ($pathinfo === '/demo/secured/login') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                        }

                        // _security_check
                        if ($pathinfo === '/demo/secured/login_check') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_security_check',);
                        }

                    }

                    // _demo_logout
                    if ($pathinfo === '/demo/secured/logout') {
                        return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
                    }

                }

                if (0 === strpos($pathinfo, '/demo/secured/hello')) {
                    // acme_demo_secured_hello
                    if ($pathinfo === '/demo/secured/hello') {
                        return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
                    }

                    // _demo_secured_hello
                    if (preg_match('#^/demo/secured/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',));
                    }

                    // _demo_secured_hello_admin
                    if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello_admin')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',));
                    }

                }

            }

            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }

                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        if (0 === strpos($pathinfo, '/c')) {
            if (0 === strpos($pathinfo, '/calc')) {
                // acme_shop_search_shops
                if ($pathinfo === '/calc/searchShops') {
                    return array (  '_controller' => 'Acme\\ShopBundle\\Controller\\CalculatorController::calculateShopsByCoordinatesAction',  '_route' => 'acme_shop_search_shops',);
                }

                // acme_shop_homepage
                if ($pathinfo === '/calc') {
                    return array (  '_controller' => 'Acme\\ShopBundle\\Controller\\CalculatorController::indexAction',  '_route' => 'acme_shop_homepage',);
                }

            }

            if (0 === strpos($pathinfo, '/client_crud')) {
                // client_crud
                if (rtrim($pathinfo, '/') === '/client_crud') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'client_crud');
                    }

                    return array (  '_controller' => 'Acme\\ShopBundle\\Controller\\ClientController::indexAction',  '_route' => 'client_crud',);
                }

                // client_crud_show
                if (preg_match('#^/client_crud/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'client_crud_show')), array (  '_controller' => 'Acme\\ShopBundle\\Controller\\ClientController::showAction',));
                }

                // client_crud_new
                if ($pathinfo === '/client_crud/new') {
                    return array (  '_controller' => 'Acme\\ShopBundle\\Controller\\ClientController::newAction',  '_route' => 'client_crud_new',);
                }

                // client_crud_create
                if ($pathinfo === '/client_crud/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_client_crud_create;
                    }

                    return array (  '_controller' => 'Acme\\ShopBundle\\Controller\\ClientController::createAction',  '_route' => 'client_crud_create',);
                }
                not_client_crud_create:

                // client_crud_edit
                if (preg_match('#^/client_crud/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'client_crud_edit')), array (  '_controller' => 'Acme\\ShopBundle\\Controller\\ClientController::editAction',));
                }

                // client_crud_update
                if (preg_match('#^/client_crud/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_client_crud_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'client_crud_update')), array (  '_controller' => 'Acme\\ShopBundle\\Controller\\ClientController::updateAction',));
                }
                not_client_crud_update:

                // client_crud_delete
                if (preg_match('#^/client_crud/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_client_crud_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'client_crud_delete')), array (  '_controller' => 'Acme\\ShopBundle\\Controller\\ClientController::deleteAction',));
                }
                not_client_crud_delete:

            }

        }

        if (0 === strpos($pathinfo, '/shop_crud')) {
            // shop_crud
            if (rtrim($pathinfo, '/') === '/shop_crud') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'shop_crud');
                }

                return array (  '_controller' => 'Acme\\ShopBundle\\Controller\\ShopController::indexAction',  '_route' => 'shop_crud',);
            }

            // shop_crud_show
            if (preg_match('#^/shop_crud/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'shop_crud_show')), array (  '_controller' => 'Acme\\ShopBundle\\Controller\\ShopController::showAction',));
            }

            // shop_crud_new
            if ($pathinfo === '/shop_crud/new') {
                return array (  '_controller' => 'Acme\\ShopBundle\\Controller\\ShopController::newAction',  '_route' => 'shop_crud_new',);
            }

            // shop_crud_create
            if ($pathinfo === '/shop_crud/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_shop_crud_create;
                }

                return array (  '_controller' => 'Acme\\ShopBundle\\Controller\\ShopController::createAction',  '_route' => 'shop_crud_create',);
            }
            not_shop_crud_create:

            // shop_crud_edit
            if (preg_match('#^/shop_crud/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'shop_crud_edit')), array (  '_controller' => 'Acme\\ShopBundle\\Controller\\ShopController::editAction',));
            }

            // shop_crud_update
            if (preg_match('#^/shop_crud/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_shop_crud_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'shop_crud_update')), array (  '_controller' => 'Acme\\ShopBundle\\Controller\\ShopController::updateAction',));
            }
            not_shop_crud_update:

            // shop_crud_delete
            if (preg_match('#^/shop_crud/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_shop_crud_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'shop_crud_delete')), array (  '_controller' => 'Acme\\ShopBundle\\Controller\\ShopController::deleteAction',));
            }
            not_shop_crud_delete:

        }

        if (0 === strpos($pathinfo, '/owner')) {
            // owner
            if (rtrim($pathinfo, '/') === '/owner') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'owner');
                }

                return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\OwnerController::indexAction',  '_route' => 'owner',);
            }

            // owner_show
            if (preg_match('#^/owner/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'owner_show')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\OwnerController::showAction',));
            }

            // owner_new
            if ($pathinfo === '/owner/new') {
                return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\OwnerController::newAction',  '_route' => 'owner_new',);
            }

            // owner_create
            if ($pathinfo === '/owner/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_owner_create;
                }

                return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\OwnerController::createAction',  '_route' => 'owner_create',);
            }
            not_owner_create:

            // owner_edit
            if (preg_match('#^/owner/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'owner_edit')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\OwnerController::editAction',));
            }

            // owner_update
            if (preg_match('#^/owner/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_owner_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'owner_update')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\OwnerController::updateAction',));
            }
            not_owner_update:

            // owner_delete
            if (preg_match('#^/owner/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_owner_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'owner_delete')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\OwnerController::deleteAction',));
            }
            not_owner_delete:

        }

        if (0 === strpos($pathinfo, '/car')) {
            // car
            if (rtrim($pathinfo, '/') === '/car') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'car');
                }

                return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\CarController::indexAction',  '_route' => 'car',);
            }

            // car_show
            if (preg_match('#^/car/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'car_show')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\CarController::showAction',));
            }

            // car_new
            if ($pathinfo === '/car/new') {
                return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\CarController::newAction',  '_route' => 'car_new',);
            }

            // car_create
            if ($pathinfo === '/car/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_car_create;
                }

                return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\CarController::createAction',  '_route' => 'car_create',);
            }
            not_car_create:

            // car_edit
            if (preg_match('#^/car/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'car_edit')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\CarController::editAction',));
            }

            // car_update
            if (preg_match('#^/car/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_car_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'car_update')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\CarController::updateAction',));
            }
            not_car_update:

            // car_delete
            if (preg_match('#^/car/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_car_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'car_delete')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\CarController::deleteAction',));
            }
            not_car_delete:

        }

        // _assetic_jquery
        if ($pathinfo === '/js/cd44034_part_1.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'jquery',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_jquery',);
        }

        // _assetic_jquery_0
        if ($pathinfo === '/assetic/jquery_jquery.min_1.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'jquery',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_jquery_0',);
        }

        // _assetic_shop_js
        if ($pathinfo === '/js/5568f7b_part_1.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'shop_js',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_shop_js',);
        }

        // _assetic_shop_js_0
        if ($pathinfo === '/assetic/shop_js_shop_1.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'shop_js',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_shop_js_0',);
        }

        if (0 === strpos($pathinfo, '/js')) {
            if (0 === strpos($pathinfo, '/js/cd44034')) {
                // _assetic_cd44034
                if ($pathinfo === '/js/cd44034.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'cd44034',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_cd44034',);
                }

                // _assetic_cd44034_0
                if ($pathinfo === '/js/cd44034_part_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'cd44034',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_cd44034_0',);
                }

            }

            if (0 === strpos($pathinfo, '/js/5568f7b')) {
                // _assetic_5568f7b
                if ($pathinfo === '/js/5568f7b.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '5568f7b',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_5568f7b',);
                }

                // _assetic_5568f7b_0
                if ($pathinfo === '/js/5568f7b_part_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '5568f7b',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_5568f7b_0',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/css/cbbeec0')) {
            // _assetic_cbbeec0
            if ($pathinfo === '/css/cbbeec0.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'cbbeec0',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_cbbeec0',);
            }

            // _assetic_cbbeec0_0
            if ($pathinfo === '/css/cbbeec0_shop_1.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'cbbeec0',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_cbbeec0_0',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
