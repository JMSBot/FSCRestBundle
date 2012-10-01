<?php

namespace FSC\RestBundle\Routing;

interface RouteNameProviderInterface
{
    /**
     * @return string
     */
    public function getCollectionRouteName();
    /**
     * @return string
     */
    public function getCollectionFormRouteName($formRel);
    /**
     * @return string
     */
    public function getEntityRouteName();
    /**
     * @return string
     */
    public function getEntityFormRouteName($formRel);
    /**
     * @return string
     */
    public function getEntityCollectionRouteName($collectionRel);
    /**
     * @return string
     */
    public function getEntityCollectionFormRouteName($collectionRel, $formRel);
}
