<?php

namespace FSC\RestBundle\Tests\Functional;

abstract class SerializationTestCase extends TestCase
{
    /**
     * @param string                                                                                                                                                                                         $expectedXml
     * @param \FSC\RestBundle\Model\Representation\Form\Form|\FSC\RestBundle\Model\Representation\AtomLink|\FSC\RestBundle\Model\Representation\Common\Measure|\FSC\RestBundle\Model\Representation\Resource $value
     */
    protected function assertSerializedXmlEquals($expectedXml, $value)
    {
        $serializedValue = $this->get('serializer')->serialize($value, 'xml');

        $this->assertEquals(sprintf('<?xml version="1.0" encoding="UTF-8"?>%s%s%s', "\n", $expectedXml, "\n"), $serializedValue);
    }

    /**
     * @param string                                        $expectedSerializedValue
     * @param \FSC\RestBundle\Model\Representation\Resource $value
     */
    protected function assertSerializedJsonEquals($expectedSerializedValue, $value)
    {
        $serializedValue = $this->get('serializer')->serialize($value, 'json');

        $this->assertEquals($expectedSerializedValue, $serializedValue);
    }
}
