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

namespace PHT\Xml\Match;

use PHT\Xml;
use PHT\Config;
use PHT\Wrapper;

class Card extends Xml\Base
{
    private $type;

    /**
     * @param \DOMDocument $xml
     * @param string $type
     */
    public function __construct($xml, $type)
    {
        $this->xmlText = $xml->saveXML();
        $this->xml = $xml;
        $this->type = $type;
    }

    /**
     * Return card's player id
     *
     * @return integer
     */
    public function getPlayerId()
    {
        return $this->getXml()->getElementsByTagName('BookingPlayerID')->item(0)->nodeValue;
    }

    /**
     * Return player
     *
     * @return \PHT\Xml\Player\Senior|\PHT\Xml\Player\Youth
     */
    public function getPlayer()
    {
        if ($this->type == Config\Config::MATCH_YOUTH) {
            return Wrapper\Player\Youth::player($this->getPlayerId());
        }
        return Wrapper\Player\Senior::player($this->getPlayerId());
    }

    /**
     * Return card's player name
     *
     * @return string
     */
    public function getPlayerName()
    {
        return $this->getXml()->getElementsByTagName('BookingPlayerName')->item(0)->nodeValue;
    }

    /**
     * Return card's team id
     *
     * @return integer
     */
    public function getTeamId()
    {
        return $this->getXml()->getElementsByTagName('BookingTeamID')->item(0)->nodeValue;
    }

    /**
     * Return card's team
     *
     * @return \PHT\Xml\Team\Senior|\PHT\Xml\Team\Youth|\PHT\Xml\Team\National
     */
    public function getTeam()
    {
        if ($this->type == Config\Config::MATCH_YOUTH) {
            return Wrapper\Team\Youth::team($this->getTeamId());
        } elseif ($this->type == Config\Config::MATCH_NATIONAL) {
            return Wrapper\National::team($this->getTeamId());
        }
        return Wrapper\Team\Senior::team($this->getTeamId());
    }

    /**
     * Return card type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->getXml()->getElementsByTagName('BookingType')->item(0)->nodeValue;
    }

    /**
     * Return if card is a yellow card
     *
     * @return boolean
     */
    public function isYellow()
    {
        return $this->getType() == 1;
    }

    /**
     * Return if card is a red card
     *
     * @return boolean
     */
    public function isRed()
    {
        return $this->getType() == 2;
    }

    /**
     * Return card minute
     *
     * @return integer
     */
    public function getMinute()
    {
        return $this->getXml()->getElementsByTagName('BookingMinute')->item(0)->nodeValue;
    }

    /**
     * Return match part when booking happened
     *
     * @return integer
     */
    public function getMatchPart()
    {
        return $this->getXml()->getElementsByTagName('MatchPart')->item(0)->nodeValue;
    }
}
