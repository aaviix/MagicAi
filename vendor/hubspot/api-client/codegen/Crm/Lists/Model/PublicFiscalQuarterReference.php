<?php
/**
 * PublicFiscalQuarterReference
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  HubSpot\Client\Crm\Lists
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Lists
 *
 * No description provided (generated by Openapi Generator https://github.com/openapitools/openapi-generator)
 *
 * The version of the OpenAPI document: v3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 7.3.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace HubSpot\Client\Crm\Lists\Model;

use \ArrayAccess;
use \HubSpot\Client\Crm\Lists\ObjectSerializer;

/**
 * PublicFiscalQuarterReference Class Doc Comment
 *
 * @category Class
 * @package  HubSpot\Client\Crm\Lists
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PublicFiscalQuarterReference implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PublicFiscalQuarterReference';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'hour' => 'int',
        'month' => 'int',
        'millisecond' => 'int',
        'reference_type' => 'string',
        'day' => 'int',
        'minute' => 'int',
        'second' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'hour' => 'int32',
        'month' => 'int32',
        'millisecond' => 'int32',
        'reference_type' => null,
        'day' => 'int32',
        'minute' => 'int32',
        'second' => 'int32'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'hour' => false,
        'month' => false,
        'millisecond' => false,
        'reference_type' => false,
        'day' => false,
        'minute' => false,
        'second' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'hour' => 'hour',
        'month' => 'month',
        'millisecond' => 'millisecond',
        'reference_type' => 'referenceType',
        'day' => 'day',
        'minute' => 'minute',
        'second' => 'second'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'hour' => 'setHour',
        'month' => 'setMonth',
        'millisecond' => 'setMillisecond',
        'reference_type' => 'setReferenceType',
        'day' => 'setDay',
        'minute' => 'setMinute',
        'second' => 'setSecond'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'hour' => 'getHour',
        'month' => 'getMonth',
        'millisecond' => 'getMillisecond',
        'reference_type' => 'getReferenceType',
        'day' => 'getDay',
        'minute' => 'getMinute',
        'second' => 'getSecond'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    public const REFERENCE_TYPE_FISCAL_QUARTER = 'FISCAL_QUARTER';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getReferenceTypeAllowableValues()
    {
        return [
            self::REFERENCE_TYPE_FISCAL_QUARTER,
        ];
    }

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('hour', $data ?? [], null);
        $this->setIfExists('month', $data ?? [], null);
        $this->setIfExists('millisecond', $data ?? [], null);
        $this->setIfExists('reference_type', $data ?? [], 'FISCAL_QUARTER');
        $this->setIfExists('day', $data ?? [], null);
        $this->setIfExists('minute', $data ?? [], null);
        $this->setIfExists('second', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['month'] === null) {
            $invalidProperties[] = "'month' can't be null";
        }
        if ($this->container['reference_type'] === null) {
            $invalidProperties[] = "'reference_type' can't be null";
        }
        $allowedValues = $this->getReferenceTypeAllowableValues();
        if (!is_null($this->container['reference_type']) && !in_array($this->container['reference_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'reference_type', must be one of '%s'",
                $this->container['reference_type'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['day'] === null) {
            $invalidProperties[] = "'day' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets hour
     *
     * @return int|null
     */
    public function getHour()
    {
        return $this->container['hour'];
    }

    /**
     * Sets hour
     *
     * @param int|null $hour hour
     *
     * @return self
     */
    public function setHour($hour)
    {
        if (is_null($hour)) {
            throw new \InvalidArgumentException('non-nullable hour cannot be null');
        }
        $this->container['hour'] = $hour;

        return $this;
    }

    /**
     * Gets month
     *
     * @return int
     */
    public function getMonth()
    {
        return $this->container['month'];
    }

    /**
     * Sets month
     *
     * @param int $month month
     *
     * @return self
     */
    public function setMonth($month)
    {
        if (is_null($month)) {
            throw new \InvalidArgumentException('non-nullable month cannot be null');
        }
        $this->container['month'] = $month;

        return $this;
    }

    /**
     * Gets millisecond
     *
     * @return int|null
     */
    public function getMillisecond()
    {
        return $this->container['millisecond'];
    }

    /**
     * Sets millisecond
     *
     * @param int|null $millisecond millisecond
     *
     * @return self
     */
    public function setMillisecond($millisecond)
    {
        if (is_null($millisecond)) {
            throw new \InvalidArgumentException('non-nullable millisecond cannot be null');
        }
        $this->container['millisecond'] = $millisecond;

        return $this;
    }

    /**
     * Gets reference_type
     *
     * @return string
     */
    public function getReferenceType()
    {
        return $this->container['reference_type'];
    }

    /**
     * Sets reference_type
     *
     * @param string $reference_type reference_type
     *
     * @return self
     */
    public function setReferenceType($reference_type)
    {
        if (is_null($reference_type)) {
            throw new \InvalidArgumentException('non-nullable reference_type cannot be null');
        }
        $allowedValues = $this->getReferenceTypeAllowableValues();
        if (!in_array($reference_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'reference_type', must be one of '%s'",
                    $reference_type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['reference_type'] = $reference_type;

        return $this;
    }

    /**
     * Gets day
     *
     * @return int
     */
    public function getDay()
    {
        return $this->container['day'];
    }

    /**
     * Sets day
     *
     * @param int $day day
     *
     * @return self
     */
    public function setDay($day)
    {
        if (is_null($day)) {
            throw new \InvalidArgumentException('non-nullable day cannot be null');
        }
        $this->container['day'] = $day;

        return $this;
    }

    /**
     * Gets minute
     *
     * @return int|null
     */
    public function getMinute()
    {
        return $this->container['minute'];
    }

    /**
     * Sets minute
     *
     * @param int|null $minute minute
     *
     * @return self
     */
    public function setMinute($minute)
    {
        if (is_null($minute)) {
            throw new \InvalidArgumentException('non-nullable minute cannot be null');
        }
        $this->container['minute'] = $minute;

        return $this;
    }

    /**
     * Gets second
     *
     * @return int|null
     */
    public function getSecond()
    {
        return $this->container['second'];
    }

    /**
     * Sets second
     *
     * @param int|null $second second
     *
     * @return self
     */
    public function setSecond($second)
    {
        if (is_null($second)) {
            throw new \InvalidArgumentException('non-nullable second cannot be null');
        }
        $this->container['second'] = $second;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


