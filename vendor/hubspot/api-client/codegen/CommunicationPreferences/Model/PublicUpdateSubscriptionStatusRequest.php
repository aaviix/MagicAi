<?php
/**
 * PublicUpdateSubscriptionStatusRequest
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  HubSpot\Client\CommunicationPreferences
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Subscriptions
 *
 * Subscriptions allow contacts to control what forms of communications they receive. Contacts can decide whether they want to receive communication pertaining to a specific topic, brand, or an entire HubSpot account.
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

namespace HubSpot\Client\CommunicationPreferences\Model;

use \ArrayAccess;
use \HubSpot\Client\CommunicationPreferences\ObjectSerializer;

/**
 * PublicUpdateSubscriptionStatusRequest Class Doc Comment
 *
 * @category Class
 * @description A request to change the status of a contact&#39;s subscription.
 * @package  HubSpot\Client\CommunicationPreferences
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PublicUpdateSubscriptionStatusRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PublicUpdateSubscriptionStatusRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'email_address' => 'string',
        'legal_basis' => 'string',
        'subscription_id' => 'string',
        'legal_basis_explanation' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'email_address' => null,
        'legal_basis' => null,
        'subscription_id' => null,
        'legal_basis_explanation' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'email_address' => false,
        'legal_basis' => false,
        'subscription_id' => false,
        'legal_basis_explanation' => false
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
        'email_address' => 'emailAddress',
        'legal_basis' => 'legalBasis',
        'subscription_id' => 'subscriptionId',
        'legal_basis_explanation' => 'legalBasisExplanation'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'email_address' => 'setEmailAddress',
        'legal_basis' => 'setLegalBasis',
        'subscription_id' => 'setSubscriptionId',
        'legal_basis_explanation' => 'setLegalBasisExplanation'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'email_address' => 'getEmailAddress',
        'legal_basis' => 'getLegalBasis',
        'subscription_id' => 'getSubscriptionId',
        'legal_basis_explanation' => 'getLegalBasisExplanation'
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

    public const LEGAL_BASIS_LEGITIMATE_INTEREST_PQL = 'LEGITIMATE_INTEREST_PQL';
    public const LEGAL_BASIS_LEGITIMATE_INTEREST_CLIENT = 'LEGITIMATE_INTEREST_CLIENT';
    public const LEGAL_BASIS_PERFORMANCE_OF_CONTRACT = 'PERFORMANCE_OF_CONTRACT';
    public const LEGAL_BASIS_CONSENT_WITH_NOTICE = 'CONSENT_WITH_NOTICE';
    public const LEGAL_BASIS_NON_GDPR = 'NON_GDPR';
    public const LEGAL_BASIS_PROCESS_AND_STORE = 'PROCESS_AND_STORE';
    public const LEGAL_BASIS_LEGITIMATE_INTEREST_OTHER = 'LEGITIMATE_INTEREST_OTHER';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getLegalBasisAllowableValues()
    {
        return [
            self::LEGAL_BASIS_LEGITIMATE_INTEREST_PQL,
            self::LEGAL_BASIS_LEGITIMATE_INTEREST_CLIENT,
            self::LEGAL_BASIS_PERFORMANCE_OF_CONTRACT,
            self::LEGAL_BASIS_CONSENT_WITH_NOTICE,
            self::LEGAL_BASIS_NON_GDPR,
            self::LEGAL_BASIS_PROCESS_AND_STORE,
            self::LEGAL_BASIS_LEGITIMATE_INTEREST_OTHER,
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
        $this->setIfExists('email_address', $data ?? [], null);
        $this->setIfExists('legal_basis', $data ?? [], null);
        $this->setIfExists('subscription_id', $data ?? [], null);
        $this->setIfExists('legal_basis_explanation', $data ?? [], null);
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

        if ($this->container['email_address'] === null) {
            $invalidProperties[] = "'email_address' can't be null";
        }
        $allowedValues = $this->getLegalBasisAllowableValues();
        if (!is_null($this->container['legal_basis']) && !in_array($this->container['legal_basis'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'legal_basis', must be one of '%s'",
                $this->container['legal_basis'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['subscription_id'] === null) {
            $invalidProperties[] = "'subscription_id' can't be null";
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
     * Gets email_address
     *
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->container['email_address'];
    }

    /**
     * Sets email_address
     *
     * @param string $email_address Contact's email address.
     *
     * @return self
     */
    public function setEmailAddress($email_address)
    {
        if (is_null($email_address)) {
            throw new \InvalidArgumentException('non-nullable email_address cannot be null');
        }
        $this->container['email_address'] = $email_address;

        return $this;
    }

    /**
     * Gets legal_basis
     *
     * @return string|null
     */
    public function getLegalBasis()
    {
        return $this->container['legal_basis'];
    }

    /**
     * Sets legal_basis
     *
     * @param string|null $legal_basis Legal basis for updating the contact's status (required for GDPR enabled portals).
     *
     * @return self
     */
    public function setLegalBasis($legal_basis)
    {
        if (is_null($legal_basis)) {
            throw new \InvalidArgumentException('non-nullable legal_basis cannot be null');
        }
        $allowedValues = $this->getLegalBasisAllowableValues();
        if (!in_array($legal_basis, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'legal_basis', must be one of '%s'",
                    $legal_basis,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['legal_basis'] = $legal_basis;

        return $this;
    }

    /**
     * Gets subscription_id
     *
     * @return string
     */
    public function getSubscriptionId()
    {
        return $this->container['subscription_id'];
    }

    /**
     * Sets subscription_id
     *
     * @param string $subscription_id ID of the subscription being updated for the contact.
     *
     * @return self
     */
    public function setSubscriptionId($subscription_id)
    {
        if (is_null($subscription_id)) {
            throw new \InvalidArgumentException('non-nullable subscription_id cannot be null');
        }
        $this->container['subscription_id'] = $subscription_id;

        return $this;
    }

    /**
     * Gets legal_basis_explanation
     *
     * @return string|null
     */
    public function getLegalBasisExplanation()
    {
        return $this->container['legal_basis_explanation'];
    }

    /**
     * Sets legal_basis_explanation
     *
     * @param string|null $legal_basis_explanation A more detailed explanation to go with the legal basis (required for GDPR enabled portals).
     *
     * @return self
     */
    public function setLegalBasisExplanation($legal_basis_explanation)
    {
        if (is_null($legal_basis_explanation)) {
            throw new \InvalidArgumentException('non-nullable legal_basis_explanation cannot be null');
        }
        $this->container['legal_basis_explanation'] = $legal_basis_explanation;

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


