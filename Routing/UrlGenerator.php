<?php

namespace FSC\RestBundle\Routing;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface as SFUrlGeneratorInterface;
use Symfony\Component\Form\Util\PropertyPathInterface;
use Symfony\Component\Form\Util\PropertyPath;

class UrlGenerator implements UrlGeneratorInterface
{
    protected $urlGenerator;
    protected $resourceRouteNameProvider;
    protected $entityIdPropertyPath;

    public function __construct(SFUrlGeneratorInterface $urlGenerator, RouteNameProviderInterface $resourceRouteNameProvider,
                                PropertyPathInterface $entityIdPropertyPath = null)
    {
        $this->urlGenerator = $urlGenerator;
        $this->resourceRouteNameProvider = $resourceRouteNameProvider;
        $this->entityIdPropertyPath = $entityIdPropertyPath ?: new PropertyPath('id');
    }

    /**
     * {@inheritdoc}
     * @param array $parameters
     */
    public function generateCollectionUrl($parameters = array())
    {
        $route = $this->resourceRouteNameProvider->getCollectionRouteName();

        return $this->urlGenerator->generate($route, $parameters, true);
    }

    /**
     * {@inheritdoc}
     * @param string $formRel
     * @param array  $parameters
     */
    public function generateCollectionFormUrl($formRel, $parameters = array())
    {
        $route = $this->resourceRouteNameProvider->getCollectionFormRouteName($formRel);

        return $this->urlGenerator->generate($route, $parameters, true);
    }

    /**
     * {@inheritdoc}
     * @param array $parameters
     */
    public function generateEntityUrl($entity, $parameters = array())
    {
        $route = $this->resourceRouteNameProvider->getEntityRouteName();
        $parameters = array_merge($this->getEntityParameters($entity), $parameters);

        return $this->urlGenerator->generate($route, $parameters, true);
    }

    /**
     * {@inheritdoc}
     * @param array $parameters
     */
    public function generateEntityFormUrl($entity, $formRel, $parameters = array())
    {
        $route = $this->resourceRouteNameProvider->getEntityFormRouteName($formRel);
        $parameters = array_merge($this->getEntityParameters($entity), $parameters);

        return $this->urlGenerator->generate($route, $parameters, true);
    }

    /**
     * {@inheritdoc}
     * @param integer|string $collectionRel
     * @param array          $parameters
     */
    public function generateEntityCollectionUrl($entity, $collectionRel, $parameters = array())
    {
        $route = $this->resourceRouteNameProvider->getEntityCollectionRouteName($collectionRel);
        $parameters = array_merge($this->getEntityParameters($entity), $parameters);

        return $this->urlGenerator->generate($route, $parameters, true);
    }

    /**
     * {@inheritdoc}
     * @param string $formRel
     * @param array  $parameters
     */
    public function generateEntityCollectionFormUrl($entity, $collectionRel, $formRel, $parameters = array())
    {
        $route = $this->resourceRouteNameProvider->getEntityCollectionFormRouteName($collectionRel, $formRel);
        $parameters = array_merge($this->getEntityParameters($entity), $parameters);

        return $this->urlGenerator->generate($route, $parameters, true);
    }

    private function getEntityParameters($entity)
    {
        return array(
            'id' => $this->entityIdPropertyPath->getValue($entity),
        );
    }
}
