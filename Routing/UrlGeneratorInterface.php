<?php

namespace FSC\RestBundle\Routing;

interface UrlGeneratorInterface
{
    /**
     * @return string
     */
    public function generateCollectionUrl($parameters = array());
    /**
     * @return string
     */
    public function generateCollectionFormUrl($formRel, $parameters = array());
    /**
     * @return string
     */
    public function generateEntityUrl($entity, $parameters = array());
    /**
     * @return string
     */
    public function generateEntityFormUrl($entity, $formRel, $parameters = array());
    /**
     * @return string
     */
    public function generateEntityCollectionUrl($entity, $collectionRel, $parameters = array());
    /**
     * @return string
     */
    public function generateEntityCollectionFormUrl($entity, $collectionRel, $formRel, $parameters = array());
}
