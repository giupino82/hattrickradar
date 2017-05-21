<?php
/**
 * PHT
 *
 * @author Telesphore
 * @link https://github.com/jetwitaussi/PHT
 * @version 3.0
 * @license "THE BEER-WARE LICENSE" (Revision 42):
 *          Telesphore wrote this file.  As long as you retain this notice you
 *          can do whatever you want with this stuff. If we meet some day, and you think
 *          this stuff is worth it, you can buy me a beer in return.
 */

namespace PHT\Xml\Player;

use PHT\Xml;
use PHT\Config;
use PHT\Utils;
use PHT\Wrapper;

class History extends Xml\File
{
    /**
     * Events available for this player ?
     *
     * @return boolean
     */
    public function isAvailable()
    {
        return strtolower($this->getXml()->getElementsByTagName('PlayerEvents')->item(0)->getAttribute('Available')) == 'true';
    }

    /**
     * Return player id
     *
     * @return integer
     */
    public function getPlayerId()
    {
        return $this->getXml()->getElementsByTagName('PlayerID')->item(0)->nodeValue;
    }

    /**
     * Return player
     *
     * @param boolean $includeMatchInfo
     * @return \PHT\Xml\Player\Senior
     */
    public function getPlayer($includeMatchInfo = true)
    {
        return Wrapper\Player\Senior::player($this->getPlayerId(), $includeMatchInfo);
    }

    /**
     * Return number of training events
     *
     * @return integer
     */
    public function getEventNumber()
    {
        if ($this->isAvailable()) {
            return $this->getXml()->getElementsByTagName('PlayerEvent')->length;
        }
        return null;
    }

    /**
     * Return history event object
     *
     * @param integer $index
     * @return \PHT\Xml\Player\Event\History
     */
    public function getEvent($index)
    {
        $index = round($index);
        if ($index >= Config\Config::$forIndex && $index < $this->getEventNumber() + Config\Config::$forIndex) {
            $index -= Config\Config::$forIndex;
            $xpath = new \DOMXPath($this->getXml());
            $nodeList = $xpath->query('//PlayerEvent');
            $event = new \DOMDocument('1.0', 'UTF-8');
            $event->appendChild($event->importNode($nodeList->item($index), true));
            return new Event\History($event);
        }
        return null;
    }

    /**
     * Return iterator of history event objects
     *
     * @return \PHT\Xml\Player\Event\History[]
     */
    public function getEvents()
    {
        $xpath = new \DOMXPath($this->getXml());
        $nodeList = $xpath->query('//PlayerEvent');
        /** @var \PHT\Xml\Player\Event\History[] $data */
        $data = new Utils\XmlIterator($nodeList, '\PHT\Xml\Player\Event\History');
        return $data;
    }
}
