<?php
/**
 * @link      http://github.com/kunjara/jyotish for the canonical source repository
 * @license   GNU General Public License version 2 or later
 */

namespace Jyotish\Panchanga\Vara;

use Jyotish\Graha\Graha;
use Jyotish\Base\Utils;

/**
 * Data Vara class.
 *
 * @author Kunjara Lila das <vladya108@gmail.com>
 */
class Vara {
    /**
     * Sunday
     */
    const NAME_SY = 'Ravivar';
    /**
     * Monday
     */
    const NAME_CH = 'Somavar';
    /**
     * Tuesday
     */
    const NAME_MA = 'Mangalavar';
    /**
     * Wednesday
     */
    const NAME_BU = 'Budhavar';
    /**
     * Thursday
     */
    const NAME_GU = 'Guruvar';
    /**
     * Friday
     */
    const NAME_SK = 'Shukravar';
    /**
     * Saturday
     */
    const NAME_SA = 'Shanivar';
    
    /**
     * Array of all varas.
     * 
     * @var array 
     */
    static public $vara = array(
        Graha::KEY_SY => self::NAME_SY,
        Graha::KEY_CH => self::NAME_CH,
        Graha::KEY_MA => self::NAME_MA,
        Graha::KEY_BU => self::NAME_BU,
        Graha::KEY_GU => self::NAME_GU,
        Graha::KEY_SK => self::NAME_SK,
        Graha::KEY_SA => self::NAME_SA
    );
    
    /**
     * Returns the requested instance of vara class.
     * 
     * @param string $key The key of vara
     * @param null|array $options Options to set (optional)
     * @return the requested instance of nakshatra class
     * @throws Exception\InvalidArgumentException
     */
    static public function getInstance($key, array $options = null)
    {
        $key = ucfirst(strtolower($key));
        
        if (!array_key_exists($key, self::$vara)) {
            throw new \Jyotish\Panchanga\Exception\InvalidArgumentException("Vara with the key '$key' does not exist.");
        }

        $varaClass = 'Jyotish\\Panchanga\\Vara\\Object\\' . $key;
        $varaObject = new $varaClass($options);

        return $varaObject;
    }
    
    /**
     * Returns the list of varas.
     * 
     * @param string $startDay
     * @return array
     */
    static public function listVara($startDay = Graha::KEY_SY)
    {
        $varas = self::$vara;
        
        if($startDay != Graha::KEY_SY){
            $list = Utils::shiftArray($varas, $startDay);
        }else{
            $list = $varas;
        }
        
        return $list;
    }
}